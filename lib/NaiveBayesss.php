<?php
/**
 * 
 */
class NaiveBayes
{
	public $num = array();

	// Class C
	private $classes = array();

	// Condition X = [attribute => value]
	private $conds = array();

	// Condition X (NUMERIC) = [attribute => data]
	public $numericConds = array();

	// Data Uji
	public $params = array();

	private $database;

	public function __construct($database){
		$this->database = $database;
	}

	public function pushClasses($class, $query){
		array_push($this->classes, $class);

		$this->database->query($query);
		$this->num[$class] = $this->database->resultRow()['kelas'];
	}

	public function pushCondition($attribute, $value, $query){
		if(!isset($this->conds[$attribute])){
			$this->conds[$attribute] = array();
		}

		array_push($this->conds[$attribute], $value);

		foreach($this->classes as $class){
			$numName = $this->getNumName($attribute, $value, $class);

			$this->database->query(str_replace(':class', $class, $query));
			$this->num[$numName] = $this->database->resultRow()['cond'];
		}
	}

	public function pushNumericCondition($attribute, $query1, $query2){
		foreach($this->classes as $class){
			if(!isset($this->numericConds[$attribute])){
				$this->numericConds[$attribute] = array();
			}

			$numName = $this->getNumName($attribute, $class);

			$this->database->query(str_replace(':class', $class, $query1));
			$this->numericConds[$attribute][$class] = array_column($this->database->resultSet(), 'numCond');

			$this->database->query(str_replace(':class', $class, $query2));
			$this->num[$numName] = $this->database->resultRow()['numCond'];
		}
	}

	public function pushParams($attribute, $value){
		$this->params[$attribute] = $value;
	}

	public function setParams($data){
		foreach($data as $attribute => $value){
			$this->params[$attribute] = $value;
		}
	}

	public function initNumAll($query){
		$this->database->query($query);
		$this->num['dataLatih'] = $this->database->resultRow()['numAll'];
	}

	private function getNumName(...$field){
		return implode('_', $field);
	}

	public function getProbabilityOfClass($class){
		if( !in_array($class, array_keys($this->classes)) ){
			return false;
		}

		return $this->num[$class] / $this->num['dataLatih'];
	}

	public function getProbabilityOfCondition($attribute, $value, $class){
		if(!isset($this->conds[$attribute]) && !isset($this->conds[$attribute][$value])){
			return false;
		}

		$numX = $this->num[$this->getNumName($attribute, $value, $class)];
		return $numX / $this->num[$class];
	}

	private function getXOfNumericCondition($attribute, $class){
		return $this->num[$this->getNumName($attribute, $class)] / $this->num[$class];
	}

	private function getS2OfNumericConditionOnClass($attribute, $data, $class){
		if(!array_key_exists($attribute, $this->numericConds)){
			return false;
		}

		$numXOnClass = $this->getXOfNumericCondition($attribute, $class);
		$sumPower = 0;
		foreach($this->numericConds[$attribute][$class] as $row){
			$power = pow($row - $numXOnClass, 2);
			$sumPower += $power;
		}

		$s2 = $sumPower / ($this->num[$class] - 1);
		return $s2;
	}

	public function getProbabilityOfNumericCondition($attribute, $data, $class){
		return sqrt($this->getS2OfNumericConditionOnClass($attribute, $data, $class));
	}

	public function getProbabilityOfConditionOnClass($attribute, $class){
		if(!isset($this->params[$attribute])){
			return false;
		}

		$value = $this->params[$attribute];
		$result = $this->num[$this->getNumName($attribute, $value, $class)] / $this->num[$class];

		return $result;
	}

	public function getProbabilityOfNumericConditionOnClass($attribute, $data, $class){
		$twoPhi = 2 * 3.14;
		$front = sqrt($twoPhi * $this->getS2OfNumericConditionOnClass($attribute, $data, $class));

		$xOfAttributeOnClass = $this->getXOfNumericCondition($attribute, $class);
		$powS2OfAttributeOnClass = pow($this->getS2OfNumericConditionOnClass($attribute, $data, $class), 2);
		$behind = exp( pow($this->params[$attribute] - $xOfAttributeOnClass, 2) / (2 * $powS2OfAttributeOnClass) );

		return 1 / ($front * $behind);
	}

	public function resultPC(){
		$result = array();

		foreach($this->classes as $class){
			$result[$class] = $this->getProbabilityOfClass($class);
		}

		return $result;
	}

	public function resultPX(){
		$result = array();

		foreach($this->classes as $class){
			if(!isset($result[$class])){
				$result[$class] = array();
			}

			foreach($this->conds as $attribute => $values){

				if(!isset($result[$class][$attribute])){
					$result[$class][$attribute] = array();
				}

				foreach($values as $value){

					if(!isset($result[$class][$attribute][$value])){
						$result[$class][$attribute][$value] = array();
					}

					$result[$class][$attribute][$value] = $this->getProbabilityOfCondition($attribute, $value, $class);

				}

			}

			foreach($this->numericConds as $numAttribute => $dataAttributeOnClass){
				$result[$class][$numAttribute] = $this->getProbabilityOfNumericCondition($numAttribute, $dataAttributeOnClass, $class);
			}
		}

		return $result;
	}

	public function resultPXC(){
		$result = array();

		foreach($this->classes as $class){

			if(!isset($result[$class])){
				$result[$class] = array();
			}

			foreach(array_keys($this->conds) as $attribute){
				$result[$class][$attribute] = $this->getProbabilityOfConditionOnClass($attribute, $class);
				if($attribute == 'L' && $class == 'sanguin'){
					$this->getProbabilityOfConditionOnClass($attribute, $class);
				}
			}

			foreach($this->numericConds as $numAttribute => $dataAttributeOnClass){
				$result[$class][$numAttribute] = $this->getProbabilityOfNumericConditionOnClass($numAttribute, $dataAttributeOnClass, $class);
			}
		}

		return $result;
	}

	public function resultPCX(){
		$pC = $this->resultPC();
		$pXC = $this->resultPXC();
		$result = array();

		foreach($this->classes as $class){
			$result[$class] = $pC[$class];

			foreach($pXC[$class] as $itemOfPXC){
				$result[$class] *= $itemOfPXC;
			}

			$result[$class] = number_format($result[$class], 20);
		}

		return $result;
	}

	public function getResult(){
		$pCX = $this->resultPCX();
		$result = array_search(max($pCX), $pCX);

		$test = $this->params;
		$test['kelas_hasil'] = ucfirst($result);
		foreach($pCX as $key => $val){
			$test[$key] = $val;
		}
		var_dump($test);

		return ucfirst($result);
	}
}

// $called = new NaiveBayes($params['database']);