<? if ($session['cart']) { ?>

  <div class="container">
  <hr>
  <div style="display: flex; padding: 40px; flex-direction: column; align-items: center;">
    <h2>Hello, dear <?=$name?>!</h2>
    <h3 style="margin-bottom: 30px ">Thanks for order! <br> Your order a number <strong><?=$currentID?></strong> for the amount of <strong><?=$sum?> $</strong>, was accepted!</h3>
    <h3 style="margin-bottom: 30px "> Address: <strong><?=$address?></strong>, <br>Phone: <strong><?=$phone?></strong>, <br>Email: <strong><?=$email?></strong></h3>


      <div id="content" class="full">
        <div class="cart-table">
          <table>
            <tr>
              <th class="items">Items</th>
              <th class="price">Price</th>
              <th class="qnt">Quantity</th>
              <th class="total">Total</th>
            </tr>
            <?php foreach ($session['cart'] as $product) { ?>
              <tr>
                <td class="items">
                  <div class="image">
                    <img src="/images/<?=$product['img']?>" alt="<?=$product['name']?>">
                  </div>
                  <h3><?=$product['name']?></a></h3>
                  <p><?=$product['descr']?>.</p>
                </td>
                <td class="price">$<?=$product['price']?></td>
                <td class="qnt"><?=$product['goodQuantity']?></td>
                <td class="total">$<?=$product['price']*$product['goodQuantity']?></td>
              </tr>
            <? } ?>
          </table>
        </div>
      </div>
    <a href="/" class="btn-grey">back to the main page</a>
  </div>
</div>

<?php
  $session->remove('cart');
  $session->remove('cart.totalQuantity');
  $session->remove('cart.totalSum');
  } ?>