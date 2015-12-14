<?php

namespace Khill\Lavacharts\Charts;

<<<<<<< HEAD:src/Charts/TreeMap.php
use \Khill\Lavacharts\Configs\DataTable;
=======
use \Khill\Lavacharts\Values\Label;
use \Khill\Lavacharts\Options;
use \Khill\Lavacharts\DataTables\DataTable;
>>>>>>> origin/3.0:src/Charts/TreeMap.php

/**
 * TreeMap Chart Class
 *
 * A visual representation of a data tree, where each node can have zero or more
 * children, and one parent (except for the root, which has no parents). Each
 * node is displayed as a rectangle, sized and colored according to values that
 * you assign. Sizes and colors are valued relative to all other nodes in the
 * graph. You can specify how many levels to display simultaneously, and
 * optionally to display deeper levels in a hinted fashion. If a node is a leaf
 * node, you can specify a size and color; if it is not a leaf, it will be
 * displayed as a bounding box for leaf nodes. The default behavior is to move
 * down the tree when a user left-clicks a node, and to move back up the tree
 * when a user right-clicks the graph.
 *
 * The total size of the graph is determined by the size of the containing
 * element that you insert in your page. If you have leaf nodes with names too
 * long to show, the name will be truncated with an ellipsis (...).
 *
 * @codeCoverageIgnore
<<<<<<< HEAD:src/Charts/TreeMap.php
 * @package    Lavacharts
=======
 * @package    Khill\Lavacharts
>>>>>>> origin/3.0:src/Charts/TreeMap.php
 * @subpackage Charts
 * @author     Kevin Hill <kevinkhill@gmail.com>
 * @copyright  (c) 2015, KHill Designs
 * @link       http://github.com/kevinkhill/lavacharts GitHub Repository Page
 * @link       http://lavacharts.com                   Official Docs Site
 * @license    http://opensource.org/licenses/MIT MIT
 */
class TreeMap extends Chart
{
    /**
     * Javascript chart type.
     *
     * @var string
     */
    const TYPE = 'TreeMap';

    /**
     * Javascript chart version.
     *
     * @var string
     */
<<<<<<< HEAD:src/Charts/TreeMap.php
    const VERSION = '';
=======
    const VERSION = '1';
>>>>>>> origin/3.0:src/Charts/TreeMap.php

    /**
     * Javascript chart package.
     *
     * @var string
     */
<<<<<<< HEAD:src/Charts/TreeMap.php
    const VIZ_PACKAGE = '';
=======
    const VIZ_PACKAGE = 'treemap';
>>>>>>> origin/3.0:src/Charts/TreeMap.php

    /**
     * Google's visualization class name.
     *
     * @var string
     */
<<<<<<< HEAD:src/Charts/TreeMap.php
    const VIZ_CLASS = 'google.visualization.';

    /**
     * Builds a new chart with the given label.
     *
     * @param  string $chartLabel Identifying label for the chart.
     * @param  \Khill\Lavacharts\Configs\DataTable $datatable Datatable used for the chart.
     * @return self
     */
    public function __construct($chartLabel, DataTable $datatable)
    {
        parent::__construct($chartLabel, $datatable);

        $this->defaults = array_merge([
            'headerColor',
            'headerHeight',
            'headerHighlightColor',
            'maxColor',
            'maxDepth',
            'maxHighlightColor',
            'maxPostDepth',
            'maxColorValue',
            'midColor',
            'midHighlightColor',
            'minColor',
            'minHighlightColor',
            'minColorValue',
            'noColor',
            'noHighlightColor',
            'showScale',
            'showTooltips',
            'fontColor',
            'fontFamily'
        ], $this->defaults);
=======
    const VIZ_CLASS = 'google.visualization.TreeMap';

    /**
     * Default configuration options for the chart.
     *
     * @var array
     */
    private $treeMapDefaults = [
        'fontColor',
        'fontFamily',
        'headerColor',
        'headerHeight',
        'headerHighlightColor',
        'maxColor',
        'maxDepth',
        'maxHighlightColor',
        'maxPostDepth',
        'maxColorValue',
        'midColor',
        'midHighlightColor',
        'minColor',
        'minHighlightColor',
        'minColorValue',
        'noColor',
        'noHighlightColor',
        'showScale',
        'showTooltips'
    ];

    /**
     * Builds a new TreeMapChart with the given label, datatable and options.
     *
     * @param  \Khill\Lavacharts\Values\Label         $chartLabel Identifying label for the chart.
     * @param  \Khill\Lavacharts\DataTables\DataTable $datatable DataTable used for the chart.
     * @param array                                   $config
     */
    public function __construct(Label $chartLabel, DataTable $datatable, $config = [])
    {
        $options = new Options($this->treeMapDefaults);

        parent::__construct($chartLabel, $datatable, $options, $config);
>>>>>>> origin/3.0:src/Charts/TreeMap.php
    }

    /**
     * The color of the header section for each node. Specify an HTML color value.
     *
     * @param  string $headerColor
<<<<<<< HEAD:src/Charts/TreeMap.php
     * @return self
=======
     * @return \Khill\Lavacharts\Charts\TreeMap
>>>>>>> origin/3.0:src/Charts/TreeMap.php
     */
    public function headerColor($headerColor)
    {
        return $this;
    }

    /**
     * The height of the header section for each node, in pixels (can be zero).
     *
     * @param  integer $headerHeight
<<<<<<< HEAD:src/Charts/TreeMap.php
     * @return self
=======
     * @return \Khill\Lavacharts\Charts\TreeMap
>>>>>>> origin/3.0:src/Charts/TreeMap.php
     */
    public function headerHeight($headerHeight)
    {
        return $this;
    }

    /**
     * The color of the header of a node being hovered over. Specify an HTML
     * color value or null; if null this value will be headerColor lightened
     * by 35%
     *
     * @param  string $headerHighlightColor
<<<<<<< HEAD:src/Charts/TreeMap.php
     * @return self
=======
     * @return \Khill\Lavacharts\Charts\TreeMap
>>>>>>> origin/3.0:src/Charts/TreeMap.php
     */
    public function headerHighlightColor($headerHighlightColor)
    {
        return $this;
    }

    /**
     * The color for a rectangle with a column 3 value of maxColorValue.
     * Specify an HTML color value.
     *
     * @param  string $maxColor
<<<<<<< HEAD:src/Charts/TreeMap.php
     * @return self
=======
     * @return \Khill\Lavacharts\Charts\TreeMap
>>>>>>> origin/3.0:src/Charts/TreeMap.php
     */
    public function maxColor($maxColor)
    {
        return $this;
    }

    /**
     * The maximum number of node levels to show in the current view. Levels
     * will be flattened into the current plane. If your tree has more levels
     * than this, you will have to go up or down to see them. You can
     * additionally see maxPostDepth levels below this as shaded rectangles
     * within these nodes.
     *
     * @param  integer $maxDepth
<<<<<<< HEAD:src/Charts/TreeMap.php
     * @return self
=======
     * @return \Khill\Lavacharts\Charts\TreeMap
>>>>>>> origin/3.0:src/Charts/TreeMap.php
     */
    public function maxDepth($maxDepth)
    {
        return $this;
    }

    /**
     * The highlight color to use for the node with the largest value in
     * column 3. Specify an HTML color value or null; If null, this value
     * will be the value of maxColor lightened by 35%.
     *
     * @param  string $maxHighlightColor
<<<<<<< HEAD:src/Charts/TreeMap.php
     * @return self
=======
     * @return \Khill\Lavacharts\Charts\TreeMap
>>>>>>> origin/3.0:src/Charts/TreeMap.php
     */
    public function maxHighlightColor($maxHighlightColor)
    {
        return $this;
    }

    /**
     * How many levels of nodes beyond maxDepth to show in "hinted" fashion.
     * Hinted nodes are shown as shaded rectangles within a node that is within
     * the maxDepth limit.
     *
     * @param  integer $maxPostDepth
<<<<<<< HEAD:src/Charts/TreeMap.php
     * @return self
=======
     * @return \Khill\Lavacharts\Charts\TreeMap
>>>>>>> origin/3.0:src/Charts/TreeMap.php
     */
    public function maxPostDepth($maxPostDepth)
    {
        return $this;
    }

    /**
     * The maximum value allowed in column 3. All values greater than this will
     * be trimmed to this value. If set to null, it will be set to the max value
     * in the column.
     *
     * @param  integer $maxColorValue
<<<<<<< HEAD:src/Charts/TreeMap.php
     * @return self
=======
     * @return \Khill\Lavacharts\Charts\TreeMap
>>>>>>> origin/3.0:src/Charts/TreeMap.php
     */
    public function maxColorValue($maxColorValue)
    {
        return $this;
    }

    /**
     * The color for a rectangle with a column 3 value midway between
     * maxColorValue and minColorValue. Specify an HTML color value.
     *
     * @param  string $midColor
<<<<<<< HEAD:src/Charts/TreeMap.php
     * @return self
=======
     * @return \Khill\Lavacharts\Charts\TreeMap
>>>>>>> origin/3.0:src/Charts/TreeMap.php
     */
    public function midColor($midColor)
    {
        return $this;
    }

    /**
     * The highlight color to use for the node with a column 3 value near the
     * median of minColorValue and maxColorValue. Specify an HTML color value
     * or null; if null, this value will be the value of midColor lightened
     * by 35%.
     *
     * @param  string $midHighlightColor
<<<<<<< HEAD:src/Charts/TreeMap.php
     * @return self
=======
     * @return \Khill\Lavacharts\Charts\TreeMap
>>>>>>> origin/3.0:src/Charts/TreeMap.php
     */
    public function midHighlightColor($midHighlightColor)
    {
        return $this;
    }

    /**
     * The color for a rectangle with the column 3 value of minColorValue.
     * Specify an HTML color value.
     *
     * @param  string $minColor
<<<<<<< HEAD:src/Charts/TreeMap.php
     * @return self
=======
     * @return \Khill\Lavacharts\Charts\TreeMap
>>>>>>> origin/3.0:src/Charts/TreeMap.php
     */
    public function minColor($minColor)
    {
        return $this;
    }

    /**
     * The highlight color to use for the node with a column 3 value nearest to
     * minColorValue. Specify an HTML color value or null; if null, this value
     * will be the value of minColor lightened by 35%.
     *
     * @param  string $minHighlightColor
<<<<<<< HEAD:src/Charts/TreeMap.php
     * @return self
=======
     * @return \Khill\Lavacharts\Charts\TreeMap
>>>>>>> origin/3.0:src/Charts/TreeMap.php
     */
    public function minHighlightColor($minHighlightColor)
    {
        return $this;
    }

    /**
     * The minimum value allowed in column 3. All values less than this will be
     * trimmed to this value. If set to null, it will be calculated as the
     * minimum value in the column.
     *
     * @param  integer $minColorValue
<<<<<<< HEAD:src/Charts/TreeMap.php
     * @return self
=======
     * @return \Khill\Lavacharts\Charts\TreeMap
>>>>>>> origin/3.0:src/Charts/TreeMap.php
     */
    public function minColorValue($minColorValue)
    {
        return $this;
    }

    /**
     * The color to use for a rectangle when a node has no value for column 3,
     * and that node is a leaf (or contains only leaves). Specify an HTML
     * color value.
     *
     * @param  string $noColor
<<<<<<< HEAD:src/Charts/TreeMap.php
     * @return self
=======
     * @return \Khill\Lavacharts\Charts\TreeMap
>>>>>>> origin/3.0:src/Charts/TreeMap.php
     */
    public function noColor($noColor)
    {
        return $this;
    }

    /**
     * The color to use for a rectangle of "no" color when highlighted. Specify
     * an HTML color value or null; if null, this will be the value of noColor
     * lightened by 35%.
     *
     * @param  string $noHighlightColor
<<<<<<< HEAD:src/Charts/TreeMap.php
     * @return self
=======
     * @return \Khill\Lavacharts\Charts\TreeMap
>>>>>>> origin/3.0:src/Charts/TreeMap.php
     */
    public function noHighlightColor($noHighlightColor)
    {
        return $this;
    }

    /**
     * Whether or not to show a color gradient scale from minColor to maxColor
     * along the top of the chart. Specify true to show the scale.
     *
     * @param  bool $showScale
<<<<<<< HEAD:src/Charts/TreeMap.php
     * @return self
=======
     * @return \Khill\Lavacharts\Charts\TreeMap
>>>>>>> origin/3.0:src/Charts/TreeMap.php
     */
    public function showScale($showScale)
    {
        return $this;
    }

    /**
     * Whether or not to show tooltips.
     *
     * @param  bool $showTooltips
<<<<<<< HEAD:src/Charts/TreeMap.php
     * @return self
=======
     * @return \Khill\Lavacharts\Charts\TreeMap
>>>>>>> origin/3.0:src/Charts/TreeMap.php
     */
    public function showTooltips($showTooltips)
    {
        return $this;
    }

    /**
     * The text color. Specify an HTML color value.
     *
     * @param  string $fontColor
<<<<<<< HEAD:src/Charts/TreeMap.php
     * @return self
=======
     * @return \Khill\Lavacharts\Charts\TreeMap
>>>>>>> origin/3.0:src/Charts/TreeMap.php
     */
    public function fontColor($fontColor)
    {
        return $this;
    }

    /**
     * The font family to use for all text.
     *
     * @param  string $fontFamily
<<<<<<< HEAD:src/Charts/TreeMap.php
     * @return self
=======
     * @return \Khill\Lavacharts\Charts\TreeMap
>>>>>>> origin/3.0:src/Charts/TreeMap.php
     */
    public function fontFamily($fontFamily)
    {
        return $this;
    }

    /**
     * The font size for all text, in points.
     *
     * @param  integer $fontSize
<<<<<<< HEAD:src/Charts/TreeMap.php
     * @return self
=======
     * @return \Khill\Lavacharts\Charts\TreeMap
>>>>>>> origin/3.0:src/Charts/TreeMap.php
     */
    public function fontSize($fontSize)
    {
        return $this;
    }
}
