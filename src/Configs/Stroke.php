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
 * Stroke Object
 *
 * An object that specifies a the color, thickness and opacity of borders in charts.
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
class Stroke extends ConfigObject
{
    /**
     * Color to assign the stroke.
     *
     * @var string
     */
    public $stroke;

    /**
     * Opacity of the stroke.
     *
     * @var float
     */
    public $strokeOpacity;

    /**
     * Width of the stroke, in pixels.
     *
     * @var int
     */
    public $strokeWidth;
=======
class Stroke extends JsonConfig
{
    /**
     * Type of JsonConfig object
     *
     * @var string
     */
    const TYPE = 'TextStyle';

    /**
     * Default options for TextStyles
     *
     * @var array
     */
    private $defaults = [
        'stroke',
        'strokeOpacity',
        'strokeWidth'
    ];
>>>>>>> origin/3.0

    /**
     * Builds the Stroke object with specified options
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
     * @return \Khill\Lavacharts\Configs\Stroke
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
     * Sets the color of the stroke.
     *
<<<<<<< HEAD
     * @param  string            $stroke A valid html color string
     * @throws \Khill\Lavacharts\Exceptions\InvalidConfigValue
     * @return self
     */
    public function stroke($s)
    {
        if (is_string($s)) {
            $this->stroke = $s;
        } else {
            throw new InvalidConfigValue(
                __FUNCTION__,
                'string'
            );
        }

        return $this;
=======
     * @param  string $stroke A valid html color string
     * @return \Khill\Lavacharts\Configs\Stroke
     * @throws \Khill\Lavacharts\Exceptions\InvalidConfigValue
     */
    public function stroke($stroke)
    {
        return $this->setStringOption(__FUNCTION__, $stroke);
>>>>>>> origin/3.0
    }

    /**
     * Sets the opacity of the stroke.
     *
<<<<<<< HEAD
     * @param  float             $strokeOpacity
     * @throws \Khill\Lavacharts\Exceptions\InvalidConfigValue
     * @return self
     */
    public function strokeOpacity($so)
    {
        if (Utils::between(0.0, $so, 1.0, true)) {
            $this->strokeOpacity = (float) $so;
        } else {
            throw new InvalidConfigValue(
                __FUNCTION__,
                'float'
            );
        }

        return $this;
=======
     * @param  float $strokeOpacity
     * @return \Khill\Lavacharts\Configs\Stroke
     * @throws \Khill\Lavacharts\Exceptions\InvalidConfigValue
     */
    public function strokeOpacity($strokeOpacity)
    {
        if (Utils::between(0.0, $strokeOpacity, 1.0, true) === false) {
            throw new InvalidConfigValue(
                __FUNCTION__,
                'float',
                'between 0.0 and 1.0'
            );
        }

        return $this->setOption(__FUNCTION__, $strokeOpacity);
>>>>>>> origin/3.0
    }

    /**
     * Sets the width of the stroke.
     *
<<<<<<< HEAD
     * @param  integer                $sw
     * @throws \Khill\Lavacharts\Exceptions\InvalidConfigValue
     * @return self
     */
    public function strokeWidth($sw)
    {
        if (is_int($sw)) {
            $this->strokeWidth = $sw;
        } else {
            throw new InvalidConfigValue(
                __FUNCTION__,
                'int'
            );
        }

        return $this;
=======
     * @param  int $strokeWidth
     * @return \Khill\Lavacharts\Configs\Stroke
     * @throws \Khill\Lavacharts\Exceptions\InvalidConfigValue
     */
    public function strokeWidth($strokeWidth)
    {
        return $this->setIntOption(__FUNCTION__, $strokeWidth);
>>>>>>> origin/3.0
    }
}
