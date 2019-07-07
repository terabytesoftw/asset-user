<?php

/**
 * ProfileShowAsset
 **/

namespace terabytesoft\assets\user;

use yii\web\AssetBundle;

class ProfileShowAsset extends AssetBundle
{
    /**
     * @var array $css
     */
    public $css = [
        'profile.css',
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
            'profile.css',
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
