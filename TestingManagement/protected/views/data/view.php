<?php
/* @var $this DataController */
/* @var $model Data */

$this->breadcrumbs=array(
	'Datas'=>array('index'),
	$model->dataID,
);

$this->menu=array(
	array('label'=>'Create Data', 'url'=>array('create')),
	array('label'=>'Update Data', 'url'=>array('update', 'id'=>$model->dataID)),
	array('label'=>'Delete Data', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->dataID),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Data', 'url'=>array('index')),
	array('label'=>'Create Log', 'url'=>array('log/create','id'=>$model->dataID)),
	array('label'=>'View Log', 'url'=>array('log/viewAll','id'=>$model->dataID)),
);
?>

<h1>View Data #<?php echo $model->dataID; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
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
	),
)); ?>
