<?php namespace Banas\LakeManagement\Models;

use Model;

/**
 * LakeMetering Model
 *
 * @link https://docs.octobercms.com/3.x/extend/system/models.html
 */
class LakeMetering extends Model
{
    use \October\Rain\Database\Traits\Validation;

    /**
     * @var string table name
     */
    public $table = 'banas_lakemanagement_lake_meterings';

    /**
     * @var array fillable attributes are mass assignable
     */
    protected $fillable = ['measured_at', 'lake_id', 'temperature', 'description'];

    /**
     * @var array hidden attributes
     */
    protected $hidden = ['lake_id', 'updated_at'];

    /**
     * @var array rules for validation
     */
    public $rules = [];

    /**
     * @var array cast dates attributes
     */
    protected $casts = [
        'created_at' => 'date:d.m.Y',
        'updated_at' => 'date:d.m.Y',
        'measured_at' => 'date:d.m.Y',
    ];

    /**
     * @var array relations
     */
    public $belongsTo = [
        'lake' => ['Banas\LakeManagement\Models\Lake']
    ];
}
