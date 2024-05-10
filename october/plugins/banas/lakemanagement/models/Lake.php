<?php namespace Banas\LakeManagement\Models;

use Model;

/**
 * Lake Model
 *
 * @link https://docs.octobercms.com/3.x/extend/system/models.html
 */
class Lake extends Model
{
    use \October\Rain\Database\Traits\Validation;

    /**
     * @var string table name
     */
    public $table = 'banas_lakemanagement_lakes';

    
    /**
     * @var array fillable attributes are mass assignable
     */
    protected $fillable = ['name', 'depth', 'area', 'description', 'image'];


    /**
     * @var array rules for validation
     */
    public $rules = [];
}
