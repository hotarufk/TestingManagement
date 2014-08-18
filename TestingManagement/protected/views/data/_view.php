<?php
/* @var $this DataController */
/* @var $data Data */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('dataID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->dataID), array('view', 'id'=>$data->dataID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('no')); ?>:</b>
	<?php echo CHtml::encode($data->no); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Stream')); ?>:</b>
	<?php echo CHtml::encode($data->Stream); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Scenario')); ?>:</b>
	<?php echo CHtml::encode($data->Scenario); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('TestCase')); ?>:</b>
	<?php echo CHtml::encode($data->TestCase); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('TesterWipro')); ?>:</b>
	<?php echo CHtml::encode($data->TesterWipro); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('TesterTsel')); ?>:</b>
	<?php echo CHtml::encode($data->TesterTsel); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('Cycle')); ?>:</b>
	<?php echo CHtml::encode($data->Cycle); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('PlannedStartDate')); ?>:</b>
	<?php echo CHtml::encode($data->PlannedStartDate); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('PlannedEndDate')); ?>:</b>
	<?php echo CHtml::encode($data->PlannedEndDate); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Status')); ?>:</b>
	<?php echo CHtml::encode($data->Status); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Remark')); ?>:</b>
	<?php echo CHtml::encode($data->Remark); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('DefectID')); ?>:</b>
	<?php echo CHtml::encode($data->DefectID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('FinalStatus')); ?>:</b>
	<?php echo CHtml::encode($data->FinalStatus); ?>
	<br />

	*/ ?>

</div>