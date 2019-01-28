<?php
/**
 * Created by PhpStorm.
 * User: Yana_nout
 * Date: 26.01.2019
 * Time: 23:05
 */

namespace app\controllers;
use app\models\Cart;
use app\models\Product;
use app\models\Order;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\helpers\Html;
use Yii;
use yii\web\Controller;

class CartController extends Controller
{

  public function actionIndex()
  {
    $session = Yii::$app->session;
    $session->open();
    //$session->remove('cart');
    //$session->remove('cart.totalQuantity');
    //$session->remove('cart.totalSum');
    return $this->render('index', compact('session'));
  }

  public function actionDelete($id ) {
    $session = Yii::$app->session;
    $session->open();
    $cart = new Cart();
    $cart->recalcCart($id);
    return $this->renderPartial('index', compact('session'));
  }
  public function actionAdd($name) {
    $product = new Product();
    $product = $product->getOneProduct($name);
    $session = Yii::$app->session;
    $session->open();
    //$session->remove('cart');
    $cart = new Cart();
    $cart->addToCart($product);
    return $this->render('index', compact('product', 'session'));
  }
  public function actionOrder() {
    $session = Yii::$app->session;
    $session->open();
    if (!$session['cart.totalSum']) {
      //return Yii::$app->response->redirect(Url::to('/'));
      header("Location: Url::to('/cart')");
     // header('Location: '.$_SERVER['REQUEST_URI']);
      die();
    }
    $order = new Order();
    if ($order->load(Yii::$app->request->post())) {
      $order->date = date('Y-m-d H:i:s');
      $order->sum = $session['cart.totalSum'];
      if ($order->save()) {
        $currentID = $order->id;
        Yii::$app->mailer->compose('order-mail', ['session'=>$session, 'order'=>$order])
          ->setFrom(['aaa@aaaa.ru'=> 'test test'])
          ->setTo('assaas@asdsadsa.ru')
          ->setSubject('Ваш заказ принят')
          ->send();
        $session->remove('cart');
        $session->remove('cart.totalQuantity');
        $session->remove('cart.totalSum');
        return $this->render('success', compact('session', 'currentID'));
      }
    }
    //$orderGood = new OrderGood();
    //$this->layout = 'empty-layout';
    return $this->render('order', compact('session', 'order'));
  }



  //public function actionOrder(){
   // $session = Yii::$app->session;
   // $session->open();
   // $order = new Order();
    //    if(Yii::$app->request->isPjax){
    //      $answer = true;
    //      return $this->renderPartial('index', compact('session', 'answer'));
    //    }
    //return $this->renderPartial('index', compact('session', 'order'));
  //}

}