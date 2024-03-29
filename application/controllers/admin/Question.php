<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

class Question extends BaseController
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin/blueprint_model');
        $this->load->model('admin/question_model');
        $this->load->library('csvimport');
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

                $insertData['term'] = $form_data['term'];
                $insertData['sub_name'] = $form_data['sub_name'];
                $insertData['sub_code'] = $form_data['sub_code'];
                $insertData['class_name'] = $form_data['class_name'];
                $insertData['class_sec'] = $form_data['class_sec'];
                $insertData['duration'] = $form_data['duration'];


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


   function import()
    {
        $file_data = $this->csvimport->get_array($_FILES["csv_file"]["tmp_name"]);
        foreach($file_data as $row)
        {

        $tf_picture_url = $row["tf_picture_question"];
        $uploaded_filename = '';

        // Check if the image URL is provided in the CSV
        if (!empty($tf_picture_url)) {
            // Get the image content from the URL
            $image_content = file_get_contents($tf_picture_url);

            // Generate a unique name for the picture to avoid conflicts
            $uploaded_filename = time() . '_' . basename($tf_picture_url);

            // Save the image to the 'uploads/questiontf' folder
            $destination_path = FCPATH . 'uploads/questiontf/' . $uploaded_filename;
            file_put_contents($destination_path, $image_content);
        }


        $mcq_picture_one = $row["mcq_picture_one"];
        $uploaded_filename_mcq_one = '';

        // Check if the image URL is provided in the CSV
        if (!empty($mcq_picture_one)) {
            // Get the image content from the URL
            $image_content = file_get_contents($mcq_picture_one);

            // Generate a unique name for the picture to avoid conflicts
            $uploaded_filename_mcq_one = time() . '_' . basename($mcq_picture_one);

            // Save the image to the 'uploads/questiontf' folder
            $destination_path = FCPATH . 'uploads/questiomcq/' . $uploaded_filename_mcq_one;
            file_put_contents($destination_path, $image_content);
        }


        $mcq_picture_two = $row["mcq_picture_two"];
        $uploaded_filename_mcq_two = '';

        // Check if the image URL is provided in the CSV
        if (!empty($mcq_picture_two)) {
            // Get the image content from the URL
            $image_content = file_get_contents($mcq_picture_two);

            // Generate a unique name for the picture to avoid conflicts
            $uploaded_filename_mcq_two = time() . '_' . basename($mcq_picture_two);

            // Save the image to the 'uploads/questiontf' folder
            $destination_path = FCPATH . 'uploads/questiomcq/' . $uploaded_filename_mcq_two;
            file_put_contents($destination_path, $image_content);
        }


        $mcq_picture_three = $row["mcq_picture_three"];
        $uploaded_filename_mcq_three = '';

        // Check if the image URL is provided in the CSV
        if (!empty($mcq_picture_three)) {
            // Get the image content from the URL
            $image_content = file_get_contents($mcq_picture_three);

            // Generate a unique name for the picture to avoid conflicts
            $uploaded_filename_mcq_three = time() . '_' . basename($mcq_picture_three);

            // Save the image to the 'uploads/questiontf' folder
            $destination_path = FCPATH . 'uploads/questiomcq/' . $uploaded_filename_mcq_three;
            file_put_contents($destination_path, $image_content);
        }
        

        $mcq_picture_four = $row["mcq_picture_four"];
        $uploaded_filename_mcq_four = '';

        // Check if the image URL is provided in the CSV
        if (!empty($mcq_picture_four)) {
            // Get the image content from the URL
            $image_content = file_get_contents($mcq_picture_four);

            // Generate a unique name for the picture to avoid conflicts
            $uploaded_filename_mcq_four = time() . '_' . basename($mcq_picture_four);

            // Save the image to the 'uploads/questiontf' folder
            $destination_path = FCPATH . 'uploads/questiomcq/' . $uploaded_filename_mcq_four;
            file_put_contents($destination_path, $image_content);
        }



                 

            $data[] = array(
                'question_paper_name'  =>$row["question_paper_name"],
                'subject_name'  =>$row["subject_name"],
                'subject_code'  =>$row["subject_code"],
                'blueprint_id'  =>$row["blueprint_id"],
                'question_type'  =>$row["question_type"],
                'question_fitb'  =>$row["question_fitb"],
                'answer_fitb'  =>$row["answer_fitb"],
                'question_qa'  =>$row["question_qa"],
                'answer_qa'  =>$row["answer_qa"],
                'question_tf'  =>$row["question_tf"],
                'answer_true'  =>$row["answer_true"],
                'answer_false'  =>$row["answer_false"],
                'question_mcq'  =>$row["question_mcq"],
                'answer_mcq_one'  =>$row["answer_mcq_one"],
                'answer_mcq_two'  =>$row["answer_mcq_two"],
                'answer_mcq_three'  =>$row["answer_mcq_three"],
                'answer_mcq_four'  =>$row["answer_mcq_four"],
                'question_picture_mcq'  =>$row["question_picture_mcq"],
                'mcq_picture_one'  =>$uploaded_filename_mcq_one,
                'mcq_picture_two'  =>$uploaded_filename_mcq_two,
                'mcq_picture_three'  =>$uploaded_filename_mcq_three,
                'mcq_picture_four'  =>$uploaded_filename_mcq_four,
                'tf_picture_question' => $uploaded_filename,
                'answer_picture_true'  =>$row["answer_picture_true"],
                'answer_picture_false'  =>$row["answer_picture_false"],
                'status'  =>$row["status"],
                'date_by'  =>$row["date_by"],
                'update_by'  =>$row["update_by"],
                'teacher_id'  =>$row["teacher_id"],
                'marks'  =>$row["marks"],
                'term'  =>$row["term"],
                'sub_name'  =>$row["sub_name"],
                'sub_code'  =>$row["sub_code"],
                'class_name'  =>$row["class_name"],
                'class_sec'  =>$row["class_sec"],
                'duration'  =>$row["duration"]
            );
        }
       $this->question_model->insert($data);
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
        $this->loadViews("admin/question/view", $this->global, $data , NULL);
        
        
    } 


        public function updatemarks()
    {
        $this->isLoggedIn();
        $this->load->library('form_validation');                 
        $this->form_validation->set_rules('marks','Marks','required');
        
        
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
            $insertData['marks'] = $form_data['marks'];
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