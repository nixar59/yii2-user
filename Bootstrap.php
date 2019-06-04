<?php


namespace nixar59\user;


use nixar59\user\modules\web\Module;
use Yii;
use yii\base\Application;
use yii\base\BootstrapInterface;

class Bootstrap implements BootstrapInterface
{

    /**
     * Bootstrap method to be called during application bootstrap stage.
     * @param Application $app the application currently running
     */
    public function bootstrap($app)
    {
        Yii::$app->setModule('user', new Module('user'));
    }
}