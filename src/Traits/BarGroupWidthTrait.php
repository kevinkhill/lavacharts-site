<?php

namespace Khill\Lavacharts\Traits;

use \Khill\Lavacharts\Utils;
<<<<<<< HEAD
=======
use \Khill\Lavacharts\Exceptions\InvalidConfigValue;
>>>>>>> origin/3.0

trait BarGroupWidthTrait
{
    /**
     * The width of a group of bars, specified in either of these formats:
<<<<<<< HEAD
     *
=======
>>>>>>> origin/3.0
     * - Pixels (e.g. 50).
     * - Percentage of the available width for each group (e.g. '20%'),
     *   where '100%' means that groups have no space between them.
     *
<<<<<<< HEAD
     * @param  integer|string $barGroupWidth
     * @throws \Khill\Lavacharts\Exceptions\InvalidConfigValue
     * @return \Khill\Lavacharts\Charts\Chart
=======
     * @param  int|string $barGroupWidth
     * @return \Khill\Lavacharts\Charts\Chart
     * @throws \Khill\Lavacharts\Exceptions\InvalidConfigValue
>>>>>>> origin/3.0
     */
    public function barGroupWidth($barGroupWidth)
    {
        if (Utils::isIntOrPercent($barGroupWidth) === false) {
<<<<<<< HEAD
            throw $this->invalidConfigValue(
                __FUNCTION__,
                'string | int',
                'must be a valid int or percent [ 50 | 65% ]'
            );
        }

        return $this->addOption([
            __FUNCTION__ => [
                'groupWidth' => $barGroupWidth
            ]
=======
            throw new InvalidConfigValue(
                static::TYPE . '->' . __FUNCTION__,
                'int|string',
                'String only if representing a percent. "50%"'
            );
        }

        return $this->setOption(__FUNCTION__, [
            'groupWidth' => $barGroupWidth
>>>>>>> origin/3.0
        ]);
    }
}
