<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'repairs-form',
        'enableAjaxValidation' => false,
            ));
    ?>

    <p class="note">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary($model); ?>
    
    <div class="row">
        Tenant number: <?php echo $tmodel->TenantID ?>
        <br />
        Tenant Name: <?php echo $tmodel->Names; ?>
    </div>

    <div class="row">
        <?php
//                    echo $form->labelEx($model,'tenantId'); 
//                    echo $form->textField($model,'tenantId'); 
//                    echo $form->error($model,'tenantId'); 
        ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'Date'); ?>
        <?php //echo $form->textField($model,'Date'); ?>
        <?php
        $this->widget('zii.widgets.jui.CJuiDatePicker', array(
            //'name' => 'DateOfOccupation',
            'model' => $model,
            'attribute' => 'Date',
            // additional javascript options for the date picker plugin
            'options' => array(
                'showAnim' => 'fold',
                'dateFormat' => 'yy-mm-dd'
            ),
            'htmlOptions' => array(
                'style' => 'height:20px;width:250px;'
            ),
        ));
        ?>
        <?php echo $form->error($model, 'Date'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'Status'); ?>
        <?php //echo $form->textField($model, 'Status', array('size' => 20, 'maxlength' => 20)); 
            echo $form->dropDownList($model,'Status',$model->getStatus(),array('style'=>'width:250px;'));
        ?>
        
        <?php echo $form->error($model, 'Status'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'RepairNote'); ?>
        <?php echo $form->textArea($model, 'RepairNote', array('style'=>'width:250px;height:50px;')); ?>
        <?php echo $form->error($model, 'RepairNote'); ?>
    </div>

    <div class="row buttons">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->