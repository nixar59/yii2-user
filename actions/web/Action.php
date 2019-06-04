<?php


namespace nixar59\user\actions\web;


use Yii;
use yii\base\Exception;
use yii\web\Application;

abstract class Action extends \yii\base\Action
{
    public $view;
    public $modelClass;
    public $layout;
    public $redirectUrl;

    public function init()
    {
        if (!Yii::$app instanceof Application) {
            throw new Exception(static::class . ' can be used only in ' . Application::class);
        }

        if (!isset($this->view)) {
            $this->view = '@vendor/nixar59/user/views/' . $this->id . '.php';
        }

        if (!isset($this->redirectUrl)) {
            $this->redirectUrl = Yii::$app->homeUrl;
        }

        if ($this->layout !== null) {
            $this->controller->layout = $this->layout;
        }

        parent::init();
    }

    abstract public function run();
}