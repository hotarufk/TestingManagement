<?php
/* @var $this LogController */
/* @var $data Log */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('DataID')); ?>:</b>
	<?php echo CHtml::encode($data->DataID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('TanggalTest')); ?>:</b>
	<?php echo CHtml::encode($data->TanggalTest); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Keterangan')); ?>:</b>
	<?php echo CHtml::encode($data->Keterangan); ?>
	<br />


</div>