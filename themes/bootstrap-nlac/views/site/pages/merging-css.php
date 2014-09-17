<?php
/* @var $this SiteController */
$this->pageTitle=Yii::app()->name;
?>

<div class="container">
	<div class="page-header">
		<h1>Merging/minifying CSS files</h1>
		<p class="lead">
			NLSClientScript can optionally merge the linked css files, and optionally minify the result.
		</p>
	</div>

<p class="alert alert-info text-box keep-b">
	<i class="glyphicon glyphicon-info-sign"></i> Check the <strong>/assets/nls</strong> directory of your locally installed demo, to see the result of the merging process!
</p>

<h4>General information</h4>
<ul>
	<li>The merging/minification is done by own algorithm, in the <strong>NLSCssMerge</strong> class. <em>This class is independent from NLSClientScript and Yii, may be used separately, with other frameworks.</em> Some time i may create an own repo for it, but for now it's part of NLSClientScript.</li>
	<li>Merging is aware only js files registered via CClientScript::registerCssFile().</li>
	<li>NLSClientScript groups the registered css files by the "media" attribute of the link.</li>
	<li>The merged files are saved into the app's /assets/nls directory.</li>
	<li>The merged files are named by hashing the urls of the files merged in.</li>
	<li>NLSClientScript doesn't watch the changing of the files to be merged, it only checks the existance of the merged file - in order to update it, that need to be removed or need to set the $forceMergeCss member to true (only for debugging/development).</li>
</ul>

<h4>Configuration options (/protected/config/main.php)</h4>

<?php
$this->beginWidget('system.web.widgets.CTextHighlighter',array(
	'language'=>'php',
	'showLineNumbers'=>false,
));
?>
//part of /protected/config/main.php:
'components'=>array(
...
	'clientScript' => array(
		...
		//------ General NLSClientSript settings ------
		//see Merging JS page

		//------ CSS-merge specific settings ------
		//do merge!
		'mergeCss' => true,
		//EXPERIMENTAL - if true, all resources referred by url (webfonts, images etc) will be cloned locally 
		'downloadCssResources' => true,
		//if the below is true, the merged files will be re-composed on every request - ONLY for debugging/development
		'forceMergeCss' => false,
		//only merge if at least two files are linked
		'mergeAbove' => 1,
		//do minification on the result
		'compressMergedCss' => false,
		//Filtering for merge - null or php regex here
		'mergeCssIncludePattern' => '/only_merge_this_pattern/i',
		'mergeCssExcludePattern' => '/no_merge_this_pattern/i',
		...
	),
...
)
<?php $this->endWidget(); ?>
