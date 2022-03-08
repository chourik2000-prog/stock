<?php

namespace App\Charts;
use App\Http\Controllers\UserController;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class BilanChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\PieChart
    {
        return $this->chart->pieChart()
            ->setTitle('Statistiques')
            ->setSubtitle('Saison 2021.');
    }
}
