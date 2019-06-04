<?php


namespace nixar59\user\modules\web;


use Yii;

class Module extends \yii\base\Module
{
    public function init()
    {
        Yii::setAlias('@userWebModule', '@vendor/nixar59/yii2-user/modules/web');
        parent::init();
    }
}