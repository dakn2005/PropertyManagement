<?php
$this->breadcrumbs=array(
	'Tenants'=>array('index'),
	$model->TenantID=>array('view','id'=>$model->TenantID),
	'Update',
);

$this->menu=array(
	array('label'=>'List Tenants', 'url'=>array('index')),
	array('label'=>'Create Tenants', 'url'=>array('create')),
	array('label'=>'View Tenants', 'url'=>array('view', 'id'=>$model->TenantID)),
	array('label'=>'Manage Tenants', 'url'=>array('admin')),
);
?>

<h1>Update Tenants <?php echo $model->TenantID; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>