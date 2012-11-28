<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ReportForm
 *
 * @author Administrator
 */
class ReportForm extends CFormModel {

    public $select_tbl;

    public static function model($className=__CLASS__) {
        return parent::model($className);
    }

    public function attributeLabels() {
        return array(
            'select_tbl' => 'Select Table',
        );
    }

    public function rules() {
        return array(
            array('select_tbl', 'required'),
                //array('llid', 'safe'),
        );
    }

    public function getTables() {
        return array(
            Landlords::model()->tableName() => 'Landlord',
            Tenants::model()->tableName() => 'Tenant',
            Rentpaid::model()->tableName() => 'Rent Paid',
            Repairs::model()->tableName() => 'Repairs',
        );
    }

}

?>
