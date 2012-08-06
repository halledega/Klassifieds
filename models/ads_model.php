<?php
    class ads_model extends MY_Model {
        function addRecord($data) {
            $this->db->insert($this->db->dbprefix('klassAds'),$data);
        }

        function deleteRecord($data) {
            $this->db->where('id',$this->uri->segment(3));
            $this->db->delete($data);
        }
/**
 *
 * @param array $where array of possible tabel feilds for mysql query array(id,category,subcategory,user,country,city,state) etc...
 * @param int $limit limits mysql query result to this value
 * @param int $offset determies mysql query offset value (what records to start at when returning vlaues)
 * @param string $order what order to you want to retutn the values in from the query result
 * @return array
 */
        function getAds($where=NULL,$limit=NULL,$offset=NULL,$order=NULL) {
            if($where !== NULL) {
                $this->db->where($where);
            }
            if($order !== NULL) {
                $this->db->order_by($order, "desc");
            }
            $ads = $this->db->get($this->db->dbprefix('klassAds',$limit,$offset));
            $returned = $ads->num_rows();
            if($returned == 0) {
                $data[] = array('adCount'=>$returned);
            }
            else {
                foreach($ads->result_array() as $ad) :
                //get ads parent category
                    $this->db->where('id',$ad['category']);
                    $query = $this->db->get($this->db->dbprefix('klassCategories'));
                    $category = $query->result_array();
                //get ads parent subcategory
                    $this->db->where('id',$ad['subcategory']);
                    $this->db->where('parent_id',$ad['category']);
                    $query = $this->db->get($this->db->dbprefix('klassCategories'));
                    $subcategory =  $query->result_array();
                //get images for ad
                    $this->db->where('ad_id',$ad['id']);
                    $query = $this->db->get($this->db->dbprefix('klassImages'));
                    $images = $query->result_array();
                //get user info of poster
                    $this->db->where('id',$ad['user_id']);
                    $query =  $this->db->get($this->db->dbprefix('users'));
                    $user = $query->result_array();
                //compile all results into single array for each ad returned in query
                    $data[] = array(
                            'adCount' => $returned,
                            'id'=>$ad['id'],
                            'user_id'=> $ad['user_id'],
                            'userName'=>$user[0]['username'],
                            'userEmail'=>$user[0]['email'],
                            'userFirst'=>$user[0]['username'],
                            'userLast'=>$user[0]['username'],
                            'userGroup'=>$user[0]['group_id'],
                            'category'=> $category[0]['name'],
                            'subcategory'=>$subcategory[0]['name'],
                            'country'=>$ad['country'],
                            'state'=>$ad['state'],
                            'city'=>$ad['city'],
                            'title'=>$ad['adTitle'],
                            'descShort'=>$ad['descShort'],
                            'descLong'=>$ad['descLong'],
                            'images'=>$images,
                            'price'=>$ad['price'],
                            'posted'=>$ad['start']
                    );
                endforeach;
            }
            return $data;
        }

        function NewAd($data) {
            //$this->db->insert($this->db->dbprefix('klassAds'),$data);
            $sql = "INSERT INTO {$this->dbprefix('KlassAds')} VALUES (
                    NULL,
                    {$data['user_id']},
                    {$data['category']},
                    {$data['subcategory']},
                    {$data['city']},
                    {$data['country']},
                    {$data['state']},
                    '{$data['adTitle']}',
                    '{$data['descShort']}',
                    '{$data['descLong']}',
                    '{$data['price']}',
                    NOW(),
                    ADDDATE(NOW(), INTERVAL {$data['duration']} day)
                    )";

            $this->db->query($sql);
        }

    }//end of class
?>