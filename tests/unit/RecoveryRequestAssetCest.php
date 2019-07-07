<?php

namespace terabytesoft\assets\user\tests;

use terabytesoft\assets\user\RecoveryRequestAsset;
use terabytesoft\assets\user\tests\UnitTester;
use yii\bootstrap4\BootstrapAsset;
use yii\web\AssetBundle;
use yii\web\JqueryAsset;
use yii\web\View;
use yii\web\YiiAsset;

/**
 * Class RecoveryRequestAssetCest
 *
 * Unit tests for codeception for asset user
 */
class RecoveryRequestAssetCest
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
     * testRecoveryRequestAssetRegister
     *
     * @param UnitTester $I
     */
    public function testRecoveryRequestAssetRegister(UnitTester $I): void
    {
        $I->assertEmpty($this->view->assetBundles);

        RecoveryRequestAsset::register($this->view);

        $I->assertCount(4, $this->view->assetBundles);

        $I->assertArrayHasKey(RecoveryRequestAsset::class, $this->view->assetBundles);
        $I->assertArrayHasKey(BootstrapAsset::class, $this->view->assetBundles);
        $I->assertArrayHasKey(YiiAsset::class, $this->view->assetBundles);
        $I->assertArrayHasKey(JqueryAsset::class, $this->view->assetBundles);


        $result = $this->view->renderFile(codecept_data_dir() . 'main.php');

        $I->assertRegexp('/bootstrap.css/', $result);
        $I->assertRegexp('/jquery.js/', $result);
        $I->assertRegexp('/request.css/', $result);
        $I->assertRegexp('/yii.js/', $result);
    }

    /**
     * testRecoveryRequestAssetSimpleDependency
     *
     * @param UnitTester $I
     */
    public function testRecoveryRequestAssetSimpleDependency(UnitTester $I): void
    {
        $I->assertEmpty($this->view->assetBundles);

        RecoveryRequestAsset::register($this->view);

        $I->assertCount(4, $this->view->assetBundles);

        $I->assertArrayHasKey(RecoveryRequestAsset::class, $this->view->assetBundles);
        $I->assertArrayHasKey(BootstrapAsset::class, $this->view->assetBundles);
        $I->assertArrayHasKey(YiiAsset::class, $this->view->assetBundles);
        $I->assertArrayHasKey(JqueryAsset::class, $this->view->assetBundles);

        $I->assertInstanceOf(AssetBundle::class, $this->view->assetBundles[RecoveryRequestAsset::class]);
        $I->assertInstanceOf(AssetBundle::class, $this->view->assetBundles[BootstrapAsset::class]);
        $I->assertInstanceOf(AssetBundle::class, $this->view->assetBundles[YiiAsset::class]);
        $I->assertInstanceOf(AssetBundle::class, $this->view->assetBundles[JqueryAsset::class]);
    }

    /**
     * testRecoveryRequestAssetSourcesPublish
     *
     * @param UnitTester $I
     */
    public function testRecoveryRequestAssetSourcesPublish(UnitTester $I): void
    {
        $bundle = RecoveryRequestAsset::register($this->view);

        $I->assertTrue(is_dir($bundle->basePath));

        $I->sourcesPublishVerifyFiles('css', $bundle);

        $I->sourcesPublishVerifyFilesOnly($bundle);
    }
}
