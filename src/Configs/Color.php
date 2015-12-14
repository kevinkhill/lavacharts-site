<?php

namespace Khill\Lavacharts\Configs;

<<<<<<< HEAD
=======
use \Khill\Lavacharts\JsonConfig;
use \Khill\Lavacharts\Options;
>>>>>>> origin/3.0
use \Khill\Lavacharts\Utils;
use \Khill\Lavacharts\Exceptions\InvalidConfigValue;

/**
 * Color Object
 *
 * Calendar charts use a striped diagonal pattern to indicate that there is no data for a particular day.
 * Use this object with backgroundColor and color options to override the grayscale defaults.
 *
 *
<<<<<<< HEAD
 * @package    Lavacharts
=======
 * @package    Khill\Lavacharts
>>>>>>> origin/3.0
 * @subpackage Configs
 * @since      2.1.0
 * @author     Kevin Hill <kevinkhill@gmail.com>
 * @copyright  (c) 2015, KHill Designs
 * @link       http://github.com/kevinkhill/lavacharts GitHub Repository Page
 * @link       http://lavacharts.com                   Official Docs Site
 * @license    http://opensource.org/licenses/MIT MIT
 */
<<<<<<< HEAD
class Color extends ConfigObject
{
    /**
     * Foreground color.
     *
     * @var string
     */
    public $color;

    /**
     * Background color.
     *
     * @var string
     */
    public $backgroundColor;

    /**
     * Opacity.
     *
     * @var float
     */
    public $opacity;
=======
class Color extends JsonConfig
{
    /**
     * Type of JsonConfig object
     *
     * @var string
     */
    const TYPE = 'Color';

    /**
     * Default options for Color
     *
     * @var array
     */
    private $defaults = [
        'color',
        'backgroundColor',
        'opacity'
    ];
>>>>>>> origin/3.0

    /**
     * Builds the Color object with specified options
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
=======
     * @param  array $config
     * @return \Khill\Lavacharts\Configs\Color
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
     * Specifies the foreground color.
     *
<<<<<<< HEAD
     * @param  string             $fgColor
     * @throws \Khill\Lavacharts\Exceptions\InvalidConfigValue
     * @return self
     */
    public function color($fgColor)
    {
        if (is_string($fgColor)) {
            $this->color = $fgColor;
        } else {
            throw new InvalidConfigValue(
                __FUNCTION__,
                'string'
            );
        }

        return $this;
=======
     * @param  string $fgColor
     * @return \Khill\Lavacharts\Configs\Color
     * @throws \Khill\Lavacharts\Exceptions\InvalidConfigValue
     */
    public function color($fgColor)
    {
        return $this->setStringOption(__FUNCTION__, $fgColor);
>>>>>>> origin/3.0
    }

    /**
     * Specifies the background color.
     *
<<<<<<< HEAD
     * @param  string             $bgColor
     * @throws \Khill\Lavacharts\Exceptions\InvalidConfigValue
     * @return self
     */
    public function backgroundColor($bgColor)
    {
        if (is_string($bgColor)) {
            $this->backgroundColor = $bgColor;
        } else {
            throw new InvalidConfigValue(
                __FUNCTION__,
                'string'
            );
        }

        return $this;
=======
     * @param  string $bgColor
     * @return \Khill\Lavacharts\Configs\Color
     * @throws \Khill\Lavacharts\Exceptions\InvalidConfigValue
     */
    public function backgroundColor($bgColor)
    {
        return $this->setStringOption(__FUNCTION__, $bgColor);
>>>>>>> origin/3.0
    }

    /**
     * Opacity, with 0.0 being fully transparent and 1.0 fully opaque.
     *
     * @param  float $opacity
<<<<<<< HEAD
     * @return self
     */
    public function opacity($opacity)
    {
        if (Utils::between(0.0, $opacity, 1.0, true)) {
            $this->opacity = $opacity;
        } else {
=======
     * @return \Khill\Lavacharts\Configs\Color
     * @throws \Khill\Lavacharts\Exceptions\InvalidConfigValue
     */
    public function opacity($opacity)
    {
        if (Utils::between(0.0, $opacity, 1.0, true) === false) {
>>>>>>> origin/3.0
            throw new InvalidConfigValue(
                __FUNCTION__,
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
}
