<?php
/*
*  GNU General Public License v3.0
*  Contributors: ADD YOUR NAME HERE, Mike P. Sinn
 */

namespace App\Buttons\RelationshipButtons\CommonTag;
use App\Buttons\RelationshipButtons\BelongsToRelationshipButton;
use App\Models\CommonTag;
use App\Models\OAClient;
class CommonTagOAuthClientButton extends BelongsToRelationshipButton {
	public $interesting = false;
	public $foreignKeyName = OAClient::FIELD_ID;
	public $qualifiedForeignKeyName = CommonTag::TABLE . '.' . CommonTag::FIELD_CLIENT_ID;
	public $ownerKeyName = OAClient::FIELD_ID;
	public $qualifiedOwnerKeyName = OAClient::TABLE . '.' . OAClient::FIELD_ID;
	public $childClass = CommonTag::class;
	public $parentClass = CommonTag::class;
	public $qualifiedParentKeyName = CommonTag::TABLE . '.' . CommonTag::FIELD_ID;
	public $relatedClass = OAClient::class;
	public $methodName = 'oa_client';
	public $relationshipType = 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo';
	public $color = OAClient::COLOR;
	public $fontAwesome = OAClient::FONT_AWESOME;
	public $id = 'oauth-client-button';
	public $image = OAClient::DEFAULT_IMAGE;
	public $text = 'OAuth Client';
	public $title = 'OAuth Client';
	public $tooltip = OAClient::CLASS_DESCRIPTION;
}
