<?php
$this->breadcrumbs=array(
	'Landlords',
);

$this->menu=array(
	array('label'=>'Create Landlords', 'url'=>array('create')),
	array('label'=>'Manage Landlords', 'url'=>array('admin')),
);
?>

<h1>Landlords</h1>
 <?php
    //print_r($_GET); // Printing contents of GET array while trying to figure out this problem
        echo CHtml::beginForm('', 'post');
        // name
        $field = 'Names';
        echo CHtml::activeLabel($model, 'search by names:');
        echo CHtml::activeTextField($model, $field, array('class' => 'form_input', 'maxlength' => '80'));
        echo CHtml::error($model, $field);
        echo CHtml::submitButton('search');

        echo CHtml::endForm();
?>
<?php if (Yii::app()->user->hasFlash('test')): ?>
        <div class="<?php echo $flashclass ?>">
            <?php echo Yii::app()->user->getFlash('test'); ?>
        </div>
    <?php endif; ?>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
<br />
<h2><b>Repair Tickets:</b></h2>
<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$repairProvider,
	'itemView'=>'/repairs/_view',
)); ?>
