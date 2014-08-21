<?php
/* @var $this LogController */
/* @var $model Log */


$this->menu=array(
	array('label'=>'Manage Log', 'url'=>array('index')),
);
?>

<h1>Create Log</h1>

<?php $this->renderPartial('_form', array('model'=>$model,'modelData'=>$modelData)); ?>