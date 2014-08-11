<?php
/* @var $this DataController */
/* @var $model Data */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'No'); ?>
		<?php echo $form->textField($model,'No'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ID'); ?>
		<?php echo $form->textField($model,'ID'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Stream'); ?>
		<?php echo $form->textArea($model,'Stream',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Scenario'); ?>
		<?php echo $form->textArea($model,'Scenario',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'TestCase'); ?>
		<?php echo $form->textArea($model,'TestCase',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'TesterWipro'); ?>
		<?php echo $form->textArea($model,'TesterWipro',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'TesterTsel'); ?>
		<?php echo $form->textArea($model,'TesterTsel',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Cycle'); ?>
		<?php echo $form->textField($model,'Cycle'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'PlannedStartDate'); ?>
		<?php echo $form->textField($model,'PlannedStartDate'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'PlannedEndDate'); ?>
		<?php echo $form->textField($model,'PlannedEndDate'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Status'); ?>
		<?php echo $form->textField($model,'Status'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Remark'); ?>
		<?php echo $form->textArea($model,'Remark',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'DefectID'); ?>
		<?php echo $form->textField($model,'DefectID'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'FinalStatus'); ?>
		<?php echo $form->textField($model,'FinalStatus'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->