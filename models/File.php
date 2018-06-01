<?php
namespace app\models;

use yii\db\ActiveRecord;

/**
 * Class File
 * @package app\models
 */
class File extends ActiveRecord
{
    public static function tableName()
    {
        return 'files';
    }
}