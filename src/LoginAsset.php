<?php

/**
 * LoginAsset
 **/

namespace terabytesoft\assets\user;

use yii\web\AssetBundle;

class LoginAsset extends AssetBundle
{
    /**
     * @var array $css
     */
    public $css = [
        'login.css',
    ];

    /**
     * @var array $depends
     */
    public $depends = [
        \yii\web\YiiAsset::class,
        \yii\bootstrap4\BootstrapAsset::class,
    ];

    /**
     * @var string $sourcePath
     */
    public $sourcePath = __DIR__ . '/css/login';

    /**
     * init
     */
    public function init(): void
    {
        parent::init();
    }
}
