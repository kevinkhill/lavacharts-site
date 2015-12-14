<?php

namespace Khill\Lavacharts\Charts;

use \Khill\Lavacharts\Utils;
<<<<<<< HEAD
use \Khill\Lavacharts\Configs\DataTable;
use \Khill\Lavacharts\Configs\Stroke;
use \Khill\Lavacharts\Configs\TextStyle;
use \Khill\Lavacharts\Configs\Color;

=======
use \Khill\Lavacharts\Values\Label;
use \Khill\Lavacharts\Options;
use \Khill\Lavacharts\DataTables\DataTable;
use \Khill\Lavacharts\Configs\Stroke;
use \Khill\Lavacharts\Configs\TextStyle;
use \Khill\Lavacharts\Configs\Color;
use \Khill\Lavacharts\Exceptions\InvalidConfigValue;
>>>>>>> origin/3.0

/**
 * CalendarChart Class
 *
 * A calendar chart is a visualization used to show activity over the course of a long span of time,
 * such as months or years. They're best used when you want to illustrate how some quantity varies
 * depending on the day of the week, or how it trends over time.
 *
 *
<<<<<<< HEAD
 * @package    Lavacharts
=======
 * @package    Khill\Lavacharts
>>>>>>> origin/3.0
 * @subpackage Charts
 * @since      2.1.0
 * @author     Kevin Hill <kevinkhill@gmail.com>
 * @copyright  (c) 2015, KHill Designs
 * @link       http://github.com/kevinkhill/lavacharts GitHub Repository Page
 * @link       http://lavacharts.com                   Official Docs Site
 * @license    http://opensource.org/licenses/MIT MIT
 */
class CalendarChart extends Chart
{
    /**
     * Common methods
     */
    use \Khill\Lavacharts\Traits\ColorAxisTrait;

    /**
     * Javascript chart type.
     *
     * @var string
     */
    const TYPE = 'CalendarChart';

    /**
     * Javascript chart version.
     *
     * @var string
     */
    const VERSION = '1.1';

    /**
     * Javascript chart package.
     *
     * @var string
     */
    const VIZ_PACKAGE = 'calendar';

    /**
     * Google's visualization class name.
     *
     * @var string
     */
    const VIZ_CLASS = 'google.visualization.Calendar';

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

        $this->options = [
            'calendar' => []
        ];

        $this->defaults = array_merge([
            'cellColor',
            'cellSize',
            'dayOfWeekLabel',
            'dayOfWeekRightSpace',
            'daysOfWeek',
            'focusedCellColor',
            'monthLabel',
            'monthOutlineColor',
            'underMonthSpace',
            'underYearSpace',
            'unusedMonthOutlineColor',
            'colorAxis',
            'forceIFrame',
            'noDataPattern'
        ], $this->defaults);
=======
     * Default options for the Chart
     *
     * @var array
     */
    private $extChartDefaults = [
        'calendar',
        'noDataPattern'
    ];

    /**
     * Default options for CalendarCharts
     *
     * @var array
     */
    private $calendarDefaults = [
        'cellColor',
        'cellSize',
        'dayOfWeekLabel',
        'dayOfWeekRightSpace',
        'daysOfWeek',
        'focusedCellColor',
        'monthLabel',
        'monthOutlineColor',
        'underMonthSpace',
        'underYearSpace',
        'unusedMonthOutlineColor',
        'colorAxis',
        'forceIFrame'
    ];

    /**
     * Builds a new chart with the given label.
     *
     * @param  \Khill\Lavacharts\Values\Label         $chartLabel Identifying label for the chart.
     * @param  \Khill\Lavacharts\DataTables\DataTable $datatable  DataTable used for the chart.
     * @param array                                   $config
     * @throws \Khill\Lavacharts\Exceptions\InvalidOption
     * @internal param array $options Array of options to set for the chart.
     */
    public function __construct(Label $chartLabel, DataTable $datatable, $config = [])
    {
        $options = new Options($this->extChartDefaults);

        $options->set('calendar', new Options($this->calendarDefaults));

        parent::__construct($chartLabel, $datatable, $options, $config);
>>>>>>> origin/3.0
    }

    /**
     * Tweaking addOption function for wrapping all options into the calendar config option.
     *
<<<<<<< HEAD
     * @param  array         $option Array of config options
     * @return CalendarChart
     */
    protected function addCalendarOption($o)
    {
        if (is_array($o)) {
            $this->options['calendar'] = array_merge($this->options['calendar'], $o);
        } else {
            throw $this->invalidConfigValue(
                __FUNCTION__,
                'array'
            );
        }
=======
     * @param  string $option Option to set
     * @param  mixed  $value
     * @return \Khill\Lavacharts\Charts\CalendarChart
     * @throws \Khill\Lavacharts\Exceptions\InvalidOption
     */
    protected function setCalendarOption($option, $value)
    {
        $this->options->get('calendar')->set($option, $value);
>>>>>>> origin/3.0

        return $this;
    }

    /**
     * Overriding getOption function to pull config options from calendar array.
     * (Thanks google)
     *
<<<<<<< HEAD
     * @param  string             $o Which option to fetch
     * @throws \Khill\Lavacharts\Exceptions\InvalidConfigValue
     * @return mixed
     */
    public function getOption($o)
    {
        if (is_string($o) && array_key_exists($o, $this->options['calendar'])) {
            return $this->options['calendar'][$o];
        } else if (is_string($o) && array_key_exists($o, $this->options)) {
            return $this->options[$o];
        } else {
            $calendarOptions = $this->options['calendar'];
            $nonCalendarOptions = array_diff($this->options, $calendarOptions);
            $options = array_merge($calendarOptions, $nonCalendarOptions);

            throw $this->invalidConfigValue(
                __FUNCTION__,
                'string',
                'must be one of '.Utils::arrayToPipedString(array_keys($options))
=======
     * @param  string $option Which option to fetch
     * @return mixed
     * @throws \Khill\Lavacharts\Exceptions\InvalidConfigValue
     */
    public function __get($option)
    {
        if ($this->options->get('calendar')->hasOption($option)) {
            return $this->options->get('calendar')->get($option);
        } elseif ($this->options->hasOption($option)) {
            return $this->options->get($option);
        } else {
            $calendarOptions = $this->options->get('calendar')->getOptions();
            $nonCalendarOptions = $this->options->getOptions();

            $options = array_merge($calendarOptions, $nonCalendarOptions);

            throw new InvalidConfigValue(
                static::TYPE . '->' . __FUNCTION__,
                'string',
                'must be one of '.Utils::arrayToPipedString($options)
>>>>>>> origin/3.0
            );
        }
    }

    /**
     * The cellColor option lets you customize the border of the calendar day squares
     *
<<<<<<< HEAD
     * @param  Stroke        $stroke
     * @return CalendarChart
     */
    public function cellColor(Stroke $stroke)
    {
        return $this->addCalendarOption($stroke->toArray(__FUNCTION__));
=======
     * @param  array  $strokeConfig
     * @return \Khill\Lavacharts\Charts\CalendarChart
     */
    public function cellColor($strokeConfig)
    {
        return $this->setCalendarOption(__FUNCTION__, new Stroke($strokeConfig));
>>>>>>> origin/3.0
    }

    /**
     * Sets the size of the calendar day squares
     *
<<<<<<< HEAD
     * @param  integer           $cellSize
     * @return CalendarChart
=======
     * @param  integer $cellSize
     * @return \Khill\Lavacharts\Charts\CalendarChart
     * @throws \Khill\Lavacharts\Exceptions\InvalidConfigValue
>>>>>>> origin/3.0
     */
    public function cellSize($cellSize)
    {
        if (is_int($cellSize) === false) {
<<<<<<< HEAD
            throw $this->invalidConfigValue(
                __FUNCTION__,
=======
            throw new InvalidConfigValue(
                static::TYPE . '->' . __FUNCTION__,
>>>>>>> origin/3.0
                'int'
            );
        }

<<<<<<< HEAD
        return $this->addCalendarOption([__FUNCTION__ => $cellSize]);
=======
        return $this->setCalendarOption(__FUNCTION__, $cellSize);
>>>>>>> origin/3.0
    }

    /**
     * Controls the font style of the week labels at the top of the chart.
     *
<<<<<<< HEAD
     * @param  TextStyle     $label
     * @return CalendarChart
     */
    public function dayOfWeekLabel(TextStyle $label)
    {
        $this->addCalendarOption($label->toArray(__FUNCTION__));
=======
     * @param  TextStyle     $labelConfig
     * @return \Khill\Lavacharts\Charts\CalendarChart
     */
    public function dayOfWeekLabel($labelConfig)
    {
        $this->setCalendarOption(__FUNCTION__, new TextStyle($labelConfig));
>>>>>>> origin/3.0
    }

    /**
     * Sets The distance between the right edge of the week labels and
     * the left edge of the chart day squares.
     *
<<<<<<< HEAD
     * @param  integer           $space
     * @return CalendarChart
=======
     * @param  integer $space
     * @return \Khill\Lavacharts\Charts\CalendarChart
     * @throws \Khill\Lavacharts\Exceptions\InvalidConfigValue
>>>>>>> origin/3.0
     */
    public function dayOfWeekRightSpace($space)
    {
        if (is_int($space) === false) {
<<<<<<< HEAD
            throw $this->invalidConfigValue(
                __FUNCTION__,
=======
            throw new InvalidConfigValue(
                static::TYPE . '->' . __FUNCTION__,
>>>>>>> origin/3.0
                'int'
            );
        }

<<<<<<< HEAD
        return $this->addCalendarOption([__FUNCTION__ => $space]);
=======
        return $this->setCalendarOption(__FUNCTION__, $space);
>>>>>>> origin/3.0
    }

    /**
     * The single-letter labels to use for Sunday through Saturday.
     *
<<<<<<< HEAD
     * @param  string        $days
     * @return CalendarChart
=======
     * @param  string $days
     * @return \Khill\Lavacharts\Charts\CalendarChart
     * @throws \Khill\Lavacharts\Exceptions\InvalidConfigValue
>>>>>>> origin/3.0
     */
    public function daysOfWeek($days)
    {
        if (is_string($days) === false) {
<<<<<<< HEAD
            throw $this->invalidConfigValue(
                __FUNCTION__,
=======
            throw new InvalidConfigValue(
                static::TYPE . '->' . __FUNCTION__,
>>>>>>> origin/3.0
                'string'
            );
        }

<<<<<<< HEAD
        return $this->addCalendarOption([__FUNCTION__ => $days]);
=======
        return $this->setCalendarOption(__FUNCTION__, $days);
>>>>>>> origin/3.0
    }

    /**
     * When the user focuses (say, by hovering) over a day square,
     * calendar charts will highlight the square.
     *
<<<<<<< HEAD
     * @param  Stroke        $stroke
     * @return CalendarChart
     */
    public function focusedCellColor(Stroke $stroke)
    {
        return $this->addCalendarOption($stroke->toArray(__FUNCTION__));
=======
     * @param  Stroke $strokeConfig
     * @return \Khill\Lavacharts\Charts\CalendarChart
     */
    public function focusedCellColor($strokeConfig)
    {
        return $this->setCalendarOption(__FUNCTION__, new Stroke($strokeConfig));
>>>>>>> origin/3.0
    }

    /**
     * Sets the style for the month labels.
     *
<<<<<<< HEAD
     * @param  TextStyle     $label
     * @return CalendarChart
     */
    public function monthLabel(TextStyle $label)
    {
        return $this->addCalendarOption($label->toArray(__FUNCTION__));
=======
     * @param  array $labelConfig
     * @return \Khill\Lavacharts\Charts\CalendarChart
     */
    public function monthLabel($labelConfig)
    {
        return $this->setCalendarOption(__FUNCTION__, new TextStyle($labelConfig));
>>>>>>> origin/3.0
    }

    /**
     * Months with data values are delineated from others using a border in this style.
     *
<<<<<<< HEAD
     * @param  Stroke        $stroke
     * @return CalendarChart
     */
    public function monthOutlineColor(Stroke $stroke)
    {
        return $this->addCalendarOption($stroke->toArray(__FUNCTION__));
=======
     * @param  array $strokeConfig
     * @return \Khill\Lavacharts\Charts\CalendarChart
     */
    public function monthOutlineColor($strokeConfig)
    {
        return $this->setCalendarOption(__FUNCTION__, new Stroke($strokeConfig));
>>>>>>> origin/3.0
    }

    /**
     * The number of pixels between the bottom of the month labels and
     * the top of the day squares.
     *
<<<<<<< HEAD
     * @param  integer           $space
     * @return CalendarChart
=======
     * @param  int $space
     * @return \Khill\Lavacharts\Charts\CalendarChart
     * @throws \Khill\Lavacharts\Exceptions\InvalidConfigValue
>>>>>>> origin/3.0
     */
    public function underMonthSpace($space)
    {
        if (is_int($space) === false) {
<<<<<<< HEAD
            throw $this->invalidConfigValue(
=======
            throw new InvalidConfigValue(
>>>>>>> origin/3.0
                __FUNCTION__,
                'int'
            );
        }

<<<<<<< HEAD
        return $this->addCalendarOption([__FUNCTION__ => $space]);
=======
        return $this->setCalendarOption(__FUNCTION__, $space);
>>>>>>> origin/3.0
    }

    /**
     * The number of pixels between the bottom-most year label and
     * the bottom of the chart.
     *
<<<<<<< HEAD
     * @param  integer           $space
     * @return CalendarChart
=======
     * @param  integer $space
     * @return \Khill\Lavacharts\Charts\CalendarChart
     * @throws \Khill\Lavacharts\Exceptions\InvalidConfigValue
>>>>>>> origin/3.0
     */
    public function underYearSpace($space)
    {
        if (is_int($space) === false) {
<<<<<<< HEAD
            throw $this->invalidConfigValue(
=======
            throw new InvalidConfigValue(
>>>>>>> origin/3.0
                __FUNCTION__,
                'int'
            );
        }

<<<<<<< HEAD
        return $this->addCalendarOption([__FUNCTION__ => $space]);
=======
        return $this->setCalendarOption(__FUNCTION__, $space);
>>>>>>> origin/3.0
    }

    /**
     * Months without data values are delineated from others using a border in this style.
     *
<<<<<<< HEAD
     * @param  Stroke        $stroke
     * @return CalendarChart
     */
    public function unusedMonthOutlineColor(Stroke $stroke)
    {
        return $this->addCalendarOption($stroke->toArray(__FUNCTION__));
=======
     * @param  array $strokeConfig
     * @return \Khill\Lavacharts\Charts\CalendarChart
     */
    public function unusedMonthOutlineColor($strokeConfig)
    {
        return $this->setCalendarOption(__FUNCTION__, new Stroke($strokeConfig));
>>>>>>> origin/3.0
    }

    /**
     * Draws the chart inside an inline frame.
     * Note that on IE8, this option is ignored; all IE8 charts are drawn in i-frames.
     *
<<<<<<< HEAD
     * @param  bool          $iframe
     * @return CalendarChart
=======
     * @param  bool $iframe
     * @return \Khill\Lavacharts\Charts\CalendarChart
     * @throws \Khill\Lavacharts\Exceptions\InvalidConfigValue
>>>>>>> origin/3.0
     */
    public function forceIFrame($iframe)
    {
        if (is_bool($iframe) === false) {
<<<<<<< HEAD
            throw $this->invalidConfigValue(
=======
            throw new InvalidConfigValue(
>>>>>>> origin/3.0
                __FUNCTION__,
                'bool'
            );
        }

<<<<<<< HEAD
        return $this->addCalendarOption([__FUNCTION__ => $iframe]);
=======
        return $this->setCalendarOption(__FUNCTION__, $iframe);
>>>>>>> origin/3.0
    }

    /**
     * An object that specifies a mapping between color column values and colors or a gradient scale.
     *
<<<<<<< HEAD
     * @param  Color         $color
     * @return CalendarChart
     */
    public function noDataPattern(Color $color)
    {
        return $this->addOption($color->toArray(__FUNCTION__));
=======
     * @param  array $colorConfig
     * @return \Khill\Lavacharts\Charts\CalendarChart
     */
    public function noDataPattern($colorConfig)
    {
        return $this->setOption(__FUNCTION__, new Color($colorConfig));
>>>>>>> origin/3.0
    }
}
