<?php

/**
 * This is the model class for table "tbl_rentpaid".
 *
 * The followings are the available columns in table 'tbl_rentpaid':
 * @property integer $TenantID
 * @property string $ReceiptNumber
 * @property integer $BroughtForward
 * @property integer $AmountPaid
 * @property integer $AmountOwed
 * @property integer $AmountAccrued
 * @property string $DateOfPayment
 * @property integer $NetAmount
 *
 * The followings are the available model relations:
 * @property Tenants $tenant
 */
class Rentpaid extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @return Rentpaid the static model class
     */
    public static function model($className=__CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'tbl_rentpaid';
    }

    public function getMonthName($monthnum) {
        //$c = new Calculations;
        $mname = Calculations::getMonths();
        return $mname[$monthnum];
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('TenantID, ReceiptNumber, AmountPaid, DateOfPayment', 'required'),
            array('TenantID, BroughtForward, AmountPaid, AmountOwed, AmountAccrued', 'numerical', 'integerOnly' => true),
            array('ReceiptNumber', 'length', 'max' => 20),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('TenantID, ReceiptNumber, BroughtForward, AmountPaid, AmountOwed, AmountAccrued, DateOfPayment, NetAmount', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'tenant' => array(self::BELONGS_TO, 'Tenants', 'TenantID'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'TenantID' => 'Tenant',
            'ReceiptNumber' => 'Receipt Number',
            'BroughtForward' => 'Brought Forward',
            'AmountPaid' => 'Amount Paid',
            'AmountOwed' => 'Amount Owed',
            'AmountAccrued' => 'Amount Accrued',
            'DateOfPayment' => 'Date Of Payment',
            'NetAmount' => 'Net Amount',
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

        $criteria->compare('TenantID', $this->TenantID);
        $criteria->compare('ReceiptNumber', $this->ReceiptNumber, true);
        $criteria->compare('BroughtForward', $this->BroughtForward);
        $criteria->compare('AmountPaid', $this->AmountPaid);
        $criteria->compare('AmountOwed', $this->AmountOwed);
        $criteria->compare('AmountAccrued', $this->AmountAccrued);
        $criteria->compare('DateOfPayment', $this->DateOfPayment, true);
        $criteria->compare('NetAmount', $this->NetAmount);

        return new CActiveDataProvider($this, array(
                    'criteria' => $criteria,
                ));
    }

    /*
     * Calculate net amount before we store it in db
     */

    protected function afterValidate() {
        parent::afterValidate();
        try {
            //net rent=(amount paid+brought forward)-amount owed-amount accrued
            $this->BroughtForward=($this->BroughtForward=="") ? 0 : $this->BroughtForward;
            $this->AmountOwed=($this->AmountOwed=="") ? 0 : $this->AmountOwed;
            $this->AmountAccrued=($this->AmountAccrued=="") ? 0 : $this->AmountAccrued;
            
            $this->NetAmount = ($this->AmountPaid + $this->BroughtForward) - $this->AmountOwed - $this->AmountAccrued;
        } catch (Exception $err) {
            throw new CException("Error Computing  Net Amount");
        }
    }

}