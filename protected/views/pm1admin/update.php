<?php
$this->breadcrumbs=array(
	'Pm1admins'=>array('index'),
	$model->username=>array('view','id'=>$model->username),
	'Update',
);

$this->menu=array(
	array('label'=>'List Pm1admin', 'url'=>array('index')),
	array('label'=>'Create Pm1admin', 'url'=>array('create')),
	array('label'=>'View Pm1admin', 'url'=>array('view', 'id'=>$model->username)),
	array('label'=>'Manage Pm1admin', 'url'=>array('admin')),
);
?>

<h1>Update Pm1admin <?php echo $model->username; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>