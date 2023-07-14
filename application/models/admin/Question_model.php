<?php if(!defined('BASEPATH')) exit('No direct script access allowed');



class Question_model extends Base_model
{
    public $table = "questions";
    var $column_order = array(null,'blueprint_id','question_type','question','answer1','answer2','answer3','answer4','teacher_id','date_by','update_by'); //set column field database for datatable orderable
    var $column_search = array('blueprint_id','question_type','question','answer1','answer2','answer3','answer4','teacher_id','date_by','update_by'); //set column field database for datatable searchable 
    var $order = array('id' => 'asc'); // default order

        

        function __construct() {

            parent::__construct();

        }



     function delete($id) {

        $this->db->where('id', $id);

        $this->db->delete($this->table);        

        return $this->db->affected_rows();

    }



    public function find($id) {

            $query = $this->db->select('*')

                    ->from($this->table)

                    ->where('id', $id)

                    ->get();

            if ($query->num_rows() > 0) {

                $result = $query->result();

                return $result[0];

            } else {

                return array();

            }

        }

       // Get  List
        function get_datatables()
        {
            $this->_get_datatables_query();
            if(isset($_POST['length']) && $_POST['length'] != -1)
            $this->db->limit($_POST['length'], $_POST['start']);
            $query = $this->db->get();
            return $query->result();
        }


        // Get  List
        function get_datatables_pp()
        {
            $this->_get_datatables_query();
            if(isset($_POST['length']) && $_POST['length'] != -1)
            $this->db->limit($_POST['length'], $_POST['start']);
            $this->db->where('lead_type','1');
            $query = $this->db->get();
            return $query->result();
        }

         // Get  List
        function get_datatables_pr()
        {
            $this->_get_datatables_query();
            if(isset($_POST['length']) && $_POST['length'] != -1)
            $this->db->limit($_POST['length'], $_POST['start']);
            $this->db->where('lead_type','2');
            $query = $this->db->get();
            return $query->result();
        }


        // Get Database 
         public function _get_datatables_query()
        {     
            $this->db->from($this->table);
            $i = 0;     
            foreach ($this->column_search as $item) // loop column 
            {
                if(isset($_POST['search']['value']) && $_POST['search']['value']) // if datatable send POST for search
                {
                    if($i===0) // first loop
                    {
                        $this->db->like($item, $_POST['search']['value']);
                    }
                    else
                    {
                        $this->db->or_like($item, $_POST['search']['value']);
                    }
                }
                $i++;
            }
             
            if(isset($_POST['order'])) // here order processing
            {
                $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
            } 
            else if(isset($this->order))
            {
                $order = $this->order;
                $this->db->order_by(key($order), $order[key($order)]);
            }
        }

        // Count  Filtered
        function count_filtered()
        {
            $this->_get_datatables_query();
            $query = $this->db->get();
            return $query->num_rows();
        }
        // Count all
        public function count_all()
        {
            $this->db->from($this->table);
            return $this->db->count_all_results();
        }

        
        public function sum_all()
        {
            $this->db->select_sum('amount');
            $result = $this->db->get($this->table)->row();  
            return $result->amount;
        }


        public function sum_all_pp()
        {
            $this->db->select_sum('amount');
            $this->db->where('lead_type','1');
            $result = $this->db->get($this->table)->row();  
            return $result->amount;
        }


        public function sum_all_aus()
        {
            $this->db->select_sum('amount');
            $this->db->where('lead_type','2');
            $result = $this->db->get($this->table)->row();  
            return $result->amount;
        }

     public function getBlueprintIds($blueprintId) {
        // Select only the "blueprint_id" column
        $this->db->select('blueprint_id');

        // Fetch the data from the "questions" table
        $this->db->where('blueprint_id', $blueprintId);
        $query = $this->db->get('questions');

        // Return the result as an array of rows
        return $query->result_array();
    }


    
    public function getQuestionsByBlueprintId($blueprintId) {
        $this->db->select('id, question_paper_name, subject_name, subject_code, blueprint_id, question_type, question_fitb, answer_fitb, question_qa, answer_qa, question_tf, answer_true, answer_false, question_mcq, answer_mcq_one, answer_mcq_two, answer_mcq_three, answer_mcq_four, question_picture_mcq, mcq_picture_one, mcq_picture_two, mcq_picture_three, mcq_picture_four, tf_picture_question, answer_picture_true, answer_picture_false, status, date_by, update_by, teacher_id, marks,term,sub_name,sub_code,class_name,class_sec,duration');
        $this->db->from('questions');
        $this->db->where('blueprint_id', $blueprintId);

        $query = $this->db->get();

        return $query->result_array();
    }
 
   public function did_delete_row($id){
    $this->db->select('blueprint_id'); // Select the blueprint_id column
    $this->db->where('id', $id);
    $query = $this->db->get('questions');

    if ($query->num_rows() > 0) {
        $row = $query->row();
        $blueprint_id = $row->blueprint_id;

        $this->db->where('id', $id);
        $this->db->delete('questions');

        return $blueprint_id;
    } else {
        return false;
    }
}


}