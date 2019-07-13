<?php

use dosamigos\chartjs\ChartJs;
use app\models\Analyze;

$this->title = 'Неоказанные услуги';
$this->params['breadcrumbs'][] = $this->title;

?>

<h1>Неоказанные услуги (% от общего количества)</h1>

<div class="row">
    <?= ChartJs::widget(Analyze::getFailedServicesStub());
    ?>
</div>

