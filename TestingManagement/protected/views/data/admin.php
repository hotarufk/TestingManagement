<?php
/* @var $this DataController */
/* @var $model Data */

$this->breadcrumbs=array(
	'Datas'=>array('index'),
	'Manage',
);

$this->menu=array(

	array('label'=>'Create Data', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#data-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Data</h1>


<?php $this->widget('bootstrap.widgets.TbGridView', array(
	'type'=>'striped bordered condensed',
	'id'=>'data-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'dataID',
		'no',
		'Stream',
		'Scenario',
		'TestCase',
		'TesterWipro',
		'TesterTsel',
		'Cycle',
		'PlannedStartDate',
		'PlannedEndDate',
		'Status',
		'Remark',
		'DefectID',
		'FinalStatus',
	
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>
