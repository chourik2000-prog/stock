<?php

namespace App\Charts;


use ArielMejiaDev\LarapexCharts\LarapexChart;

class MonthlyUsersChart
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
            ->setSubtitle('Saison 2021.')
            ->addData([40, 50, 30])
            ->setLabels(['Player 12', 'Player 10', 'Player 9']);
        
    }
}
