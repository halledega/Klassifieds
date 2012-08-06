<?php
class settings_model extends MY_Model {
 /**
  *
  * @return type
  */
    function getSettings() {
        $settings_tbl = $this->db->dbprefix('klasssettings');
        $settings = $this->db
                        ->get($settings_tbl)
                        ->result_array();
        foreach ($settings as $row){
            $data[$row['setting']] = $row['value']; //create a new array '$data" and reindex query results into it
        }
        unset($ads_set);
        
        return $data;
    }
/**
 *
 */
    function updateSettings($data) {
        $settings_tbl = $this->db->dbprefix('klasssettings');
        foreach($data as $key => $value) {
            $sql ="UPDATE $settings_tbl SET value = '$value' WHERE id = $key";
            $this->db->query($sql);
        }
        
    }
}
?>