<?php

/**
 * Description of Calculations
 *
 * @author Kimana
 * 
 */
class Calculations extends CFormModel {

    public $llid;
    // public $startdate;
    // public $enddate;
    public $selectmonth;
    public $selectyear;
    
    private $months = array(
        '01' => 'January',
        '02' => 'February',
        '03' => 'March',
        '04' => 'April',
        '05' => 'May',
        '06' => 'June',
        '07' => 'July',
        '08' => 'August',
        '09' => 'September',
        '10' => 'October',
        '11' => 'November',
        '12' => 'December',
    );
    
    private $years=array(
        2010=>'2010',
        2011=>'2011',
        2012=>'2012',
        2013=>'2013',
        2014=>'2014',
        2015=>'2015',
        2016=>'2016',
        2017=>'2017',
        2018=>'2018',
        2019=>'2019',
        2020=>'2020',
    );

    public static function model($className=__CLASS__) {
        return parent::model($className);
    }

    public function rules() {
        return array(
            array('llid, selectmonth, selectyear', 'required'),
            //array('llid', 'safe'),
        );
    }
    
    private function getTenantsArray(){
        $lmodel=  Landlords::model()->findByPk($this->llid);
        return $lmodel->tenants;
    }
    
    /*
     * return multi-dimensional array
     */
    public function getRentRecords(){
        $Tenants=$this->getTenantsArray();
        $rentModelArr=array();
        $ym="$this->selectyear-$this->selectmonth";
        //retrieve tenantID
        foreach($Tenants as $tenant){
                $sql="Select * from ".Rentpaid::model()->tableName()." Where TenantID=".$tenant->TenantID.
                    " AND DateOfPayment Like '$ym-%'";
                    
            $rentModelArr[]=Rentpaid::model()->findAllBySql($sql);
        }
        
        
        return $rentModelArr;
    }
    
    /*
     * function works only under certain circumstances
     */
    public function search() {
        //        works only on instances where the landlord has only one tenant!!
        $criteria = new CDbCriteria;
        //get landlordid
        //$criteria->compare('TenantID', 1);
        $lmodel=  Landlords::model()->findByPk($this->llid);
        $tmodel=$lmodel->tenants;
        
        foreach($tmodel as $tenant){
            $criteria->compare('TenantID', $tenant->TenantID);
        }
        
        $sm=$this->selectmonth;
        $criteria->compare('DateOfPayment','%'.$sm.'%',true,'AND',false);
        //$criteria->addColumnCondition(array('Month' => $this->selectmonth));
        //$criteria->addBetweenCondition('DateOfPayment', $this->startdate, $this->enddate,'AND');

        return new CActiveDataProvider(Rentpaid::model(), array('criteria' => $criteria));
    }

    
    
    public function getMonths() {
        return $this->months;
    }

    public function getYears(){
        return $this->years;
    }
    
    public function getLandlordNames() {
        $landlordnames = Landlords::model()->findAllBySql("select Names,LID from " . Landlords::model()->tableName());
        //$dropdowndata=array(0=>"Select a landlord");
        $dropdowndata = CHtml::listData($landlordnames, 'LID', 'Names');
        return $dropdowndata;
    }

    public function attributeLabels() {
        return array(
            'llid' => 'Select Landlord',
            'selectmonth' => 'Select Month',
            'selectyear'=>'Select Year',
        );
    }
}

?>