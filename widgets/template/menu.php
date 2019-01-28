<?php
use yii\helpers\Url;
?>

<nav id="menu">
  <div class="container">
    <div class="trigger"></div>
    <ul>
      <?php foreach ($data as $id) { ?>
      <li><a href="<?=Url::to(['category/view', 'id'=>$id['cat_name']])?>"><?=$id['browser_name']?></a></li>
      <? } ?>
    </ul>
  </div>
  <!-- / container -->
</nav>
<!-- / navigation -->

