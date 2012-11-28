<?php
$this->breadcrumbs=array(
	'Rentpaids',
);

$this->menu=array(
	array('label'=>'Create Rentpaid', 'url'=>array('create')),
	array('label'=>'Manage Rentpaid', 'url'=>array('admin')),
);
?>

<h1>Rentpaids</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
