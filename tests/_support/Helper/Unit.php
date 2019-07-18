<?php
namespace terabytesoft\assets\user\tests\Helper;

// here you can define custom actions
// all public methods declared in helper class will be available in $I

class Unit extends \Codeception\Module
{
    /**
     * clearDirectory
     * @param string $dir directory to be cleared.
     */
    public function clearDirectory($dir): void
    {
        if (!is_dir($dir)) {
            return;
        }
        if (!($handle = opendir($dir))) {
            return;
        }
        $specialFileNames = [
            '.htaccess',
            '.gitignore',
            '.gitkeep',
            '.hgignore',
            '.hgkeep',
        ];
        while (($file = readdir($handle)) !== false) {
            if ($file === '.' || $file === '..') {
                continue;
            }
            if (in_array($file, $specialFileNames)) {
                continue;
            }
            $path = $dir . DIRECTORY_SEPARATOR . $file;
            if (is_dir($path)) {
                \yii\helpers\FileHelper::removeDirectory($path);
            } else {
                unlink($path);
            }
        }
        closedir($handle);
    }

    /**
     * sourcesPublishVerifyFiles
     *
     * @param string $type
     * @param array  $bundle
     */
    public function sourcesPublishVerifyFiles($type, $bundle): void
    {
        foreach ($bundle->$type as $filename) {
            $publishedFile = $bundle->basePath . DIRECTORY_SEPARATOR . $filename;
            $sourceFile = $bundle->sourcePath . DIRECTORY_SEPARATOR . $filename;
            \PHPUnit_Framework_Assert::assertFileExists($publishedFile);
            \PHPUnit_Framework_Assert::assertFileEquals($publishedFile, $sourceFile);
        }

        \PHPUnit_Framework_Assert::assertTrue(is_dir($bundle->basePath));
    }
}
