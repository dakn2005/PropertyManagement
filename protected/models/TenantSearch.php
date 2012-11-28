<?php

class TenantSearch extends CFormModel {

    public $searchname;
    public $returnmod;
    
    public static function model($className=__CLASS__) {
        return parent::model($className);
    }

    public function rules() {
        return array(
            array('searchname','required'),
        );
    }

    public function nameSearch() {
        $model = Tenants::model()->findByAttributes(array('Names' => $this->searchname));
        //$model = Tenants::model()->findBySql("select * from tbl_tenants where Names like '%" . $this->searchname . "%'");
        $this->returnmod = $model;
        return $this->returnmod; //returns tenant model
    }
    
    public function returnCriteria(){
        $criteria=new CDbCriteria;
        $criteria->compare('Names','%'.$this->searchname.'%',true,'AND', false);
        return $criteria;
    }

    public function attributeLabels() {
        return array(
            'searchname' => 'Enter Search Name',
        );
    }

}
?>