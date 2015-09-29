<?php
class Post_model extends CI_Model {

        public $date;
        public $text;

        public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
        }

        public function get_last_ten_entries()
        {
                $query = $this->db->get('post', 10);
                return $query->result();
        }
        
        public function get_news_post()
        {
            $this->db->order_by("id", "desc");
            $query = $this->db->get('post');
                $this->db->order_by('time_add desc'); 
                return $query->result_array();
            
//                $this->db->from($this->post);
//                $this->db->order_by("id desc");
//                $query = $this->db->get('post'); 
//                return $query->result_array();
                
                
        }
        public function get_new_post($last)
        {
            $this->db->select_min('id');
            $query = $this->db->get_where('post', array('id >' => $last));
//            $query = $this->db->get('post');
            $this->db->order_by('time_add desc'); 
            return $query->result_array();
        }

        public function insert_post(array $param)
        {
                
                $param['time_add'] = date("Y-m-d H:i:s");

                $this->db->insert('post', $param);
        }

        public function update_entry()
        {
                $this->title    = $_POST['title'];
                $this->content  = $_POST['content'];
                $this->date     = time();

                $this->db->update('post', $this, array('id' => $_POST['id']));
        }

}