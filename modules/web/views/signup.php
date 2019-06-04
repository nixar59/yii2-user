<?php

/* @var $this \yii\web\View*/
/* @var $model \yii\base\Model */

use nixar59\user\assets\ExtensionAsset;
use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Html;

ExtensionAsset::register($this);
?>

<div class="card">
    <div class="card-header">
        <div class="card-title">Signup</div>
    </div>
    <div class="card-body">
        <?php $form = ActiveForm::begin() ?>
            <?= $form->field($model, 'email')->textInput() ?>
            <?= $form->field($model, 'password')->passwordInput() ?>
            <?= $form->field($model, 'passwordConfirm')->passwordInput() ?>
            <?= Html::submitButton('Submit', ['class' => 'btn btn-success']) ?>
        <?php ActiveForm::end() ?>
    </div>
</div>
