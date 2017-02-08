<?php
/**
 * Created by PhpStorm.
 * User: jharing10
 * Date: 2017/02/08
 * Time: 7:27 AM
 */

namespace EONConsulting\Meta\Models;


use Illuminate\Database\Eloquent\Model;

class MetaData extends Model {

    protected $table = 'meta_data';
    protected $primaryKey = 'id';
    protected $fillable = [
        'metable_id', 'metable_type', 'meta_element_id', 'value'
    ];

}

//id
//metable_id
//metable_type
//meta_element_id
//value