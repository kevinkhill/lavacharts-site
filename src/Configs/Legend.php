<?php

namespace Khill\Lavacharts\Configs;

<<<<<<< HEAD:src/Configs/Legend.php
use \Khill\Lavacharts\Utils;
use \Khill\Lavacharts\Exceptions\InvalidConfigValue;
=======
use \Khill\Lavacharts\JsonConfig;
use \Khill\Lavacharts\Options;
>>>>>>> origin/3.0:src/Configs/Legend.php

/**
 * Legend ConfigObject
 *
 * An object containing all the values for the legend which can be
 * passed into the chart's options.
 *
 *
 * @package    Khill\Lavacharts
 * @subpackage Configs
 * @author     Kevin Hill <kevinkhill@gmail.com>
 * @copyright  (c) 2015, KHill Designs
 * @link       http://github.com/kevinkhill/lavacharts GitHub Repository Page
 * @link       http://lavacharts.com                   Official Docs Site
 * @license    http://opensource.org/licenses/MIT MIT
 */
<<<<<<< HEAD:src/Configs/Legend.php
class Legend extends ConfigObject
=======
class Legend extends JsonConfig
>>>>>>> origin/3.0:src/Configs/Legend.php
{
    /**
     * Type of JsonConfig object
     *
     * @var string
     */
    const TYPE = 'Legend';

    /**
     * Default options for Legend
     *
     * @var array
     */
    private $defaults = [
        'position',
        'alignment',
        'textStyle'
    ];

    /**
     * Builds the legend object when passed an array of configuration options.
     *
<<<<<<< HEAD:src/Configs/Legend.php
     * @param  array                 $config Options for the legend
     * @throws \Khill\Lavacharts\Exceptions\InvalidConfigValue
     * @throws \Khill\Lavacharts\Exceptions\InvalidConfigProperty
     * @return self
=======
     * @param  array $config Options for the legend
     * @throws \Khill\Lavacharts\Exceptions\InvalidConfigValue
     * @throws \Khill\Lavacharts\Exceptions\InvalidConfigProperty
>>>>>>> origin/3.0:src/Configs/Legend.php
     */
    public function __construct($config = [])
    {
        $options = new Options($this->defaults);

        parent::__construct($options, $config);
    }

    /**
     * Sets the position of the legend.
     *
     * Can be one of the following:
     * 'right'  - To the right of the chart. Incompatible with the vAxes option.
     * 'top'    - Above the chart.
     * 'bottom' - Below the chart.
     * 'in'     - Inside the chart, by the top left corner.
     * 'none'   - No legend is displayed.
     *
     * @param  string $position Location of legend.
<<<<<<< HEAD:src/Configs/Legend.php
     * @return self
=======
     * @return \Khill\Lavacharts\Configs\Legend
     * @throws \Khill\Lavacharts\Exceptions\InvalidConfigValue
>>>>>>> origin/3.0:src/Configs/Legend.php
     */
    public function position($position)
    {
        $values = [
            'right',
            'top',
            'bottom',
            'in',
            'none'
        ];

<<<<<<< HEAD:src/Configs/Legend.php
        if (is_string($position) && in_array($position, $values)) {
            $this->position = $position;
        } else {
            throw new InvalidConfigValue(
                __FUNCTION__,
                'string',
                'with a value of '.Utils::arrayToPipedString($values)
            );
        }

        return $this;
=======
        return $this->setStringInArrayOption(__FUNCTION__, $position, $values);
>>>>>>> origin/3.0:src/Configs/Legend.php
    }

    /**
     * Sets the alignment of the legend.
     *
     * Can be one of the following:
     * 'start'  - Aligned to the start of the area allocated for the legend.
     * 'center' - Centered in the area allocated for the legend.
     * 'end'    - Aligned to the end of the area allocated for the legend.
     *
     * Start, center, and end are relative to the style -- vertical or horizontal -- of the legend.
     * For example, in a 'right' legend, 'start' and 'end' are at the top and bottom, respectively;
     * for a 'top' legend, 'start' and 'end' would be at the left and right of the area, respectively.
     *
     * The default value depends on the legend's position. For 'bottom' legends,
     * the default is 'center'; other legends default to 'start'.
     *
     * @param  string $alignment Alignment of the legend.
<<<<<<< HEAD:src/Configs/Legend.php
     * @return self
=======
     * @return \Khill\Lavacharts\Configs\Legend
     * @throws \Khill\Lavacharts\Exceptions\InvalidConfigValue
>>>>>>> origin/3.0:src/Configs/Legend.php
     */
    public function alignment($alignment)
    {
        $values = [
            'start',
            'center',
            'end'
        ];
<<<<<<< HEAD:src/Configs/Legend.php

        if (is_string($alignment) && in_array($alignment, $values)) {
            $this->alignment = $alignment;
        } else {
            throw new InvalidConfigValue(
                __FUNCTION__,
                'string',
                'with a value of '.Utils::arrayToPipedString($values)
            );
        }
=======
>>>>>>> origin/3.0:src/Configs/Legend.php

        return $this->setStringInArrayOption(__FUNCTION__, $alignment, $values);
    }

    /**
     * An array that specifies the legend text style options.
     *
<<<<<<< HEAD:src/Configs/Legend.php
     * @param  TextStyle $textStyle Style of the legend
     * @return self
=======
     * @param  array $textStyleConfig
     * @return \Khill\Lavacharts\Configs\Legend
     * @throws \Khill\Lavacharts\Exceptions\InvalidConfigValue
>>>>>>> origin/3.0:src/Configs/Legend.php
     */
    public function textStyle($textStyleConfig)
    {
        return $this->setOption(__FUNCTION__, new TextStyle($textStyleConfig));
    }
}
