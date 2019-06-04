<?php


namespace nixar59\user\actions\web;

use Yii;
use nixar59\user\models\LoginForm;

class LoginAction extends Action
{
    public $modelClass = LoginForm::class;

    public function run()
    {
        $model = Yii::createObject($this->modelClass);

        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            $this->controller->goBack();
        }

        $this->controller->render($this->view);
    }
}