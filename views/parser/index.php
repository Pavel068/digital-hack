<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ParserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'БД Парсера';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="parser-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="alert alert-info" role="alert">
        В данном разделе находятся настройки списка интернет-ресурсов, с которых будет производиться выборка данных для анализа
    </div>

    <p>
        <?= Html::a('Добавить правило', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
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

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
