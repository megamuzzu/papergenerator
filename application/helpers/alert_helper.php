<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



if( ! function_exists('get_room_name_by_roomid') )

{

    function get_room_name_by_roomid($id=0)

    {

           $ci=& get_instance();
            $ci->load->database();  
            
            $ci->load->model('admin/booking_model');
            
           
            $where = array();
            $where['id'] = $id;

            $where['field'] = 'name';
            $result = $ci->booking_model->findDynamic($where); 

            $name_val = $result[0]->name;
             
            return $name_val;
         
    }
}
if( ! function_exists('get_type_name_by_typeid') )

{

    function get_type_name_by_typeid($id=0)

    {

           $ci=& get_instance();
            $ci->load->database();  
            
            $ci->load->model('admin/booking_type_model');
            
           
            $where = array();
            $where['id'] = $id;

            $where['field'] = 'name';
            $result = $ci->booking_type_model->findDynamic($where); 

            $name_val = $result[0]->name;
             
            return $name_val;
         
    }
}
if( ! function_exists('get_room_number_by_serialid') )

{

    function get_room_number_by_serialid($id=0)

    {

           $ci=& get_instance();
            $ci->load->database();  
            
            $ci->load->model('admin/booking_room_serial_model');
            
           
            $where = array();
            $where['id'] = $id;
            $where['field'] = 'room_number';
            $result = $ci->booking_room_serial_model->findDynamic($where); 

            $name_val = $result[0]->room_number;
             
            return $name_val;
         
    }
}
if( ! function_exists('get_room_price_by_serialid') )

{

    function get_room_price_by_serialid($id=0)

    {

           $ci=& get_instance();
            $ci->load->database();  
            
            $ci->load->model('admin/booking_room_serial_model');
            
           
            $where = array();
            $where['id'] = $id;
            $where['field'] = 'price_per_heaed';
            $result = $ci->booking_room_serial_model->findDynamic($where); 

            $name_val = $result[0]->price_per_heaed;
             
            return $name_val;
         
    }
}