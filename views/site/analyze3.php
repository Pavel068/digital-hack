<?php

use dosamigos\chartjs\ChartJs;

$this->title = 'Анализ';
$this->params['breadcrumbs'][] = $this->title;

$data = require(Yii::getAlias('@webroot') . '/data/seo.php');
?>


<div class="row">
    <?= ChartJs::widget($data);
    ?>
</div>

