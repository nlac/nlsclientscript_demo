<?php
/* @var $this SiteController */
$this->pageTitle=Yii::app()->name;
?>

<div class="container">
	<div class="page-header">
		<h1>Anti-reloading JS files</h1>
		<p class="lead">
			Follow the process to see the main effect of NLSClientScript.
		</p>
	</div>

	<div class="row keep-b">
		<div class="col-sm-4">
			<div class="box bg-info text-info">
				<div class="box-inner">
					<script>$.data(document.body,"test","I'm the Body!");</script>
					<p><strong>1. A small data is associated now to a DOM element via jquery api:</strong></p>
<?php
$this->beginWidget('system.web.widgets.CTextHighlighter',array(
	'language'=>'javascript',
	'showLineNumbers'=>false,
));
?>
<script>
$.data(document.body,
 "test","I'm the Body!");
</script>
<?php
	$this->endWidget();
?>
					<p><a class="btn btn-primary bottom" href="javascript:;"
						 onclick="alert($.data(document.body, 'test'))">Show $.data(document.body, "test")</a>
					</p>
				</div>
				<i class="glyphicon glyphicon-chevron-right hidden-xs text-info"></i>
				<i class="glyphicon glyphicon-chevron-down visible-xs-inline-block text-info"></i>
			</div>
		</div>
		<div class="col-sm-4">
			<div class="box bg-info text-info">
				<div class="box-inner">
					<p><strong>2. Let's invoke a modal dialog several times</strong>, displaying remote content. The point: jQuery will process html content, containing script tags with src.</p>
					<p>
<?php
echo CHtml::link('Open a jQuery UI dialog', 'javascript:;', array(
	'encode' => false,
	'class' => 'btn btn-primary bottom',
	'onclick' => $this->makeModalClick(array('dialog'))
));
?>
					</p>
					<p><em>Check in Firebug</em> what js files are downloaded and executed while the action is being processed.</p>
					<p><em>Be warned:</em> Firebug, if opened, may freeze the page for some seconds here.</p>
				</div>
				<i class="glyphicon glyphicon-chevron-right hidden-xs text-info"></i>
				<i class="glyphicon glyphicon-chevron-down visible-xs-inline-block text-info"></i>
			</div>
		</div>
		<div class="col-sm-4">
			<div class="box bg-info text-info">
				<div class="box-inner">
					<p><strong>3. Check what is in jQuery's storage now.</strong></p>
					<p>You should see an alert with text "I'm the Body!".</p>
					<p><a class="btn btn-primary bottom" href="javascript:;"
						 onclick="alert($.data(document.body, 'test'))">Show $.data(document.body, "test")</a>
					</p>
					<p><em>NLSClientScript prevented to pull the same libraries more than once, this way it prevents unwanted re-initializations.</em></p>
					<p><strong>Now repeat the flow without NLSClientScript.</strong></p>
				</div>
			</div>
		</div>
	</div>
	<div class="row keep-b text-center">
		<div class="col-xs-12">
			<?php if ($this->isNlsc()) { ?>
			<a href="<?php echo $this->createUrl($this->action->id, array_merge($this->actionParams, array('nonls'=>1))); ?>" 
				class="alert alert-success text-success block tt" title="Click to turn NLSClientScript OFF">
				<i class="glyphicon glyphicon-ok"></i>
				NLSC is currently ON
			</a> 
			<?php } else { ?>
			<a href="<?php echo $this->createUrl($this->action->id, array_merge($this->actionParams, array('nonls'=>''))); ?>" 
				class="alert alert-danger text-danger block tt" title="Click to turn NLSClientScript ON">
			<i class="glyphicon glyphicon-remove"></i> 
			NLSC is currently OFF
			</a>
			<?php } ?>
		</div>
	</div>