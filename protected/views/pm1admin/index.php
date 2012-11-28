<?php
$this->breadcrumbs=array(
	'Pm1admins',
);

$this->menu=array(
	array('label'=>'Create Pm1admin', 'url'=>array('create')),
	array('label'=>'Manage Pm1admin', 'url'=>array('admin')),
);
?>

<h1>Pm1admins</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
