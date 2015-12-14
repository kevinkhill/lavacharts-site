<?php

namespace Khill\Lavacharts\Traits;

use \Khill\Lavacharts\Utils;
<<<<<<< HEAD
=======
use \Khill\Lavacharts\Configs\HorizontalAxis;
use \Khill\Lavacharts\Exceptions\InvalidConfigValue;
>>>>>>> origin/3.0

trait HorizontalAxesTrait
{
    /**
     * Specifies properties for individual horizontal axes, if the chart has multiple horizontal axes.
<<<<<<< HEAD
     *
     * Each child object is a hAxis object, and can contain all the properties supported by hAxis.
     * These property values override any global settings for the same property.
     *
     * To specify a chart with multiple horizontal axes, first define a new axis using series.targetAxisIndex,
     * then configure the axis using hAxes.
     *
     * @param  array $arr Array of HorizontalAxis objects
     * @throws \Khill\Lavacharts\Exceptions\InvalidConfigValue
     * @return \Khill\Lavacharts\Charts\Chart
     */
    public function hAxes($arr)
    {
        if (Utils::arrayValuesCheck($arr, 'class', 'HorizontalAxis') === false) {
            throw $this->invalidConfigValue(
                __FUNCTION__,
                'array',
                'of HorizontalAxis Objects'
            );
        }

        return $this->addOption([__FUNCTION__ => $arr]);
=======
     * Each child object is a hAxis object, and can contain all the properties supported by hAxis.
     * These property values override any global settings for the same property.
     * To specify a chart with multiple horizontal axes, first define a new axis using series.targetAxisIndex,
     * then configure the axis using hAxes.
     *
     * @param  array $hAxisConfigArray Array of HorizontalAxis configuration arrays
     * @return \Khill\Lavacharts\Charts\Chart
     * @throws \Khill\Lavacharts\Exceptions\InvalidConfigValue
     */
    public function hAxes($hAxisConfigArray)
    {
        if (Utils::arrayIsMulti($hAxisConfigArray) === false) {
            throw new InvalidConfigValue(
                static::TYPE . '->' . __FUNCTION__,
                'array',
                'With arrays of HorizontalAxis options.'
            );
        }

        $hAxes = [];

        foreach ($hAxisConfigArray as $hAxisConfig) {
            $hAxes[] = new HorizontalAxis($hAxisConfig);
        }

        return $this->setOption(__FUNCTION__, $hAxes);
>>>>>>> origin/3.0
    }
}
