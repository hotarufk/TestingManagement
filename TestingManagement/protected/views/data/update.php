<?php
/* @var $this DataController */
/* @var $model Data */

$this->breadcrumbs=array(
	'Datas'=>array('index'),
	$model->dataID=>array('view','id'=>$model->dataID),
	'Update',
);

$this->menu=array(
	array('label'=>'Create Data', 'url'=>array('create')),
	array('label'=>'View Data', 'url'=>array('view', 'dataID'=>$model->dataID)),
	array('label'=>'Manage Data', 'url'=>array('index')),
);
?>

<h1>Update Data <?php echo $model->dataID; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>