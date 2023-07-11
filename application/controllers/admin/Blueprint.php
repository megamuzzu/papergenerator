<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

class Blueprint extends BaseController
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin/blueprint_model');
        $this->load->model('admin/subject_model');
        $this->load->model('admin/classes_model');
    }

    /**
     * Index Page for this controller.
     */
    public function index()
    {
        $this->isLoggedIn();
        $this->global['pageTitle'] = 'Website Name : School List';
        $this->loadViews("admin/question/list", $this->global, NULL , NULL);
        
    }

    // Add New 
    public function addnew()
    {
        
        $where = array();
        $where['table'] = 'subject';
        $data['subject_data'] = $this->subject_model->findDynamic($where);
        $data['subject_name'] = $data['subject_data'][0]->subject_name;
        $data['subject_code'] = $data['subject_data'][0]->subject_code;


        $where = array();
        $where['table'] = 'classes';
        $data['class_data'] = $this->classes_model->findDynamic($where);
        $data['class_name'] = $data['class_data'][0]->student_class_name;

        $this->isLoggedIn();
        $this->global['pageTitle'] = 'Website Name : Add New';
        $this->loadViews("admin/question/addnew", $this->global, $data , NULL);
        
    } 

    // Insert Member *************************************************************
    public function insertnow()
    {
        $this->isLoggedIn();
         $form_data  = $this->input->post();
         
        $this->load->library('form_validation');                 
        $this->form_validation->set_rules('question_paper_name','Question Paper Name','required');
        $this->form_validation->set_rules('subject_code','Subject Code','required');
        $this->form_validation->set_rules('subject_name','Subject Name','required');
        $this->form_validation->set_rules('class_name','Class Name','required');
        
        
        //form data 
        $form_data  = $this->input->post();
        if($this->form_validation->run() == FALSE)
        {
            $this->addnew();
        }
        else
        {   
                $insertData['question_paper_name'] = $form_data['question_paper_name'];
                $insertData['subject_name'] = $form_data['subject_name'];
                $insertData['subject_code'] = $form_data['subject_code'];
                $insertData['class_name'] = $form_data['class_name'];
                $insertData['status'] = $form_data['status'];
                $insertData['date_by']      = date('Y-m-d');

            $result = $this->blueprint_model->save($insertData);
            if($result > 0)
            {
                $this->session->set_flashdata('success', 'Blueprint Successfully Added');
            }
            else
            { 
                $this->session->set_flashdata('error', 'Blueprint Addition failed');
            }
            redirect('admin/blueprint/addnew');
          }  
        
    }


    // Member list
    public function ajax_list()
    {
        $list = $this->blueprint_model->get_datatables();
        
       
        $data = array();
        $no =(isset($_POST['start']))?$_POST['start']:'';
        foreach ($list as $currentObj) {

    
            $selected = ($currentObj->status == 0)?" selected ":"";
             
            $btn = '<select class="statusBtn form-select" name="statusBtn" data-id="'.$currentObj->id.'">';
            $btn .= '<option value="1"  >Active</option>';
            $btn .= '<option value="0" '.$selected.' >Inactive</option>';
            $btn .= '</select>';

            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $currentObj->question_paper_name;
            $row[] = $currentObj->subject_code;
            $row[] = $currentObj->subject_name;
            $row[] = $currentObj->class_name;
            $row[] = $btn;
            if($this->session->userdata('role') == 1){ 
            $row[] = '<a class="btn btn-sm btn-info" href="'.base_url().'admin/blueprint/edit/'.$currentObj->id.'">Edit</a>
            <a class="btn btn-sm btn-danger deletebtn" href="#" data-userid="'.$currentObj->id.'">Delete</a>';
            }
            $row[] = '<a class="btn btn-sm btn-info" href="'.base_url().'admin/blueprint/view/'.$currentObj->id.'">Add Question</a>';
            $data[] = $row;
        }
 
        $output = array(
                        "draw" => (isset($_POST['draw']))?$_POST['draw']:'',
                        "recordsTotal" => $this->blueprint_model->count_all(),
                        "recordsFiltered" => $this->blueprint_model->count_filtered(),
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
        $result = $this->blueprint_model->save($insertData);
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

        $where = array();
        $where['table'] = 'subject';
        $data['subject_data'] = $this->subject_model->findDynamic($where);
        $data['subject_name'] = $data['subject_data'][0]->subject_name;
        $data['subject_code'] = $data['subject_data'][0]->subject_code;


        $where = array();
        $where['table'] = 'classes';
        $data['class_data'] = $this->classes_model->findDynamic($where);
        $data['class_name'] = $data['class_data'][0]->student_class_name;

        
        $data['edit_data'] = $this->blueprint_model->find($id);
        $this->global['pageTitle'] = 'Website Name : Edit Data';
        $this->loadViews("admin/question/edit", $this->global, $data , NULL);
        
        
    } 


     public function view($id = NULL)
    {
        
        //exit;
        $this->isLoggedIn();
        if($id == null)
        {
            redirect('admin/dashboard');
        }

        
        $data['edit_data'] = $this->blueprint_model->find($id);
        $this->global['pageTitle'] = 'Website Name : View Data';
        $this->loadViews("admin/dashboardaus/view", $this->global, $data , NULL);
        
        
    } 

    // Update Members *************************************************************
    public function update()
    {
        $this->isLoggedIn();
        $this->load->library('form_validation');                 
        $this->form_validation->set_rules('question_paper_name','Question Paper Name','required');
        $this->form_validation->set_rules('subject_code','Subject Code','required');
        $this->form_validation->set_rules('subject_name','Subject Name','required');
        $this->form_validation->set_rules('class_name','Class Name','required');
        
        
        //form data 
        $form_data  = $this->input->post();
        if($this->form_validation->run() == FALSE)
        {
                $this->edit($form_data['id']);
        }
        else
        {   

                
            $insertData['id'] = $form_data['id'];
            $insertData['question_paper_name'] = $form_data['question_paper_name'];
            $insertData['subject_name'] = $form_data['subject_name'];
            $insertData['subject_code'] = $form_data['subject_code'];
            $insertData['class_name'] = $form_data['class_name'];
            $insertData['status'] = $form_data['status'];
            $insertData['date_by']      = date('Y-m-d');

            $result = $this->blueprint_model->save($insertData);

            if($result > 0)
            {
                $this->session->set_flashdata('success', 'Blueprint successfully Updated');
            }
            else
            { 
                $this->session->set_flashdata('error', 'Blueprint Updation failed');
            }
            redirect('admin/blueprint/edit/'.$insertData['id']);
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
                 $result  = $this->blueprint_model->findDynamic($where);

                  

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
        $result = $this->blueprint_model->delete($delId);           
        if ($result > 0) { echo(json_encode(array('status'=>TRUE))); }
        else { echo(json_encode(array('status'=>FALSE))); }
    }
    
    
}

?>