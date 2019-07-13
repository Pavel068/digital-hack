<?php

namespace app\controllers;

class SettingsController extends \yii\web\Controller
{
    public function actionCommon()
    {
        return $this->render('common');
    }

    public function actionParser()
    {
        return $this->render('parser');
    }

    public function actionServices()
    {
        return $this->render('services');
    }

}
