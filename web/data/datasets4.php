<?php

use app\models\Services;

$labels = Services::find()->select('name')->column();

$datasets = [];
$colors = [];

for ($i = 0; $i < count($labels); $i++) {
    $datasets[] = rand(100, 1500);
}
for ($i = 0; $i < count($labels); $i++) {
    $colors[] = "rgba(" . rand(0, 255) . "," . rand(0, 255) . "," . rand(0, 255) . ",0.9)";
}

return [
    'labels' => $labels,
    'datasets' => $datasets,
    'colors' => $colors
];