<?php
$this->breadcrumbs=array(
	'Landlords'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Landlords', 'url'=>array('index')),
	array('label'=>'Manage Landlords', 'url'=>array('admin')),
);
?>

<h1>Create Landlords</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>