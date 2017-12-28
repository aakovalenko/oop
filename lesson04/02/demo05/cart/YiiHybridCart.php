<?php

namespace lesson04\example02\demo05\cart;

use Yii;
use yii\db\Query;

class YiiHybridCart extends Cart
{
    public $sessionKey = 'cart';
    public $tableName = '{{%cart}}';

    protected function loadItems()
    {
        if ($user = Yii::$app->user->identity) {
            return (new Query())
                ->select('count', 'product_id')
                ->from($this->tableName)
                ->indexBy('product_id')
                ->where(['user_id' => $user->id])
                ->column();
        } else {
            return Yii::$app->session->get($this->sessionKey, []);
        }
    }

    protected function saveItems($items)
    {
        if ($user = Yii::$app->user->identity) {
            Yii::$app->db->createCommand()->delete($this->tableName, ['user_id' => $user->id])->execute();
            foreach ($items as $productId => $count) {
                Yii::$app->db->createCommand()->insert($this->tableName, [
                    'user_id' => Yii::$app->user->id,
                    'product_id' => $productId,
                    'count' => $count,
                ])->execute();
            }
        } else {
            Yii::$app->session->set($this->sessionKey, $items);
        }
    }
} 