<?php

/**
 * ConnectAsset
 **/

namespace terabytesoft\assets\user;

use yii\web\AssetBundle;

class ConnectAsset extends AssetBundle
{
    /**
     * @var array $css
     */
    public $css = [
        'connect.css',
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
    public $sourcePath = __DIR__ . '/css/connect';

    /**
     * init
     */
    public function init(): void
    {
        parent::init();
    }
}
