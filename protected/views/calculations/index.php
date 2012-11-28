<?php
$this->breadcrumbs = array(
    'Calculations',
);
?>
<h1><?php echo $this->id; ?></h1>

<?php if (Yii::app()->user->hasFlash('test')): ?>
    <div class="<?php echo $flashclass ?>">
        <?php echo Yii::app()->user->getFlash('test'); ?>
    </div>
<?php endif; ?>



<?php
echo CHtml::beginForm('', 'post');
echo CHtml::activeLabel($model, 'llid');
echo "<br />";
echo CHtml::activeDropDownList($model, 'llid', $model->getLandlordNames(), array('style' => 'width:120px'));

echo '<br />';

echo CHtml::activeLabel($model, 'selectmonth');
echo "<br />";
echo CHtml::activeDropDownList($model, 'selectmonth', $model->getMonths(), array('style' => 'width:120px'));

echo '<br />';
echo CHtml::activeLabel($model, 'selectyear');
echo "<br />";
echo CHtml::activeDropDownList($model, 'selectyear', $model->getYears(), array('style' => 'width:120px'));
echo "<br /><br />";

//echo CHtml::activeLabel($model, '<br/><br />Start Date');
//$this->widget('zii.widgets.jui.CJuiDatePicker', array(
//    //name' => 'startdate',
//    'model' => $model,
//    'attribute'=>'startdate',
//    // additional javascript options for the date picker plugin
//    'options' => array(
//        'showAnim' => 'slideDown',
//        'dateFormat' => 'dd/mm/yy'
//    ),
//    'htmlOptions' => array(
//        'style' => 'height:15px;width:250px;'
//    ),
//));
//
//echo CHtml::activeLabel($model, 'End date');
//$this->widget('zii.widgets.jui.CJuiDatePicker', array(
//    //'name' => 'enddate',
//    'model' => $model,
//    'attribute'=>'enddate',
//    // additional javascript options for the date picker plugin
//    'options' => array(
//        'showAnim' => 'slideDown',
//        'dateFormat' => 'dd/mm/yy'
//    ),
//    'htmlOptions' => array(
//        'style' => 'height:15px;width:250px;'
//    ),
//));

echo '<br />' . CHtml::submitButton('Calculations');

echo CHtml::endForm();
?>
<br />

<?php
//$this->widget('zii.widgets.CListView', array(
//    'dataProvider' => $dataProvider,
//    'itemView' => '/rentpaid/_view',
//));
?>

<?php
if (empty($rentArrays[0]))
    echo '<font style="color:red;font-style:italic;">No Records found</font>';
else {
    //var_dump($rentArrays);
    ?>

    <hr />

    <!-- Perform calculations -->
    <h3>Formulas used:</h3>
    <p>NetAmount = (AmountPaid + BroughtForward) - AmountOwed - AmountAccrued</p>
    <p>Taking Management Commission @ 10%</p>
    <p>VAT @ 16%</p>
    <p>Total Net payable = Total rent - Management Commission – VAT – [other deductions]</p>
    <?php
    //calculate total net payable
    $monthlyNetAmount = 0;
    $managementcomm = 0;
    $totalnetpayable = 0;
    $mvat = 0;

    foreach ($rentArrays as $rentmodel) {
        foreach ($rentmodel as $rent) {
            $monthlyNetAmount+=$rent->NetAmount;
        }
    }
    $managementcomm = 0.1 * $monthlyNetAmount;
    $mvat = 0.16 * $managementcomm;
    $totalnetpayable = $monthlyNetAmount - ($managementcomm + $mvat);
    echo "<b>Net Amount Payable:</b> $monthlyNetAmount <br /> <b>Management Commission:</b> $managementcomm <br /> <b>Management Commission VAT:</b> $mvat 
        <br /><font style='color:green'><b>Total Net Payable:</b> $totalnetpayable</font>  <br />";
    ?>
    <h3>&nbsp;</h3>
    <hr />
    <h2>Rent Records</h2>
    <!-- show records -->
    <?php
    foreach ($rentArrays as $rentmodel):
        foreach ($rentmodel as $rent):
            ?>
            <div class="styro">
                <div>
            <?php echo '<b>Receipt Number: </b>' . CHtml::link($rent->ReceiptNumber, array('/rentpaid/view', 'id' => $rent->ReceiptNumber),array('target'=>'_blank')); ?>
                    
                </div>
                <div>
                    <b>Paid by:</b> <?php echo $rent->tenant->Names;
            //$rent->getTenantNames($rent->TenantID)   ?>
                </div>
                <div>
                    <b>Amount:</b> <?php echo $rent->AmountPaid; ?>
                </div>
                <div>
                    <b>Net Amount:</b><?php echo $rent->NetAmount ?>
                </div>
                <div>
                    <b>Date:</b> <?php echo $rent->DateOfPayment; ?>
                </div>    
            </div>
            <?php
        endforeach;
    endforeach;
}
?>
