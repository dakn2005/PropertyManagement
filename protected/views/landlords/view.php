<?php
$this->breadcrumbs = array(
    'Landlords' => array('index'),
    $model->LID,
);

$this->menu = array(
    array('label' => 'List Landlords', 'url' => array('index')),
    array('label' => 'Create Landlords', 'url' => array('create')),
    array('label' => 'Update Landlords', 'url' => array('update', 'id' => $model->LID)),
    array('label' => 'Delete Landlords', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->LID), 'confirm' => 'Are you sure you want to delete this item?')),
    array('label' => 'Manage Landlords', 'url' => array('admin')),
//    array('label' => '-----------------------------------'),
//    ARRAY('label' => 'Rent Records', 'url' => array('rentview', 'id' => $model->LID)),
);
?>

<h1>View Landlord #<?php echo $model->LID; ?></h1>

<?php
$this->widget('zii.widgets.CDetailView', array(
    'data' => $model,
    'attributes' => array(
        'Names',
        'NationalID',
        'Deed',
        'LID',
        'Comment',
    ),
));
?>
<br />

<h1>Repair Tickets</h1>

<?php $recount=0; ?>
<?php foreach ($tmodel as $tenant): ?>
    <?php foreach ($tenant->repairs as $reps): ?>
        <?php if ((bool) ($reps->Status === 'unrepaired')) { ?>
            <div class="styro">
                <b>Repair id:</b><?php echo CHtml::link($reps->rid,array('repairs/view','id'=>$reps->rid)); ?><br />
                <b>Tenant Name:</b> <?php echo $tenant->Names; ?><br />
                <b>Repair Announcement:</b> <?php echo $reps->RepairNote; ?><br />
                <b>Date:</b><?php echo $reps->Date; ?><br />
                <b>Status:</b><?php echo '<font style="color:red">' . $reps->Status . '</font>'; ?>
            </div>
        <?php $recount++; } ?>
    <?php endforeach; ?>
<?php endforeach; ?>

<?php if ($recount===0) echo "No records found"; ?>

<br />
<h1> Tenants (count: <?php echo $model->tenantCount; ?>)</h1>

<?php
$this->widget('zii.widgets.CListView', array(
    'dataProvider' => $tenantProvider,
    'itemView' => '/tenants/_view',
));
?>


<h1>Rent Records 
    <?php
    $recnum = 0;
    ?>
</h1>
<?php //var_dump($rmodel);  ?>

<?php foreach ($tmodel as $tenant): ?>
    <?php
    foreach ($tenant->rentpas as $rent) {
        $recnum++;
        ?>
        <div class="styro">
            <div>
                <?php echo '<b>Receipt Number: </b>' . CHtml::link($rent->ReceiptNumber, array('/rentpaid/view', 'id' => $rent->ReceiptNumber)); ?>
            </div>
            <div>
                <b>Paid by:</b> <?php echo $rent->tenant->Names;
                //$rent->getTenantNames($rent->TenantID)  ?>
            </div>
            <div>
                <b>Amount:</b> <?php echo $rent->AmountPaid; ?>
            </div>
            <div>
                <b>Date:</b> <?php echo $rent->DateOfPayment; ?>
            </div>    
        </div>
    <?php }
    ?>
<?php endforeach; ?>
