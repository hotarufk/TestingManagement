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
		<?php echo $form->numberField($model,'ID'); ?>
		<?php echo $form->error($model,'ID'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Stream'); ?>
		<?php echo $form->dropDownList($model,'Stream', CHtml::listData(Data::model()->findAll(), 'Stream', 'Stream'), array('empty'=>'(other)', 
						'ajax' => array(
						'type'=>'POST', 
						'url'=>$this->createUrl('log/loadScenario'), //or $this->createUrl('loadcities') if '$this' extends CController
						'update'=>'#scenario_name', //or 'success' => 'function(data){...handle the data in the way you want...}',
					  'data'=>array('Stream'=>'js:this.value'),
					  )));  ?>
		<?php echo $form->error($model,'Stream'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'Scenario'); ?>
		<?php echo CHtml::dropDownList('ScenarioList','', array(), array('prompt'=>'Select City'));?>
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
		<?php echo $form->numberField($model,'Cycle'); ?>
		<?php echo $form->error($model,'Cycle'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'PlannedStartDate'); ?>
		<?php	
			$this->widget('zii.widgets.jui.CJuiDatePicker', array(
					'model' => $model,
					'attribute' => 'PlannedStartDate',
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
		<?php echo $form->error($model,'PlannedStartDate'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'PlannedEndDate'); ?>
		<?php	
			$this->widget('zii.widgets.jui.CJuiDatePicker', array(
					'model' => $model,
					'attribute' => 'PlannedEndDate',
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
		<?php echo $form->error($model,'PlannedEndDate'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Status'); ?>
		<?php echo $form->dropDownList($model,'Status',array('0'=>'Passed','1'=>'Failed','2'=>'Inprogress','3'=>'No Execute'), array('options' => array('0'=>array('selected'=>true)))); ?>
		<?php echo $form->error($model,'Status'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Remark'); ?>
		<?php echo $form->textArea($model,'Remark',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'Remark'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'DefectID'); ?>
		<?php echo $form->numberField($model,'DefectID'); ?>
		<?php echo $form->error($model,'DefectID'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'FinalStatus'); ?>
		<?php echo $form->dropDownList($model,'FinalStatus',array('0'=>'Passed','1'=>'Failed','2'=>'Inprogress','3'=>'No Execute'), array('options' => array('0'=>array('selected'=>true)))); ?>
		<?php echo $form->error($model,'FinalStatus'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->