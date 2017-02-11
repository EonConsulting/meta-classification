<?php
/**
 * Created by PhpStorm.
 * User: jharing10
 * Date: 2017/02/08
 * Time: 7:23 AM
 */

namespace EONConsulting\Meta\Models;


use Illuminate\Database\Eloquent\Model;

class MetaClassification extends Model {

    protected $table = 'meta_classifications';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name', 'slug', 'classification', 'icon'
    ];

}

//id
//name
//slug
//classification