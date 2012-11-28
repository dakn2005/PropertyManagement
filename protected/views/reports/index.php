<?php
$this->breadcrumbs = array(
    'Reports',
);
?>
<h1><?php echo $this->id; ?></h1>

<?php
echo CHtml::beginForm('', 'post');
echo CHtml::activeLabel($model, 'select_tbl');
echo "<br />";
echo CHtml::activeDropDownList($model, 'select_tbl', $model->getTables(), array('style' => 'width:120px'));
echo '<br />' . CHtml::submitButton('Load Table');
echo CHtml::endForm();
?>

<?php if ($model->select_tbl != null): ?>
    Table: <?php echo $this->tblname; ?>
    <div>
        <?php
            echo CHtml::link("Export to excel", array('Excel','dbtab'=>$this->tblname),array('target'=>'_blank'));
        ?>
    </div>
<?php endif; ?>


