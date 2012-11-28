<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'TenantID'); ?>
		<?php echo $form->textField($model,'TenantID'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ReceiptNumber'); ?>
		<?php echo $form->textField($model,'ReceiptNumber',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'BroughtForward'); ?>
		<?php echo $form->textField($model,'BroughtForward'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'AmountPaid'); ?>
		<?php echo $form->textField($model,'AmountPaid'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'AmountOwed'); ?>
		<?php echo $form->textField($model,'AmountOwed'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'AmountAccrued'); ?>
		<?php echo $form->textField($model,'AmountAccrued'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'DateOfPayment'); ?>
		<?php echo $form->textField($model,'DateOfPayment',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'NetAmount'); ?>
		<?php echo $form->textField($model,'NetAmount'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->