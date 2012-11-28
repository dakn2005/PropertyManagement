<?php
$this->breadcrumbs=array(
	'Landlords'=>array('index'),
	$model->LID=>array('view','id'=>$model->LID),
	'Update',
);

$this->menu=array(
	array('label'=>'List Landlords', 'url'=>array('index')),
	array('label'=>'Create Landlords', 'url'=>array('create')),
	array('label'=>'View Landlords', 'url'=>array('view', 'id'=>$model->LID)),
	array('label'=>'Manage Landlords', 'url'=>array('admin')),
);
?>

<h1>Update Landlords <?php echo $model->LID; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>