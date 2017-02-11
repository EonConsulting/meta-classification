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
        return $elements->get_in_classifieds();
    }

    function get_elements_for_icons($ids = []) {
        $elements = new Elements($ids);
        return $elements->get_elements_for_icons();
    }

    function get_view() {
        $cls_classifications = new Classifications;
        $classifications = $cls_classifications->classified_classifications();
        $arr_classifications = [];
        foreach($classifications as $slug => $classification) {
            $arr_classifications[$classification->id] = $classification->name . '(' . $classification->classification . ')';
        }

        $ids = meta_classification()->get_classification_ids();
        $elements = $this->get_elements($ids);

        $data = json_encode($elements, JSON_HEX_QUOT);

        return view('eon.meta::modal', ['classifications' => $arr_classifications, 'data' => $data]);
    }

    function get_icons() {
        $cls_classifications = new Classifications;
        $classifications = $cls_classifications->classified_classifications();
        $arr_classifications = [];
        foreach($classifications as $slug => $classification) {
            $arr_classifications[$classification->id] = $classification->name . '(' . $classification->classification . ')';
        }

        $ids = meta_classification()->get_classification_ids();
        $elements = $this->get_elements_for_icons($ids);

        $previous_key = '';
        $current_keys = '';
        $label = '';
        $labels = [];

//        while($arr) {
            foreach ($elements as $key => $element) {

                if (!strpos($key, '.')) {
                    if ($key != $previous_key) {
                        $label = $element['name'];
                        $labels[$key] = $element['name'];
                    }
                }

                if (strpos($key, '.') > 0) {

                    $labels[$key] = $element['name'];
                }

                if (!is_array($key)) {
                    echo $this->get_label($key, $labels) . '<br />';
                }
            }
//        }

        $data = json_encode($elements, JSON_HEX_QUOT);

//        return view('eon.meta::icons', ['elements' => $elements, 'data' => $data]);
    }

    function get_label($keys, $labels) {
        $data = $labels;
        $keys = explode('.', $keys);

        $label = '';
        $previous_key = '';
        foreach ($keys as $key) {
            $key = ($previous_key != '') ? $previous_key . '.' . $key : $key;
            if (is_array($data) && array_key_exists($key, $data)) {
                if($label == '') {
                    $label = $data[$key];
                } else {
                    $label .= ' > ' . $data[$key];
                }
                $previous_key = $key;
                continue;
            }
        }

        return $label;
    }

}