<?php

$datasets = [];

foreach (\app\models\Services::find()->all() as $service) {
    $r = rand(0, 255);
    $g = rand(0, 255);
    $b = rand(0, 255);

    $datasets[] = [
        'label' => $service['name'],
        'backgroundColor' => "rgba($r,$g,$b,0.7)",
        'borderColor' => "rgba($r,$g,$b,1)",
        'pointBackgroundColor' => "rgba($r,$g,$b,1)",
        'pointBorderColor' => "#fff",
        'pointHoverBackgroundColor' => "#fff",
        'pointHoverBorderColor' => "rgba($r,$g,$b,1)",
        'data' => \app\models\Analyze::stabPointsGenerator(7, 150, 3000)
    ];
}

return $datasets;