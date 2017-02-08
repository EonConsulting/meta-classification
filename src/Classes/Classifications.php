<?php
/**
 * Created by PhpStorm.
 * User: jharing10
 * Date: 2017/02/08
 * Time: 9:39 AM
 */

namespace EONConsulting\Meta\Classes;


use EONConsulting\Meta\Models\MetaClassification;

class Classifications {

    function __construct() {

    }

    function get_classifications() {
        $classifications = MetaClassification::orderBy('id')->get();
        return $classifications;
    }

    function slugged_classifications() {
        $classifications = MetaClassification::orderBy('id')->get()->keyBy('slug');
        return $classifications;
    }

    function classified_classifications() {
        $classifications = MetaClassification::orderBy('id')->get()->keyBy('classification');
        return $classifications;
    }

    function get_ids() {
        $classifications = MetaClassification::orderBy('id')->get()->pluck('id', 'name');
        return $classifications;
    }

}