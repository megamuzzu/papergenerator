<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';


class Users extends BaseController
{
   
    public function __construct()
    {
        parent::__construct();
           
        $this->load->model('admin/user_model');
        $this->isLoggedIn(); 
        

     }

    
    public function index()
    {
        
        $data = array();
        
        $this->global['pageTitle']  = 'MyFoodAndSons : Users List';


        $this->loadViews("admin/users/list", $this->global, $data , NULL);
        
    }

    // Add New 
    public function addnew()
    {
        
        // category
        
        $data = array();

         $where = array();
        $where['status'] = 1;
        $where['field'] = 'id,name';
        $where['table'] = 'z_admin';
        $organization_name = $this->user_model->findDynamic($where);
        $data['organization_list'] = $organization_name;

        $this->global['pageTitle'] = 'MyFoodAndSons : Add New Admin';
        $this->loadViews("admin/users/addnew", $this->global, $data , NULL);
        
    } 

    public function insertnow()
    {
        
        
        
        
        $this->load->library('form_validation');            
        $this->form_validation->set_rules('name','Admin Name','trim|required');
        $this->form_validation->set_rules('admin_type','Admin Type','trim|required');
        $this->form_validation->set_rules('email','Admin Email','trim|required');
        $this->form_validation->set_rules('phone','Admin Phone','trim|required');
        $this->form_validation->set_rules('address','Admin Address','trim|required');
        $this->form_validation->set_rules('password','Admin Password','trim|required');
        
         
        $form_data  = $this->input->post();
        if($this->form_validation->run() == FALSE)
        {
            $this->addnew();
        }
        else
        {

            // check already exist
            $where = array();
            $where['email'] = $form_data['email'];
            $where['email'] = $form_data['email'];
            $returnData = $this->user_model->findDynamic($where);
            if(!empty($returnData)){
               $this->session->set_flashdata('error', $form_data['email'].' already exist. Use different email to register.');
            }else{
                $date = date('Y-m-d H:i:s');
                $insertData['name']         = $form_data['name'];
                $insertData['admin_type']   = $form_data['admin_type'];
                $insertData['email']        = $form_data['email'];
                $insertData['phone']        = $form_data['phone'];
                $insertData['address']        = $form_data['address'];
                $insertData['password']       = $form_data['password'];
                $insertData['status']       = "1";
                $insertData['date_at']      = $date;
                
                 
                $result = $this->user_model->save($insertData);
                if($result > 0)
                {
                    $this->session->set_flashdata('success', 'Admin successfully Added');
                }
                else
                { 
                    $this->session->set_flashdata('error', 'Admin Addition failed');
                }
            }// check already    
            redirect('admin/users');
          }  
        
    }
    
    

    // Member list
    public function ajax_list()
    {
		$list = $this->user_model->get_datatables();
	 
		$data = array();
        $no =(isset($_POST['start']))?$_POST['start']:'';
        foreach ($list as $currentObj) {

            $temp_date = $currentObj->date_at;
            $selected = ($currentObj->status == 0)?" selected ":"";
             
            $btn = '<select class="statusBtn form-select" name="statusBtn" data-id="'.$currentObj->id.'">';
            $btn .= '<option value="1"  >Active</option>';
            $btn .= '<option value="0" '.$selected.' >Inactive</option>';
            $btn .= '</select>';

            if ($currentObj->admin_type == 1) {
                $role = 'Admin';
            } elseif ($currentObj->admin_type == 2) {
                $role = 'Subadmin';
            } else {
                $role = 'Unknown'; // Handle any other values or error cases
            }

            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $currentObj->name;
            $row[] = $currentObj->email;
            $row[] = $role;
            $row[] = $currentObj->password;
            $row[] = $currentObj->phone;
            $row[] = $btn;
            if($this->session->userdata('role') == 1){ 
            $row[] = '<a class="btn btn-sm btn-info" href="'.base_url().'admin/users/edit/'.$currentObj->id.'">Edit</a>
            <a class="btn btn-sm btn-danger deletebtn" href="#" data-userid="'.$currentObj->id.'">Delete</a>';
            }
            $data[] = $row;
        }
 
        $output = array(
                        "draw" => (isset($_POST['draw']))?$_POST['draw']:'',
                        "recordsTotal" => $this->user_model->count_all(),
                        "recordsFiltered" => $this->user_model->count_filtered(),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }


    // Status Change
 
    public function statusChange($id = NULL)
    {
        
        if($_POST['id'] == null)
        {
            redirect('admin/users');
        }

        $insertData['id'] = $_POST['id'];
        $insertData['status'] = $_POST['status'];
        $result = $this->user_model->save($insertData);
        exit;
    } 

    // Edit
 
    public function edit($id = NULL)
    {
        
        $data = array();
        

            if($id == null)
            {
                redirect('admin/users');
            }

        

        $data['edit_data'] = $this->user_model->find($id);
        $this->global['pageTitle'] = ' ';
        $this->loadViews("admin/users/edit", $this->global, $data , NULL);
        
    } 

    // Delete  *****************************************************************
      function delete()
    {
        
        
        $delId = $this->input->post('id');  
        
        $result = $this->user_model->delete($delId); 
            
        if ($result > 0) { echo(json_encode(array('status'=>TRUE))); }
        else { echo(json_encode(array('status'=>FALSE))); }
    }

    // Update Agency*************************************************************
    public function update()
    {
		
        
        $this->load->library('form_validation');       
        $this->form_validation->set_rules('email','Admin Email','trim|required');
        
        
        //form data 
        $form_data  = $this->input->post();
        if($this->form_validation->run() == FALSE)
        {
			
                $this->edit($form_data['id']);
        }
        else
        {

            // check already exist
            $where = array();
            $where['email'] = $form_data['email'];
            $where['id !=']      = $form_data['id'];
            $returnData = $this->user_model->findDynamic($where);
            if(!empty($returnData)){
               $this->session->set_flashdata('error', $form_data['email'].' already exist. Use different email to register.');
            }else{
                $date = date('Y-m-d H:i:s');
                $insertData = array();
                $insertData['id']               = $form_data['id'];
                $insertData['name']         = $form_data['name'];
                $insertData['admin_type']   = $form_data['admin_type'];
                $insertData['email']        = $form_data['email'];
                $insertData['phone']        = $form_data['phone'];
                $insertData['address']        = $form_data['address'];
                $insertData['password']       = $form_data['password'];
                $insertData['status']       = "1";
                $insertData['date_at']      = $date;

                $result = $this->user_model->save($insertData);
                if($result > 0)
                {
                    $this->session->set_flashdata('success', 'User successfully Updated');
                }
                else
                { 
                    $this->session->set_flashdata('error', 'User not Updated');
                }
            }// check already    
            redirect(base_url().'admin/users/edit/'.$form_data['id']);
          }  
        
    }

     


}




?>