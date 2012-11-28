<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'tenants-form',
        'enableAjaxValidation' => false,
            ));
    ?>

    <p class="note">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary($model); ?>

    <div class="row">
        <?php echo $form->labelEx($model, 'Names'); ?>
        <?php echo $form->textField($model, 'Names', array('style' => 'width:250px;', 'maxlength' => 50)); ?>

        <?php echo $form->error($model, 'Names'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'NationalID'); ?>
        <?php echo $form->textField($model, 'NationalID',array('style' => 'width:250px;', 'maxlength' => 50)); ?>
        <?php echo $form->error($model, 'NationalID'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'DateOfOccupation'); ?>
        <?php //echo $form->textArea($model,'DateOfOccupation',array('rows'=>6, 'cols'=>50)); ?>
        <?php
            $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                //'name' => 'DateOfOccupation',
                'model'=>$model,
                'attribute'=>'DateOfOccupation',
                // additional javascript options for the date picker plugin
                'options' => array(
                   'showAnim' => 'slideDown',
                   'dateFormat'=>'yy-mm-dd'
                ),
                'htmlOptions' => array(
                    'style' => 'height:15px;width:250px;'
                ),
            ));
        ?>
        <?php echo $form->error($model, 'DateOfOccupation'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'MaritalStatus'); ?>
        <?php echo $form->dropDownList($model, 'MaritalStatus', $model->MaritalStatusOptions(),array('style' => 'width:250px')); ?>
        <?php echo $form->error($model, 'MaritalStatus'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'HouseNumber'); ?>
        <?php echo $form->textField($model, 'HouseNumber', array('style' => 'width:250px;', 'maxlength' => 50)); ?>
        <?php echo $form->error($model, 'HouseNumber'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'LID'); ?>
        <?php //echo $form->textField($model,'LID'); ?>
        <?php echo $form->dropDownList($model, 'LID', $model->getLandlordNamesList(),array('style' => 'width:250px;')) ?>
        <?php echo $form->error($model, 'LID'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'Comment'); ?>
        <?php echo $form->textArea($model, 'Comment', array('rows'=>6,'style'=>'width:250px;'));//array('rows' => 6, 'cols' => 40) ?>
        <?php echo $form->error($model, 'Comment'); ?>
    </div>

    <div class="row buttons">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->