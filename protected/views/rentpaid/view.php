<?php
$this->breadcrumbs=array(
        'Tenant'=>array('/tenants/view','id'=>$model->TenantID),
	//'Rentpaids'=>array('index'),
	$model->ReceiptNumber,
);

$this->menu=array(
	array('label'=>'List Rentpaid', 'url'=>array('index')),
	array('label'=>'Create Rentpaid', 'url'=>array('create')),
	array('label'=>'Update Rentpaid', 'url'=>array('update', 'id'=>$model->ReceiptNumber)),
	array('label'=>'Delete Rentpaid', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->ReceiptNumber),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Rentpaid', 'url'=>array('admin')),
);
?>

<h1>View Rentpaid #<?php echo $model->ReceiptNumber; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		//'TenantID',
                array('label'=>'Names','value'=>$model->tenant->Names,),//'type'=>'raw'
                'tenant.Names',
		'ReceiptNumber:html',
		'BroughtForward',
		'AmountPaid',
		'AmountOwed',
		'AmountAccrued',
		'DateOfPayment',
		'NetAmount',
	),
)); ?>
