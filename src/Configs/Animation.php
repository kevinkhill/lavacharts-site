<?php

namespace Khill\Lavacharts\Configs;

<<<<<<< HEAD
use \Khill\Lavacharts\Utils;
use \Khill\Lavacharts\Exceptions\InvalidConfigValue;
=======
use \Khill\Lavacharts\JsonConfig;
use \Khill\Lavacharts\Options;
>>>>>>> origin/3.0

/**
 * Animation ConfigObject
 *
 * An object containing all the values for the Animation which can
 * be passed into the chart's options.
 *
 *
<<<<<<< HEAD
 * @package    Lavacharts
=======
 * @package    Khill\Lavacharts
>>>>>>> origin/3.0
 * @subpackage Configs
 * @since      2.2.0
 * @author     Kevin Hill <kevinkhill@gmail.com>
 * @copyright  (c) 2015, KHill Designs
 * @link       http://github.com/kevinkhill/lavacharts GitHub Repository Page
 * @link       http://lavacharts.com                   Official Docs Site
 * @license    http://opensource.org/licenses/MIT MIT
 */
<<<<<<< HEAD
class Animation extends ConfigObject
{
    /**
     * The duration of the animation, in milliseconds.
     *
     * @var int
     */
    public $duration;

    /**
     * The easing function applied to the animation.
     *
     * @var string
     */
    public $easing;

    /**
     * Determines if the chart will animate on the initial draw.
     *
     * @var bool
     */
    public $startup;
=======
class Animation extends JsonConfig
{
    /**
     * Type of JsonConfig object
     *
     * @var string
     */
    const TYPE = 'Animation';

    /**
     * Default options for Animation
     *
     * @var array
     */
    private $defaults = [
        'duration',
        'easing',
        'startup'
    ];
>>>>>>> origin/3.0

    /**
     * Builds the Animation object.
     *
     * @param  array $config Associative array containing key => value pairs for the various configuration options.
     * @throws \Khill\Lavacharts\Exceptions\InvalidConfigValue
     * @throws \Khill\Lavacharts\Exceptions\InvalidConfigProperty
<<<<<<< HEAD
     * @return self
     */
    public function __construct($config = [])
    {
        parent::__construct($this, $config);
=======
     */
    public function __construct($config = [])
    {
        $options = new Options($this->defaults);

        parent::__construct($options, $config);
>>>>>>> origin/3.0
    }

    /**
     * The duration of the animation, in milliseconds.
     *
     * For details, see the animation documentation.
     *
     * @see    https://developers.google.com/chart/interactive/docs/animation
<<<<<<< HEAD
     * @param  integer       $d
     * @return self
     */
    public function duration($d)
    {
        if (is_int($d)) {
            $this->duration = $d;
        } else {
            throw new InvalidConfigValue(
                __FUNCTION__,
                'int'
            );
        }

        return $this;
=======
     * @param  integer $duration
     * @return \Khill\Lavacharts\Configs\Animation
     * @throws \Khill\Lavacharts\Exceptions\InvalidConfigValue
     */
    public function duration($duration)
    {
        return $this->setIntOption(__FUNCTION__, $duration);
>>>>>>> origin/3.0
    }

    /**
     * The easing function applied to the animation.
     *
     * The following options are available:
     * 'linear' - Constant speed.
     * 'in' - Ease in - Start slow and speed up.
     * 'out' - Ease out - Start fast and slow down.
     * 'inAndOut' - Ease in and out - Start slow, speed up, then slow down.
     *
<<<<<<< HEAD
     * @param  string    $e
     * @return self
     */
    public function easing($e)
=======
     * @param  string $easing
     * @return \Khill\Lavacharts\Configs\Animation
     * @throws \Khill\Lavacharts\Exceptions\InvalidConfigValue
     */
    public function easing($easing)
>>>>>>> origin/3.0
    {
        $values = [
            'linear',
            'in',
            'out',
            'inAndOut'
        ];

<<<<<<< HEAD
        if (in_array($e, $values, true)) {
            $this->easing = $e;
        } else {
            throw new InvalidConfigValue(
                __FUNCTION__,
                'string',
                'with a value of '.Utils::arrayToPipedString($values)
            );
        }

        return $this;
=======
        return $this->setStringInArrayOption(__FUNCTION__, $easing, $values);
>>>>>>> origin/3.0
    }

    /**
     * Determines if the chart will animate on the initial draw.
     *
     * If true, the chart will start at the baseline and animate to its final state.
     *
<<<<<<< HEAD
     * @param  bool       $s
     * @return self
     */
    public function startup($s)
    {
        if (is_bool($s)) {
            $this->startup = $s;
        } else {
            throw new InvalidConfigValue(
                __FUNCTION__,
                'bool'
            );
        }

        return $this;
=======
     * @param  bool $startup
     * @return \Khill\Lavacharts\Configs\Animation
     * @throws \Khill\Lavacharts\Exceptions\InvalidConfigValue
     */
    public function startup($startup)
    {
        return $this->setBoolOption(__FUNCTION__, $startup);
>>>>>>> origin/3.0
    }
}
