<?php

namespace app\models;

use Yii;

class Analyze
{
    public static function stabPointsGenerator($number = 10, $min = 0, $max = 100)
    {
        $points = [];
        for ($i = 0; $i < $number; $i++)
            $points[] = rand($min, $max);

        return $points;
    }

    public static function graph($type, $datasets)
    {
        if ($type == 'pie') {
            $dataset = $datasets['datasets'];
            $labels = $datasets['labels'];
            $colors = $datasets['colors'];

            return [
                'type' => $type,
                'data' => [
                    'labels' => $labels,
                    'datasets' => [
                        [
                            'label' => 'level',
                            'data' => $dataset,
                            'backgroundColor' => $colors

                        ],
                    ],
                ],
                'options' => [
                    'height' => 250,
                ],

            ];
        } else {
            return [
                'type' => $type,
                'options' => [
                    'height' => 100,
                ],
                'data' => [
                    'labels' => ["Янв", "Фев", "Мар", "Апр", "Май", "Июнь", "Июль"],
                    'datasets' => $datasets
                ]
            ];
        }
    }

    /*
     * STUB GRAPH FUNCTIONS
     */

    public static function getReviewsStub($key)
    {
        $datasets = require(Yii::getAlias('@webroot') . '/data/datasets1.php');
        return self::graph('bar', $datasets[$key]);
    }

    public static function getRequestsStub()
    {
        $datasets = require(Yii::getAlias('@webroot') . '/data/datasets2.php');
        return self::graph('bar', $datasets);
    }

    public static function getFailedServicesStub()
    {
        $datasets = require(Yii::getAlias('@webroot') . '/data/datasets3.php');
        return self::graph('bar', $datasets);
    }

    public static function getReviewsForServicesStub()
    {
        $datasets = require(Yii::getAlias('@webroot') . '/data/datasets4.php');
        return self::graph('pie', $datasets);
    }

    public static function getReviewsByPositive()
    {
        $datasets = require(Yii::getAlias('@webroot') . '/data/datasets5.php');
        return self::graph('pie', $datasets);
    }
}