<?php

/**
 * RegistrationResendAsset
 **/

namespace terabytesoft\assets\user;

use yii\web\AssetBundle;

class RegistrationResendAsset extends AssetBundle
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
     * @var array $publishOptions
     */
    public $publishOptions = [
        'only' => [
            'resend.css',
        ],
    ];

    /**
     * @var string $sourcePath
     */
    public $sourcePath = __DIR__ . '/css';

    /**
     * init
     */
    public function init(): void
    {
        parent::init();
    }
}
