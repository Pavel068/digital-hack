<?php

use dosamigos\chartjs\ChartJs;
use app\models\Analyze;

$this->title = 'Динамика отзывов';
$this->params['breadcrumbs'][] = $this->title;

?>

<h1>Динамика отзывов</h1>
<br/>

<div class="row">
    <div class="col-md-12">
        <label for="service">Выберите услугу</label>
        <select name="service" id="service" class="form-control">
            <?php foreach (\app\models\Services::find()->all() as $service): ?>
                <option value="<?= $service['id'] ?>"><?= $service['name'] ?></option>
            <?php endforeach; ?>
        </select>

        <?= ChartJs::widget(Analyze::getReviewsStub(\app\models\Services::find()->all()[0]['id'])); ?>

    </div>
</div>

