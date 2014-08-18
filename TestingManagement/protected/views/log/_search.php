<?php
/* @var $this LogController */
/* @var $model Log */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'DataID'); ?>
		<?php echo $form->textField($model,'DataID'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'TanggalTest'); ?>
		<?php echo $form->textField($model,'TanggalTest'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Keterangan'); ?>
		<?php echo $form->textArea($model,'Keterangan',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->