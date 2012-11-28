<?php

$this->breadcrumbs=array(
	'Repairs'=>array('index'),
	$model->rid,
);

$this->menu=array(
	array('label'=>'List Repairs', 'url'=>array('index')),
	array('label'=>'Create Repairs', 'url'=>array('create')),
	array('label'=>'Update Repairs', 'url'=>array('update', 'id'=>$model->rid)),
	array('label'=>'Delete Repairs', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->rid),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Repairs', 'url'=>array('admin')),
);
?>

<h1>View Repairs #<?php echo $model->rid; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'rid',
		'tenantId',
		'RepairNote',
		'Date',
		'Status',
	),
)); ?>
