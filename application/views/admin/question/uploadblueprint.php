<script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
 <script src="https://polyfill.io/v3/polyfill.min.js?features=es6"></script>
    <script src="https://cdn.jsdelivr.net/npm/mathjax@3/es5/tex-chtml.js" async></script>
<main id="main" class="main">
   <div class="pagetitle">
      <h1>Question Blueprint</h1>
      <nav>
         <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo base_url()?>admin">Home</a></li>
            <li class="breadcrumb-item active"><a href="<?php echo base_url()?>admin/blueprint">Question Blueprint</a></li>
         </ol>
      </nav>
   </div>
   <!-- End Page Title -->
   <section class="section">
      <div class="row">
         <div class="col-lg-12">
            <div class="card">
               <div class="card-body">
                  <h5 class="card-title">Please fill the details</h5>
                  <div class="col-md-12">
                     <?php
                        $this->load->helper('form');
                        $error = $this->session->flashdata('error');
                        if($error)
                        {
                        ?>
                     <div class="alert alert-danger bg-danger text-light border-0 alert-dismissible fade show" role="alert">
                        <?php echo $this->session->flashdata('error'); ?> 
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
                     </div>
                     <?php } ?>
                     <?php  
                        $success = $this->session->flashdata('success');
                        if($success)
                        {
                        ?>
                     <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <?php echo $this->session->flashdata('success'); ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                     </div>
                     <?php } ?>
                     <div class="row">
                        <div class="col-md-12">
                           <?php echo validation_errors('<div class="alert alert-danger alert-dismissable">', ' <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>'); ?>
                        </div>
                     </div>
                  </div>
                  
                  <form method="post" id="import_csv" enctype="multipart/form-data">
         <div class="form-group">
            <label>Select CSV File</label>
            <input type="file" name="csv_file" id="csv_file" required accept=".csv" />
         </div>
         <br />
         <button type="submit" name="import_csv" class="btn btn-info" id="import_csv_btn">Import CSV</button>
      </form>



                   
            </div>
         </div>
      </div>
      </div>
   </section>



     <?php
                              $counter = 1;
                              foreach ($question_data as $key => $value)
                              {
                                   
                      ?>


    <section class="section">
      <div class="row">
         <div class="col-lg-12">
            <div class="card">
               <div class="card-body mt-5">
                
                   <div class="row mb-3">
                     <div class="col-sm-2">
                        <?php
                           echo '<label class="col-form-label">Q.No ' . $counter . '</label>';
                           $counter++;
                        ?>
                     </div>
                        <div class="col-sm-8">
                           <?php if (!empty($value['question_fitb'])): ?>
                              <span class="math-tex">
                                 <?php echo $value['question_fitb']; ?>
                              </span>
                           <?php endif; ?>

                           <?php if (!empty($value['question_qa'])): ?>
                              <span class="math-tex">
                                 <?php echo $value['question_qa']; ?>
                              </span>
                           <?php endif; ?>

                           <?php if (!empty($value['question_tf'])): ?>
                              <span class="math-tex">
                                 <?php echo $value['question_tf']; ?>
                              </span>
                           <?php endif; ?>

                           <?php if (!empty($value['question_mcq'])): ?>
                              <span class="math-tex">
                                 <?php echo $value['question_mcq']; ?>
                              </span>
                           <?php endif; ?>
                            
                               
                              

                              <?php $tf_picture_question = $value['tf_picture_question'];

                               if (!empty($tf_picture_question)) {
                                     echo '<img src="' . base_url() . 'uploads/questiontf/' . $tf_picture_question . '" alt="Picture T&F Picture" style="width:100px;">';
                              }

                               ?>


                              <?php if (!empty($value['question_picture_mcq'])): ?>
                              <span class="math-tex">
                                 <?php echo $value['question_picture_mcq']; ?>
                              </span>
                              <?php endif; ?>

                           </div>

                           <div class="col-sm-2">

                              
                              <a class="btn btn-sm btn-info" href="<?php echo base_url() . 'admin/blueprint/editquestion/' . $value['id']; ?>">Edit</a>
                              

                              <a class="btn btn-sm btn-danger" href="<?php echo base_url().'admin/question/delete_row/'.$value['id'];?>">Delete</a>

                              <a class="btn btn-sm btn-info" href="<?php echo base_url().'admin/blueprint/addmarks/'.$value['id'];?>">Add Marks</a>

                           </div>
                           
                     </div>


                     <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Note : </label>
                        <div class="col-sm-10">

                           <?php if (!empty($value['answer_fitb'])): ?>
                              <span class="math-tex">
                                 <?php echo $value['answer_fitb']; ?>
                              </span>
                              <?php endif; ?>

                           <?php if (!empty($value['answer_qa'])): ?>
                              <span class="math-tex">
                                 <?php echo $value['answer_qa']; ?>
                              </span>
                              <?php endif; ?>

                            <?php if (!empty($value['answer_true'])): ?>
                              <span class="math-tex">
                                 <?php echo $value['answer_true']; ?>
                              </span>
                              <br>
                              <?php endif; ?>
                           

                           <?php if (!empty($value['answer_false'])): ?>
                              <span class="math-tex">
                                 <?php echo $value['answer_false']; ?>
                              </span>
                           <?php endif; ?>


                           <?php if (!empty($value['answer_mcq_one'])): ?>
                              <span class="math-tex">
                                 <?php echo $value['answer_mcq_one']; ?>
                              </span>
                              <br>
                           <?php endif; ?>
                           

                           <?php if (!empty($value['answer_mcq_two'])): ?>
                              <span class="math-tex">
                                 <?php echo $value['answer_mcq_two']; ?>
                              </span>
                               <br>
                           <?php endif; ?>

                          

                           <?php if (!empty($value['answer_mcq_three'])): ?>
                              <span class="math-tex">
                                 <?php echo $value['answer_mcq_three']; ?>
                              </span>
                              <br>
                           <?php endif; ?>

                           <?php if (!empty($value['answer_mcq_four'])): ?>
                              <span class="math-tex">
                                 <?php echo $value['answer_mcq_four']; ?>
                              </span>
                           <?php endif; ?>

                           <?php if (!empty($value['answer_mcq_four'])): ?>
                              <span class="math-tex">
                                 <?php echo $value['answer_mcq_four']; ?>
                              </span>
                           <?php endif; ?>

                           <?php if (!empty($value['answer_picture_true'])): ?>
                              <span class="math-tex">
                                 <?php echo $value['answer_picture_true']; ?>
                              </span>
                              <br>
                           <?php endif; ?>                

                           <?php if (!empty($value['answer_picture_false'])): ?>
                              <span class="math-tex">
                                 <?php echo $value['answer_picture_false']; ?>
                              </span>
                           <?php endif; ?> 
            

                               <?php $mcq_picture_one = $value['mcq_picture_one'];

                               if (!empty($mcq_picture_one)) {
                                     echo  '<img src="' . base_url() . 'uploads/questiomcq/' . $mcq_picture_one . '" alt="Answer MCQ Picture" style="width: 100px;margin-top:10px;margin-bottom:10px;"><br>';
                              }

                               ?> 

                                <?php $mcq_picture_two = $value['mcq_picture_two'];

                               if (!empty($mcq_picture_two)) {
                                     echo '<img src="' . base_url() . 'uploads/questiomcq/' . $mcq_picture_two . '" alt="Answer MCQ Picture" style="width: 100px;margin-top:10px;margin-bottom:10px;"><br>';
                              }

                               ?>  

                               <?php $mcq_picture_three = $value['mcq_picture_three'];

                               if (!empty($mcq_picture_three)) {
                                     echo '<img src="' . base_url() . 'uploads/questiomcq/' . $mcq_picture_three . '" alt="Answer MCQ Picture" style="width: 100px;margin-top:10px;margin-bottom:10px;"><br>';
                              }

                               ?> 

                                <?php $mcq_picture_four = $value['mcq_picture_four'];

                               if (!empty($mcq_picture_four)) {
                                     echo '<img src="' . base_url() . 'uploads/questiomcq/' . $mcq_picture_four . '" alt="Answer MCQ Picture" style="width: 100px;margin-top:10px;margin-bottom:10px;"><br>';
                              }

                               ?>


                           </div>
                     </div>
                  
                
               </div>
               <!-- End General Form Elements -->
            </div>
         </div>
      </div>
      
   </section>


     <?php

                    }

                        ?>



   <div class="generateBtn">

      <?php if (isset($value['blueprint_id'])): ?>
    <a href="<?php echo base_url().'admin/blueprint/view/'.$value['blueprint_id']; ?>">Generate Question Paper</a>
      <?php endif; ?>




   </div>





</main>
<!-- End #main -->
 
 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

<script>
  jQuery(document).ready(function(){
       

         jQuery(document).on("click", ".deletebtn", function(){

          var userId = $(this).data("userid"),
            hitURL = "<?php echo base_url() ?>admin/question/delete",
            currentRow = $(this);
          
          var confirmation = confirm("Are you sure to delete this question ?");
          
          if(confirmation)
          {
            jQuery.ajax({
            type : "POST",
            dataType : "json",
            url : hitURL,
            data : { id : userId } 
            }).done(function(data){           
              currentRow.parents('tr').remove();
              if(data.status = true) { alert("successfully deleted"); }
              else if(data.status = false) { alert("deletion failed"); }
              else { alert("Access denied..!"); }
            });
          }
    });
    });
</script>

<script>
$(document).ready(function(){

 

   $('#import_csv').on('submit', function(event){
      event.preventDefault();
      $.ajax({
         url:"<?php echo base_url(); ?>admin/question/import",
         method:"POST",
         data:new FormData(this),
         contentType:false,
         cache:false,
         processData:false,
         beforeSend:function(){
            $('#import_csv_btn').html('Importing...');
         },
         success:function(data)
         {
            $('#import_csv')[0].reset();
            $('#import_csv_btn').attr('disabled', false);
            $('#import_csv_btn').html('Import Done');
            load_data();
         }
      })
   });
   
});
</script>