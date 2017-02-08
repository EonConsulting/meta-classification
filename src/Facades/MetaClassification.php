<?php
/**
 * Created by PhpStorm.
 * User: jharing10
 * Date: 2017/02/08
 * Time: 9:34 AM
 */

namespace EONConsulting\Meta\Facades;


use Illuminate\Support\Facades\Facade;

class MetaClassification extends Facade {
    protected static function getFacadeAccessor() {
        return 'meta_classification';
    }


}