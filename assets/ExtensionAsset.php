<?php


namespace nixar59\user\assets;


use yii\bootstrap4\BootstrapAsset;
use yii\web\AssetBundle;

class ExtensionAsset extends AssetBundle
{
    public $depends = [BootstrapAsset::class];
}