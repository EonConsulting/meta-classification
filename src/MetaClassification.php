<?php
/**
 * Created by PhpStorm.
 * User: jharing10
 * Date: 2017/02/06
 * Time: 10:55 AM
 */

namespace EONConsulting\Meta;

use EONConsulting\Meta\Classes\Classifications;
use EONConsulting\Meta\Classes\Elements;

class MetaClassification {

    function get_classifications() {
        $classifications = new Classifications;
        return $classifications->classified_classifications();
    }

    function get_classification_ids() {
        $classifications = new Classifications;
        return $classifications->get_ids();
    }

    function get_elements($ids = []) {
        $elements = new Elements($ids);
        return $elements->get_elements();
    }

}