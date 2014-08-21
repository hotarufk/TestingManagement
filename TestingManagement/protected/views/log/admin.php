<?php
/* @var $this LogController */
/* @var $model Log */


?>


<?php $this->widget('bootstrap.widgets.TbGridView', array(
	'id'=>'log-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
	array(
		//'header' => 'Stream',
        'name' => 'data0.Stream',
       // 'value' => '$data->data0->Stream',   //where name is Client model attribute 
		 'filter'=>CHtml::activeTextField($model,'LStream'),
		),
	array(
		//'header' => 'Scenario',
        'name' => 'data0.Scenario',
        //'value' => '$data->data0->Scenario',   //where name is Client model attribute 
		 'filter'=>CHtml::activeTextField($model,'LScenario'),
		),
	array(
		//'header' => 'TestCase',
		'name' => 'data0.TestCase',
       // 'value' => '$data->data0->TestCase',   //where name is Client model attribute 
		 'filter'=>CHtml::activeTextField($model,'LTestCase'),
		),
		'TanggalTest',
		'Keterangan',
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>
