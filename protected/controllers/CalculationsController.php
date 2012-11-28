<?php

class CalculationsController extends Controller {

    public $waat;
    /**
     * @return array action filters
     */
    public function filters() {
        return array(
            'accessControl', // perform access control for CRUD operations
        );
    }

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    public function accessRules() {
        return array(
            array('allow', // allow all users to perform 'index' and 'view' actions
                'actions' => array('index', 'view'),
                'users' => array('*'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('create', 'update'),
                'users' => array('@'),
            ),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('admin', 'delete'),
                'users' => array('admin'),
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }

    public function actionIndex() {
        $model = new Calculations;
        //$dprovider = new CActiveDataProvider(Rentpaid::model());
        $flashclass = 'flash-success';
        $rentArrays=null;
//        works only on instances where the landlord has only one tenant!!
//        
//        if (isset($_POST['Calculations'])) {
//            $model->attributes = $_POST['Calculations'];
//            $dprovider = $model->search();
//            Yii::app()->user->setFlash('test','Records found!,<br />Lid: '.$model->llid.'<br />Month Number: '.$model->months[$model->selectmonth]);
//        }
        
        if (isset($_POST['Calculations'])){
            $model->attributes=$_POST['Calculations'];
            $rentArrays=$model->getRentRecords();
        }

        $this->render('index', array(
            'model' => $model,
            //'dataProvider' => $dprovider,
            'flashclass' => $flashclass,
            'rentArrays'=>$rentArrays,
            
        ));
    }

//    // Uncomment the following methods and override them if needed
//
//    public function filters() {
//        // return the filter configuration for this controller, e.g.:
//        return array(
//            'inlineFilterName',
//            array(
//                'class' => 'path.to.FilterClass',
//                'propertyName' => 'propertyValue',
//            ),
//        );
//    }
}