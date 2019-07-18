<?php

/**
 * RegisterAsset
 **/

namespace terabytesoft\assets\user;

use yii\web\AssetBundle;

class RegisterAsset extends AssetBundle
{
    /**
     * @var array $css
     */
    public $css = [
        'register.css',
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
    public $sourcePath = __DIR__ . '/css/register';

    /**
     * init
     */
    public function init(): void
    {
        parent::init();
    }
}
