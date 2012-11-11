<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
* Regular pages model
*
* @author Phil Sturgeon - PyroCMS Dev Team
* @package PyroCMS
* @subpackage Pages Module
* @category Modules
*
*/
class Category_m extends MY_Model {
/**
 * Build a multi-array of parent > children.
 */
function getCategories($id = NULL) {
    if($id == NULL) {
        $all_categories = $this->db
            ->get('klassCategories')
            ->result_array();
    }
    else  {
        $all_categories = $this->db
            ->get_where('klassCategories','ID = '.$id.' OR parent_id = '.$id)
            ->result_array();
    }

    //reindex the array
    foreach ($all_categories as $row)
    {
            $categories[$row['id']] = $row;
    }

    unset($all_categories);

    // build a multidimensional array of parent > children
    foreach ($categories as $row)
    {
            if (array_key_exists($row['parent_id'], $categories) AND $row['parent_id'] !==0)
            {
                // add children to their parent
                    $categories[$row['parent_id']]['children'][] =& $categories[$row['id']];
            }
            //category is a root (parent) or child
            else
            {
                $categories_array[] =& $categories[$row['id']];
            }
    }

    return $categories_array;
}

function DDcategories($where) {
    $cats = $this->db
            ->get_where('klassCategories',$where)
            ->result_array();
    //reindex
    foreach($cats as $row) {
        $categories_array[$row['id']] = $row['name'];
    }
    return $categories_array;
}

function updateCategory($category) {
    $categories_tbl = $this->db->dbprefix('klassCategories');
    $id = $category['id'];
    foreach($category as $key => $value) {
        $sql ="UPDATE $categories_tbl SET $key = '$value' WHERE id = $id";
        $this->db->query($sql);
    }
}

function createCategory($category) {
    $categories_tbl = $this->db->dbprefix('klassCategories');
    $sql = "INSERT INTO {$categories_tbl} (id,parent_id,name,description) VALUES (
                NULL,
                {$category['parent_id']},
                '{$category['name']}',
                '{$category['description']}'
            )";

    $this->db->query($sql);
}

function deleteCategory($id) {
    $sql = "DELETE FROM {$this->db->dbprefix('klassCategories')} WHERE id = $id";
    $this->db->query($sql);
}

}//end class
