<?php

/**
 * AdminAsset
 **/

namespace terabytesoft\assets\user;

use yii\web\AssetBundle;

class AdminAsset extends AssetBundle
{
    /**
     * @var array $css
     */
    public $css = [
        'admin.css',
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
    public $sourcePath = __DIR__ . '/css/admin';

    /**
     * init
     */
    public function init(): void
    {
        parent::init();
    }
}
