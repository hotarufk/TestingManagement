<?php
/* @var $this LogController */
/* @var $model Log */

$this->menu=array(
	array('label'=>'Create Log', 'url'=>array('create')),
	array('label'=>'View Log', 'url'=>array('view', 'id'=>$model->logID)),
	array('label'=>'Manage Log', 'url'=>array('admin')),
);
?>

<h1>Update Log <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model,'modelData'=>$modelData)); ?>