<?php

/**
 * ProfileAsset
 **/

namespace terabytesoft\assets\user;

use yii\web\AssetBundle;

class ProfileAsset extends AssetBundle
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
     * @var string $sourcePath
     */
    public $sourcePath = __DIR__ . '/css/profile';

    /**
     * init
     */
    public function init(): void
    {
        parent::init();
    }
}
