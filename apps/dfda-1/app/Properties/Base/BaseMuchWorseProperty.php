<?php
/*
*  GNU General Public License v3.0
*  Contributors: ADD YOUR NAME HERE, Mike P. Sinn
 */

namespace App\Properties\Base;
use App\Traits\PropertyTraits\IsInt;
use App\UI\ImageUrls;
use App\UI\FontAwesome;
use App\Properties\BaseProperty;
class BaseMuchWorseProperty extends BaseProperty{
	use IsInt;
	public $dbInput = 'integer,false';
	public $dbType = \Doctrine\DBAL\Types\Types::INTEGER;
	public $default = \OpenApi\Generator::UNDEFINED;
	public $description = 'much_worse';
	public $example = 2;
	public $fieldType = self::TYPE_INTEGER;
	public $fontAwesome = FontAwesome::QUESTION_CIRCLE;
	public $htmlType = self::TYPE_NUMBER;
	public $image = ImageUrls::QUESTION_MARK;
	public $importance = false;
	public $isOrderable = true;
	public $isSearchable = false;
	public $maximum = 2147483647;
	public $minimum = -2147483648;
	public $name = self::NAME;
	public const NAME = 'much_worse';
	public $phpType = \App\Types\PhpTypes::INTEGER;
	public $rules = 'required|integer|min:-2147483648|max:2147483647';
	public $showOnDetail = true;
	public $title = 'Much Worse';
	public $type = self::TYPE_INTEGER;
	public $validations = 'required|integer|min:-2147483648|max:2147483647';

}
