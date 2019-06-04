<?php


namespace nixar59\user\actions\web;


use Yii;
use yii\filters\AccessControl;
use yii\filters\AccessRule;

class LogoutAction extends Action
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'rules' => [
                    [
                        'class' => AccessRule::class,
                        'allow' => true,
                        'actions' => [$this->id],
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

    public function run()
    {
        Yii::$app->user->logout();
        $this->controller->redirect($this->redirectUrl);
    }
}