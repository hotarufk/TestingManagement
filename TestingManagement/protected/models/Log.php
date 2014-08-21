<?php

/**
 * This is the model class for table "log".
 *
 * The followings are the available columns in table 'log':
 * @property integer $logID
 * @property integer $Ndata
 * @property string $TanggalTest
 * @property string $Keterangan
 *
 * The followings are the available model relations:
 * @property Data $data
 */
class Log extends CActiveRecord
{
	/**
	 * @return string the associated Ndatabase table name
	 */
	 
	 public $LStream;
	 public $LTestCase;
	 public $LScenario;
	 public $oldattribute;
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
			array('Ndata, TanggalTest, Keterangan', 'required'),
			array('Ndata', 'numerical', 'integerOnly'=>true),
			array('TanggalTest','dateValidator','on'=>'create,update'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, Ndata, TanggalTest, Keterangan,LScenario,LStream,LTestCase', 'safe', 'on'=>'search'),
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
			'data0' => array(self::BELONGS_TO, 'Data', 'Ndata'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'logID' => 'logID',
			'Ndata' => 'Ndata',
			'TanggalTest' => 'Tanggal Test',
			'Keterangan' => 'Keterangan',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveNdataProvider instance which will filter
	 * models according to Ndata in model fields.
	 * - Pass Ndata provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveNdataProvider the Ndata provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;
		$criteria->with=array('data0');

		$criteria->compare('logID',$this->logID);
		$criteria->compare('Ndata',$this->Ndata);
		$criteria->compare('TanggalTest',$this->TanggalTest,true);
		$criteria->compare('Keterangan',$this->Keterangan,true);
		$criteria->compare('data0.TestCase',$this->LTestCase, true);
		$criteria->compare('data0.Stream',$this->LStream, true);
		$criteria->compare('data0.Scenario',$this->LScenario, true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
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
	
	//fungsi tambahan
	
	public function dateValidator($attribute,$params){
        //kamus Lokal
        
        //ALgoritma
        if($this->logID=="" or $this->logID== NULL){
			Yii::trace("data logID nya kosong berarti kalo create logID nya masih belum ada saat ini")
		
		}
			
		//check apakah update atau create
			
		//buat kriteria pencarian nya
        //hitung jumlah Ndata yang di temukan, kalo lebih besar dari 0 maka false.
        $count =$this->countByAttributes(array(
            'logID'=>$this->logID,
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
	
	public function searchByID($Ndata, $routeUrl = null, $templateParams = array()){
     
        $criteria = new CDbCriteria;
 
        $criteria->compare('Ndata', $Ndata);

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

    
    

	
	
	
}
