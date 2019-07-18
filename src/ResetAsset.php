<?php

/**
 * ResetAsset
 **/

namespace terabytesoft\assets\user;

use yii\web\AssetBundle;

class ResetAsset extends AssetBundle
{
    /**
     * @var array $css
     */
    public $css = [
        'reset.css',
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
    public $sourcePath = __DIR__ . '/css/reset';

    /**
     * init
     */
    public function init(): void
    {
        parent::init();
    }
}
