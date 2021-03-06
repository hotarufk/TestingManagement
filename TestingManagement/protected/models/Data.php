<?php

/**
 * This is the model class for table "data".
 *
 * The followings are the available columns in table 'data':
 * @property integer $dataID
 * @property integer $no
 * @property string $Stream
 * @property string $Scenario
 * @property string $TestCase
 * @property string $TesterWipro
 * @property string $TesterTsel
 * @property integer $Cycle
 * @property string $PlannedStartDate
 * @property string $PlannedEndDate
 * @property integer $Status
 * @property string $Remark
 * @property integer $DefectID
 * @property integer $FinalStatus
 *
 * The followings are the available model relations:
 * @property Log $log
 */
class Data extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'data';
	}

	/**
	 * @return array valdataIDation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('no, Stream, Scenario, TestCase, TesterWipro, TesterTsel, Cycle, PlannedStartDate, PlannedEndDate, Status', 'required'),
			array('no, Cycle, Status, DefectID, FinalStatus', 'numerical', 'integerOnly'=>true),
			array('PlannedStartDate, PlannedEndDate','dateValidator','on'=>'create,update'),
			array('Stream,Scenario,TestCase','inputValidator','on'=>'create,update'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('No, dataID, Stream, Scenario, TestCase, TesterWipro, TesterTsel, Cycle, PlannedStartDate, PlannedEndDate, Status, Remark, DefectID, FinalStatus', 'safe', 'on'=>'search'),
		);
	}
	
	//fungsi pengecheckan apakah ada data yang sama atau engga
	public function checkunique(){
	
		$count =$this->countByAttributes(array(
            'no'=>$this->no,
			'TanggalTest'=>$this->TanggalTest
        ));
	}
	
	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'log' => array(self::HAS_ONE, 'Log', 'dataID'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'dataID' => 'dataID',
			'no' => 'no',
			'Stream' => 'Stream',
			'Scenario' => 'Scenario',
			'TestCase' => 'Test Case',
			'TesterWipro' => 'Tester Wipro',
			'TesterTsel' => 'Tester Tsel',
			'Cycle' => 'Cycle',
			'PlannedStartDate' => 'Planned Start Date',
			'PlannedEndDate' => 'Planned End Date',
			'Status' => 'Status',
			'Remark' => 'Remark',
			'DefectID' => 'Defect',
			'FinalStatus' => 'Final Status',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvdataIDer instance which will filter
	 * models according to data in model fields.
	 * - Pass data provdataIDer to CGrdataIDView, CListView or any similar wdataIDget.
	 *
	 * @return CActiveDataProvdataIDer the data provdataIDer that can return the models
	 * based on the search/filter conditions.
	 */
	 
	 //
	public function dateValidator($attribute,$params){
		//kamus lokal
		$message ='start date : '.$this->PlannedStartDate.'  end date : '.$this->PlannedEndDate;
		$category = 'date initial in validator cek value';
		Yii::trace($message, $category);
		//function
        if (($this->PlannedStartDate <= $this->PlannedEndDate) OR ($this->PlannedEndDate === date("Y-m-d"))){
			$message="valid";
			$category="date debugging";
			Yii::trace($message, $category);
		}else{
				$message="invalid";
				$category="date debugging";
				Yii::trace($message, $category);
			$this->addError('PlannedStartDate', 'Planned Start Date invalid, must be >= than Planned End Date');
		}
	}
	
	public function inputValidator($attribute,$params){		//pengecheckan terhadap stream,scenario,testcase
		//kamus lokal
		$count;
		 
		//algoritma

		$count =$this->countByAttributes(array(
				'Stream'=>$this->Stream,
				'Scenario'=>$this->Scenario,
				'TestCase'=>$this->TestCase
			));
	//kamus Lokal
        $isNew = true;
        //ALgoritma
        if($this->dataID=="" or $this->dataID== NULL){ //data baru di create
			Yii::trace("data logID nya kosong berarti kalo create logID nya masih belum ada saat ini");
		}else{
		$isNew = false;}
		
	if($isNew){
		if ($count <= 0 ){ //tidak ada data dengan kondisi sama kayak gini , asumsi bahwa search ini case insensitive -__-
			$message="valid";
			$category="data debugging";
			Yii::trace($message);
		}else{
			$message="invalid";
			$category="data debugging";
			Yii::trace($message);
			$this->addError('TestCase', 'Data dengan Stream,SCenario, dan TestCase ini sudah ada');
		}	
	}elseif(!$isNew){
		if($count<=0)
			Yii::trace("data berubah dan slot nya kosong");
		else{
			$oldStream =  $this->findByPk($this->dataID)->getAttribute('Stream');
			$oldScenario =  $this->findByPk($this->dataID)->getAttribute('Scenario');
			$oldTestCase =  $this->findByPk($this->dataID)->getAttribute('TestCase');
			if(($oldStream === $this->Stream) and($oldScenario === $this->Scenario) and ($oldTestCase === $this->TestCase))
				Yii::trace("data tidak berubah");
			else{
				Yii::trace("data berubah tapi slot nya udah ke isi :v:V :v");
				$this->addError('TestCase', 'Data dengan Stream,Scenario, dan TestCase ini sudah ada');
			}
		}
	}
   	

	}
	
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('dataID',$this->dataID);
		$criteria->compare('no',$this->no);
		$criteria->compare('Stream',$this->Stream,true);
		$criteria->compare('Scenario',$this->Scenario,true);
		$criteria->compare('TestCase',$this->TestCase,true);
		$criteria->compare('TesterWipro',$this->TesterWipro,true);
		$criteria->compare('TesterTsel',$this->TesterTsel,true);
		$criteria->compare('Cycle',$this->Cycle);
		$criteria->compare('PlannedStartDate',$this->PlannedStartDate,true);
		$criteria->compare('PlannedEndDate',$this->PlannedEndDate,true);
		$criteria->compare('Status',$this->Status);
		$criteria->compare('Remark',$this->Remark,true);
		$criteria->compare('DefectID',$this->DefectID);
		$criteria->compare('FinalStatus',$this->FinalStatus);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Data the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	//function to translate 
	function StatusText($val){
		$text=' ';
		switch ($val) { //'0'=>'Passed','1'=>'Failed','2'=>'Inprogress','3'=>'No Execute'
		  case 0 :
			$text='Passed';
			break;
		  case 1 :
			$text='Failed';
			break;
		  case 2 :
			$text='In Progress';
			break;
		  case 3 :
			$text='No Execute';
			break;
		  default:
			$text=' ____ ';
		}
		return $text;
	}
	

	
	
	
}
