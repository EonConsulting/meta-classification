<?php
/**
 * Created by PhpStorm.
 * User: jharing10
 * Date: 2017/02/08
 * Time: 9:41 AM
 */

namespace EONConsulting\Meta\Classes;


use EONConsulting\Meta\Models\MetaElement;

class Elements {

    protected $classification_ids;
    protected $elements = [];

    function __construct($classification_ids = []) {
        $this->classification_ids = $classification_ids;
    }

    public function get_elements() {
        $elements = MetaElement::whereIn('classification_id', $this->classification_ids)->get()->keyBy('id');
        $this->elements = $elements->toArray();

        return $this->build_hierarchy($elements->toArray());
    }

    public function get_in_classifieds() {
        $elements = MetaElement::whereIn('classification_id', $this->classification_ids)->get()->keyBy('id');
        $this->elements = $elements->toArray();

        $tree = $this->build_hierarchy($elements->toArray());

        $data = [];
        foreach($tree as $branch) {
            if(array_key_exists('classification_id', $branch)) {
                if(!array_key_exists($branch['classification_id'], $data)) {
                    $data[$branch['classification_id']] = [];
                }

                $data[$branch['classification_id']][] = $branch;
            }
        }

        return $data;
    }

    function get_elements_for_icons() {
        $elements = MetaElement::whereIn('classification_id', $this->classification_ids)->get()->keyBy('id');
        $this->elements = $elements->toArray();
        $arr = $elements->toArray();
        $data = $this->flatten($arr, '.');

        dd($data);

        return $data;
    }

    function flatten($array, $keySeparator = '.') {
        if( is_array( $array ) ) {
            foreach( $array as $name => $value ) {
                $f = $this->flatten( $value , $keySeparator);
                if( is_array( $f ) ) {
                    if(array_key_exists('parent_id', $f)) {
                        foreach( $f as $key => $val ) {
                            unset($array[ $name ]);
                            if($this->check_contains_key($f['parent_id'], $array)) {
                                $before = $this->get_contains_key($f['parent_id'], $array) . $keySeparator;
                            } else {
                                $before = ($f['parent_id'] != null && $f['parent_id'] != '') ? $f['parent_id'] . $keySeparator : '';
                            }

                            $array[ $before . $name] = $value;
                        }
                    }
                }
            }
        }
        return $array;
    }

//    function flatten(&$array, $prefix = '') {
//        $result = array();
//        while(count($array) > 0) {
//            foreach ($array as $key => $value) {
//                if (is_array($value)) {
//                    if (array_key_exists('parent_id', $value) && !$value['parent_id']) {
//                        $result[$value['id'] . '.'] = $value;
//                        unset($array[$key]);
//                    } else if (array_key_exists('parent_id', $value) && $value['parent_id'] && $this->check_contains_key($value['parent_id'], $result)) {
//                        $k = $this->get_contains_key($value['parent_id'], $result);
//                        $result[$k . '-' . $value['id'] . '.'] = $value;
//                        unset($array[$key]);
//                        echo '<pre>';
//                        print_r($value['id']);
//                        echo '</pre>';
//                        $result = $result + $this->flatten($array, $k . '-' . $value['id'] . '.');
//                    } else {
////                        dd($value);
//                    }
//                }
//            }
//        }
//        return $result;
//    }

    function check_contains_key($parent_id, $arr) {

        foreach($arr as $key => $value) {
            if($key == $parent_id || strpos($key, '.' . $parent_id . '.') != false || strpos($key, '-' . $parent_id . '.') != false ) {
                return true;
            }
        }

        return false;
    }

    function get_contains_key($parent_id, $arr) {

        foreach($arr as $key => $value) {
            if($key == $parent_id || strpos($key, '.' . $parent_id . '.') != false || strpos($key, '-' . $parent_id . '.') != false ) {
                return $key;
            }
        }

        return false;
    }

    function build_hierarchy($elements = []) {
        $tree = (array)$this->tree(json_encode($elements));

        return $tree;
    }

    function tree($raw) {
        $raw= json_decode($raw, true);

        $nested = [];
        $map = [];

        foreach ($raw as &$row) {
            $id = $row['id'];
            $parent_id = $row['parent_id'];
            $row['children'] = [];
            if (!$parent_id) {
                $nested[$id] = &$row;
            } else {
                $map[$parent_id]['children'][$id] = &$row;
            }
            $map[$id] = &$row;
        }

        return $nested;
    }

}