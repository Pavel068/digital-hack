<?php

namespace app\controllers;

use app\models\Users;

class SettingsController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $model = new Users();
        return $this->render('index', [
            'model' => $model
        ]);
    }

}
