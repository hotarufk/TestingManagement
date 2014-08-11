<?php
/* @var $this DataController */
/* @var $model Data */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'data-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'ID'); ?>
		<?php echo $form->textField($model,'ID'); ?>
		<?php echo $form->error($model,'ID'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Stream'); ?>
		<?php echo $form->textArea($model,'Stream',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'Stream'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Scenario'); ?>
		<?php echo $form->textArea($model,'Scenario',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'Scenario'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'TestCase'); ?>
		<?php echo $form->textArea($model,'TestCase',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'TestCase'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'TesterWipro'); ?>
		<?php echo $form->textArea($model,'TesterWipro',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'TesterWipro'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'TesterTsel'); ?>
		<?php echo $form->textArea($model,'TesterTsel',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'TesterTsel'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Cycle'); ?>
		<?php echo $form->textField($model,'Cycle'); ?>
		<?php echo $form->error($model,'Cycle'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'PlannedStartDate'); ?>
		<?php echo $form->textField($model,'PlannedStartDate'); ?>
		<?php echo $form->error($model,'PlannedStartDate'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'PlannedEndDate'); ?>
		<?php echo $form->textField($model,'PlannedEndDate'); ?>
		<?php echo $form->error($model,'PlannedEndDate'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Status'); ?>
		<?php echo $form->textField($model,'Status'); ?>
		<?php echo $form->error($model,'Status'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Remark'); ?>
		<?php echo $form->textArea($model,'Remark',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'Remark'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'DefectID'); ?>
		<?php echo $form->textField($model,'DefectID'); ?>
		<?php echo $form->error($model,'DefectID'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'FinalStatus'); ?>
		<?php echo $form->textField($model,'FinalStatus'); ?>
		<?php echo $form->error($model,'FinalStatus'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->