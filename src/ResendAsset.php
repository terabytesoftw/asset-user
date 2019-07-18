<?php

/**
 * ResendAsset
 **/

namespace terabytesoft\assets\user;

use yii\web\AssetBundle;

class ResendAsset extends AssetBundle
{
    /**
     * @var array $css
     */
    public $css = [
        'resend.css',
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
    public $sourcePath = __DIR__ . '/css/resend';

    /**
     * init
     */
    public function init(): void
    {
        parent::init();
    }
}
