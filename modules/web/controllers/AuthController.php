<?php


namespace nixar59\user\modules\web\controllers;


use nixar59\user\actions\web\LoginAction;
use nixar59\user\actions\web\LogoutAction;
use nixar59\user\actions\web\SignupAction;
use nixar59\user\models\LoginForm;
use nixar59\user\models\SignupForm;
use yii\filters\AccessControl;
use yii\filters\AccessRule;
use yii\web\Controller;

class AuthController extends Controller
{
    public $viewPath = '@userWebModule/views/';

    public function actions()
    {
        return [
            'signup' => [
                'class' => SignupAction::class,
                'modelClass' => SignupForm::class,
            ],
            'login' => [
                'class' => LoginAction::class,
                'modelClass' => LoginForm::class,
            ],
            'logout' => [
                'class' => LogoutAction::class,
            ],
        ];
    }
}