<?php
/*
*  GNU General Public License v3.0
*  Contributors: ADD YOUR NAME HERE, Mike P. Sinn 
 */

namespace App\Charts\QMHighcharts\Highcharts\Line\WithDataLabels;
use App\Charts\QMHighcharts\HighchartConfig;
use App\Charts\QMHighcharts\Options\BaseChart;
use App\Charts\QMHighcharts\Options\BaseSeries;
use App\Charts\QMHighcharts\Options\BaseSubtitle;
use App\Charts\QMHighcharts\Options\BaseTitle;
use App\Charts\QMHighcharts\Options\BaseTooltip;
use App\Charts\QMHighcharts\Options\BaseXAxis;
use App\Charts\QMHighcharts\Options\BaseYAxis;
use App\Charts\QMHighcharts\Options\PlotOptions;
use Ghunti\HighchartsPHP\HighchartJsExpr;
class BaseWithDataLabels extends HighchartConfig {
	/**
	 * @var BaseChart
	 * @link https://api.highcharts.com/highcharts/chart
	 */
	public $chart;
	/**
	 * @var BaseTitle
	 * @link https://api.highcharts.com/highcharts/title
	 */
	public $title;
	/**
	 * @var BaseSubtitle
	 * @link https://api.highcharts.com/highcharts/subtitle
	 */
	public $subtitle;
	/**
	 * @var BaseXAxis
	 * @link https://api.highcharts.com/highcharts/xAxis
	 */
	public $xAxis;
	/**
	 * @var BaseYAxis
	 * @link https://api.highcharts.com/highcharts/yAxis
	 */
	public $yAxis;
	/**
	 * @var BaseTooltip
	 * @link https://api.highcharts.com/highcharts/tooltip
	 */
	public $tooltip;
	/**
	 * @var PlotOptions
	 * @link https://api.highcharts.com/highcharts/plotOptions
	 */
	public $plotOptions;
	/**
	 * @var BaseSeries[]
	 * @link https://api.highcharts.com/highcharts/series
	 */
	public $series;
	public function __construct(){
		parent::__construct();
		$this->chart = new BaseChart();
		$this->title = new BaseTitle();
		$this->subtitle = new BaseSubtitle();
		$this->xAxis = new BaseXAxis();
		$this->yAxis = new BaseYAxis();
		$this->tooltip = new BaseTooltip();
		$this->plotOptions = new PlotOptions();
		$this->series = [];
		$this->chart = [
			'renderTo' => 'container',
			'type' => 'line',
		];
		$this->title = [
			'text' => 'Monthly Average Temperature',
		];
		$this->subtitle->text = 'Source: WorldClimate.com';
		$this->xAxis->categories = [
			'Jan',
			'Feb',
			'Mar',
			'Apr',
			'May',
			'Jun',
			'Jul',
			'Aug',
			'Sep',
			'Oct',
			'Nov',
			'Dec',
		];
		$this->yAxis->title->text = 'Temperature (°C)';
		$this->tooltip->enabled = false;
		$this->tooltip->formatter = new HighchartJsExpr("function() {
		        return '<b>' + this.series.name + '</b><br/>' +
		            this.x + ': ' + this.y + 'Â°C';
		    }");
		$this->plotOptions->line->dataLabels->enabled = true;
		$this->plotOptions->line->enableMouseTracking = false;
		$this->series[] = [
			'name' => 'Tokyo',
			'data' => [
				7.0,
				6.9,
				9.5,
				14.5,
				18.4,
				21.5,
				25.2,
				26.5,
				23.3,
				18.3,
				13.9,
				9.6,
			],
		];
		$this->series[] = [
			'name' => 'London',
			'data' => [
				3.9,
				4.2,
				5.7,
				8.5,
				11.9,
				15.2,
				17.0,
				16.6,
				14.2,
				10.3,
				6.6,
				4.8,
			],
		];
	}
	public function demo(): string{
		/** @noinspection PhpIncludeInspection */
		require base_path('vendor/ghunti/highcharts-php/demos/highcharts/line/with_data_labels.php');
	}
}
