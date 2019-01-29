
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
            <td class="price">$<?=$product['price']?></td>
            <td class="qnt"><?=$product['goodQuantity']?></td>
            <td class="total">$<?=$product['price']*$product['goodQuantity']?></td>
            <td class="delete" data-id="<?=$id?>"><a href="#" class="ico-del"></a></td>
          </tr>
          <? } ?>
        </table>
      </div>

      <div class="total-count">

        <h3>Total to pay: $<span class="total-quantity"><strong><?=$session['cart.totalSum']?></strong></span></h3>

        <span style="display: none" class="total-Q"><?=isset($_SESSION['cart.totalQuantity']) ? $_SESSION['cart.totalQuantity'] : 0?></span>
        <span style="display: none" class="total-S"><?=isset($_SESSION['cart.totalSum']) ? $_SESSION['cart.totalSum'] : 0?></span>

        <? $form = ActiveForm::begin() ?>
        <?= $form->field($order, 'name') ?>
        <?= $form->field($order, 'email') ?>
        <?= $form->field($order, 'phone') ?>
        <?= $form->field($order, 'address') ?>
        <?= Html::submitButton('Finalize and pay', ['class' => 'btn-grey']) ?>
        <?php ActiveForm::end() ?>
<!--        --><?//= Html::beginForm(['default/test'], 'post', ['data-pjax' => '', 'class' => 'form-inline']); ?>
<!--        --><?//= Html::input('text', 'string', Yii::$app->request->post('string'), ['class' => 'form-control']) ?>
<!--        --><?//= Html::input('text', 'string', Yii::$app->request->post('string'), ['class' => 'form-control']) ?>
<!--        --><?//= Html::input('text', 'string', Yii::$app->request->post('string'), ['class' => 'form-control']) ?>
<!--        --><?//= Html::input('text', 'string', Yii::$app->request->post('string'), ['class' => 'form-control']) ?>
<!---->
<!--        --><?//= Html::submitButton('Hash String', ['class' => 'btn btn-lg btn-primary', 'name' => 'hash-button']) ?>
<!--        --><?//= Html::endForm() ?>
<!--        <form action="" method="POST">-->
<!--          <input type="text" name="--><?//=$order['name']?><!--" placeholder="name">-->
<!--          <input type="text" name="--><?//=$order['phone']?><!--" placeholder="phone">-->
<!--          <input type="text" name="--><?//=$order['address']?><!--" placeholder="address">-->
<!--          <input type="text" name="--><?//=$order['email']?><!--" placeholder="email">-->
<!---->
<!--          <button class="btn-grey">Finalize and pay</button>-->
<!--        </form>-->


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
