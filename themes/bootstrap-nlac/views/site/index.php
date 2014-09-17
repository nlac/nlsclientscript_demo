<?php
/* @var $this SiteController */
$this->pageTitle=Yii::app()->name;
?>

<?php /* @var $this SiteController */ $this->pageTitle=Yii::app()->name; ?>

<div class="jumbotron">
	<div class="container">
		<h1><?php echo CHtml::encode(Yii::app()->name); ?></h1>
		<p class="lead">
			This demo page demonstrates the features of NLSClientScript.
		</p>
	</div>
</div>

<div class="container">

	<div class="row">
		<div class="col-md-4">
			<h2>Anti-reloading</h2>
			<p>NLSCLientScript prevents to download same js libraries more than once into the DOM.</p>
			<p>				
				<a class="btn btn-primary" href="<?php echo $this->createUrl('/site/page', array('view'=>'anti-reloading')); ?>" role="button">Learn more &raquo;</a>
			</p>
		</div>
		<div class="col-md-4">
			<h2>Merging/minifying Javascript</h2>
			<p>NLSCLientScript is able to merge the linked js libraries into one and optionally minify it.</p>
			<p>				
				<a class="btn btn-primary" href="<?php echo $this->createUrl('/site/page', array('view'=>'merging-js')); ?>" role="button">Learn more &raquo;</a>
			</p>
		</div>
		<div class="col-md-4">
			<h2>Merging/minifying CSS</h2>
			<p>NLSCLientScript is able to merge the linked css files into one and optionally minify it.</p>
			<p>				
				<a class="btn btn-primary" href="<?php echo $this->createUrl('/site/page', array('view'=>'merging-css')); ?>" role="button">Learn more &raquo;</a>
			</p>
		</div>
	</div>

</div>