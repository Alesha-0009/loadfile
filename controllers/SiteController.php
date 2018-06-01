<?php

namespace app\controllers;

use app\models\UploadForm;
use Yii;
use yii\web\Controller;

class SiteController extends Controller
{
    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $model = new UploadForm();

        if (Yii::$app->request->post())
        {
            Yii::$app->file->uploadFile();
        }

        return $this->render('index',[
            'model' => $model
        ]);
    }
}
