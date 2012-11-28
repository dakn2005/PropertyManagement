<?php

class ReportsController extends Controller {
    public $tblname;
    
    public function actionIndex() {
        $model = new ReportForm;

        if (isset($_POST['ReportForm'])) {
            $model->attributes = $_POST['ReportForm'];
            $this->tblname=$model->select_tbl;
        }

        $this->render('index', array('model' => $model));
    }

    public function actions() {
        // return external action classes, e.g.:
        return array(
            // page action renders "static" pages stored under 'protected/views/site/pages'
            // They can be accessed via: index.php?r=reports/page&view=FileName
             'page' => array(
                'class' => 'CViewAction',
            ),
        );
    }
    
    public function actionExcel(){
        $this->render('excel');
    }

    // Uncomment the following methods and override them if needed
    /*
      public function filters()
      {
      // return the filter configuration for this controller, e.g.:
      return array(
      'inlineFilterName',
      array(
      'class'=>'path.to.FilterClass',
      'propertyName'=>'propertyValue',
      ),
      );
      }


     */
}