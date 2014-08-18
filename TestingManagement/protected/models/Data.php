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
 * @property integer $DefectdataID
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
			array('no, Cycle, Status, DefectdataID, FinalStatus', 'numerical', 'integerOnly'=>true),
			array('PlannedStartDate, PlannedEndDate','dateValdataIDator','on'=>'create,update'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('No, dataID, Stream, Scenario, TestCase, TesterWipro, TesterTsel, Cycle, PlannedStartDate, PlannedEndDate, Status, Remark, DefectdataID, FinalStatus', 'safe', 'on'=>'search'),
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
			'DefectdataID' => 'Defect',
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
	public function dateValdataIDator($attribute,$params){
		//kamus lokal
		$message ='start date : '.$this->PlannedStartDate.'  end date : '.$this->PlannedEndDate;
		$category = 'date initial in valdataIDator cek value';
		Yii::trace($message, $category);
		//function
        if (($this->PlannedStartDate <= $this->PlannedEndDate) OR ($this->PlannedEndDate === date("Y-m-d", $d))){
			$message="valid";
			$category="date debugging";
			Yii::trace($message, $category);
		}else{
				$message="invalid";
				$category="date debugging";
				Yii::trace($message, $category);
			$this->addError('PlannedStartDate', 'Planned Start Date invaldataID, must be >= than Planned End Date');
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
}
