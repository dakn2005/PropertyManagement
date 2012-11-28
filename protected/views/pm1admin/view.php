<?php
$this->breadcrumbs=array(
	'Pm1admins'=>array('index'),
	$model->username,
);

$this->menu=array(
	array('label'=>'List Pm1admin', 'url'=>array('index')),
	array('label'=>'Create Pm1admin', 'url'=>array('create')),
	array('label'=>'Update Pm1admin', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Pm1admin', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Pm1admin', 'url'=>array('admin')),
);
?>

<h1>View Pm1admin #<?php echo $model->id ?><b><?php echo $model->username; ?></b></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'username',
		'password',
	),
)); ?>
