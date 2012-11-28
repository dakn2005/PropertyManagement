<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'Names'); ?>
		<?php echo $form->textField($model,'Names',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'NationalID'); ?>
		<?php echo $form->textField($model,'NationalID'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'TenantID'); ?>
		<?php echo $form->textField($model,'TenantID'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'DateOfOccupation'); ?>
		<?php echo $form->textArea($model,'DateOfOccupation',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'MaritalStatus'); ?>
		<?php echo $form->textArea($model,'MaritalStatus',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'HouseNumber'); ?>
		<?php echo $form->textField($model,'HouseNumber',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'LID'); ?>
		<?php echo $form->textField($model,'LID'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Comment'); ?>
		<?php echo $form->textArea($model,'Comment',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->