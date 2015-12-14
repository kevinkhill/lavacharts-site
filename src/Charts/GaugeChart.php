<?php

namespace Khill\Lavacharts\Charts;

<<<<<<< HEAD
use \Khill\Lavacharts\Utils;
use \Khill\Lavacharts\Configs\DataTable;
=======
use \Khill\Lavacharts\Options;
use \Khill\Lavacharts\Values\Label;
use \Khill\Lavacharts\DataTables\DataTable;
use \Khill\Lavacharts\Exceptions\InvalidConfigValue;
>>>>>>> origin/3.0

/**
 * GaugeChart Class
 *
 * A gauge with a dial, rendered within the browser using SVG or VML.
 *
 *
<<<<<<< HEAD
 * @package    Lavacharts
=======
 * @package    Khill\Lavacharts
>>>>>>> origin/3.0
 * @subpackage Charts
 * @since      2.2.0
 * @author     Kevin Hill <kevinkhill@gmail.com>
 * @copyright  (c) 2015, KHill Designs
 * @link       http://github.com/kevinkhill/lavacharts GitHub Repository Page
 * @link       http://lavacharts.com                   Official Docs Site
 * @license    http://opensource.org/licenses/MIT MIT
 */
class GaugeChart extends Chart
{
    /**
<<<<<<< HEAD
=======
     * Common Methods
     */
    use \Khill\Lavacharts\Traits\ForceIFrameTrait;

    /**
>>>>>>> origin/3.0
     * Javascript chart type.
     *
     * @var string
     */
    const TYPE = 'GaugeChart';

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
    const VIZ_PACKAGE = 'gauge';

    /**
     * Google's visualization class name.
     *
     * @var string
     */
    const VIZ_CLASS = 'google.visualization.Gauge';

    /**
<<<<<<< HEAD
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
            'forceIFrame',
            'greenColor',
            'greenFrom',
            'greenTo',
            'majorTicks',
            'max',
            'min',
            'minorTicks',
            'redColor',
            'redFrom',
            'redTo',
            'yellowColor',
            'yellowFrom',
            'yellowTo'
        ], $this->defaults);
    }

    /**
     * Draws the chart inside an inline frame.
     * Note that on IE8, this option is ignored; all IE8 charts are drawn in i-frames.
     *
     * @param  bool $iframe
     * @return GaugeChart
     */
    public function forceIFrame($iframe)
    {
        if (is_bool($iframe) === false) {
            throw $this->invalidConfigValue(
                __FUNCTION__,
                'bool'
            );
        }

        return $this->addOption([__FUNCTION__ => $iframe]);
=======
     * Default configuration options for the chart.
     *
     * @var array
     */
    private $gaugeDefaults = [
        'forceIFrame',
        'greenColor',
        'greenFrom',
        'greenTo',
        'majorTicks',
        'max',
        'min',
        'minorTicks',
        'redColor',
        'redFrom',
        'redTo',
        'yellowColor',
        'yellowFrom',
        'yellowTo'
    ];

    /**
     * Builds a new GaugeChart with the given label, datatable and options.
     *
     * @param \Khill\Lavacharts\Values\Label         $chartLabel Identifying label for the chart.
     * @param \Khill\Lavacharts\DataTables\DataTable $datatable DataTable used for the chart.
     * @param array                                  $config
     */
    public function __construct(Label $chartLabel, DataTable $datatable, $config = [])
    {
        $options = new Options($this->gaugeDefaults);

        parent::__construct($chartLabel, $datatable, $options, $config);
>>>>>>> origin/3.0
    }

    /**
     * The color to use for the green section, in HTML color notation.
     *
     * @param  string $greenColor
<<<<<<< HEAD
     * @return GaugeChart
     */
    public function greenColor($greenColor)
    {
        if (Utils::nonEmptyString($greenColor) === false) {
            throw $this->invalidConfigValue(
                __FUNCTION__,
                'string'
            );
        }

        return $this->addOption([__FUNCTION__ => $greenColor]);
=======
     * @return \Khill\Lavacharts\Charts\GaugeChart
     */
    public function greenColor($greenColor)
    {
        return $this->setStringOption(__FUNCTION__, $greenColor);
>>>>>>> origin/3.0
    }

    /**
     * The lowest value for a range marked by a green color.
     *
     * @param  integer $greenFrom
<<<<<<< HEAD
     * @return GaugeChart
     */
    public function greenFrom($greenFrom)
    {
        if (is_int($greenFrom) === false) {
            throw $this->invalidConfigValue(
                __FUNCTION__,
                'int'
            );
        }

        return $this->addOption([__FUNCTION__ => $greenFrom]);
=======
     * @return \Khill\Lavacharts\Charts\GaugeChart
     */
    public function greenFrom($greenFrom)
    {
        return $this->setIntOption(__FUNCTION__, $greenFrom);
>>>>>>> origin/3.0
    }

    /**
     * The highest value for a range marked by a green color.
     *
     * @param  integer $greenTo
<<<<<<< HEAD
     * @return GaugeChart
     */
    public function greenTo($greenTo)
    {
        if (is_int($greenTo) === false) {
            throw $this->invalidConfigValue(
                __FUNCTION__,
                'int'
            );
        }

        return $this->addOption([__FUNCTION__ => $greenTo]);
=======
     * @return \Khill\Lavacharts\Charts\GaugeChart
     */
    public function greenTo($greenTo)
    {
        return $this->setIntOption(__FUNCTION__, $greenTo);
>>>>>>> origin/3.0
    }

    /**
     * Labels for major tick marks. The number of labels define the number of major ticks in all gauges.
     * The default is five major ticks, with the labels of the minimal and maximal gauge value.
     *
     * @param  array $majorTicks
<<<<<<< HEAD
     * @return GaugeChart
=======
     * @return \Khill\Lavacharts\Charts\GaugeChart
     * @throws \Khill\Lavacharts\Exceptions\InvalidConfigValue
>>>>>>> origin/3.0
     */
    public function majorTicks($majorTicks)
    {
        if (is_array($majorTicks) === false) {
<<<<<<< HEAD
            throw $this->invalidConfigValue(
                __FUNCTION__,
=======
            throw new InvalidConfigValue(
                static::TYPE . '->' . __FUNCTION__,
>>>>>>> origin/3.0
                'array'
            );
        }

<<<<<<< HEAD
        return $this->addOption([__FUNCTION__ => $majorTicks]);
=======
        return $this->setOption(__FUNCTION__, $majorTicks);
>>>>>>> origin/3.0
    }

    /**
     * The maximal value of a gauge.
     *
     * @param  integer $max
<<<<<<< HEAD
     * @return GaugeChart
     */
    public function max($max)
    {
        if (is_int($max) === false) {
            throw $this->invalidConfigValue(
                __FUNCTION__,
                'int'
            );
        }

        return $this->addOption([__FUNCTION__ => $max]);
=======
     * @return \Khill\Lavacharts\Charts\GaugeChart
     */
    public function max($max)
    {
        return $this->setIntOption(__FUNCTION__, $max);
>>>>>>> origin/3.0
    }

    /**
     * The minimal value of a gauge.
     *
     * @param  integer $min
<<<<<<< HEAD
     * @return GaugeChart
     */
    public function min($min)
    {
        if (is_int($min) === false) {
            throw $this->invalidConfigValue(
                __FUNCTION__,
                'int'
            );
        }

        return $this->addOption([__FUNCTION__ => $min]);
=======
     * @return \Khill\Lavacharts\Charts\GaugeChart
     */
    public function min($min)
    {
        return $this->setIntOption(__FUNCTION__, $min);
>>>>>>> origin/3.0
    }

    /**
     * The number of minor tick section in each major tick section.
     *
     * @param  integer $minorTicks
<<<<<<< HEAD
     * @return GaugeChart
     */
    public function minorTicks($minorTicks)
    {
        if (is_int($minorTicks) === false) {
            throw $this->invalidConfigValue(
                __FUNCTION__,
                'int'
            );
        }

        return $this->addOption([__FUNCTION__ => $minorTicks]);
=======
     * @return \Khill\Lavacharts\Charts\GaugeChart
     */
    public function minorTicks($minorTicks)
    {
        return $this->setIntOption(__FUNCTION__, $minorTicks);
>>>>>>> origin/3.0
    }

    /**
     * The color to use for the red section, in HTML color notation.
     *
     * @param  string $redColor
<<<<<<< HEAD
     * @return GaugeChart
     */
    public function redColor($redColor)
    {
        if (Utils::nonEmptyString($redColor) === false) {
            throw $this->invalidConfigValue(
                __FUNCTION__,
                'string'
            );
        }

        return $this->addOption([__FUNCTION__ => $redColor]);
=======
     * @return \Khill\Lavacharts\Charts\GaugeChart
     */
    public function redColor($redColor)
    {
        return $this->setStringOption(__FUNCTION__, $redColor);
>>>>>>> origin/3.0
    }

    /**
     * The lowest value for a range marked by a red color.
     *
     * @param  integer $redFrom
<<<<<<< HEAD
     * @return GaugeChart
     */
    public function redFrom($redFrom)
    {
        if (is_int($redFrom) === false) {
            throw $this->invalidConfigValue(
                __FUNCTION__,
                'int'
            );
        }

        return $this->addOption([__FUNCTION__ => $redFrom]);
=======
     * @return \Khill\Lavacharts\Charts\GaugeChart
     */
    public function redFrom($redFrom)
    {
        return $this->setIntOption(__FUNCTION__, $redFrom);
>>>>>>> origin/3.0
    }

    /**
     * The highest value for a range marked by a red color.
     *
     * @param  integer $redTo
<<<<<<< HEAD
     * @return GaugeChart
     */
    public function redTo($redTo)
    {
        if (is_int($redTo) === false) {
            throw $this->invalidConfigValue(
                __FUNCTION__,
                'int'
            );
        }

        return $this->addOption([__FUNCTION__ => $redTo]);
=======
     * @return \Khill\Lavacharts\Charts\GaugeChart
     */
    public function redTo($redTo)
    {
        return $this->setIntOption(__FUNCTION__, $redTo);
>>>>>>> origin/3.0
    }

    /**
     * The color to use for the yellow section, in HTML color notation.
     *
     * @param  string $yellowColor
<<<<<<< HEAD
     * @return GaugeChart
     */
    public function yellowColor($yellowColor)
    {
        if (Utils::nonEmptyString($yellowColor) === false) {
            throw $this->invalidConfigValue(
                __FUNCTION__,
                'string'
            );
        }

        return $this->addOption([__FUNCTION__ => $yellowColor]);
=======
     * @return \Khill\Lavacharts\Charts\GaugeChart
     */
    public function yellowColor($yellowColor)
    {
        return $this->setStringOption(__FUNCTION__, $yellowColor);
>>>>>>> origin/3.0
    }

    /**
     * The lowest value for a range marked by a yellow color.
     *
     * @param  integer $yellowFrom
<<<<<<< HEAD
     * @return GaugeChart
     */
    public function yellowFrom($yellowFrom)
    {
        if (is_int($yellowFrom) === false) {
            throw $this->invalidConfigValue(
                __FUNCTION__,
                'int'
            );
        }

        return $this->addOption([__FUNCTION__ => $yellowFrom]);
=======
     * @return \Khill\Lavacharts\Charts\GaugeChart
     */
    public function yellowFrom($yellowFrom)
    {
        return $this->setIntOption(__FUNCTION__, $yellowFrom);
>>>>>>> origin/3.0
    }

    /**
     * The highest value for a range marked by a yellow color.
     *
     * @param  integer $yellowTo
<<<<<<< HEAD
     * @return GaugeChart
     */
    public function yellowTo($yellowTo)
    {
        if (is_int($yellowTo) === false) {
            throw $this->invalidConfigValue(
                __FUNCTION__,
                'int'
            );
        }

        return $this->addOption([__FUNCTION__ => $yellowTo]);
=======
     * @return \Khill\Lavacharts\Charts\GaugeChart
     */
    public function yellowTo($yellowTo)
    {
        return $this->setIntOption(__FUNCTION__, $yellowTo);
>>>>>>> origin/3.0
    }
}
