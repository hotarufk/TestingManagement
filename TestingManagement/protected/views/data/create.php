<?php
/* @var $this DataController */
/* @var $model Data */


$this->menu=array(
	array('label'=>'Manage Data', 'url'=>array('index')),
);
?>

<h1>Create Data</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>