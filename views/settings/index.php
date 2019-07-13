<?php

use yii\helpers\Html;
use \app\models\CommonSettings;


/* @var $this yii\web\View */
/* @var $searchModel app\models\ServicesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Общие настройки';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="services-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="alert alert-info" role="alert">
        В данном разделе находятся общие настройки приложения
    </div>

    <div class="row">
        <div class="col-md-6">
            <p class="lead">Настройки аккаунта</p>
        </div>
        <div class="col-md-6">
            <p class="lead">Настройки парсера</p>
            <?php foreach (CommonSettings::find()->all() as $item): ?>
            <div>
                <label for="<?= $item->_key ?>"><?= $item->_value ?></label>
                <input class="hidden" type="checkbox" id="<?= $item->_key ?>" name="<?= $item->_key ?>">
            </div>
            <? endforeach; ?>
        </div>
    </div>

</div>
