<?php

namespace Khill\Lavacharts\Charts;

<<<<<<< HEAD
use \Khill\Lavacharts\Configs\DataTable;

=======
use \Khill\Lavacharts\Values\Label;
use \Khill\Lavacharts\Options;
use \Khill\Lavacharts\DataTables\DataTable;
>>>>>>> origin/3.0

/**
 * BarChart Class
 *
 * A vertical bar chart that is rendered within the browser using SVG or VML.
 * Displays tips when hovering over bars. For a horizontal version of this
 * chart, see the Bar Chart.
 *
 *
<<<<<<< HEAD
 * @package    Lavacharts
=======
 * @package    Khill\Lavacharts
>>>>>>> origin/3.0
 * @subpackage Charts
 * @since      2.3.0
 * @author     Kevin Hill <kevinkhill@gmail.com>
 * @copyright  (c) 2015, KHill Designs
 * @link       http://github.com/kevinkhill/lavacharts GitHub Repository Page
 * @link       http://lavacharts.com                   Official Docs Site
 * @license    http://opensource.org/licenses/MIT MIT
 */
class BarChart extends Chart
{
    /**
     * Common methods
     */
    use \Khill\Lavacharts\Traits\AnnotationsTrait;
    use \Khill\Lavacharts\Traits\AxisTitlesPositionTrait;
    use \Khill\Lavacharts\Traits\BarGroupWidthTrait;
    use \Khill\Lavacharts\Traits\DataOpacityTrait;
    use \Khill\Lavacharts\Traits\EnableInteractivityTrait;
    use \Khill\Lavacharts\Traits\FocusTargetTrait;
    use \Khill\Lavacharts\Traits\ForceIFrameTrait;
    use \Khill\Lavacharts\Traits\HorizontalAxesTrait;
    use \Khill\Lavacharts\Traits\HorizontalAxisTrait;
    use \Khill\Lavacharts\Traits\IsStackedTrait;
    use \Khill\Lavacharts\Traits\OrientationTrait;
    use \Khill\Lavacharts\Traits\ReverseCategoriesTrait;
    use \Khill\Lavacharts\Traits\SeriesTrait;
    use \Khill\Lavacharts\Traits\ThemeTrait;
<<<<<<< HEAD
=======
    use \Khill\Lavacharts\Traits\TrendlinesTrait;
>>>>>>> origin/3.0
    use \Khill\Lavacharts\Traits\VerticalAxesTrait;
    use \Khill\Lavacharts\Traits\VerticalAxisTrait;

    /**
     * Javascript chart type.
     *
     * @var string
     */
    const TYPE = 'BarChart';

    /**
     * Javascript chart version.
     *
     * @var string
     */
    const VERSION = '1';

    /**
     * Javascript chart package.
     *
     * @var string
     */
    const VIZ_PACKAGE = 'corechart';

    /**
     * Google's visualization class name.
     *
     * @var string
     */
    const VIZ_CLASS = 'google.visualization.BarChart';

<<<<<<< HEAD
    /**
     * Builds a new chart with the given label.
     *
     * @param  string $chartLabel Identifying label for the chart.
     * @param  \Khill\Lavacharts\Configs\DataTable $datatable Datatable used for the chart.
     * @return self
     */
    public function __construct($chartLabel, DataTable $datatable)
    {
        parent::__construct($chartLabel, $datatable);

        $this->defaults = array_merge([
            'annotations',
            'axisTitlesPosition',
            'barGroupWidth',
            //'bars',
            //'chart.subtitle',
            //'chart.title',
            'dataOpacity',
            'enableInteractivity',
            'focusTarget',
            'forceIFrame',
            'hAxes',
            'hAxis',
            'isStacked',
            'orientation',
            'reverseCategories',
            'series',
            'theme',
            //'trendlines',
            'vAxes',
            'vAxis'
        ], $this->defaults);
=======

    /**
     * Default configuration options for the chart.
     *
     * @var array
     */
    private $barDefaults = [
        'annotations',
        'axisTitlesPosition',
        'barGroupWidth',
        'dataOpacity',
        'enableInteractivity',
        'focusTarget',
        'forceIFrame',
        'hAxes',
        'hAxis',
        'isStacked',
        'orientation',
        'reverseCategories',
        'series',
        'theme',
        'trendlines',
        'vAxes',
        'vAxis'
    ];

    /**
     * Builds a new BarChart with the given label, datatable and options.
     *
     * @param  \Khill\Lavacharts\Values\Label         $chartLabel Identifying label for the chart.
     * @param  \Khill\Lavacharts\DataTables\DataTable $datatable DataTable used for the chart.
     * @param array                                   $config
     */
    public function __construct(Label $chartLabel, DataTable $datatable, $config = [])
    {
        $options = new Options($this->barDefaults);

        parent::__construct($chartLabel, $datatable, $options, $config);
>>>>>>> origin/3.0
    }
}
