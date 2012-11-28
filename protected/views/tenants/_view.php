<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('TenantID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->TenantID), array('Tenants/view', 'id'=>$data->TenantID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Names')); ?>:</b>
	<?php echo CHtml::encode($data->Names); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('NationalID')); ?>:</b>
	<?php echo CHtml::encode($data->NationalID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('DateOfOccupation')); ?>:</b>
	<?php echo CHtml::encode($data->DateOfOccupation); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('MaritalStatus')); ?>:</b>
	<?php echo CHtml::encode($data->MaritalStatus); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('HouseNumber')); ?>:</b>
	<?php echo CHtml::encode($data->HouseNumber); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Landlord id')); ?>:</b>
	<?php echo CHtml::encode($data->LID); ?>
	<br />
        <b><?php echo CHtml::encode("LandLord Name:") ?></b>
        <?php echo CHtml::encode($data->getLandlordName($data->LID)); ?>
        <br />
	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('Comment')); ?>:</b>
	<?php echo CHtml::encode($data->Comment); ?>
	<br />

	*/ ?>

</div>