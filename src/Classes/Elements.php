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

    function build_hierarchy($elements = []) {

        $tree = (array)$this->insert(json_encode($elements));

        dd($tree);

        return $tree;
    }

    function tree($data = []) {

        if(is_array($data)) {
            foreach($data as $item) {
                if (!array_key_exists('children', $item)) {
                    $item['children'] = [];
                }

                if(array_key_exists('parent_id', $item)) {
                    if($item['parent_id'] == null) {
//                        dd($item);
                    } else if (array_key_exists($item['parent_id'], $data)) {
                        if(array_key_exists('children', $data[$item['parent_id']])) {
                            $data[$item['parent_id']]['children'] = [];
                        }
                        $data[$item['parent_id']]['children'][$item['id']] = $item;
                        unset($data[$item['id']]);
                    } else {
//                        $this->insert($data, $item, $item['parent_id'], $item['id']);
                    }
                }
            }
        }

        return $data;
    }

    function insert($raw) {

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

//    function insert(&$data, $item, $parent_id, $id, $test = false) {
//
//        if($test)
//            dd($data);
//
//        if(array_key_exists($parent_id, $data)) {
//            if(!array_key_exists('children', $data[$parent_id])) {
//                $data[$parent_id]['children'] = [];
//            }
//            $data[$parent_id]['children'][$id] = $item;
//            unset($data[$parent_id]['children'][$id]);
//            return;
//        }
//
//        foreach($data as $key => $value) {
//            if(array_key_exists($parent_id, $value)) {
//                if(!array_key_exists('children', $value[$parent_id])) {
//                    $value[$parent_id]['children'] = [];
//                }
//                $value[$parent_id]['children'][$id] = $item;
//                unset($data[$key][$parent_id]['children'][$id]);
//                return;
//            }
//            if(array_key_exists('children', $value)) {
//                $this->insert($value['children'], $item, $parent_id, $id, true);
//            }
//        }
//    }

//    function tree($data = [], $tree = [], $temp_item = [], $parent = false) {
//        if(is_array($data) && count($data) > 0) {
//            foreach($data as $item) {
//                if(!$item['parent_id']) {
//                    $tree[$item['id']] = $item;
//                    $tree[$item['id']]['children'] = [];
//                } else {
//                    if(array_key_exists($item['parent_id'], $data)) {
//                        if(!array_key_exists('children', $tree[$item['parent_id']]))
//                            $tree[$item['parent_id']]['children'] = [];
//
//                        $tree[$item['parent_id']]['children'][] = $item;
//                        unset($data[$item['id']]);
//                    } else {
////                        $this->tree($data, $tree, $item, $item['parent_id']);
//                    }
//                }
//            }
//        }
//    }
//
//    function get_children($parent_id) {
//        $children = [];
//        foreach($this->elements as $item) {
//            if(is_array($item) && array_key_exists('parent_id', $item) && $item['parent_id'] == $parent_id) {
//                $children[] = $item;
//            }
//        }
//        return $children;
//    }

}