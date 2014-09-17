<div class="navbar navbar-inverse" role="navigation">
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand <?php echo $this->action->id == 'index' ? 'active' : ''; ?>" href="<?php echo $this->createUrl('/site/index'); ?>">
				<?php echo CHtml::encode(Yii::app()->name); ?>
			</a>
		</div>
		<div class="navbar-collapse collapse">
<?php 
$this->widget('zii.widgets.CMenu',array(
	'id' => 'main_nav',
	'items'=>array(
		array('label'=>'Anti-reloading', 'url'=>array('/site/page', 'view'=>'anti-reloading'), 'itemOptions'=>array('class'=>'hidden-sm')),
		array('label'=>'Merging JS', 'url'=>array('/site/page', 'view'=>'merging-js'), 'itemOptions'=>array('class'=>'hidden-sm')),
		array('label'=>'Merging CSS', 'url'=>array('/site/page', 'view'=>'merging-css'), 'itemOptions'=>array('class'=>'hidden-sm')),
		array('label'=>'<i class="glyphicon glyphicon-question-sign"></i> How-to <span class="caret"></span>', 'url'=>'javascript:;', 
			'itemOptions' => array('class'=>'dropdown hidden-xs hidden-md hidden-lg'),
			'linkOptions' => array('class'=>'dropdown-toggle', 'data-toggle'=>'dropdown'),
			'submenuOptions' => array('class'=>'dropdown-menu', 'role'=>'menu'),
			'items'=>array(
				array('label'=>'Anti-reloading', 'url'=>array('/site/page', 'view'=>'anti-reloading')),
				array('label'=>'Merging JS', 'url'=>array('/site/page', 'view'=>'merging-js')),
				array('label'=>'Merging CSS', 'url'=>array('/site/page', 'view'=>'merging-css'))			
			)
		),
		array('label'=>'<i class="glyphicon glyphicon-save"></i> Source', 'url'=>'https://github.com/nlac', 'linkOptions' => array('target'=>'_blank')),
		array('label'=>'<i class="glyphicon glyphicon-home"></i> nlacsoft.net', 'url'=>'http://nlacsoft.net', 'linkOptions' => array('target'=>'_blank')),
	),
	'encodeLabel' => false,
	'htmlOptions'=>array(
		'class'=>'nav navbar-nav'
	)
));
?>

<?php if ($this->isNlsc()) { ?>
<a href="<?php echo $this->createUrl($this->action->id, array_merge($this->actionParams, array('nonls'=>1))); ?>" 
	class="navbar-right btn navbar-btn btn-success tt" title="Click to turn NLSClientScript OFF. Tip: toggle this one and check the generated LINK and SCRIPT tags!" data-placement="bottom">
	<i class="glyphicon glyphicon-ok"></i> NLSC is ON
</a>
<?php } else { ?>
<a href="<?php echo $this->createUrl($this->action->id, array_merge($this->actionParams, array('nonls'=>''))); ?>" 
	class="navbar-right btn navbar-btn btn-danger tt" title="Click to turn NLSClientScript ON. Tip: toggle this one and check the generated LINK and SCRIPT tags!" data-placement="bottom">
	<i class="glyphicon glyphicon-remove"></i> NLSC is OFF
</a>
<?php } ?>
		</div>
	</div>
</div>