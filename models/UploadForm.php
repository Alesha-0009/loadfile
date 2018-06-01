<?php
namespace app\models;

use yii\base\Model;
use yii\web\UploadedFile;

/**
 * Class UploadForm
 * @package app\models
 */
class UploadForm extends Model
{
    /**
     * @var UploadedFile[]
     */
    public $files;

    public function rules()
    {
        return [
            [['files'], 'file', 'extensions' => \Yii::$app->params['FileExtensions'],
                'skipOnEmpty' => false,
                'maxFiles' => \Yii::$app->params['MaxFiles'],
                'maxSize' => \Yii::$app->params['MaxSize'],
                'tooBig' => \Yii::$app->params['Limit']
            ]
        ];
    }

    public  function attributeLabels()
    {
        return [
            'files' => 'Выбирите Файл пожалуйста...'
        ];
    }

    /**
     * Сохранение мета-информации в бд...
     * @param $file
     */
    public function SaveNewFileRecord($file)
    {
        $record = new File;
        $record->name = $file->baseName . '.' . $file->extension;
        $record->metainfo = '';
        $record->save();
    }
}