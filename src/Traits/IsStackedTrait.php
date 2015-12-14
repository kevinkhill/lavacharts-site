<?php

namespace Khill\Lavacharts\Traits;

trait IsStackedTrait
{
    /**
     * If set to true, series elements are stacked.
     *
<<<<<<< HEAD
     * @param  boolean $isStacked
=======
     * @param  bool $isStacked
>>>>>>> origin/3.0
     * @throws \Khill\Lavacharts\Exceptions\InvalidConfigValue
     * @return \Khill\Lavacharts\Charts\Chart
     */
    public function isStacked($isStacked)
    {
<<<<<<< HEAD
        if (is_bool($isStacked) === false) {
            throw $this->invalidConfigValue(
                __FUNCTION__,
                'bool'
            );
        }

        return $this->addOption([__FUNCTION__ => $isStacked]);
=======
        return $this->setBoolOption(__FUNCTION__, $isStacked);
>>>>>>> origin/3.0
    }
}
