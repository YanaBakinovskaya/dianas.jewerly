
<?php
$this->title = 'Diana’s jewelry'.' | '.'cart';
?>
<?use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\helpers\Html;

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

<? if ($session['cart']) { ?>

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
            <td class="price">$<?=number_format($product['price'], 0, '.', ' ')?></td>
            <td class="qnt"><?=$product['goodQuantity']?></td>
            <td class="total">$<?=number_format($product['price']*$product['goodQuantity'], 0, '.', ' ')?></td>
            <td class="delete" data-id="<?=$id?>"><a href="#" class="ico-del"></a></td>
          </tr>
          <? } ?>
        </table>
      </div>

      <div class="total-count">

        <h3>Total to pay: $<span class="total-quantity"><strong><?=number_format($session['cart.totalSum'], 0, '.', ' ')?></strong></span></h3>

        <span style="display: none" class="total-Q"><?=isset($_SESSION['cart.totalQuantity']) ? $_SESSION['cart.totalQuantity'] : 0?></span>
        <span style="display: none" class="total-S"><?=isset($_SESSION['cart.totalSum']) ? number_format($_SESSION['cart.totalSum'], 0, '.', ' ') : 0?></span>

        <? $form = ActiveForm::begin() ?>
        <?= $form->field($order, 'name') ?>
        <?= $form->field($order, 'email') ?>
        <?= $form->field($order, 'phone') ?>
        <?= $form->field($order, 'address') ?>
        <?= Html::submitButton('Finalize and pay', ['class' => 'btn-grey']) ?>
        <?php ActiveForm::end() ?>
      </div>
    </div>
    <!-- / content -->
  </div>
  <!-- / container -->
</div>
<!-- / body -->

<? } else { ?>
  <div class="container">
    <h3 style="padding: 15px; margin-bottom: 300px;">Your cart is empty</h3>
  </div>
  <!-- / container -->


<? }
