<?php

/**
 * This is the model class for table "data".
 *
 * The followings are the available columns in table 'data':
 * @property integer $No
 * @property integer $ID
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
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('ID, Stream, Scenario, TestCase, TesterWipro, TesterTsel, Cycle, PlannedStartDate, PlannedEndDate, Status, Remark, DefectID, FinalStatus', 'required'),
			array('ID, Cycle, Status, DefectID, FinalStatus', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('No, ID, Stream, Scenario, TestCase, TesterWipro, TesterTsel, Cycle, PlannedStartDate, PlannedEndDate, Status, Remark, DefectID, FinalStatus', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'log' => array(self::HAS_ONE, 'Log', 'ID'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'No' => 'No',
			'ID' => 'ID',
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
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('No',$this->No);
		$criteria->compare('ID',$this->ID);
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
