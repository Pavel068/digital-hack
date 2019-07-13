<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Parser */

$this->title = 'Обновить правило парсера: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'БД Парсера', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Обновить';
?>
<div class="parser-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
