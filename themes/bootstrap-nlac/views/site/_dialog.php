<?php

/**
 * @viewParam $gridData
 */
$this->beginWidget('zii.widgets.jui.CJuiDialog',array(
	'id'=>'mydialog',
	'options'=>array(
		'title'=>'Modal dialog',
		'modal'=>true,
		'autoOpen'=>true,
		'width'=>'300'
	),
));
	$this->widget('CTreeView', array(
		'id' => 'dummytree',
		'data' => array()
	));

	$this->widget('CTabView', array(
		'id' => 'dilog_tabs',
		'tabs'=>array(
			'tab1'=>array(
				'title'=>'tab 1',
				'content'=>'Hello Tab 1! ' . rand(),
			),
			'tab2'=>array(
				'title'=>'tab 2',
				'content'=>'Hello Tab 2!',
			),
		),
	));

	//$this->renderPartial('_grid', $gridData, false, false);

$this->endWidget('zii.widgets.jui.CJuiDialog');