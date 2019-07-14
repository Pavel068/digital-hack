<?php

use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;
use yii\helpers\Html;
use \app\models\CommonSettings;
use dosamigos\chartjs\ChartJs;
use app\models\Analyze;


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
            <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>

            <?= $form->field($model, 'login')->textInput(['autofocus' => true]) ?>
            <?= $form->field($model, 'password') ?>
            <?= $form->field($model, 'level') ?>

            <div class="form-group">
                <?= Html::submitButton('Добавить пользователя', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
            </div>

            <?php ActiveForm::end(); ?>

            <p class="lead">Пользователи</p>
            <table class="table table-striped">
                <tr>
                    <th>Логин</th>
                    <th>Уровень</th>
                </tr>
                <?php foreach (\app\models\Users::find()->all() as $user): ?>
                    <tr>
                        <td><?= $user['login'] ?></td>
                        <td><?= $user['level'] ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>

        </div>
        <div class="col-md-6">
            <p class="lead">Настройки парсера</p>
            <?php foreach (CommonSettings::find()->all() as $item): ?>
                <div>
                    <input class="hidden" type="checkbox" id="<?= $item->_key ?>" name="<?= $item->_key ?>">
                    <label for="<?= $item->_key ?>"><?= $item->_key ?></label>
                </div>
            <? endforeach; ?>
        </div>
    </div>

</div>
