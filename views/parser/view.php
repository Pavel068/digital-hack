<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Parser */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'БД Парсера', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="parser-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Обновить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы уверены?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            [
                'attribute' => 'service_id',
                'value' => function ($model) {
                    return \app\models\Services::find()->select('name')->where(['id' => $model->id])->scalar();
                }
            ],
            'link',
            'notices:ntext',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>
