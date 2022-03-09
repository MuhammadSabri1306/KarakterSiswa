<?php

$template = $this->getTemplate('MainTemplate');
$template->activeNav = -1;
$template->header();

?><div class="inner-container container">
	<div class="row">
		<div class="section-header col-md-12">
			<h2 class="text-center mb-5">403 - Forbidden Error !</h2>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="box-content">
				<div class="text-center error-page">
					<h1>403</h1>
					<span>Page cannot be access.</span>
					<p><a href="<?=BASEDOMAIN?>/home">&larr; Go back Home</a></p>
				</div>
			</div>
		</div>
	</div>
</div><?php

$template->footer();