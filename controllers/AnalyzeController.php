<?php

namespace app\controllers;

class AnalyzeController extends \yii\web\Controller
{
    public function actionFailedServices()
    {
        return $this->render('failed-services');
    }

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionRequests()
    {
        return $this->render('requests');
    }

    public function actionReviews()
    {
        return $this->render('reviews');
    }

}
