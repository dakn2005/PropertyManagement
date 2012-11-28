<?php

/**
 * This is the model class for table "tbl_repairs".
 *
 * The followings are the available columns in table 'tbl_repairs':
 * @property integer $rid
 * @property integer $tenantId
 * @property string $RepairNote
 * @property string $Date
 * @property string $Status
 * 
 * @property Tenants $tenant
 */
class Repairs extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @return Repairs the static model class
     */
    public static function model($className=__CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'tbl_repairs';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('tenantId, RepairNote, Date, Status', 'required'),
            array('tenantId', 'numerical', 'integerOnly' => true),
            array('Status', 'length', 'max' => 20),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('rid, tenantId, RepairNote, Date, Status', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'tenant'=>  array(self::BELONGS_TO,'Tenants','tenantId'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'rid' => 'Repair Note id',
            'tenantId' => 'Tenant',
            'RepairNote' => 'Repair Note',
            'Date' => 'Date',
            'Status' => 'Status',
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

        $criteria->compare('rid', $this->rid);
        $criteria->compare('tenantId', $this->tenantId);
        $criteria->compare('RepairNote', $this->RepairNote, true);
        $criteria->compare('Date', $this->Date, true);
        $criteria->compare('Status', $this->Status, true);

        return new CActiveDataProvider($this, array(
                    'criteria' => $criteria,
                ));
    }

    public function getStatus(){
        return array(
            'unrepaired'=>'Unrepaired',
            'repaired'=>'Repaired',
        );
    }
    
}