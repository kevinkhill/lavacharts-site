<?php

namespace Khill\Lavacharts\Traits;

use \Khill\Lavacharts\Configs\Annotation;

trait AnnotationsTrait
{
    /**
     * Defines how chart annotations will be displayed.
     *
<<<<<<< HEAD
     * @param  \Khill\Lavacharts\Configs\Annotation $annotation
     * @return \Khill\Lavacharts\Charts\Chart
     */
    public function annotations(Annotation $annotation)
    {
        return $this->addOption($annotation->toArray(__FUNCTION__));
=======
     * @param  array $annotationConfig
     * @return \Khill\Lavacharts\Charts\Chart
     */
    public function annotations($annotationConfig)
    {
        return $this->setOption(__FUNCTION__, new Annotation($annotationConfig));
>>>>>>> origin/3.0
    }
}
