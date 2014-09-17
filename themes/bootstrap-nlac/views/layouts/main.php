<?php 
Yii::app()->clientScript->registerCssFile(Yii::app()->getTheme()->baseUrl . '/css/main.css');

Yii::app()->clientScript->registerCoreScript('jquery');
Yii::app()->clientScript->registerScriptFile(Yii::app()->getRequest()->getBaseUrl() . '/themes/vendor/bootstrap/js/bootstrap.js', CClientScript::POS_END);
Yii::app()->clientScript->registerScriptFile(Yii::app()->getRequest()->getBaseUrl() . '/js/app.js', CClientScript::POS_END);
$MODULES = __DIR__ . '/modules/';
?><!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<link rel="icon" href="../../favicon.ico">

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>
	
	<?php require($MODULES . 'header.php'); ?>

	<?php echo $content; ?>
		
	<?php require($MODULES . 'footer.php'); ?>

	</div>
	
	<div id="dialog_container"></div>
</body>

</html>