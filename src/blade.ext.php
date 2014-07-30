<?php

$charts = array(
    'LineChart',
    'AreaChart',
    'ComboChart',
    'PieChart',
    'DonutChart',
    'GeoChart'
);

foreach ($charts as $chart)
{
    Blade::extend(function($view, $compiler) use ($chart) {
        $pattern = $compiler->createMatcher(strtolower($chart));
        $output  = '<?php echo Lava::render'.$chart.'$2; ?>';

        return preg_replace($pattern, $output, $view);
    });
}

// OLDEST: Lava::LineChart('Stocks')->outputInto('stocks_div')
// OLDER:  Lava::render('LineChart', 'Stocks', 'stocks_div')
// OLD:    Lava::renderLineChart('Stocks', 'stocks_div')
// NEW:    @linechart('Stocks', 'stocks_div')
