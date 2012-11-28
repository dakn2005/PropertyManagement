<?php

/**
 * This is the model class for table "tbl_landlords".
 *
 * The followings are the available columns in table 'tbl_landlords':
 * @property string $Names
 * @property integer $NationalID
 * @property string $Deed
 * @property integer $LID
 * @property string $Comment
 *
 * The followings are the available model relations:
 * @property Tenants[] $tenants
 * @property Rentpaid[] $rentrecs
 */
class Landlords extends CActiveRecord
{
        
	/**
	 * Returns the static model of the specified AR class.
	 * @return Landlords the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_landlords';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('Names, NationalID, Deed', 'required'),
			array('NationalID', 'numerical', 'integerOnly'=>true),
			array('Names', 'length', 'max'=>20),
			array('Deed', 'length', 'max'=>50),
			array('Comment', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('Names, NationalID, Deed, LID, Comment', 'safe', 'on'=>'search'),
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
			'tenants' => array(self::HAS_MANY, 'Tenants', 'LID'),
                        'tenantCount'=>array(self::STAT,'Tenants','LID'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'Names' => 'Full Names',
			'NationalID' => 'National/Passport ID [or any other official identifier]',
			'Deed' => 'Deed [Title/land]',
			'LID' => 'Lid',
			'Comment' => 'Comment',
                        
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('Names', '%'.$this->Names.'%', true,'AND',false);
//		$criteria->compare('NationalID',$this->NationalID);
//		$criteria->compare('Deed',$this->Deed,true);
//		$criteria->compare('LID',$this->LID);
//		$criteria->compare('Comment',$this->Comment,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}