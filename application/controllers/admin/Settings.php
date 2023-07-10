<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

class Settings extends BaseController
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin/settings_model');
    }

    /**
     * Index Page for this controller.
     */
    public function index()
    {
        $this->isLoggedIn();
        $this->global['pageTitle'] = 'Website Name : School List';
        $this->loadViews("admin/settings/list", $this->global, NULL , NULL);
        
    }

    // Add New 
    public function addnew()
    {
    
        $this->isLoggedIn();
        $this->global['pageTitle'] = 'Website Name : Add New';
        $this->loadViews("admin/settings/addnew", $this->global, NULL , NULL);
        
    } 

    // Insert Member *************************************************************
    public function insertnow()
    {
        $this->isLoggedIn();
         $form_data  = $this->input->post();
         
        $this->load->library('form_validation');                 
        $this->form_validation->set_rules('school_name','School name','required');
        $this->form_validation->set_rules('email_id','Email Id','required');
        
        
        //form data 
        $form_data  = $this->input->post();
        if($this->form_validation->run() == FALSE)
        {
            $this->addnew();
        }
        else
        {   
                $insertData['school_name'] = $form_data['school_name'];
                $insertData['phone_no'] = $form_data['phone_no'];
                $insertData['email_id'] = $form_data['email_id'];
                $insertData['address'] = $form_data['address'];
                $insertData['status'] = $form_data['status'];
                $insertData['date_by']      = date('Y-m-d');

                if(isset($_FILES['logo']['name']) && $_FILES['logo']['name'] != '') {

                $f_name         =$_FILES['logo']['name'];
                $f_tmp          =$_FILES['logo']['tmp_name'];
                $f_size         =$_FILES['logo']['size'];
                $f_extension    =explode('.',$f_name);
                $f_extension    =strtolower(end($f_extension));
                $f_newfile      =uniqid().'.'.$f_extension;
                $store          ="uploads/school/".$f_newfile;
            
                if(!move_uploaded_file($f_tmp,$store))
                {
                    $this->session->set_flashdata('error', 'Image Upload Failed .');
                }
                else
                {
                   $insertData['logo'] = $f_newfile;
                   
                }
             }

             if(isset($_FILES['watermark']['name']) && $_FILES['watermark']['name'] != '') {

                $f_name         =$_FILES['watermark']['name'];
                $f_tmp          =$_FILES['watermark']['tmp_name'];
                $f_size         =$_FILES['watermark']['size'];
                $f_extension    =explode('.',$f_name);
                $f_extension    =strtolower(end($f_extension));
                $f_newfile      =uniqid().'.'.$f_extension;
                $store          ="uploads/school/".$f_newfile;
            
                if(!move_uploaded_file($f_tmp,$store))
                {
                    $this->session->set_flashdata('error', 'Image Upload Failed .');
                }
                else
                {
                   $insertData['watermark'] = $f_newfile;
                   
                }
             }

            $result = $this->settings_model->save($insertData);
            if($result > 0)
            {
                $this->session->set_flashdata('success', 'Lead Successfully Added');
            }
            else
            { 
                $this->session->set_flashdata('error', 'Lead Addition failed');
            }
            redirect('admin/settings/addnew');
          }  
        
    }


    // Member list
    public function ajax_list()
    {
        $list = $this->settings_model->get_datatables();
        
       
        $data = array();
        $no =(isset($_POST['start']))?$_POST['start']:'';
        foreach ($list as $currentObj) {

            $filename = (isset($currentObj->logo) && $currentObj->logo !=='') ? ($currentObj->logo) : ("");
            $filenamewatermark = (isset($currentObj->watermark) && $currentObj->watermark !=='') ? ($currentObj->watermark) : ("");

            $selected = ($currentObj->status == 0)?" selected ":"";
             
            $btn = '<select class="statusBtn form-select" name="statusBtn" data-id="'.$currentObj->id.'">';
            $btn .= '<option value="1"  >Active</option>';
            $btn .= '<option value="0" '.$selected.' >Inactive</option>';
            $btn .= '</select>';

            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $currentObj->school_name;
            $row[] = $currentObj->phone_no;
            $row[] = $currentObj->email_id;
            $row[] = $currentObj->address;
            $row[] = '<img src ="'.base_url().'uploads/school/'.$filename.'" width="80" alt = "school"/>';
            $row[] = '<img src ="'.base_url().'uploads/school/'.$filenamewatermark.'" width="80" alt = "school"/>';
            $row[] = $btn;
            if($this->session->userdata('role') == 1){ 
            $row[] = '<a class="btn btn-sm btn-info" href="'.base_url().'admin/settings/edit/'.$currentObj->id.'">Edit</a>
            <a class="btn btn-sm btn-danger deletebtn" href="#" data-userid="'.$currentObj->id.'">Delete</a>';
            }
            $row[] = '<a class="btn btn-sm btn-info" href="'.base_url().'admin/settings/view/'.$currentObj->id.'">View Data</a>';
            $data[] = $row;
        }
 
        $output = array(
                        "draw" => (isset($_POST['draw']))?$_POST['draw']:'',
                        "recordsTotal" => $this->settings_model->count_all(),
                        "recordsFiltered" => $this->settings_model->count_filtered(),
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
        $result = $this->settings_model->save($insertData);
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
            redirect('admin/dashboard');
        }

        
        $data['edit_data'] = $this->settings_model->find($id);
        $this->global['pageTitle'] = 'Website Name : Edit Data';
        $this->loadViews("admin/settings/edit", $this->global, $data , NULL);
        
        
    } 


     public function view($id = NULL)
    {
        
        //exit;
        $this->isLoggedIn();
        if($id == null)
        {
            redirect('admin/dashboard');
        }

        
        $data['edit_data'] = $this->settings_model->find($id);
        $this->global['pageTitle'] = 'Website Name : View Data';
        $this->loadViews("admin/dashboardaus/view", $this->global, $data , NULL);
        
        
    } 

    // Update Members *************************************************************
    public function update()
    {
        $this->isLoggedIn();
        $this->load->library('form_validation');                 
        $this->form_validation->set_rules('school_name','School Name','required');
        
        
        //form data 
        $form_data  = $this->input->post();
        if($this->form_validation->run() == FALSE)
        {
                $this->edit($form_data['id']);
        }
        else
        {   

                
            $insertData['id'] = $form_data['id'];
            $insertData['school_name'] = $form_data['school_name'];
            $insertData['phone_no'] = $form_data['phone_no'];
            $insertData['email_id'] = $form_data['email_id'];
            $insertData['address'] = $form_data['address'];
            $insertData['status'] = $form_data['status'];
            $insertData['date_by']      = date('Y-m-d');

                if(isset($_FILES['logo']['name']) && $_FILES['logo']['name'] != '') {

                $f_name         =$_FILES['logo']['name'];
                $f_tmp          =$_FILES['logo']['tmp_name'];
                $f_size         =$_FILES['logo']['size'];
                $f_extension    =explode('.',$f_name);
                $f_extension    =strtolower(end($f_extension));
                $f_newfile      =uniqid().'.'.$f_extension;
                $store          ="uploads/school/".$f_newfile;
            
                if(!move_uploaded_file($f_tmp,$store))
                {
                    $this->session->set_flashdata('error', 'Image Upload Failed .');
                }
                else
                {
                   $insertData['logo'] = $f_newfile;
                   
                }
             }

             if(isset($_FILES['watermark']['name']) && $_FILES['watermark']['name'] != '') {

                $f_name         =$_FILES['watermark']['name'];
                $f_tmp          =$_FILES['watermark']['tmp_name'];
                $f_size         =$_FILES['watermark']['size'];
                $f_extension    =explode('.',$f_name);
                $f_extension    =strtolower(end($f_extension));
                $f_newfile      =uniqid().'.'.$f_extension;
                $store          ="uploads/school/".$f_newfile;
            
                if(!move_uploaded_file($f_tmp,$store))
                {
                    $this->session->set_flashdata('error', 'Image Upload Failed .');
                }
                else
                {
                   $insertData['watermark'] = $f_newfile;
                   
                }
             }

            $result = $this->settings_model->save($insertData);

            if($result > 0)
            {
                $this->session->set_flashdata('success', 'Lead successfully Updated');
            }
            else
            { 
                $this->session->set_flashdata('error', 'Lead Updation failed');
            }
            redirect('admin/settings/edit/'.$insertData['id']);
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
                 $result  = $this->settings_model->findDynamic($where);

                  

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
        $result = $this->settings_model->delete($delId);           
        if ($result > 0) { echo(json_encode(array('status'=>TRUE))); }
        else { echo(json_encode(array('status'=>FALSE))); }
    }
    
    
}

?>