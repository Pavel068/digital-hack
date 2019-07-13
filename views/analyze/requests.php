<?php

use dosamigos\chartjs\ChartJs;
use app\models\Analyze;

$this->title = 'Запросы услуг';
$this->params['breadcrumbs'][] = $this->title;

?>

<h1>Запросы услуг</h1>

<div class="row">
    <div class="col-md-12">
        <?= ChartJs::widget(Analyze::getRequestsStub()); ?>
    </div>
</div>
