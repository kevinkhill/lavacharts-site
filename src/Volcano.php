<?php

namespace Khill\Lavacharts;

<<<<<<< HEAD

use \Khill\Lavacharts\Charts\Chart;
use \Khill\Lavacharts\Dashboard\Dashboard;

=======
use \Khill\Lavacharts\Values\Label;
use \Khill\Lavacharts\Charts\Chart;
use \Khill\Lavacharts\Dashboards\Dashboard;
>>>>>>> origin/3.0
use \Khill\Lavacharts\Exceptions\ChartNotFound;
use \Khill\Lavacharts\Exceptions\DashboardNotFound;

/**
 * Volcano Storage Class
 *
 * Storage class that holds all defined charts and dashboards.
 *
 * @category  Class
<<<<<<< HEAD
 * @package   Lavacharts
=======
 * @package   Khill\Lavacharts
>>>>>>> origin/3.0
 * @since     2.0.0
 * @author    Kevin Hill <kevinkhill@gmail.com>
 * @copyright (c) 2015, KHill Designs
 * @link      http://github.com/kevinkhill/lavacharts GitHub Repository Page
 * @link      http://lavacharts.com                   Official Docs Site
 * @license   http://opensource.org/licenses/MIT MIT
 */
class Volcano
{
    /**
     * Holds all of the defined Charts.
     *
     * @var array
     */
    private $charts = [];

    /**
     * Holds all of the defined Dashboards.
     *
     * @var array
     */
    private $dashboards = [];

    /**
     * Stores a chart in the volcano datastore.
     *
     * @param  \Khill\Lavacharts\Charts\Chart $chart Chart to store in the volcano.
     * @return boolean
     */
    public function storeChart(Chart $chart)
    {
<<<<<<< HEAD
        $this->charts[$chart::TYPE][$chart->label] = $chart;
=======
        $this->charts[$chart::TYPE][(string) $chart->getLabel()] = $chart;
>>>>>>> origin/3.0

        return true;
    }

    /**
     * Stores a dashboard in the volcano datastore.
     *
<<<<<<< HEAD
     * @param  \Khill\Lavacharts\Dashboard\Dashboard $dashboard Dashboard to store in the volcano.
=======
     * @param  \Khill\Lavacharts\Dashboards\Dashboard $dashboard Dashboard to store in the volcano.
>>>>>>> origin/3.0
     * @return boolean
     */
    public function storeDashboard(Dashboard $dashboard)
    {
<<<<<<< HEAD
        $this->dashboards[$dashboard->label] = $dashboard;
=======
        $this->dashboards[(string) $dashboard->getLabel()] = $dashboard;
>>>>>>> origin/3.0

        return true;
    }

    /**
     * Retrieves a chart from the volcano datastore.
     *
     * @param  string $type  Type of chart to store.
<<<<<<< HEAD
     * @param  string $label Identifying label for the chart.
     * @throws \Khill\Lavacharts\Exceptions\ChartNotFound
     * @return \Khill\Lavacharts\Charts\Chart
     */
    public function getChart($type, $label)
=======
     * @param  \Khill\Lavacharts\Values\Label $label Identifying label for the chart.
     * @throws \Khill\Lavacharts\Exceptions\ChartNotFound
     * @return \Khill\Lavacharts\Charts\Chart
     */
    public function getChart($type, Label $label)
>>>>>>> origin/3.0
    {
        if ($this->checkChart($type, $label) === false) {
            throw new ChartNotFound($type, $label);
        }

<<<<<<< HEAD
        return $this->charts[$type][$label];
=======
        return $this->charts[$type][(string) $label];
>>>>>>> origin/3.0
    }

    /**
     * Retrieves a dashboard from the volcano datastore.
     *
<<<<<<< HEAD
     * @param  string $label Identifying label for the dashboard.
     * @throws \Khill\Lavacharts\Exceptions\DashboardNotFound
     * @return \Khill\Lavacharts\Dashboards\Dashboard
     */
    public function getDashboard($label)
=======
     * @param  \Khill\Lavacharts\Values\Label $label Identifying label for the dashboard.
     * @throws \Khill\Lavacharts\Exceptions\DashboardNotFound
     * @return \Khill\Lavacharts\Dashboards\Dashboard
     */
    public function getDashboard(Label $label)
>>>>>>> origin/3.0
    {
        if ($this->checkDashboard($label) === false) {
            throw new DashboardNotFound($label);
        }

<<<<<<< HEAD
        return $this->dashboards[$label];
=======
        return $this->dashboards[(string) $label];
>>>>>>> origin/3.0
    }

    /**
     * Simple true/false test if a chart exists.
     *
     * @param  string $type  Type of chart to check.
<<<<<<< HEAD
     * @param  string $label Identifying label of a chart to check.
     * @return boolean
     */
    public function checkChart($type, $label)
    {
        if (Utils::nonEmptyString($type) === false || Utils::nonEmptyString($label) === false) {
=======
     * @param  \Khill\Lavacharts\Values\Label $label Identifying label of a chart to check.
     * @return boolean
     */
    public function checkChart($type, Label $label)
    {
        if (Utils::nonEmptyString($type) === false) {
>>>>>>> origin/3.0
            return false;
        }

        if (array_key_exists($type, $this->charts) === false) {
            return false;
        }

<<<<<<< HEAD
        return array_key_exists($label, $this->charts[$type]);
=======
        return array_key_exists((string) $label, $this->charts[$type]);
>>>>>>> origin/3.0
    }

    /**
     * Simple true/false test if a dashboard exists.
     *
<<<<<<< HEAD
     * @param  string $label Identifying label of a chart to check.
     * @return boolean
     */
    public function checkDashboard($label)
    {
        if (Utils::nonEmptyString($label) === false) {
            return false;
        }

        return array_key_exists($label, $this->dashboards);
=======
     * @param  \Khill\Lavacharts\Values\Label $label Identifying label of a chart to check.
     * @return boolean
     */
    public function checkDashboard(Label $label)
    {
        return array_key_exists((string) $label, $this->dashboards);
>>>>>>> origin/3.0
    }
}
