<?php
$this->breadcrumbs=array(
	'Rentpaids'=>array('index'),
	$model->ReceiptNumber=>array('view','id'=>$model->ReceiptNumber),
	'Update',
);

$this->menu=array(
	array('label'=>'List Rentpaid', 'url'=>array('index')),
	array('label'=>'Create Rentpaid', 'url'=>array('create')),
	array('label'=>'View Rentpaid', 'url'=>array('view', 'id'=>$model->ReceiptNumber)),
	array('label'=>'Manage Rentpaid', 'url'=>array('admin')),
);
?>

<h1>Update Rentpaid <?php echo $model->ReceiptNumber; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>