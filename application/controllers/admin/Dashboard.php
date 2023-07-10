<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

/**
 * Class : User (UserController)
 * User Class to control all user related operations.

 * @since : 15 November 2016
 */
class Dashboard extends BaseController
{
    /**
     * This is default constructor of the class
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin/dashboard_model');
        $this->load->model('admin/user_model');
       
    }

    /**
     * Index Page for this controller.
     */
    public function index()
    {
        $this->isLoggedIn();
        $data = array();
        $this->global['pageTitle'] = 'MyFoodAndSons : Page Content';

        $where = array();
        $where['field'] = 'id';  
        $lead_list =  $this->dashboard_model->findDynamic($where);
        $data['lead_list']  = $lead_list;

        $lead_money =  $this->dashboard_model->sum_all();
        $data['lead_money']  = $lead_money;


        $where = array();
        $where['field'] = 'id';
        $where['lead_type'] = 1;  
        $lead_list_pp =  $this->dashboard_model->findDynamic($where);
        $data['lead_list_pp']  = $lead_list_pp;

        $lead_money_pp =  $this->dashboard_model->sum_all_pp();
        $data['lead_money_pp']  = $lead_money_pp;

        $where = array();
        $where['field'] = 'id';
        $where['lead_type'] = 2;  
        $lead_list_us_print =  $this->dashboard_model->findDynamic($where);
        $data['lead_list_us_print']  = $lead_list_us_print;

        $lead_money_us_print =  $this->dashboard_model->sum_all_aus();
        $data['lead_money_us_print']  = $lead_money_us_print;


        //Dashboard Model Data End


        //dashboard Aus Model Start

        $where = array();
        $where['field'] = 'id';  
        $lead_list =  $this->leadaus_model->findDynamic($where);
        $data['leadaus_list']  = $lead_list;

        $leadaus_money =  $this->leadaus_model->sum_all();
        $data['leadaus_money']  = $leadaus_money;


        $where = array();
        $where['field'] = 'id';
        $where['lead_type'] = 1;  
        $lead_list_aus_pp =  $this->leadaus_model->findDynamic($where);
        $data['lead_list_aus_pp']  = $lead_list_aus_pp;

        $lead_money_aus_pp =  $this->leadaus_model->sum_all_pp();
        $data['lead_money_aus_pp']  = $lead_money_aus_pp;

        $where = array();
        $where['field'] = 'id';
        $where['lead_type'] = 2;  
        $lead_list_aus_print =  $this->leadaus_model->findDynamic($where);
        $data['lead_list_aus_print']  = $lead_list_aus_print;

        $lead_money_aus_print =  $this->leadaus_model->sum_all_aus();
        $data['lead_money_aus_print']  = $lead_money_aus_print;

        //dashboard Aus Model End

        $where = array();
        $where['field'] = 'id';  
        $user_list =  $this->user_model->findDynamic($where);
        $data['user_list']  = $user_list;


        $this->loadViews("admin/dashboard", $this->global, $data , NULL);
        
    }

    // Add New 
    public function addnew()
    {
    
        $this->isLoggedIn();
        $this->global['pageTitle'] = 'MyFoodAndSons : Add New Page Content';
        $this->loadViews("admin/blog/addnew", $this->global, NULL , NULL);
        
    } 

    // Insert Member *************************************************************
    public function insertnow()
    {
        $this->isLoggedIn();
		 $form_data  = $this->input->post();
		 
        $this->load->library('form_validation');                 
        $this->form_validation->set_rules('heading','heading','required');
        $this->form_validation->set_rules('content','content','required');
        $this->form_validation->set_rules('content_down','content_down','required');
        $this->form_validation->set_rules('author_name','author_name','required');
        $this->form_validation->set_rules('web_cont','web_cont','required');
        
        
        //form data 
        $form_data  = $this->input->post();
        if($this->form_validation->run() == FALSE)
        {
            $this->addnew();
        }
        else
        {   
                $date = date('Y-m-d H:i:s');

    
                if(isset($_FILES['image']['name']) && $_FILES['image']['name'] != '') {



                $f_name         =$_FILES['image']['name'];
                $f_tmp          =$_FILES['image']['tmp_name'];
                $f_size         =$_FILES['image']['size'];
                $f_extension    =explode('.',$f_name);
                $f_extension    =strtolower(end($f_extension));
                $f_newfile      =uniqid().'.'.$f_extension;
                $store          ="uploads/blogs/".$f_newfile;
            
                if(!move_uploaded_file($f_tmp,$store))
                {
                    $this->session->set_flashdata('error', 'Image Upload Failed .');
                }
                else
                {
                   $insertData['image'] = $f_newfile;
                   
                }
             }
             
             
                $insertData['heading'] = $form_data['heading'];
                $insertData['content'] = $form_data['content'];
                $insertData['content_down'] = $form_data['content_down'];
                $insertData['author_name'] = $form_data['author_name'];
                $insertData['slug_url'] = $form_data['slug'];
                $insertData['web_cont']       = $form_data['web_cont'];
                $insertData['status']       = $form_data['status'];
                $insertData['date_at']      = $date;


            $result = $this->dashboard_model->save($insertData);
            if($result > 0)
            {
                $this->session->set_flashdata('success', 'Blog Successfully Added');
            }
            else
            { 
                $this->session->set_flashdata('error', 'Blog Addition failed');
            }
            redirect('admin/blog/addnew');
          }  
        
    }


    // Member list
    public function ajax_list()
    {
        $list = $this->dashboard_model->get_datatables();
		
       
        $data = array();
        $no =(isset($_POST['start']))?$_POST['start']:'';
        foreach ($list as $currentObj) {

            $filename = (isset($currentObj->image) && $currentObj->image !=='') ? ($currentObj->image) : ("");

            $selected=$currentObj->status==1?'selected':'';
            $notselected=$currentObj->status==-0?'selected':'';
           
            $option =  '<select class ="form-control statuschangebtn" name="status" data-id="'.$currentObj->id.'">
            <option value="1" '.$selected.'>Active</option>
            <option value="0" '.$notselected.'>Inactive</option>`
            </select>';
            $selected="";
            $notselected="";




            $temp_date = $currentObj->date;
            $date_at = date("d-m-Y", strtotime($temp_date));
            $no++;
            $row = array();
            $row[] = $date_at;
            $row[] = $currentObj->customer_name;
            $row[] = $currentObj->phone;
            $row[] = $currentObj->email;
            $row[] = $currentObj->amount;
            $row[] = $currentObj->issue;
            $row[] = $currentObj->plan;
            $row[] = $currentObj->agent;
            $row[] = '<a class="btn btn-sm btn-info" href="'.base_url().'admin/dashboard/edit/'.$currentObj->id.'"><i class="fa fa-pencil"></i></a> <a class="btn btn-sm btn-danger deletebtn" href="#" data-userid="'.$currentObj->id.'"><i class="fa fa-trash"></i></a>';
            $data[] = $row;
        }
 
        $output = array(
                        "draw" => (isset($_POST['draw']))?$_POST['draw']:'',
                        "recordsTotal" => $this->dashboard_model->count_all(),
                        "recordsFiltered" => $this->dashboard_model->count_filtered(),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }



     // status change funcstions
        public function statusChange(){


        $this->isLoggedIn();

        $form_data  = $this->input->post();
      
        //form data 
        $insertData['status'] = $form_data['status'];
        $insertData['id'] = $form_data['id'];
        $result = $this->dashboard_model->save($insertData);
        return $result;  
        

        }



    // Edit
    // Add New 
    public function edit($id = NULL)
    {
        
        //exit;
        $this->isLoggedIn();
        if($id == null)
        {
            redirect('admin/blog');
        }

        
        $data['edit_data'] = $this->dashboard_model->find($id);
        $this->global['pageTitle'] = 'MyFoodAndSons : Edit Blog Content';
        $this->loadViews("admin/blog/edit", $this->global, $data , NULL);
        
        
    } 

    // Update Members *************************************************************
    public function update()
    {
        $this->isLoggedIn();
        $this->load->library('form_validation');                 
        $this->form_validation->set_rules('heading','heading','required');
		
        
        //form data 
        $form_data  = $this->input->post();
        if($this->form_validation->run() == FALSE)
        {
                $this->edit($form_data['id']);
        }
        else
        {   

                
                $date = date('Y-m-d H:i:s');

                if(isset($_FILES['image']['name']) && $_FILES['image']['name'] != '') {



                $f_name         =$_FILES['image']['name'];
                $f_tmp          =$_FILES['image']['tmp_name'];
                $f_size         =$_FILES['image']['size'];
                $f_extension    =explode('.',$f_name);
                $f_extension    =strtolower(end($f_extension));
                $f_newfile      =uniqid().'.'.$f_extension;
                $store          ="uploads/blogs/".$f_newfile;
            
                if(!move_uploaded_file($f_tmp,$store))
                {
                    $this->session->set_flashdata('error', 'Image Upload Failed.');
                }
                else
                {
                   $insertData['image'] = $f_newfile;
                   
                }
             }

            $insertData['id'] = $form_data['id'];
            $insertData['heading'] = $form_data['heading'];
            $insertData['content'] = $form_data['content'];
            $insertData['content_down'] = $form_data['content_down'];
            $insertData['author_name'] = $form_data['author_name'];
            $insertData['slug_url']     = $form_data['slug'];
            $insertData['web_cont']       = $form_data['web_cont'];
            $insertData['status']       = $form_data['status'];
            $insertData['date_at']      = $date;
            $insertData['update_at']      = $date;

            $result = $this->dashboard_model->save($insertData);

            if($result > 0)
            {
                $this->session->set_flashdata('success', 'Blog successfully Updated');
            }
            else
            { 
                $this->session->set_flashdata('error', 'Blog Updation failed');
            }
            redirect('admin/blog/edit/'.$insertData['id']);
          }  
        
    }



    public function check_slug()
    { 
        
         $form_data  = $this->input->post();

         if(isset($form_data['slug_url']))
         {
                 
                $slug_url = strtolower($form_data['slug_url']);

                 $where  = array();
                 $where['slug_url']  = $slug_url ;
                 $where['status']  = 1 ;
                 if(isset($form_data['id']))
                 {
                    $where['id !=']  = $form_data['id'] ;   
                 }
                 $where['status']  = 1 ;
                 $result  = $this->dashboard_model->findDynamic($where);

                  

             if(count($result) > 0)
            {
                echo 'slug_exist';
            }else
            {
                 echo 'slug_available';
            }
         } 


    }




    // Delete Member *****************************************************************
      function delete()
    {
        $this->isLoggedIn();
        $delId = $this->input->post('id');  
        $result = $this->dashboard_model->delete($delId);           
        if ($result > 0) { echo(json_encode(array('status'=>TRUE))); }
        else { echo(json_encode(array('status'=>FALSE))); }
    }
    
    
}

?>