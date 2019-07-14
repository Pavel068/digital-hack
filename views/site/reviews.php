<?php
$this->title = 'Отзывы о портале';
$this->params['breadcrumbs'][] = $this->title;

use app\models\Analyze;
use dosamigos\chartjs\ChartJs; ?>

    <h1>Отзывы о портале</h1>


<div class="row">
    <div class="col-md-4">
        <p class="lead">Сводная информация (июль)</p>
        <table class="table">
            <tr>
                <td>Общее количество: </td>
                <td>618</td>
                <td>Новых: </td>
                <td>100</td>
            </tr>
            <tr>
                <td>Нейтральных: </td>
                <td>250</td>
                <td></td>
                <td>22</td>
            </tr>
            <tr>
                <td>Негативных: </td>
                <td>226</td>
                <td></td>
                <td>26</td>
            </tr>
            <tr>
                <td>Позитивных: </td>
                <td>142</td>
                <td></td>
                <td>52</td>
            </tr>
        </table>
    </div>
    <div class="col-md-4">
        <p class="lead">Доля отзывов</p>
        <div>
            <?php echo ChartJs::widget(Analyze::getReviewsByPositive());?>
        </div>
    </div>
    <div class="col-md-4">
        <p class="lead">Разбивка по услугам</p>
        <div>
            <?php echo ChartJs::widget(Analyze::getReviewsForServicesStub());?>
        </div>
    </div>
</div>

    <p class="lead">Список отзывов</p>
<?php foreach (\app\models\ParsedData::find()->all() as $review): ?>
    <div class="row">
        <div class="col-md-6">
            <div class="negative">
                <?= $review['negative'] ?>
            </div>
        </div>
        <div class="col-md-6">
            <div class="positive">
                <?= $review['positive'] ?>
            </div>
        </div>
    </div>
<?php endforeach; ?>