<?php

namespace terabytesoft\assets\user\tests;

use terabytesoft\assets\user\RegistrationConnectAsset;
use terabytesoft\assets\user\tests\UnitTester;
use yii\bootstrap4\BootstrapAsset;
use yii\web\AssetBundle;
use yii\web\JqueryAsset;
use yii\web\View;
use yii\web\YiiAsset;

/**
 * Class RegistrationConnectAssetCest
 *
 * Unit tests for codeception for asset user
 */
class RegistrationConnectAssetCest
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
     * testRegistrationConnectAssetRegister
     *
     * @param UnitTester $I
     */
    public function testRegistrationConnectAssetRegister(UnitTester $I): void
    {
        $I->assertEmpty($this->view->assetBundles);

        RegistrationConnectAsset::register($this->view);

        $I->assertCount(4, $this->view->assetBundles);

        $I->assertArrayHasKey(RegistrationConnectAsset::class, $this->view->assetBundles);
        $I->assertArrayHasKey(BootstrapAsset::class, $this->view->assetBundles);
        $I->assertArrayHasKey(YiiAsset::class, $this->view->assetBundles);
        $I->assertArrayHasKey(JqueryAsset::class, $this->view->assetBundles);


        $result = $this->view->renderFile(codecept_data_dir() . 'main.php');

        $I->assertRegexp('/connect.css/', $result);
        $I->assertRegexp('/bootstrap.css/', $result);
        $I->assertRegexp('/jquery.js/', $result);
        $I->assertRegexp('/yii.js/', $result);
    }

    /**
     * testRegistrationConnectAssetSimpleDependency
     *
     * @param UnitTester $I
     */
    public function testRegistrationConnectAssetSimpleDependency(UnitTester $I): void
    {
        $I->assertEmpty($this->view->assetBundles);

        RegistrationConnectAsset::register($this->view);

        $I->assertCount(4, $this->view->assetBundles);

        $I->assertArrayHasKey(RegistrationConnectAsset::class, $this->view->assetBundles);
        $I->assertArrayHasKey(BootstrapAsset::class, $this->view->assetBundles);
        $I->assertArrayHasKey(YiiAsset::class, $this->view->assetBundles);
        $I->assertArrayHasKey(JqueryAsset::class, $this->view->assetBundles);

        $I->assertInstanceOf(AssetBundle::class, $this->view->assetBundles[RegistrationConnectAsset::class]);
        $I->assertInstanceOf(AssetBundle::class, $this->view->assetBundles[BootstrapAsset::class]);
        $I->assertInstanceOf(AssetBundle::class, $this->view->assetBundles[YiiAsset::class]);
        $I->assertInstanceOf(AssetBundle::class, $this->view->assetBundles[JqueryAsset::class]);
    }

    /**
     * testRegistrationConnectAssetSourcesPublish
     *
     * @param UnitTester $I
     */
    public function testRegistrationConnectAssetSourcesPublish(UnitTester $I): void
    {
        $bundle = RegistrationConnectAsset::register($this->view);

        $I->assertTrue(is_dir($bundle->basePath));

        $I->sourcesPublishVerifyFiles('css', $bundle);

        $I->sourcesPublishVerifyFilesOnly($bundle);
    }
}
