<?php

$datasets = [];

foreach (\app\models\Services::find()->all() as $service) {
    $datasets[$service['id']] = [
        [
            'label' => "Позитивные упоминания",
            'backgroundColor' => "rgba(179,181,198,0.7)",
            'borderColor' => "rgba(179,181,198,1)",
            'pointBackgroundColor' => "rgba(179,181,198,1)",
            'pointBorderColor' => "#fff",
            'pointHoverBackgroundColor' => "#fff",
            'pointHoverBorderColor' => "rgba(179,181,198,1)",
            'data' => \app\models\Analyze::stabPointsGenerator(7)
        ],
        [
            'label' => "Негативные упоминания",
            'backgroundColor' => "rgba(255,99,132,0.7)",
            'borderColor' => "rgba(255,99,132,1)",
            'pointBackgroundColor' => "rgba(255,99,132,1)",
            'pointBorderColor' => "#fff",
            'pointHoverBackgroundColor' => "#fff",
            'pointHoverBorderColor' => "rgba(255,99,132,1)",
            'data' => \app\models\Analyze::stabPointsGenerator(7)
        ]
    ];
}

return $datasets;