<?php

/**
 * RegistrationConnectAsset
 **/

namespace terabytesoft\assets\user;

use yii\web\AssetBundle;

class RegistrationConnectAsset extends AssetBundle
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
     * @var array $publishOptions
     */
    public $publishOptions = [
        'only' => [
            'connect.css',
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
