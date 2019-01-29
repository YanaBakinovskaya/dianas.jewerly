<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;
?>

<? $form = ActiveForm::begin() ?>
<?= $form->field($order, 'name') ?>
<?= $form->field($order, 'email') ?>
<?= $form->field($order, 'phone') ?>
<?= $form->field($order, 'address') ?>
<?= Html::submitButton('Finalize and pay', ['class' => 'btn-grey']) ?>
<?php ActiveForm::end() ?>


