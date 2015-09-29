<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Post extends CI_Controller {
    
    public function get_news_post(){
        
            $dbconnect = $this->load->database();
            $this->load->model('Post_model', 'post');
            $result = $this->post->get_news_post();
            
//            var_dump($result);
            echo 'cos';
            return $this->output
            ->set_content_type('application/json')
            ->set_status_header(200)
            ->set_output(json_encode($result));
    }
}