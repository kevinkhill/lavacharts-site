<?php

namespace Khill\Lavacharts\Traits;

use \Khill\Lavacharts\Utils;
<<<<<<< HEAD
=======
use \Khill\Lavacharts\Exceptions\InvalidConfigValue;
>>>>>>> origin/3.0

trait DataOpacityTrait
{
    /**
     * The transparency of data points
     *
     * 1.0 being completely opaque and 0.0 fully transparent.
     *
     * @param  float $dataOpacity
     * @throws \Khill\Lavacharts\Exceptions\InvalidConfigValue
     * @return \Khill\Lavacharts\Charts\Chart
     */
    public function dataOpacity($dataOpacity)
    {
        if (Utils::between(0.0, $dataOpacity, 1.0) === false) {
<<<<<<< HEAD
            throw $this->invalidConfigValue(
                __FUNCTION__,
=======
            throw new InvalidConfigValue(
                static::TYPE . '->' . __FUNCTION__,
>>>>>>> origin/3.0
                'float',
                'between 0.0 - 1.0'
            );
        }

<<<<<<< HEAD
        return $this->addOption([__FUNCTION__ => $dataOpacity]);
=======
        return $this->setOption(__FUNCTION__, $dataOpacity);
>>>>>>> origin/3.0
    }
}
