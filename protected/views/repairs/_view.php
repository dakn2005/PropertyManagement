<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('rid')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->rid), array('repairs/view', 'id'=>$data->rid)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tenantId')); ?>:</b>
	<?php 
            //echo CHtml::encode($data->tenantId); 
            echo CHtml::encode($data->tenant->Names);
        ?>
	<br />
        <b><?php echo CHtml::encode('Landlord'); ?>:</b>
	<?php 
            //echo CHtml::encode($data->tenantId); 
            echo CHtml::encode($data->tenant->l->Names);
        ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('RepairNote')); ?>:</b>
	<?php echo CHtml::encode($data->RepairNote); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Date')); ?>:</b>
	<?php echo CHtml::encode($data->Date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Status')); ?>:</b>
	<?php 
            if ($data->Status==='unrepaired')
                echo '<font style="color:red; font-weight:bold;">'.$data->Status.'</font>';
            else
                echo '<font style="color:green; font-weight:bold;">'.$data->Status.'</font>';
        ?>
	<br />


</div>