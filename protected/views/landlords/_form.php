<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'landlords-form',
	'enableAjaxValidation'=>true,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'Names'); ?>
		<?php echo $form->textField($model,'Names',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'Names'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'NationalID'); ?>
		<?php echo $form->textField($model,'NationalID'); ?>
		<?php echo $form->error($model,'NationalID'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Deed'); ?>
		<?php echo $form->textField($model,'Deed',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'Deed'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Comment'); ?>
		<?php echo $form->textArea($model,'Comment',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'Comment'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->