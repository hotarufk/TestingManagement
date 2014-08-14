<?php
/* @var $this LogController */
/* @var $model Log */

$this->breadcrumbs=array(
	'Logs'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Data', 'url'=>array('data/index')),
	array('label'=>'Create Log', 'url'=>array('create','id'=>$id)),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#log-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>




<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'log-grid',
	'dataProvider'=> $model->searchByID($id),
	'filter'=>$model,
	'columns'=>array(
		'TanggalTest',
		'Keterangan',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
