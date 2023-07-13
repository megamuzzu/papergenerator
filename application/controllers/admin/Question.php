<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

class Question extends BaseController
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin/blueprint_model');
        $this->load->model('admin/question_model');
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

   
    // Insert Member *************************************************************
    public function insertnow()
    {
        $this->isLoggedIn();
        $form_data  = $this->input->post();
        $this->form_validation->set_rules('question_type','Question Type','required');
        $this->form_validation->set_rules('status','Status','required');
         
        $this->load->library('form_validation');    
        
        
        //form data 
        $form_data  = $this->input->post();
        if($this->form_validation->run() == FALSE)
        {
            $this->addnew();
        }
        else
        {       
                $insertData['blueprint_id'] = $form_data['blueprint_id'];

                $insertData['question_paper_name'] = $form_data['question_paper_name'];
                $insertData['subject_name'] = $form_data['subject_name'];
                $insertData['subject_code'] = $form_data['subject_code'];



                $insertData['question_type'] = $form_data['question_type'];

                $insertData['question_fitb'] = $form_data['question_fitb'];
                $insertData['answer_fitb'] = $form_data['answer_fitb'];

                $insertData['question_qa'] = $form_data['question_qa'];
                $insertData['answer_qa'] = $form_data['answer_qa'];


                $insertData['question_tf'] = $form_data['question_tf'];
                $insertData['answer_true'] = $form_data['answer_true'];
                $insertData['answer_false'] = $form_data['answer_false'];


                $insertData['question_mcq'] = $form_data['question_mcq'];
                $insertData['answer_mcq_one'] = $form_data['answer_mcq_one'];
                $insertData['answer_mcq_two'] = $form_data['answer_mcq_two'];
                $insertData['answer_mcq_three'] = $form_data['answer_mcq_three'];
                $insertData['answer_mcq_four'] = $form_data['answer_mcq_four'];


                $insertData['question_picture_mcq'] = $form_data['question_picture_mcq'];

                if(isset($_FILES['mcq_picture_one']['name']) && $_FILES['mcq_picture_one']['name'] != '') {

                $f_name         =$_FILES['mcq_picture_one']['name'];
                $f_tmp          =$_FILES['mcq_picture_one']['tmp_name'];
                $f_size         =$_FILES['mcq_picture_one']['size'];
                $f_extension    =explode('.',$f_name);
                $f_extension    =strtolower(end($f_extension));
                $f_newfile      =uniqid().'.'.$f_extension;
                $store          ="uploads/questiomcq/".$f_newfile;
            
                if(!move_uploaded_file($f_tmp,$store))
                {
                    $this->session->set_flashdata('error', 'Image Upload Failed .');
                }
                else
                {
                   $insertData['mcq_picture_one'] = $f_newfile;
                   
                }
             }



             if(isset($_FILES['mcq_picture_two']['name']) && $_FILES['mcq_picture_two']['name'] != '') {

                $f_name         =$_FILES['mcq_picture_two']['name'];
                $f_tmp          =$_FILES['mcq_picture_two']['tmp_name'];
                $f_size         =$_FILES['mcq_picture_two']['size'];
                $f_extension    =explode('.',$f_name);
                $f_extension    =strtolower(end($f_extension));
                $f_newfile      =uniqid().'.'.$f_extension;
                $store          ="uploads/questiomcq/".$f_newfile;
            
                if(!move_uploaded_file($f_tmp,$store))
                {
                    $this->session->set_flashdata('error', 'Image Upload Failed .');
                }
                else
                {
                   $insertData['mcq_picture_two'] = $f_newfile;
                   
                }
             }


              if(isset($_FILES['mcq_picture_three']['name']) && $_FILES['mcq_picture_three']['name'] != '') {

                $f_name         =$_FILES['mcq_picture_three']['name'];
                $f_tmp          =$_FILES['mcq_picture_three']['tmp_name'];
                $f_size         =$_FILES['mcq_picture_three']['size'];
                $f_extension    =explode('.',$f_name);
                $f_extension    =strtolower(end($f_extension));
                $f_newfile      =uniqid().'.'.$f_extension;
                $store          ="uploads/questiomcq/".$f_newfile;
            
                if(!move_uploaded_file($f_tmp,$store))
                {
                    $this->session->set_flashdata('error', 'Image Upload Failed .');
                }
                else
                {
                   $insertData['mcq_picture_three'] = $f_newfile;
                   
                }
             }


               if(isset($_FILES['mcq_picture_four']['name']) && $_FILES['mcq_picture_four']['name'] != '') {

                $f_name         =$_FILES['mcq_picture_four']['name'];
                $f_tmp          =$_FILES['mcq_picture_four']['tmp_name'];
                $f_size         =$_FILES['mcq_picture_four']['size'];
                $f_extension    =explode('.',$f_name);
                $f_extension    =strtolower(end($f_extension));
                $f_newfile      =uniqid().'.'.$f_extension;
                $store          ="uploads/questiomcq/".$f_newfile;
            
                if(!move_uploaded_file($f_tmp,$store))
                {
                    $this->session->set_flashdata('error', 'Image Upload Failed .');
                }
                else
                {
                   $insertData['mcq_picture_four'] = $f_newfile;
                   
                }
             }


             if(isset($_FILES['tf_picture_question']['name']) && $_FILES['tf_picture_question']['name'] != '') {

                $f_name         =$_FILES['tf_picture_question']['name'];
                $f_tmp          =$_FILES['tf_picture_question']['tmp_name'];
                $f_size         =$_FILES['tf_picture_question']['size'];
                $f_extension    =explode('.',$f_name);
                $f_extension    =strtolower(end($f_extension));
                $f_newfile      =uniqid().'.'.$f_extension;
                $store          ="uploads/questiontf/".$f_newfile;
            
                if(!move_uploaded_file($f_tmp,$store))
                {
                    $this->session->set_flashdata('error', 'Image Upload Failed .');
                }
                else
                {
                   $insertData['tf_picture_question'] = $f_newfile;
                   
                }
             }

 
             $insertData['answer_picture_true'] = $form_data['answer_picture_true'];
             $insertData['answer_picture_false'] = $form_data['answer_picture_false'];


            


                $insertData['marks'] = $form_data['marks'];

                $insertData['status'] = $form_data['status'];
                $insertData['date_by']      = date('Y-m-d');

            $result = $this->question_model->save($insertData);
            if($result > 0)
            {
                $this->session->set_flashdata('success', 'Question Successfully Added');
            }
            else
            { 
                $this->session->set_flashdata('error', 'Question Addition failed');
            }
            redirect('admin/blueprint/addblueprint/'.$insertData['blueprint_id']);
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
            $row[] = '<a class="btn btn-sm btn-info" href="'.base_url().'admin/blueprint/addblueprint/'.$currentObj->id.'">Add Question</a>';
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
        $this->form_validation->set_rules('question_type','Question Type','required');
        $this->form_validation->set_rules('status','Status','required');
        
        
        //form data 
        $form_data  = $this->input->post();
        if($this->form_validation->run() == FALSE)
        {
                $this->edit($form_data['id']);
        }
        else
        {   

                
            $insertData['id'] = $form_data['id'];

            $insertData['blueprint_id'] = $form_data['blueprint_id'];

                $insertData['question_paper_name'] = $form_data['question_paper_name'];
                $insertData['subject_name'] = $form_data['subject_name'];
                $insertData['subject_code'] = $form_data['subject_code'];



                $insertData['question_type'] = $form_data['question_type'];

                $insertData['question_fitb'] = $form_data['question_fitb'];
                $insertData['answer_fitb'] = $form_data['answer_fitb'];

                $insertData['question_qa'] = $form_data['question_qa'];
                $insertData['answer_qa'] = $form_data['answer_qa'];


                $insertData['question_tf'] = $form_data['question_tf'];
                $insertData['answer_true'] = $form_data['answer_true'];
                $insertData['answer_false'] = $form_data['answer_false'];


                $insertData['question_mcq'] = $form_data['question_mcq'];
                $insertData['answer_mcq_one'] = $form_data['answer_mcq_one'];
                $insertData['answer_mcq_two'] = $form_data['answer_mcq_two'];
                $insertData['answer_mcq_three'] = $form_data['answer_mcq_three'];
                $insertData['answer_mcq_four'] = $form_data['answer_mcq_four'];


                $insertData['question_picture_mcq'] = $form_data['question_picture_mcq'];

                if(isset($_FILES['mcq_picture_one']['name']) && $_FILES['mcq_picture_one']['name'] != '') {

                $f_name         =$_FILES['mcq_picture_one']['name'];
                $f_tmp          =$_FILES['mcq_picture_one']['tmp_name'];
                $f_size         =$_FILES['mcq_picture_one']['size'];
                $f_extension    =explode('.',$f_name);
                $f_extension    =strtolower(end($f_extension));
                $f_newfile      =uniqid().'.'.$f_extension;
                $store          ="uploads/questiomcq/".$f_newfile;
            
                if(!move_uploaded_file($f_tmp,$store))
                {
                    $this->session->set_flashdata('error', 'Image Upload Failed .');
                }
                else
                {
                   $insertData['mcq_picture_one'] = $f_newfile;
                   
                }
             }



             if(isset($_FILES['mcq_picture_two']['name']) && $_FILES['mcq_picture_two']['name'] != '') {

                $f_name         =$_FILES['mcq_picture_two']['name'];
                $f_tmp          =$_FILES['mcq_picture_two']['tmp_name'];
                $f_size         =$_FILES['mcq_picture_two']['size'];
                $f_extension    =explode('.',$f_name);
                $f_extension    =strtolower(end($f_extension));
                $f_newfile      =uniqid().'.'.$f_extension;
                $store          ="uploads/questiomcq/".$f_newfile;
            
                if(!move_uploaded_file($f_tmp,$store))
                {
                    $this->session->set_flashdata('error', 'Image Upload Failed .');
                }
                else
                {
                   $insertData['mcq_picture_two'] = $f_newfile;
                   
                }
             }


              if(isset($_FILES['mcq_picture_three']['name']) && $_FILES['mcq_picture_three']['name'] != '') {

                $f_name         =$_FILES['mcq_picture_three']['name'];
                $f_tmp          =$_FILES['mcq_picture_three']['tmp_name'];
                $f_size         =$_FILES['mcq_picture_three']['size'];
                $f_extension    =explode('.',$f_name);
                $f_extension    =strtolower(end($f_extension));
                $f_newfile      =uniqid().'.'.$f_extension;
                $store          ="uploads/questiomcq/".$f_newfile;
            
                if(!move_uploaded_file($f_tmp,$store))
                {
                    $this->session->set_flashdata('error', 'Image Upload Failed .');
                }
                else
                {
                   $insertData['mcq_picture_three'] = $f_newfile;
                   
                }
             }


               if(isset($_FILES['mcq_picture_four']['name']) && $_FILES['mcq_picture_four']['name'] != '') {

                $f_name         =$_FILES['mcq_picture_four']['name'];
                $f_tmp          =$_FILES['mcq_picture_four']['tmp_name'];
                $f_size         =$_FILES['mcq_picture_four']['size'];
                $f_extension    =explode('.',$f_name);
                $f_extension    =strtolower(end($f_extension));
                $f_newfile      =uniqid().'.'.$f_extension;
                $store          ="uploads/questiomcq/".$f_newfile;
            
                if(!move_uploaded_file($f_tmp,$store))
                {
                    $this->session->set_flashdata('error', 'Image Upload Failed .');
                }
                else
                {
                   $insertData['mcq_picture_four'] = $f_newfile;
                   
                }
             }


             if(isset($_FILES['tf_picture_question']['name']) && $_FILES['tf_picture_question']['name'] != '') {

                $f_name         =$_FILES['tf_picture_question']['name'];
                $f_tmp          =$_FILES['tf_picture_question']['tmp_name'];
                $f_size         =$_FILES['tf_picture_question']['size'];
                $f_extension    =explode('.',$f_name);
                $f_extension    =strtolower(end($f_extension));
                $f_newfile      =uniqid().'.'.$f_extension;
                $store          ="uploads/questiontf/".$f_newfile;
            
                if(!move_uploaded_file($f_tmp,$store))
                {
                    $this->session->set_flashdata('error', 'Image Upload Failed .');
                }
                else
                {
                   $insertData['tf_picture_question'] = $f_newfile;
                   
                }
             }

 
             $insertData['answer_picture_true'] = $form_data['answer_picture_true'];
             $insertData['answer_picture_false'] = $form_data['answer_picture_false'];


            


                $insertData['marks'] = $form_data['marks'];

                $insertData['status'] = $form_data['status'];
                $insertData['update_by']      = date('Y-m-d');



            $result = $this->question_model->save($insertData);

            if($result > 0)
            {
                $this->session->set_flashdata('success', 'Question successfully Updated');
            }
            else
            { 
                $this->session->set_flashdata('error', 'Question Updation failed');
            }
            redirect('admin/blueprint/addblueprint/'.$insertData['blueprint_id']);
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
        $result = $this->question_model->delete($delId);           
        if ($result > 0) { echo(json_encode(array('status'=>TRUE))); }
        else { echo(json_encode(array('status'=>FALSE))); }
    }
    
  public function delete_row($id) {
    $blue_id = $this->question_model->did_delete_row($id);

    if ($blue_id !== false) {
        redirect('admin/blueprint/addblueprint/'.$blue_id);
    } else {
        redirect('admin/blueprint/');
    }
}

    

    
}

?>