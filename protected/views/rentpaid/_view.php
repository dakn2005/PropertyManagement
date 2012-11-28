<div class="view">

    <b><?php echo CHtml::encode($data->getAttributeLabel('ReceiptNumber')); ?>:</b>
    <?php echo CHtml::link(CHtml::encode($data->ReceiptNumber), array('/rentpaid/view', 'id' => $data->ReceiptNumber)); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('Tenant #')); ?>:</b>
    <?php echo CHtml::encode($data->TenantID); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('Tenant Name')); ?>:</b>
    <?php echo CHtml::encode($data->tenant->Names); 
        //CHtml::encode($data->tenant->Names);
    ?>
    <br />
    
    <b><?php echo CHtml::encode($data->getAttributeLabel('Landlord Name')); ?>:</b>
    <?php echo CHtml::encode($data->tenant->l->Names); 
        //CHtml::encode($data->tenant->Names);
    ?>
    <br />
    
    <div style="border-top: 1px solid gray; border-bottom: 1px solid gray">
        Payment Details
    </div>

    <b><?php echo CHtml::encode($data->getAttributeLabel('BroughtForward')); ?>:</b>
    <?php echo CHtml::encode($data->BroughtForward); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('AmountPaid')); ?>:</b>
    <?php echo CHtml::encode($data->AmountPaid); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('AmountOwed')); ?>:</b>
    <?php echo CHtml::encode($data->AmountOwed); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('AmountAccrued')); ?>:</b>
    <?php echo CHtml::encode($data->AmountAccrued); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('DateOfPayment')); ?>:</b>
    <?php echo CHtml::encode($data->DateOfPayment); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('NetAmount')); ?>:</b>
    <?php echo CHtml::encode($data->NetAmount); ?>




</div>