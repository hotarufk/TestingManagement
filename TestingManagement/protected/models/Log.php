<?php

/**
 * This is the model class for table "log".
 *
 * The followings are the available columns in table 'log':
 * @property integer $No
 * @property integer $ID
 * @property string $TanggalTest
 * @property string $Keterangan
 *
 * The followings are the available model relations:
 * @property Data $iD
 */
class Log extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	 
	 //kamus Lokal
	 
	 public $Stream;
	 public $Scenario;
	 public $TestCase;
	 
	public function tableName()
	{
		return 'log';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('ID, TanggalTest, Keterangan', 'required'),
			array('ID', 'numerical', 'integerOnly'=>true),
			array('TanggalTest','dateValidator'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('Stream,Scenario,TestCase','safe','safe'=>true,'on'=>'create,update'),
			array('No, ID, TanggalTest, Keterangan', 'safe', 'on'=>'search'),
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
			'iD' => array(self::BELONGS_TO, 'Data', 'ID'),
		);
	}

	public function dateValidator($attribute,$params){
		//kamus Lokal
		
		//ALgoritma
		//buat kriteria pencarian nya
		//hitung jumlah data yang di temukan, kalo lebih besar dari 0 maka false.
		$count =$this->countByAttributes(array(
            'ID'=>$this->ID,
			'TanggalTest'=>$this->TanggalTest
        ));

		$message = "hasil count : ".$count;
		$category = "date validator";
		Yii::trace("hasil count : ".$count."  tanggal test, id    ".$this->TanggalTest."  , ".'2');
		if ($count <= 0 ){
			$message="valid";
			$category="date debugging";
			Yii::trace($message);
		}else{
				$message="invalid";
				$category="date debugging";
				Yii::trace($message);
			$this->addError('TanggalTest', 'Keterangan Pada Tanggal Ini Telah Dibuat');
		}	
	
	}
	
	
	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'No' => 'No',
			'ID' => 'ID',
			'TanggalTest' => 'Tanggal Test',
			'Keterangan' => 'Keterangan',
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
		$criteria->compare('TanggalTest',$this->TanggalTest,true);
		$criteria->compare('Keterangan',$this->Keterangan,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	public function searchByID($dataID, $routeUrl = null, $templateParams = array()){
	 
        $criteria = new CDbCriteria;
 
        $criteria->compare('ID', $dataID);

        $item_count = self::model()->count($criteria);
 
        $pages = new CPagination($item_count);
        $pages->setPageSize(10);
 
        $sort = new CSort();
 
        if (!empty($templateParams)) {
            $pages->params = $templateParams;
            $sort->params = $templateParams;
        }
 
        if ($routeUrl) {
            $pages->route = $routeUrl;
            $sort->route = $routeUrl;
        }
 
        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
            'pagination' => $pages,
            'sort' => $sort,
        ));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Log the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
