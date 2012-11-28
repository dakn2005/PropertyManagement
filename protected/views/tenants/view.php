<?php
$this->breadcrumbs = array(
    'Landlord'=>array('Landlords/view','id'=>$model->LID),
    'Tenants' => array('index'),
    $model->TenantID,
);

$this->menu = array(
    array('label' => 'List Tenants', 'url' => array('index')),
    array('label' => 'Create Tenants', 'url' => array('create')),
    array('label' => 'Update Tenants', 'url' => array('update', 'id' => $model->TenantID)),
    array('label' => 'Delete Tenants', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->TenantID), 'confirm' => 'Are you sure you want to delete this item?')),
    array('label' => 'Manage Tenants', 'url' => array('admin')),
    array('label'=>'  -------------------------------------'),
    array('label'=>'Pay rent','url'=>array('Rentpaid/create','tid'=>$model->TenantID)),
    array('label'=>'Repair notification','url'=>array('Repairs/create','tid'=>$model->TenantID)),
    
);
?>


<h1>View Tenants #<?php echo $model->TenantID; ?></h1>

<?php
$this->widget('zii.widgets.CDetailView', array(
    'data' => $model,
    'attributes' => array(
        'Names',
        'NationalID',
        'TenantID',
        'DateOfOccupation',
        'MaritalStatus',
        'HouseNumber',
        //'LID',
        'Comment',
        //'llname',
    ),
));
?>
<br />

<h2>Repair Tickets</h2>
<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$repairProvider,
	'itemView'=>'/repairs/_view',
)); ?>
<br />
<h2>Rent records</h2>
<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$rentProvider,
	'itemView'=>'/rentpaid/_view',
)); ?>
