<?php
$this->breadcrumbs=array(
        'Tenant'=>array('Tenants/view','id'=>$this->TenantM->TenantID),
	'Rentpaids'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Rentpaid', 'url'=>array('index')),
	array('label'=>'Manage Rentpaid', 'url'=>array('admin')),
);
?>

<h2>
    Pay Rent for: <br />
    <b><?php echo $this->TenantM->Names."<br />Tenant #: ".$this->TenantM->TenantID; ?></b>

</h2>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>