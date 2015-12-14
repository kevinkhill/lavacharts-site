<?php

namespace Khill\Lavacharts\Charts;

use \Khill\Lavacharts\Utils;
<<<<<<< HEAD
use \Khill\Lavacharts\Configs\DataTable;
=======
use \Khill\Lavacharts\Values\Label;
use \Khill\Lavacharts\Options;
use \Khill\Lavacharts\DataTables\DataTable;
use \Khill\Lavacharts\Exceptions\InvalidConfigValue;
>>>>>>> origin/3.0

/**
 * DonutChart Class
 *
 * Alias for a pie chart with pieHolethat is rendered within the browser using SVG or VML. Displays
 * tooltips when hovering over slices.
 *
 *
<<<<<<< HEAD
 * @package    Lavacharts
=======
 * @package    Khill\Lavacharts
>>>>>>> origin/3.0
 * @subpackage Charts
 * @since      1.0.0
 * @author     Kevin Hill <kevinkhill@gmail.com>
 * @copyright  (c) 2015, KHill Designs
 * @link       http://github.com/kevinkhill/lavacharts GitHub Repository Page
 * @link       http://lavacharts.com                   Official Docs Site
 * @license    http://opensource.org/licenses/MIT MIT
 */
class DonutChart extends PieChart
{
    /**
     * Javascript chart type.
     *
     * @var string
     */
    const TYPE = 'DonutChart';

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
    const VIZ_CLASS = 'google.visualization.PieChart';

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

        $this->defaults = array_merge($this->defaults, [
            'pieHole'
        ]);

        $this->pieHole(0.5);
    }

    /**
     * If between 0 and 1, displays a donut chart. The hole with have a radius
     * equal to $pieHole times the radius of the chart.
     *
     * @param  integer|float  $pieHole Size of the pie hole.
     * @return DonutChart
=======
    private $donutDefaults = [
        'pieHole'
    ];

    /**
     * Builds a new chart with the given label and DataTable.
     *
     * @param  \Khill\Lavacharts\Values\Label $chartLabel Identifying label for the chart.
     * @param  \Khill\Lavacharts\DataTables\DataTable $datatable DataTable used for the chart.
     * @param  array $config Array of options to set for the chart.
     * @return \Khill\Lavacharts\Charts\DonutChart
     */
    public function __construct(Label $chartLabel, DataTable $datatable, $config = [])
    {
        $options = new Options($this->donutDefaults);
        $options->set('pieHole', 0.5);

        parent::__construct($chartLabel, $datatable, $config);

        $this->options->merge($options);
    }

    /**
     * If between 0 and 1, displays a donut chart.
     *
     * The hole with have a radius equal to $pieHole times the radius of the chart.
     *
     *
     * @param  integer|float $pieHole Size of the pie hole.
     * @return \Khill\Lavacharts\Charts\DonutChart
     * @throws \Khill\Lavacharts\Exceptions\InvalidConfigValue
>>>>>>> origin/3.0
     */
    public function pieHole($pieHole)
    {
        if (Utils::between(0.0, $pieHole, 1.0) === false) {
<<<<<<< HEAD
            throw $this->invalidConfigValue(
                __FUNCTION__,
=======
            throw new InvalidConfigValue(
                static::TYPE . '->' . __FUNCTION__,
>>>>>>> origin/3.0
                'float',
                'while, 0 < pieHole < 1 '
            );
        }

<<<<<<< HEAD
        return $this->addOption([__FUNCTION__ => $pieHole]);
=======
        return $this->setOption(__FUNCTION__, $pieHole);
>>>>>>> origin/3.0
    }
}
