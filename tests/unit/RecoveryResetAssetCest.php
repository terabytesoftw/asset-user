<?php

namespace terabytesoft\assets\user\tests;

use terabytesoft\assets\user\RecoveryResetAsset;
use terabytesoft\assets\user\tests\UnitTester;
use yii\bootstrap4\BootstrapAsset;
use yii\web\AssetBundle;
use yii\web\JqueryAsset;
use yii\web\View;
use yii\web\YiiAsset;

/**
 * Class RecoveryResetAssetCest
 *
 * Unit tests for codeception for asset user
 */
class RecoveryResetAssetCest
{
    /**
     * @var \yii\web\View;
     */
    private $view;

    /**
     *  _before
     *
     * @param UnitTester $I
     */
    public function _before(UnitTester $I): void
    {
        $this->view = new View();
    }

    /**
     * _after
     *
     * @param UnitTester $I
     */
    public function _after(UnitTester $I): void
    {
        unset($this->view);
    }

    /**
     * testRecoveryResetAssetRegister
     *
     * @param UnitTester $I
     */
    public function testRecoveryResetAssetRegister(UnitTester $I): void
    {
        $I->assertEmpty($this->view->assetBundles);

        RecoveryResetAsset::register($this->view);

        $I->assertCount(4, $this->view->assetBundles);

        $I->assertArrayHasKey(RecoveryResetAsset::class, $this->view->assetBundles);
        $I->assertArrayHasKey(BootstrapAsset::class, $this->view->assetBundles);
        $I->assertArrayHasKey(YiiAsset::class, $this->view->assetBundles);
        $I->assertArrayHasKey(JqueryAsset::class, $this->view->assetBundles);


        $result = $this->view->renderFile(codecept_data_dir() . 'main.php');

        $I->assertRegexp('/bootstrap.css/', $result);
        $I->assertRegexp('/jquery.js/', $result);
        $I->assertRegexp('/reset.css/', $result);
        $I->assertRegexp('/yii.js/', $result);
    }

    /**
     * testRecoveryResetAssetSimpleDependency
     *
     * @param UnitTester $I
     */
    public function testRecoveryResetAssetSimpleDependency(UnitTester $I): void
    {
        $I->assertEmpty($this->view->assetBundles);

        RecoveryResetAsset::register($this->view);

        $I->assertCount(4, $this->view->assetBundles);

        $I->assertArrayHasKey(RecoveryResetAsset::class, $this->view->assetBundles);
        $I->assertArrayHasKey(BootstrapAsset::class, $this->view->assetBundles);
        $I->assertArrayHasKey(YiiAsset::class, $this->view->assetBundles);
        $I->assertArrayHasKey(JqueryAsset::class, $this->view->assetBundles);

        $I->assertInstanceOf(AssetBundle::class, $this->view->assetBundles[RecoveryResetAsset::class]);
        $I->assertInstanceOf(AssetBundle::class, $this->view->assetBundles[BootstrapAsset::class]);
        $I->assertInstanceOf(AssetBundle::class, $this->view->assetBundles[YiiAsset::class]);
        $I->assertInstanceOf(AssetBundle::class, $this->view->assetBundles[JqueryAsset::class]);
    }

    /**
     * testRecoveryResetAssetSourcesPublish
     *
     * @param UnitTester $I
     */
    public function testRecoveryResetAssetSourcesPublish(UnitTester $I): void
    {
        $bundle = RecoveryResetAsset::register($this->view);

        $I->assertTrue(is_dir($bundle->basePath));

        $I->sourcesPublishVerifyFiles('css', $bundle);

        $I->sourcesPublishVerifyFilesOnly($bundle);
    }
}
