<?php

class LandlordsController extends Controller {

    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = '//layouts/column2';

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
                'actions' => array('index', 'view', 'rentview'),
                'users' => array('*'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('create', 'update'),
                'users' => array('@'),
            ),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('admin', 'delete'),
                'users' => array('kimana'),
            //'users'=>array('@'),
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView($id) {
        $tenantProvider = new CActiveDataProvider('Tenants', array(
                    'criteria' => array(
                        'condition' => 'LID=:landlordId',
                        'params' => array(':landlordId' => $this->loadModel($id)->LID),
                    ),
                    'pagination' => array(
                        'pageSize' => 5,
                    ),
                ));

        $tenantsm = $this->loadModel($id)->tenants;


        $this->render('view', array(
            'model' => $this->loadModel($id),
            'tenantProvider' => $tenantProvider,
            'tmodel' => $tenantsm,
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
        $model = new Landlords;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Landlords'])) {
            $model->attributes = $_POST['Landlords'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->LID));
        }

        $this->render('create', array(
            'model' => $model,
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id) {
        $model = $this->loadModel($id);

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Landlords'])) {
            $model->attributes = $_POST['Landlords'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->LID));
        }

        $this->render('update', array(
            'model' => $model,
        ));
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id) {
        if (Yii::app()->request->isPostRequest) {
            // we only allow deletion via POST request
            $this->loadModel($id)->delete();

            // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
            if (!isset($_GET['ajax']))
                $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
        }
        else
            throw new CHttpException(400, 'Invalid request. Please do not repeat this request again.');
    }

    /**
     * Lists all models.
     */
    public function actionIndex() {
        //search landlords by name
        $dataProvider = null;
        $repairProvider = null;
        $flashclass = 'flash-notice';

        $model = new Landlords;
        if (isset($_POST['Landlords'])) {
            $model->attributes = $_POST['Landlords'];
            //var_dump($model->attributes);
            $dataProvider = $model->search();
            $flashclass = 'flash-success';
            Yii::app()->user->setFlash('test', 'Record found!');
        } else {
            $dataProvider = new CActiveDataProvider('Landlords',
                            array(
                                'pagination' => array(
                                    'pageSize' => 5,
                                ),
                            )
            );
        }

        $repairProvider = new CActiveDataProvider('Repairs',
                        array(
                            'pagination' => array(
                                'pageSize' => 5,
                            ),
                            'criteria' => array(
                                'condition' => 'Status=:state',
                                'params' => array(':state' => 'unrepaired'),
                            ),
                        )
        );

        $this->render('index', array(
            'dataProvider' => $dataProvider,
            'model' => $model,
            'repairProvider' => $repairProvider,
            'flashclass' => $flashclass,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new Landlords('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Landlords']))
            $model->attributes = $_GET['Landlords'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer the ID of the model to be loaded
     */
    public function loadModel($id) {
        $model = Landlords::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param CModel the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'landlords-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
