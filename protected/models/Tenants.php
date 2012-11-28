<?php
/**
 * This is the model class for table "tbl_tenants".
 *
 * The followings are the available columns in table 'tbl_tenants':
 * @property string $Names
 * @property integer $NationalID
 * @property integer $TenantID
 * @property string $DateOfOccupation
 * @property string $MaritalStatus
 * @property string $HouseNumber
 * @property integer $LID
 * @property string $Comment
 *
 * The followings are the available model relations:
 * @property Rentpaid[] $rentpas
 * @property Landlords $l
 * @property Repairs[] $repairs
 * 
 * @property string $llname
 * 
 */
class Tenants extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @return Tenants the static model class
     */
    public static function model($className=__CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'tbl_tenants';
    }

    public function getLandlordNamesList() {
        $landlordnames = Landlords::model()->findAllBySql("Select Names,LID from tbl_landlords");
        return CHtml::listData($landlordnames, 'LID', 'Names');
    }

    public function getLandlordName($lid) {
        $lnames = Landlords::model()->findByPk($lid);
        return $lnames->Names;
    }

    public function MaritalStatusOptions() {
        return array(
            'Single' => 'Single',
            'Married' => 'Married',
            'Divorced' => 'Divorced',
            'Widowed' => 'Widowed'
        );
    }

//    public function nameSearchModel($criteria) {
//        //$model=Tenants::model()->findByAttributes(array('Names'=>$criteria));
//        $model = Tenants::model()->findBySql(sprintf("select * from tbl_tenants where Names like '%s'", $criteria));
//        return $model; //returns tenant model
//    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('Names, NationalID, DateOfOccupation, HouseNumber, LID, MaritalStatus', 'required'),
            array('NationalID, LID', 'numerical', 'integerOnly' => true),
            array('Names', 'length', 'max' => 50),
            array('HouseNumber', 'length', 'max' => 20),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('Names, NationalID, TenantID, DateOfOccupation, MaritalStatus, HouseNumber, LID, Comment', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'rentpas' => array(self::HAS_MANY, 'Rentpaid', 'TenantID'),
            'rentrecCount'=>array(self::STAT,'Rentpaid','TenantID'),
            'l' => array(self::BELONGS_TO, 'Landlords', 'LID'),
            'repairs'=>array(self::HAS_MANY,'Repairs','TenantID'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'Names' => 'Names',
            'NationalID' => 'National ID',
            'TenantID' => 'Tenant',
            'DateOfOccupation' => 'Date Of Occupation',
            'MaritalStatus' => 'Marital Status',
            'HouseNumber' => 'House Number',
            'LID' => 'Select Landlord',
            'Comment' => 'Comment',
                //'llname'=>'Landlord name',
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
     */
    public function search() {
        // Warning: Please modify the following code to remove attributes that
        // should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('Names', $this->Names, true);
        $criteria->compare('NationalID', $this->NationalID);
        $criteria->compare('TenantID', $this->TenantID);
        $criteria->compare('DateOfOccupation', $this->DateOfOccupation, true);
        $criteria->compare('MaritalStatus', $this->MaritalStatus, true);
        $criteria->compare('HouseNumber', $this->HouseNumber, true);
        $criteria->compare('LID', $this->LID);
        $criteria->compare('Comment', $this->Comment, true);

        return new CActiveDataProvider($this, array(
                    'criteria' => $criteria,
                ));
    }

}

