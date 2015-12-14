<?php

namespace Khill\Lavacharts\Traits;

<<<<<<< HEAD
use \Khill\Lavacharts\Utils;
=======

>>>>>>> origin/3.0

trait AxisTitlesPositionTrait
{
    /**
     * Where to place the axis titles, compared to the chart area.
     *
     * Supported values:
     * in   - Draw the axis titles inside the the chart area.
     * out  - Draw the axis titles outside the chart area.
     * none - Omit the axis titles.
     *
     * @param  string $position Accepted values [in|out|none]
     * @throws \Khill\Lavacharts\Exceptions\InvalidConfigValue
     * @return \Khill\Lavacharts\Charts\Chart
     */
    public function axisTitlesPosition($position)
    {
        $values = [
            'in',
            'out',
            'none'
        ];

<<<<<<< HEAD
        if (in_array($position, $values, true) === false) {
            throw $this->invalidConfigValue(
                __FUNCTION__,
                'string',
                'with a value of '.Utils::arrayToPipedString($values)
            );
        }

        return $this->addOption([__FUNCTION__ => $position]);
=======
        return $this->setStringInArrayOption(__FUNCTION__, $position, $values);
>>>>>>> origin/3.0
    }
}
