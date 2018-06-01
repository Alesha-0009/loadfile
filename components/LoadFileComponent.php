<?php
namespace app\components;

use app\models\UploadForm;
use yii\base\Component;
use yii\web\UploadedFile;

/**
 * Class LoadcmpComponent
 * @package app\components
 */
class LoadFileComponent extends Component
{
    public function init()
    {
        parent::init();
    }

    /**
     * Загрузка файлов на сервер...
     */
    public function uploadFile()
    {
        $model = new UploadForm;
        $model->files = UploadedFile::getInstances($model,'files');
        $path = \Yii::$app->params['PathFile'];
        foreach ($model->files as $file)
        {
            $file->saveAs($path . $file->baseName . '.' . $file->extension);
        }
    }
}