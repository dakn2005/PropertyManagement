<?php
$this->breadcrumbs = array(
    'Tenants',
);

$this->menu = array(
    array('label' => 'Create Tenants', 'url' => array('create')),
    array('label' => 'Manage Tenants', 'url' => array('admin')),
);
?>

<div class="form">
    <?php
    //print_r($_GET); // Printing contents of GET array while trying to figure out this problem
//        echo CHtml::beginForm('', 'post');
//        // name
//        $field = 'searchname';
//        echo CHtml::activeLabel($model, $field);
//        echo CHtml::activeTextField($model, $field, array('class' => 'form_input', 'maxlength' => '80'));
//        echo CHtml::error($model, $field);
//        echo CHtml::submitButton('search');
//
//        echo CHtml::endForm();

    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'search_form',
        'enableAjaxValidation' => true,
            ));
    ?>

    <p class="note">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary($model); ?>

    <?php
    echo $form->labelEx($model, 'searchname');
    echo $form->textField($model, 'searchname', array('style' => 'width:250px;', 'maxlength' => 50));
    echo $form->error($model, 'searchname');
    echo CHtml::submitButton('search');
    //echo CHtml::ajaxSubmitButton('search', '');

    $this->endWidget();
    ?>

    <?php if (Yii::app()->user->hasFlash('test')): ?>
        <div class="<?php echo $flashclass ?>">
            <?php echo Yii::app()->user->getFlash('test'); ?>
        </div>
    <?php endif; ?>

</div>

<h1>Tenants</h1>

<?php
$this->widget('zii.widgets.CListView', array(
    'dataProvider' => $dataProvider,
    'itemView' => '_view',
));
?>
