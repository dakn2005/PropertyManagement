<div class="form">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'rentpaid-form',
        'enableAjaxValidation' => false,
            ));
    ?>

    <p class="note">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary($model); ?>

    <!--	
    <div class="row">
    <?php //echo $form->labelEx($model,'TenantID'); ?>
    <?php //echo $form->textField($model,'TenantID');  ?>
    <?php //echo $form->error($model,'TenantID');  ?>
    </div>
    -->

    <div class="row">
        <?php echo $form->labelEx($model, 'ReceiptNumber'); ?>
        <?php echo $form->textField($model, 'ReceiptNumber', array('size' => 20, 'maxlength' => 20)); ?>
        <?php echo $form->error($model, 'ReceiptNumber'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'BroughtForward'); ?>
        <?php echo $form->textField($model, 'BroughtForward'); ?>
        <?php echo $form->error($model, 'BroughtForward'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'AmountPaid'); ?>
        <?php echo $form->textField($model, 'AmountPaid'); ?>
        <?php echo $form->error($model, 'AmountPaid'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'AmountOwed'); ?>
        <?php echo $form->textField($model, 'AmountOwed'); ?>
        <?php echo $form->error($model, 'AmountOwed'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'AmountAccrued'); ?>
        <?php echo $form->textField($model, 'AmountAccrued'); ?>
        <?php echo $form->error($model, 'AmountAccrued'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'DateOfPayment'); ?>
        <?php //echo $form->textField($model,'DateOfPayment',array('size'=>20,'maxlength'=>20)); ?>
        <?php
            
            $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                //'name' => 'DateOfPayment',
                'model' => $model,
                'attribute' => 'DateOfPayment',
                // additional javascript options for the date picker plugin
                'options' => array(
                    'showAnim' => 'slideDown',
                    'dateFormat' => 'yy-mm-dd'
                ),
                'htmlOptions' => array(
                    'style' => 'height:15px;width:163px;'
                ),
            ));
            
        ?>
        <?php echo $form->error($model, 'DateOfPayment'); ?>
    </div>

    <!--<div class="row">
        <?php //echo $form->labelEx($model, 'NetAmount'); ?>
        <?php //echo $form->textField($model, 'NetAmount'); ?>
        <?php //echo $form->error($model, 'NetAmount'); ?>
    </div>-->

    <div class="row buttons">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
    </div>

    <?php $this->endWidget(); ?>

</div>

<!-- form -->