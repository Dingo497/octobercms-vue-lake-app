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
     * @var array hidden attributes
     */
    protected $hidden = ['updated_at'];

    /**
     * @var array cast dates attributes
     */
    protected $casts = [
        'created_at' => 'date:d.m.Y',
        'updated_at' => 'date:d.m.Y',
    ];

    /**
     * @var array rules for validation
     */
    public $rules = [];

    /**
     * @var array relations
     */
    public $hasMany = [
        'meterings' => ['VendorName\LakeManagement\Models\LakeMetering']
    ];

    /**
     * @var array computed attributes for admin list
     */
    public function getFormattedDepthAttribute() {
        return sprintf('%.2f %s', $this->depth, $this->depth_unit);
    }
    public function getFormattedAreaAttribute() {
        return sprintf('%.2f %s', $this->area, $this->area_unit);
    }
}
