<?php
$this->breadcrumbs=array(
	'Repairs'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Repairs', 'url'=>array('index')),
	array('label'=>'Manage Repairs', 'url'=>array('admin')),
);
?>

<h1>Create Repairs</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model,'tmodel'=>$tmodel)); ?>