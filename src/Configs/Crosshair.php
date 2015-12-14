<?php

namespace Khill\Lavacharts\Configs;

<<<<<<< HEAD
use \Khill\Lavacharts\Utils;

=======
use \Khill\Lavacharts\JsonConfig;
use \Khill\Lavacharts\Options;
use \Khill\Lavacharts\Utils;
>>>>>>> origin/3.0
use \Khill\Lavacharts\Exceptions\InvalidConfigValue;

/**
 * Crosshair ConfigObject
 *
 * An object containing the crosshair properties for the chart.
 *
 *
<<<<<<< HEAD
 * @package    Lavacharts
=======
 * @package    Khill\Lavacharts
>>>>>>> origin/3.0
 * @subpackage Configs
 * @since      3.0.0
 * @author     Kevin Hill <kevinkhill@gmail.com>
 * @copyright  (c) 2015, KHill Designs
 * @link       http://github.com/kevinkhill/lavacharts GitHub Repository Page
 * @link       http://lavacharts.com                   Official Docs Site
 * @license    http://opensource.org/licenses/MIT MIT
 */
<<<<<<< HEAD
class Crosshair extends ConfigObject
{
    /**
     * Foreground color.
     *
     * @var string
     */
    public $color;

    /**
     * Focused color.
     *
     * @var
     */
    public $focused;

    /**
     * Crosshair opacity.
     *
     * @var float
     */
    public $opacity;

    /**
     * Crosshair orientation.
     *
     * @var string
     */
    public $orientation;

    /**
     * Focused color.
     *
     * @var
     */
    public $selected;

    /**
     * Crosshair trigger.
     *
     * @var string
     */
    public $trigger;
=======
class Crosshair extends JsonConfig
{
    /**
     * Common Methods
     */
    use \Khill\Lavacharts\Traits\ColorTrait;
    use \Khill\Lavacharts\Traits\OpacityTrait;

    /**
     * Type of JsonConfig object
     *
     * @var string
     */
    const TYPE = 'Crosshair';

    /**
     * Default options for Crosshair
     *
     * @var array
     */
    private $defaults = [
        'color',
        'focused',
        'opacity',
        'orientation',
        'selected',
        'trigger'
    ];
>>>>>>> origin/3.0

    /**
     * Stores all the information about the crosshair.
     *
     * All options can be set either by passing an array with associative
     * values for option => value, or by chaining together the functions
     * once an object has been created.
     *
<<<<<<< HEAD
     * @param  array                 $config
     * @throws \Khill\Lavacharts\Exceptions\InvalidConfigValue
     * @throws \Khill\Lavacharts\Exceptions\InvalidConfigProperty
     * @return self
     */
    public function __construct($config = [])
    {
        parent::__construct($this, $config);

        $this->options = array_merge(
            $this->options,
            [
                'color',
                'focused',
                'opacity',
                'orientation',
                'selected',
                'trigger'
            ]
        );
    }

    /**
     * Specifies the crosshair color.
     *
     * @param  string             $color
     * @throws \Khill\Lavacharts\Exceptions\InvalidConfigValue
     * @return self
     */
    public function color($color)
    {
        if (is_string($color)) {
            $this->color = $color;
        } else {
            throw new InvalidConfigValue(
                __FUNCTION__,
                'string'
            );
        }

        return $this;
=======
     * @param  array $config
     * @return \Khill\Lavacharts\Configs\Crosshair
     * @throws \Khill\Lavacharts\Exceptions\InvalidConfigValue
     * @throws \Khill\Lavacharts\Exceptions\InvalidConfigProperty
     */
    public function __construct($config = [])
    {
        $options = new Options($this->defaults);

        parent::__construct($options, $config);
>>>>>>> origin/3.0
    }

    /**
     * An object that specifies the crosshair focused color.
     *
<<<<<<< HEAD
     * @param  Color     $color
     * @return self
     */
    public function focused(Color $color)
    {
        $this->focused = $color->getValues();

        return $this;
=======
     * @param  array $colorConfig
     * @return \Khill\Lavacharts\Configs\Crosshair
     * @throws \Khill\Lavacharts\Exceptions\InvalidConfigValue
     */
    public function focused($colorConfig)
    {
        return $this->setOption(__FUNCTION__, new Color($colorConfig));
>>>>>>> origin/3.0
    }

    /**
     * The crosshair opacity, with 0.0 being fully transparent and 1.0 fully opaque.
     *
<<<<<<< HEAD
     * @param  float     $opacity
     * @return self
     */
    public function opacity($opacity)
    {
        if (Utils::between(0.0, $opacity, 1.0, true)) {
            $this->opacity = $opacity;
        } else {
            throw new InvalidConfigValue(
                __FUNCTION__,
=======
     * @param  float $opacity
     * @return \Khill\Lavacharts\Configs\Crosshair
     * @throws \Khill\Lavacharts\Exceptions\InvalidConfigValue
     */
    public function opacity($opacity)
    {
        if (Utils::between(0.0, $opacity, 1.0) === false) {
            throw new InvalidConfigValue(
                static::TYPE . '->' . __FUNCTION__,
>>>>>>> origin/3.0
                'float',
                'between 0.0 - 1.0'
            );
        }

<<<<<<< HEAD
        return $this;
=======
        return $this->setOption(__FUNCTION__, $opacity);
>>>>>>> origin/3.0
    }

    /**
     * The crosshair orientation, which can be 'vertical' for vertical hairs only,
     * 'horizontal' for horizontal hairs only, or 'both' for traditional crosshairs.
     *
<<<<<<< HEAD
     * @param  string             $orientation
     * @throws \Khill\Lavacharts\Exceptions\InvalidConfigValue
     * @return self
=======
     * @param  string $orientation
     * @return \Khill\Lavacharts\Configs\Crosshair
     * @throws \Khill\Lavacharts\Exceptions\InvalidConfigValue
>>>>>>> origin/3.0
     */
    public function orientation($orientation)
    {
        $values = [
            'both',
            'horizontal',
            'vertical'
        ];

<<<<<<< HEAD
        if (in_array($orientation, $values, true)) {
            $this->orientation = $orientation;
        } else {
            throw new InvalidConfigValue(
                __FUNCTION__,
                'string',
                'with a value of '.Utils::arrayToPipedString($values)
            );
        }

        return $this;
=======
        return $this->setStringInArrayOption(__FUNCTION__, $orientation, $values);
>>>>>>> origin/3.0
    }

    /**
     * An object that specifies the crosshair selected color.
     *
<<<<<<< HEAD
     * @param  Color     $color
     * @return self
     */
    public function selected(Color $color)
    {
        $this->selected = $color->getValues();

        return $this;
=======
     * @param  array $colorConfig
     * @return \Khill\Lavacharts\Configs\Crosshair
     * @throws \Khill\Lavacharts\Exceptions\InvalidConfigValue
     */
    public function selected($colorConfig)
    {
        return $this->setOption(__FUNCTION__, new Color($colorConfig));
>>>>>>> origin/3.0
    }

    /**
     * When to display crosshairs: on 'focus', 'selection', or 'both'.
     *
<<<<<<< HEAD
     * @param  string             $trigger
     * @throws \Khill\Lavacharts\Exceptions\InvalidConfigValue
     * @return self
=======
     * @param  string $trigger
     * @return \Khill\Lavacharts\Configs\Crosshair
     * @throws \Khill\Lavacharts\Exceptions\InvalidConfigValue
>>>>>>> origin/3.0
     */
    public function trigger($trigger)
    {
        $values = [
            'both',
            'focus',
            'selection'
        ];

<<<<<<< HEAD
        if (in_array($trigger, $values, true)) {
            $this->trigger = $trigger;
        } else {
            throw new InvalidConfigValue(
                __FUNCTION__,
                'string',
                'with a value of '.Utils::arrayToPipedString($values)
            );
        }

        return $this;
=======
        return $this->setStringInArrayOption(__FUNCTION__, $trigger, $values);
>>>>>>> origin/3.0
    }
}
