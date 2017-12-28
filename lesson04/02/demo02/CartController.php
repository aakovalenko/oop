<?php

namespace lesson04\example02\demo02;

use yii\db\ActiveRecord;
use yii\web\Controller;
use Yii;
use yii\web\NotFoundHttpException;

class CartController extends Controller
{
    public function actionIndex()
    {
        $items = Yii::$app->cart->getItems();

        return $this->render('index', ['items' => $items]);
    }

    public function actionAdd($id, $count = 1)
    {
        if (!$product = Product::findOne($id)) {
            throw new NotFoundHttpException('Товар не найден.');
        }

        Yii::$app->cart->add($product->id, $count);

        return $this->redirect(['index']);
    }

    public function actionRemove($id)
    {
        Yii::$app->cart->remove($id);

        return $this->redirect(['index']);
    }
}

class Product extends ActiveRecord
{

}