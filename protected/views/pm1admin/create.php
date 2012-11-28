<?php
$this->breadcrumbs=array(
	'Pm1admins'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Pm1admin', 'url'=>array('index')),
	array('label'=>'Manage Pm1admin', 'url'=>array('admin')),
);
?>

<h1>Create Pm1admin</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>