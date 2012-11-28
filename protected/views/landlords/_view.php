<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('LID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->LID), array('view', 'id'=>$data->LID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Names')); ?>:</b>
	<?php echo CHtml::encode($data->Names); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('NationalID')); ?>:</b>
	<?php echo CHtml::encode($data->NationalID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Deed')); ?>:</b>
	<?php echo CHtml::encode($data->Deed); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Comment')); ?>:</b>
	<?php echo CHtml::encode($data->Comment); ?>
	<br />


</div>