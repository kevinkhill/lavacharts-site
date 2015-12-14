<?php

namespace Khill\Lavacharts\Traits;

use \Khill\Lavacharts\Utils;
<<<<<<< HEAD
=======
use \Khill\Lavacharts\Exceptions\InvalidConfigValue;
>>>>>>> origin/3.0

trait AreaOpacityTrait
{
    /**
     * The default opacity of the colored area under a chart series
     *
     * 0.0 is fully transparent and 1.0 is fully opaque. To specify opacity for
     * an individual series, set the areaOpacity value in the series property.
     *
     * @param  float $areaOpacity
     * @throws \Khill\Lavacharts\Exceptions\InvalidConfigValue
     * @return \Khill\Lavacharts\Charts\Chart
     */
    public function areaOpacity($areaOpacity)
    {
        if (Utils::between(0.0, $areaOpacity, 1.0)  === false) {
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
        return $this->addOption([__FUNCTION__ => $areaOpacity]);
=======
        return $this->setOption(__FUNCTION__, $areaOpacity);
>>>>>>> origin/3.0
    }
}
