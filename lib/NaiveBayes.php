<?php
/**
 * 
 */
class NaiveBayes
{
	private $classes = array();
	private $attribute = array();
	public $trainingSet = array();
	private $params = array();
	private $classField = '';

	private function error($message){
		exit('NaiveBayes validation says: ' . $message);
	}

	public function __construct($classes, $classField, $trainingSet, $params){
		$this->validate($classes, $classField, $trainingSet, $params);

		$this->classField = $classField;
		$this->classes = $classes;
		$this->trainingSet = $trainingSet;
		$this->params = $params;

		$attribute = array_keys($params);
		foreach($attribute as $attr){
			$temp = array(
				'name' => $attr,
				'isNumeric' => false,
				'category' => array()
			);

			if(is_numeric($params[$attr])){
				$temp['isNumeric'] = true;
			}else{

				$col = array_column($trainingSet, $attr);
				foreach($col as $c){
					if(in_array($c, $temp['category'])){
						array_push($temp['category'], $c);
					}
				}
		
			}

			array_push($this->attribute, $temp);
		}
	}

	private function validate($classes, $classField, $trainingSet, $params){
		if(!is_array($classes) || !is_array($trainingSet) || !is_array($params)){
			$this->error('$classes, $trainingSet, or $params is not Array!');
		}

		if(empty($classes) || empty($trainingSet) || empty($params)){
			$this->error('$classes, $trainingSet, or $params is empty!');
		}

		if(!isset($trainingSet[0])){
			$this->error('$trainingSet is empty!');
		}

		$trainingSetKey = array_keys($trainingSet[0], $classField, true);
		$arrDiff = array_diff($trainingSetKey, array_keys($params));

		if(count($arrDiff) > 0){
			$this->error('Keys of $trainingSet[0] not equal with keys of $params!');
		}
	}

	private function findAttributeIndex($name){
		$findIndex = array_search($name, array_column($this->attribute, 'name'));
		if($findIndex === false){
			return -1;
		}
		return $findIndex;
	}

	function setAttribute($attributeName, $category = []){
		if(!is_array($category)){
			$this->error('$category must be array!');
		}

		$findIndex = $this->findAttributeIndex($attributeName);
		if($findIndex < 0){
			$this->error('Undefined attribute-> ' . $attributeName);
		}

		if($this->attribute[$findIndex]['isNumeric']){
			$this->error($attributeName . ' is Numeric Attribute!');
		}

		$this->attribute[$findIndex]['category'] = $category;
	}

	function getTrainingSetByFilter($filter = ['field' => 'value']){
		$trainingSet = $this->trainingSet;
		$result = array();

		for($i=0; $i<count($trainingSet); $i++){
			$check = true;
			foreach($filter as $field => $value){
				if($check){
					$check = ($trainingSet[$i][$field] == $value);
				}
			}

			if($check){
				array_push($result, $trainingSet[$i]);
			}
		}

		return $result;
	}

	public function getAllParams(){
		return $this->params;
	}

	private function getX($attribute, $class){
		$filter = array($this->classField => $class);
		$dataOnClass = $this->getTrainingSetByFilter($filter);

		$numClass = count($dataOnClass);
		$sum = 0;
		for($i=0; $i<count($dataOnClass); $i++){
			$sum += $dataOnClass[$i][$attribute];
		}

		$result = $sum / $numClass;
		return $result;
	}

	private function getS2($attribute, $class){
		$x = $this->getX($attribute, $class);

		$filter = array($this->classField => $class);
		$dataConditionOnClass = $this->getTrainingSetByFilter($filter);
		$dataConditionOnClass = array_column($dataConditionOnClass, $attribute);

		$sumPower = 0;
		foreach($dataConditionOnClass as $row){
			$power = pow($row - $x, 2);
			$sumPower += $power;
		}

		$filter = array($this->classField => $class);
		$dataOnClass = $this->getTrainingSetByFilter($filter);
		$numClass = count($dataOnClass);

		$result = $sumPower / ($numClass - 1);
		return $result;
	}

	/*
	* ---------------- P(X|C) For Numeric Attribute
	*/
	public function getProbabilityOfNumericConditionOnClass($attribute, $class){
		$twoPhi = 2 * 3.14;
		$s2 = $this->getS2($attribute, $class);
		$front = sqrt($twoPhi * $s2);

		$x = $this->getX($attribute, $class);
		$powS2 = pow($s2, 2);
		$behind = exp( pow($this->params[$attribute] - $x, 2) / (2 * $powS2) );

		return 1 / ($front * $behind);
	}

	/*
	* ---------------- P(X|C) For Categorial Attribute
	*/
	private function getProbabilityCategorialOfConditionOnClass($attribute, $class){
		$filter = array(
			$attribute => $this->params[$attribute],
			$this->classField => $class
		);
		$numConditionOnClass = count($this->getTrainingSetByFilter($filter));

		$filter = array($this->classField => $class);
		$numClass = count($this->getTrainingSetByFilter($filter));

		$result = $numConditionOnClass / $numClass;
		return $result;
	}

	/*
	* ---------------- P(X|C)
	*/
	public function getProbabilityOfConditionOnClass($attributeName, $class){
		if(!isset($this->params[$attributeName])){
			$this->error($attributeName . ' is undefined Attribute!');
		}

		$findIndex = $this->findAttributeIndex($attributeName);
		if($this->attribute[$findIndex]['isNumeric'] === false){
			$result = $this->getProbabilityCategorialOfConditionOnClass($attributeName, $class);
		}else{
			$result = $this->getProbabilityOfNumericConditionOnClass($attributeName, $class);
		}

		return $result;
	}

	public function getAllProbabilityOfConditionOnClass($class){
		if(!in_array($class, $this->classes)){
			$this->error('Undefined class->' . $class);
		}

		$result = array();
		$attribute = array_column($this->attribute, 'name');

		foreach($attribute as $attr){
			$result[$attr] = $this->getProbabilityOfConditionOnClass($attr, $class);
		}

		return $result;
	}

	public function getProbabilityOfClass($class){
		if(!in_array($class, $this->classes)){
			$this->error('Undefined class->' . $class);
		}

		$filter = array($this->classField => $class);
		$dataOnClass = $this->getTrainingSetByFilter($filter);
		$numClass = count($dataOnClass);

		$numAllData = count($this->trainingSet);

		return $numClass / $numAllData;
	}

	/*
	 * ---------------- All P(C|X)
	 */
	public function getResultProbabilityOfClassOnCondition(){
		$result = array();
		$attribute = array_column($this->attribute, 'name');

		foreach($this->classes as $class){
			$PC = $this->getProbabilityOfClass($class);
			$allPXC = $this->getAllProbabilityOfConditionOnClass($class);

			$result[$class] = $PC;
			foreach($allPXC as $PXC){
				$result[$class] *= $PXC;
			}
			
			$result[$class] = number_format($result[$class], 20);
			// var_dump($result[$class]);
		}

		return $result;
	}

	public function getClassificationResult(){
		$allPCX = $this->getResultProbabilityOfClassOnCondition();
		$result = array_search(max($allPCX), $allPCX);

		return ucfirst($result);
	}
}


