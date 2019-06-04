<?php

namespace nixar59\user\actions\web;

use Yii;
use nixar59\user\models\SignupForm;

class SignupAction extends Action
{
    public $modelClass = SignupForm::class;

    public function run()
    {
        $model = Yii::createObject($this->modelClass);

        if ($model->load(Yii::$app->request->post()) && $model->signup()) {
            $this->controller->redirect($this->redirectUrl);
        }

        $this->controller->render($this->view, compact('model'));
    }
}