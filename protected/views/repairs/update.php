<?php
$this->breadcrumbs=array(
	'Repairs'=>array('index'),
	$model->rid=>array('view','id'=>$model->rid),
	'Update',
);

$this->menu=array(
	array('label'=>'List Repairs', 'url'=>array('index')),
	array('label'=>'Create Repairs', 'url'=>array('create')),
	array('label'=>'View Repairs', 'url'=>array('view', 'id'=>$model->rid)),
	array('label'=>'Manage Repairs', 'url'=>array('admin')),
);
?>

<h1>Update Repairs <?php echo $model->rid; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model,'tmodel'=>$tmodel)); ?>
