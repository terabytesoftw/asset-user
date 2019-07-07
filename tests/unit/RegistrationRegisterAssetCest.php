<?php

namespace terabytesoft\assets\user\tests;

use terabytesoft\assets\user\RegistrationRegisterAsset;
use terabytesoft\assets\user\tests\UnitTester;
use yii\bootstrap4\BootstrapAsset;
use yii\web\AssetBundle;
use yii\web\JqueryAsset;
use yii\web\View;
use yii\web\YiiAsset;

/**
 * Class RegistrationRegisterAssetCest
 *
 * Unit tests for codeception for asset user
 */
class RegistrationRegisterAssetCest
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
     * testRegistrationRegisterAssetRegister
     *
     * @param UnitTester $I
     */
    public function testRegistrationRegisterAssetRegister(UnitTester $I): void
    {
        $I->assertEmpty($this->view->assetBundles);

        RegistrationRegisterAsset::register($this->view);

        $I->assertCount(4, $this->view->assetBundles);

        $I->assertArrayHasKey(RegistrationRegisterAsset::class, $this->view->assetBundles);
        $I->assertArrayHasKey(BootstrapAsset::class, $this->view->assetBundles);
        $I->assertArrayHasKey(YiiAsset::class, $this->view->assetBundles);
        $I->assertArrayHasKey(JqueryAsset::class, $this->view->assetBundles);


        $result = $this->view->renderFile(codecept_data_dir() . 'main.php');

        $I->assertRegexp('/bootstrap.css/', $result);
        $I->assertRegexp('/jquery.js/', $result);
        $I->assertRegexp('/register.css/', $result);
        $I->assertRegexp('/yii.js/', $result);
    }

    /**
     * testRegistrationRegisterAssetSimpleDependency
     *
     * @param UnitTester $I
     */
    public function testRegistrationRegisterAssetSimpleDependency(UnitTester $I): void
    {
        $I->assertEmpty($this->view->assetBundles);

        RegistrationRegisterAsset::register($this->view);

        $I->assertCount(4, $this->view->assetBundles);

        $I->assertArrayHasKey(RegistrationRegisterAsset::class, $this->view->assetBundles);
        $I->assertArrayHasKey(BootstrapAsset::class, $this->view->assetBundles);
        $I->assertArrayHasKey(YiiAsset::class, $this->view->assetBundles);
        $I->assertArrayHasKey(JqueryAsset::class, $this->view->assetBundles);

        $I->assertInstanceOf(AssetBundle::class, $this->view->assetBundles[RegistrationRegisterAsset::class]);
        $I->assertInstanceOf(AssetBundle::class, $this->view->assetBundles[BootstrapAsset::class]);
        $I->assertInstanceOf(AssetBundle::class, $this->view->assetBundles[YiiAsset::class]);
        $I->assertInstanceOf(AssetBundle::class, $this->view->assetBundles[JqueryAsset::class]);
    }

    /**
     * testRegistrationRegisterAssetSourcesPublish
     *
     * @param UnitTester $I
     */
    public function testRegistrationRegisterAssetSourcesPublish(UnitTester $I): void
    {
        $bundle = RegistrationRegisterAsset::register($this->view);

        $I->assertTrue(is_dir($bundle->basePath));

        $I->sourcesPublishVerifyFiles('css', $bundle);

        $I->sourcesPublishVerifyFilesOnly($bundle);
    }
}
