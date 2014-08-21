<?php
/* @var $this DataController */
/* @var $model Data */


$this->menu=array(
	array('label'=>'Create Data', 'url'=>array('create')),
	array('label'=>'View Data', 'url'=>array('view', 'id'=>$model->dataID)),
	array('label'=>'Manage Data', 'url'=>array('index')),
);
?>

<h1>Update Data <?php echo $model->dataID; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>