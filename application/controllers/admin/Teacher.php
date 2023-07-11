<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

class Teacher extends BaseController
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin/teacher_model');
        $this->load->model('admin/subject_model');
        $this->load->model('admin/settings_model');
    }

    /**
     * Index Page for this controller.
     */
    public function index()
    {
        $this->isLoggedIn();
        $this->global['pageTitle'] = 'Website Name : School List';
        $this->loadViews("admin/teacher/list", $this->global, NULL , NULL);
        
    }

    // Add New 
    public function addnew()
    {
        
        $where = array();
        $where['table'] = 'subject';
        $data['subject_data'] = $this->subject_model->findDynamic($where);
        $data['subject_name'] = $data['subject_data'][0]->subject_name;


        $data['apple'] = $this->subject_model->getSubjectData();
        $data['studentClassName'] = $data['apple'][0]->student_class_name;
        $data['section_point'] = $this->subject_model->getSectionData();
        $data['studentSectionName'] = $data['section_point'][0]->student_sections_name;

        $this->isLoggedIn();
        $this->global['pageTitle'] = 'Website Name : Add New';
        $this->loadViews("admin/teacher/addnew", $this->global, $data , NULL);
        
    } 

    // Insert Member *************************************************************
    public function insertnow()
    {
        $this->isLoggedIn();
         $form_data  = $this->input->post();
         
        $this->load->library('form_validation');                 
        $this->form_validation->set_rules('teacher_name','Teacher Name','required');
        $this->form_validation->set_rules('teacher_id','Teacher ID','required');
        
        
        //form data 
        $form_data  = $this->input->post();
        if($this->form_validation->run() == FALSE)
        {
            $this->addnew();
        }
        else
        {   
                $insertData['teacher_name'] = $form_data['teacher_name'];
                $insertData['teacher_id'] = $form_data['teacher_id'];
                $insertData['subject_of_teacher'] = $form_data['subject_of_teacher'];
                $insertData['phone_no'] = $form_data['phone_no'];
                $insertData['email_id'] = $form_data['email_id'];
                $insertData['teacher_password'] = $form_data['teacher_password'];
                $insertData['aadhar_details'] = $form_data['aadhar_details'];
                $insertData['address_teacher'] = $form_data['address_teacher'];
                $insertData['class_teacher'] = $form_data['class_teacher'];
                $insertData['class_section'] = $form_data['class_section'];
                $insertData['status'] = $form_data['status'];
                $insertData['date_by']      = date('Y-m-d');

                if(isset($_FILES['photo_teacher']['name']) && $_FILES['photo_teacher']['name'] != '') {

                $f_name         =$_FILES['photo_teacher']['name'];
                $f_tmp          =$_FILES['photo_teacher']['tmp_name'];
                $f_size         =$_FILES['photo_teacher']['size'];
                $f_extension    =explode('.',$f_name);
                $f_extension    =strtolower(end($f_extension));
                $f_newfile      =uniqid().'.'.$f_extension;
                $store          ="uploads/teacher/".$f_newfile;
            
                if(!move_uploaded_file($f_tmp,$store))
                {
                    $this->session->set_flashdata('error', 'Image Upload Failed .');
                }
                else
                {
                   $insertData['photo_teacher'] = $f_newfile;
                   
                }
             }

            $result = $this->teacher_model->save($insertData);
            if($result > 0)
            {
                $this->session->set_flashdata('success', 'Teacher Successfully Added');
            }
            else
            { 
                $this->session->set_flashdata('error', 'Teacher Addition failed');
            }
            redirect('admin/teacher/addnew');
          }  
        
    }


    // Member list
    public function ajax_list()
    {
        $list = $this->teacher_model->get_datatables();
        
       
        $data = array();
        $no =(isset($_POST['start']))?$_POST['start']:'';
        foreach ($list as $currentObj) {

            $filename = (isset($currentObj->photo_teacher) && $currentObj->photo_teacher !=='') ? ($currentObj->photo_teacher) : ("");

            $selected = ($currentObj->status == 0)?" selected ":"";
             
            $btn = '<select class="statusBtn form-select" name="statusBtn" data-id="'.$currentObj->id.'">';
            $btn .= '<option value="1"  >Active</option>';
            $btn .= '<option value="0" '.$selected.' >Inactive</option>';
            $btn .= '</select>';

            $no++;
            $row = array();
            $row[] = $no;
            $row[] = '<img src ="'.base_url().'uploads/teacher/'.$filename.'" width="120" alt = "teacher"/>';
            $row[] = $currentObj->teacher_id;
            $row[] = $currentObj->teacher_name;
            $row[] = $currentObj->subject_of_teacher;
            $row[] = $currentObj->phone_no;
            $row[] = $currentObj->class_teacher;
            
            $row[] = $btn;
            if($this->session->userdata('role') == 1){ 
            $row[] = '<a class="btn btn-sm btn-info" href="'.base_url().'admin/teacher/edit/'.$currentObj->id.'">Edit</a>
            <a class="btn btn-sm btn-danger deletebtn" href="#" data-userid="'.$currentObj->id.'">Delete</a><br><a class="btn btn-sm btn-danger mt-2" href="'.base_url().'admin/teacher/view/'.$currentObj->id.'">Print Details</a>';
            }
            $row[] = '<a class="btn btn-sm btn-info" href="'.base_url().'admin/teacher/view/'.$currentObj->id.'">View Data</a>';
            $data[] = $row;
        }
 
        $output = array(
                        "draw" => (isset($_POST['draw']))?$_POST['draw']:'',
                        "recordsTotal" => $this->teacher_model->count_all(),
                        "recordsFiltered" => $this->teacher_model->count_filtered(),
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
        $result = $this->teacher_model->save($insertData);
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
            redirect('admin/teacher');
        }

        $where = array();
        $where['table'] = 'subject';
        $data['subject_data'] = $this->subject_model->findDynamic($where);
        $data['subject_name'] = $data['subject_data'][0]->subject_name;


        $data['apple'] = $this->subject_model->getSubjectData();
        $data['studentClassName'] = $data['apple'][0]->student_class_name;
        $data['section_point'] = $this->subject_model->getSectionData();
        $data['studentSectionName'] = $data['section_point'][0]->student_sections_name;
        
        $data['edit_data'] = $this->teacher_model->find($id);
        $this->global['pageTitle'] = 'Website Name : Edit Data';
        $this->loadViews("admin/teacher/edit", $this->global, $data , NULL);
        
        
    } 


     public function view($id = NULL)
    {
        
        //exit;
        $this->isLoggedIn();
        if($id == null)
        {
            redirect('admin/dashboard');
        }

        $where = array();
        $where['table'] = 'teacher';
        $where['id'] = $id;
        $data['teacher_data'] = $this->subject_model->findDynamic($where);

        $where = array();
        $where['table'] = 'settings';
        $data['school_data'] = $this->settings_model->findDynamic($where);

        
        $data['edit_data'] = $this->teacher_model->find($id);
        $this->global['pageTitle'] = 'Website Name : View Data';
        $this->loadViews("admin/teacher/view", $this->global, $data , NULL);
        
        
    } 

    // Update Members *************************************************************
    public function update()
    {
        $this->isLoggedIn();
        $this->load->library('form_validation');                 
        $this->form_validation->set_rules('teacher_name','Teacher Name','required');
        
        
        //form data 
        $form_data  = $this->input->post();
        if($this->form_validation->run() == FALSE)
        {
                $this->edit($form_data['id']);
        }
        else
        {   

                
            $insertData['id'] = $form_data['id'];
            $insertData['teacher_name'] = $form_data['teacher_name'];
                $insertData['teacher_id'] = $form_data['teacher_id'];
                $insertData['subject_of_teacher'] = $form_data['subject_of_teacher'];
                $insertData['phone_no'] = $form_data['phone_no'];
                $insertData['email_id'] = $form_data['email_id'];
                $insertData['teacher_password'] = $form_data['teacher_password'];
                $insertData['aadhar_details'] = $form_data['aadhar_details'];
                $insertData['address_teacher'] = $form_data['address_teacher'];
                $insertData['class_teacher'] = $form_data['class_teacher'];
                $insertData['class_section'] = $form_data['class_section'];
                $insertData['status'] = $form_data['status'];
                $insertData['date_by']      = date('Y-m-d');

                if(isset($_FILES['photo_teacher']['name']) && $_FILES['photo_teacher']['name'] != '') {

                $f_name         =$_FILES['photo_teacher']['name'];
                $f_tmp          =$_FILES['photo_teacher']['tmp_name'];
                $f_size         =$_FILES['photo_teacher']['size'];
                $f_extension    =explode('.',$f_name);
                $f_extension    =strtolower(end($f_extension));
                $f_newfile      =uniqid().'.'.$f_extension;
                $store          ="uploads/teacher/".$f_newfile;
            
                if(!move_uploaded_file($f_tmp,$store))
                {
                    $this->session->set_flashdata('error', 'Image Upload Failed .');
                }
                else
                {
                   $insertData['photo_teacher'] = $f_newfile;
                   
                }
             }

            $result = $this->teacher_model->save($insertData);

            if($result > 0)
            {
                $this->session->set_flashdata('success', 'Teacher successfully Updated');
            }
            else
            { 
                $this->session->set_flashdata('error', 'Teacher Updation failed');
            }
            redirect('admin/teacher/edit/'.$insertData['id']);
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
                 $result  = $this->teacher_model->findDynamic($where);

                  

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
        $result = $this->teacher_model->delete($delId);           
        if ($result > 0) { echo(json_encode(array('status'=>TRUE))); }
        else { echo(json_encode(array('status'=>FALSE))); }
    }
    
    
}

?>