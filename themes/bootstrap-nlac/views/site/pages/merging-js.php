<?php
/* @var $this SiteController */
$this->pageTitle=Yii::app()->name;
?>

<div class="container">
	<div class="page-header">
		<h1>Merging/minifying JS files</h1>
		<p class="lead">
			NLSClientScript can optionally merge the linked javascript files, and optionally minify the result.
		</p>
	</div>

<p class="alert alert-info text-box keep-b">
	<i class="glyphicon glyphicon-info-sign"></i> Check the <strong>/assets/nls</strong> directory of your locally installed demo, to see the result of the merging process!
</p>

<h4>General information</h4>
<ul>
	<li>Merging is aware only js files registered via CClientScript::registerScriptFile().</li>
	<li>NLSClientScript merges the registered js files into at most 4 files, depending where those are registered ("head","begin","end","load", check CClientScript doc).</li>
	<li>The minification is done by the <a href="https://github.com/tedious/JShrink" target="_blank">JShrink</a> library. That's a 3rd party, so in case of js minification issues please turn to its developers.</li>
	<li>The merged files are saved into the app's /assets/nls directory root.</li>
	<li>The merged files are named by hashing the urls of the files merged in.</li>
	<li>NLSClientScript doesn't watch the changing of the files to be merged, it only checks the existance of the merged file - in order to update it, that need to be removed or need to set the $forceMergeJs member to true (only for debugging/development).</li>
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
		//Path to the extension
		'class' => 'ext.nlac.nlsclientscript.NLSClientScript',
		//It only does merging if more than [mergeAbove] files are linked
		'mergeAbove' => 1,
		//If set, it will be appended to the merged files
		'appVersion' => '1.0',
		//Filtering - null or js regex here
		'includePattern' => '/process_only_this_pattern/',
		'excludePattern' => '/no_process_this_pattern/i',
		//CURL options, see http://php.net/manual/en/function.curl-setopt.php
		'curlTimeOut' => 15,
		'curlConnectionTimeOut' => 15,

		//------ JS-merge specific settings ------
		//Do merge js files!
		'mergeJs' => true,
		//If true, the merged files will be re-composed on every request - set to true ONLY for debugging/development
		'forceMergeJs' => false,
		//If true, it applies minification on the result
		'compressMergedJs' => false,
		//If true, it attempts to merge scripts pulled by ajax-requested partials
		'mergeIfXhr' => false,
		//Filtering for merge - null or php regex here
		'mergeJsIncludePattern' => '/only_merge_this_pattern/i',
		'mergeJsExcludePattern' => '/no_merge_this_pattern/i',
		...
	),
...
)
<?php $this->endWidget(); ?>