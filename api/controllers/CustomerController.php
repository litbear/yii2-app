<?php
namespace api\controllers;

use yii\rest\ActiveController;
use yii\filters\Cors;
use yii\helpers\ArrayHelper;

/**
 * Site controller
 */
class CustomerController extends ActiveController
{
    public $modelClass = 'api\models\Customer';
    
    public function behaviors()
    {
        return ArrayHelper::merge([
            [
                'class' => Cors::className(),
            ],
        ], parent::behaviors());
    }
}
