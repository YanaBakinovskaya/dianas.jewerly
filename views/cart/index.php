<?php
use yii\widgets\ActiveForm;
use yii\widgets\Pjax;
?>
<?php
$this->title = 'Diana’s jewelry'.' | '.'cart';
?>
<?use yii\helpers\Url;

?>
<?=\app\widgets\MenuWidget::widget()?>

<?// require_once(Yii::app()->basePath . '/views/cart/order.php');?>

<?
if ($session['cart']) {

?>


<div id="breadcrumbs">
  <div class="container">
    <ul>
      <li><a href="/">Home</a></li>
      <li><?='cart'?></li>
    </ul>
  </div>
  <!-- / container -->
</div>
<!-- / body -->


<div id="body">
  <div class="container">
    <div id="content" class="full">
      <div class="cart-table">
        <table>
          <tr>
            <th class="items">Items</th>
            <th class="price">Price</th>
            <th class="qnt">Quantity</th>
            <th class="total">Total</th>
            <th class="delete"></th>
          </tr>
          <?php foreach ($session['cart'] as $id=> $product) { ?>
          <tr>
            <td class="items">
              <div class="image">
                <img src="/images/<?=$product['img']?>" alt="<?=$product['name']?>">
              </div>
              <h3><a href="<?=Url::to(['product/index', 'name'=> $product['link']])?>"><?=$product['name']?></a></h3>
              <p><?=$product['descr']?>.</p>
            </td>
            <td class="price">$<?=$product['price']?></td>
            <td class="qnt"><?=$product['goodQuantity']?></td>
            <td class="total">$<?=$product['price']*$product['goodQuantity']?></td>
            <td class="delete" data-id="<?=$id?>"><a href="#" class="ico-del"></a></td>
          </tr>
          <? } ?>
        </table>
      </div>

      <div class="total-count">

        <h3>Total to pay: <span class="total-quantity"><strong>$<?=$session['cart.totalSum']?></strong></span></h3>
        <!--        <form action="">-->
        <!--          <input type="text" name="name" placeholder="Имя">-->
        <!--        </form>-->
        <a href="#" class="btn-grey">Finalize and pay</a>

        <!--        --><?// $form = ActiveForm::begin() ?>
        <!--        --><?//=$form->field($order, 'name')?>
        <!--        --><?//=$form->field($order, 'email')?>
        <!--        --><?//=$form->field($order, 'phone')?>
        <!--        --><?//=$form->field($order, 'address')?>

                <!--  //<button class="btn btn-success">Оформить заказ</button>-->
        <!--        <a href="#" class="btn-grey">Finalize and pay</a>-->
        <!--        --><?php //ActiveForm::end() ?>

      </div>

    </div>
    <!-- / content -->
  </div>
  <!-- / container -->
</div>
<!-- / body -->

<? } else { ?>
  <div class="container">
    <h3 style="padding: 15px; margin-bottom: 300px;">В Вашей корзине ничего нет</h3>
  </div>
  <!-- / container -->


<? }
