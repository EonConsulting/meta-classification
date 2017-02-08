<?php
/**
 * Created by PhpStorm.
 * User: jharing10
 * Date: 2017/02/08
 * Time: 7:25 AM
 */

namespace EONConsulting\Meta\Models;


use Illuminate\Database\Eloquent\Model;

class MetaElement extends Model {

    protected $table = 'meta_elements';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name', 'description', 'slug', 'parent_id', 'classification_id', 'required', 'version', 'position'
    ];

}

//id
//name
//description
//slug
//parent_id
//classification_id
//required
//version
//position