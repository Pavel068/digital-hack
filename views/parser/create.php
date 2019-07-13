<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Parser */

$this->title = 'Добавить правило';
$this->params['breadcrumbs'][] = ['label' => 'БД Парсера', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="parser-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
