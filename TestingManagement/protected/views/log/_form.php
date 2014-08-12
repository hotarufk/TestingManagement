<?php
/* @var $this LogController */
/* @var $model Log */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'log-form',
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
		<?php echo $form->textField($model,'ID'); ?> <!--ini harus di isi dengan No dari model data, foreign key --> 
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'Stream'); ?>
		<?php echo $form->textField($model,'Stream',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Scenario'); ?>
		<?php echo $form->textField($model,'Scenario',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'TestCase'); ?>
		<?php echo $form->textField($model,'TestCase',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'TanggalTest'); ?>
		<?php	
			$this->widget('zii.widgets.jui.CJuiDatePicker', array(
					'model' => $model,
					'attribute' => 'TanggalTest',
					'options' => array(  
						'dateFormat'=>'yy-mm-dd',
						//'minDate'=>0,
						'changeYear' => true,           // can change year
						'changeMonth' => true,

					),
					'htmlOptions' => array(
						'size' => '10',
						'maxlength' => '10',
					),
				)); 
		?>		
		<?php echo $form->error($model,'TanggalTest'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Keterangan'); ?>
		<?php echo $form->textArea($model,'Keterangan',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'Keterangan'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->