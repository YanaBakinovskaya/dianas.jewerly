<?php
use yii\widgets\ActiveForm;
?>

<? $form = ActiveForm::begin() ?>
<?= $form->field($order, 'name') ?>
<?= $form->field($order, 'email') ?>
<?= $form->field($order, 'phone') ?>
<?= $form->field($order, 'address') ?>

    <!--  //<button class="btn btn-success">Оформить заказ</button>-->
  <a href="#" class="btn-grey">Finalize and pay</a>
<?php ActiveForm::end() ?>


