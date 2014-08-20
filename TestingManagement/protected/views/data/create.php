<?php
/* @var $this DataController */
/* @var $model Data */

$this->breadcrumbs=array(
	'Datas'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Manage Data', 'url'=>array('index')),
);
?>

<h1>Create Data</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>