<?php
/*ÑéÖ¤ÂëÄ£ĞÍ
/*time:2016/10/11   author:¹ş¹ş¹şÃÛ¹Ï*/
defined('BASEPATH') OR exit('No direct script access allowed');
class Captcha_model extends CI_Model{
      public function cap(){
          $this->load->helper('url');
          $this->load->helper('captcha');

          $vals = array(
              'img_path'      => './captcha/',
              'img_url'       => base_url().'/captcha/',
              'img_width'     => 80,
              'img_height'    => 30,
              'expiration'    => 5,
              'word_length'   => 4,
              'font_size'     => 32,
              'img_id'        => 'Imageid',
             // 'pool'          => '23456789abcdefghjkmnpqrstuvwxyzABCDEFGHJKLMNPQRSTUVWXYZ',
              'pool'          => '23456789',
              // White background and border, black text and red grid
              'colors'        => array(
                  'background' => array(255, 255, 255),
                  'border' => array(255, 255, 255),
                  'text' => array(0, 0, 0),
                  'grid' => array(255, 40, 40)
              )
          );

          $cap = create_captcha($vals);
         //session_start();
         // $_SESSION['cap']=$cap['word'];

          $this->load->library('session');
          $this->session->set_userdata('cap',$cap['word']);

          return $cap['image'];

      }
}