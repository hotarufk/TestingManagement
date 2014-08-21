<?php
/* @var $this LogController */
/* @var $model Log */


$this->menu=array(
	array('label'=>'Create Log from Same TestScenario', 'url'=>array('create','id'=>$model->Ndata)),
	array('label'=>'Update Log', 'url'=>array('update', 'id'=>$model->logID)),
	array('label'=>'Delete Log', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->logID),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Log', 'url'=>array('index')),
);
?>

<h1>View Log #<?php echo $model->logID; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'logID',
		array(
		'header'=>'Stream',
		'name'=>'Stream',
		'value'=>$model->data0->Stream,
		),
		array(
		'header'=>'Scenario',
		'name'=>'Scenario',
		'value'=>$model->data0->Scenario,
		),
		array(
		'header'=>'Test Case',
		'name'=>'TestCase',
		'value'=>$model->data0->TestCase,
		),
		'Ndata',
		'TanggalTest',
		'Keterangan',
	),
)); ?>
