<?php

/**
 * RequestAsset
 **/

namespace terabytesoft\assets\user;

use yii\web\AssetBundle;

class RequestAsset extends AssetBundle
{
    /**
     * @var array $css
     */
    public $css = [
        'request.css',
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
    public $sourcePath = __DIR__ . '/css/request';

    /**
     * init
     */
    public function init(): void
    {
        parent::init();
    }
}
