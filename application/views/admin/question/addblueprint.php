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
      <div style="margin-bottom: 20px;">
         <a href="<?php echo base_url().'admin/blueprint/uploadblueprint/'; ?>" class="btn btn-primary mt-3">Import Questions</a>
      </div>

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
                  <!-- General Form Elements -->
                  <form role="form" action="<?php echo base_url() ?>admin/question/insertnow" method="post" role="form" enctype="multipart/form-data">

                    


                 
 

                  <input type="text" name="blueprint_id" class="form-control" value="<?php echo $edit_data->id;?>" hidden>
                  <input type="text" name="question_paper_name" class="form-control" value="<?php echo $edit_data->question_paper_name;?>" hidden>
                  <input type="text" name="subject_name" class="form-control" value="<?php echo $edit_data->subject_name;?>" hidden>
                  <input type="text" name="subject_code" class="form-control" value="<?php echo $edit_data->subject_code;?>" hidden>

               <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Select Terms</label>
                        <div class="col-sm-10">
                           <select class="form-select" name="term" aria-label="Default select example">
                              <option>Select Terms</option>
                          <?php foreach ($term_name as $sub): ?>
                          <option value="<?php echo $sub->term_name; ?>"><?php echo $sub->term_name; ?></option>
                        <?php endforeach; ?>
                           </select>
                        </div>
                     </div>


                     <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Subject Name</label>
                        <div class="col-sm-10">
                           <select class="form-select" name="sub_name" aria-label="Default select example">
                              <option>Select Subject</option>
                          <?php foreach ($subject_name as $sub): ?>
                          <option value="<?php echo $sub->subject_name; ?>"><?php echo $sub->subject_name; ?></option>
                        <?php endforeach; ?>
                           </select>
                        </div>
                     </div>
                     <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Subject Code</label>
                        <div class="col-sm-10">
                           <select class="form-select" name="sub_code" aria-label="Default select example">
                              <option>Select Subject Code</option>
                          <?php foreach ($subject_code as $sub): ?>
                          <option value="<?php echo $sub->subject_code; ?>"><?php echo $sub->subject_code; ?></option>
                        <?php endforeach; ?>
                           </select>
                        </div>
                     </div>
                     <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Class Name</label>
                        <div class="col-sm-10">
                           <select class="form-select" name="class_name" aria-label="Default select example">
                              <option>Select Class</option>
                          <?php foreach ($studentClassName as $class): ?>
                          <option value="<?php echo $class->student_class_name; ?>"><?php echo $class->student_class_name; ?></option>
                        <?php endforeach; ?>
                           </select>
                        </div>
                     </div>
                     <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Class Section</label>
                        <div class="col-sm-10">
                           <select class="form-select" name="class_sec" aria-label="Default select example">
                              <option>Select Section</option>
                          <?php foreach ($studentSectionName as $section): ?>
                          <option value="<?php echo $section->student_sections_name; ?>"><?php echo $section->student_sections_name; ?></option>
                        <?php endforeach; ?>
                           </select>
                        </div>
                     </div>

                     <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Exam Duration</label>
                        <div class="col-sm-10">
                           <input type="text" class="form-control" name="duration" placeholder="Enter Exam Duration">
                        </div>
                     </div>


                     <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Question Type</label>
                        <div class="col-sm-10">
                           <select class="form-select" name="question_type" aria-label="Default select example" onchange="showFields(this.value)">
                              <option selected>Select Question Type</option>
                              <option value="1">MCQ</option>
                              <option value="2">True & False</option>
                              <option value="3">Fill In The Blanks</option>
                              <option value="4">Question & Answers</option>
                              <option value="5">Picture MCQ</option>
                              <option value="6">Picture True & False</option>
                           </select>
                        </div>
                     </div>
                     <div class="fitb" style="display: none;">
                        <div class="row mb-3">
                           <label class="col-sm-2 col-form-label">Question FITB</label>
                           <div class="col-sm-10">
                              <textarea name="question_fitb" class="form-control"></textarea>
                           </div>
                        </div>
                        <div class="row mb-3">
                           <label class="col-sm-2 col-form-label">Answer FITB</label>
                           <div class="col-sm-10">
                              <textarea name="answer_fitb" class="form-control"></textarea>
                           </div>
                        </div>
                        
                     </div>
                     <div class="mcq" style="display: none;">
                        <div class="row mb-3">
                           <label class="col-sm-2 col-form-label">Question MCQ</label>
                           <div class="col-sm-10">
                              <textarea name="question_mcq" class="form-control"></textarea>
                           </div>
                        </div>
                        <div class="row mb-3">
                           <label class="col-sm-2 col-form-label">Option One</label>
                           <div class="col-sm-10">
                              <textarea name="answer_mcq_one" class="form-control"></textarea>
                           </div>
                        </div>
                        <div class="row mb-3">
                           <label class="col-sm-2 col-form-label">Option Two</label>
                           <div class="col-sm-10">
                              <textarea name="answer_mcq_two" class="form-control"></textarea>
                           </div>
                        </div>
                        <div class="row mb-3">
                           <label class="col-sm-2 col-form-label">Option Three</label>
                           <div class="col-sm-10">
                              <textarea name="answer_mcq_three" class="form-control"></textarea>
                           </div>
                        </div>
                        <div class="row mb-3">
                           <label class="col-sm-2 col-form-label">Option Four</label>
                           <div class="col-sm-10">
                              <textarea name="answer_mcq_four" class="form-control"></textarea>
                           </div>
                        </div>
                        
                     </div>
                     <div class="tf" style="display: none;">
                        <div class="row mb-3">
                           <label class="col-sm-2 col-form-label">Question True & False</label>
                           <div class="col-sm-10">
                              <textarea name="question_tf" class="form-control"></textarea>
                           </div>
                        </div>
                        <div class="row mb-3">
                           <label class="col-sm-2 col-form-label">Answer One</label>
                           <div class="col-sm-10">
                              <textarea name="answer_true" class="form-control"></textarea>
                           </div>
                        </div>
                        <div class="row mb-3">
                           <label class="col-sm-2 col-form-label">Answer Two</label>
                           <div class="col-sm-10">
                              <textarea name="answer_false" class="form-control"></textarea>
                           </div>
                        </div>
                        
                     </div>
                     <div class="qa" style="display: none;">
                        <div class="row mb-3">
                           <label class="col-sm-2 col-form-label">Question & Answer</label>
                           <div class="col-sm-10">
                              <textarea name="question_qa" class="form-control"></textarea>
                           </div>
                        </div>
                        <div class="row mb-3">
                           <label class="col-sm-2 col-form-label">Answer</label>
                           <div class="col-sm-10">
                              <textarea name="answer_qa" class="form-control"></textarea>
                           </div>
                        </div>
                        
                     </div>
                     <div class="pmcq" style="display: none;">
                        <div class="row mb-3">
                           <label class="col-sm-2 col-form-label">Picture MCQ</label>
                           <div class="col-sm-10">
                              <textarea name="question_picture_mcq" class="form-control"></textarea>
                           </div>
                        </div>
                        <div class="row mb-3">
                           <label class="col-sm-2 col-form-label">Picture One</label>
                           <div class="col-sm-10">
                              <input class="form-control" type="file" name="mcq_picture_one">
                           </div>
                        </div>
                        <div class="row mb-3">
                           <label class="col-sm-2 col-form-label">Picture Two</label>
                           <div class="col-sm-10">
                              <input class="form-control" type="file" name="mcq_picture_two">
                           </div>
                        </div>
                        <div class="row mb-3">
                           <label class="col-sm-2 col-form-label">Picture Three</label>
                           <div class="col-sm-10">
                              <input class="form-control" type="file" name="mcq_picture_three">
                           </div>
                        </div>
                        <div class="row mb-3">
                           <label class="col-sm-2 col-form-label">Picture Four</label>
                           <div class="col-sm-10">
                              <input class="form-control" type="file" name="mcq_picture_four">
                           </div>
                        </div>
                        
                     </div>
                     <div class="ptf" style="display: none;">
                        <div class="row mb-3">
                           <label class="col-sm-2 col-form-label">Picture MCQ</label>
                           <div class="col-sm-10">
                              <input class="form-control" type="file" name="tf_picture_question">
                           </div>
                        </div>
                        <div class="row mb-3">
                           <label class="col-sm-2 col-form-label">Option One</label>
                           <div class="col-sm-10">
                              <textarea name="answer_picture_true" class="form-control"></textarea>
                           </div>
                        </div>
                        <div class="row mb-3">
                           <label class="col-sm-2 col-form-label">Option Two</label>
                           <div class="col-sm-10">
                              <textarea name="answer_picture_false" class="form-control"></textarea>
                           </div>
                        </div>
                        
                     </div>
                     <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Status</label>
                        <div class="col-sm-10">
                           <select class="form-select" name="status" aria-label="Default select example">
                              <option selected>Select Status</option>
                              <option value="1">Active</option>
                              <option value="2">Inactive</option>
                           </select>
                        </div>
                     </div>
                     <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Submit Button</label>
                        <div class="col-sm-10">
                           <button type="submit" class="btn btn-primary">Submit Form</button>
                        </div>
                     </div>
               </div>
               </form><!-- End General Form Elements -->
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
                                     echo  '(a)  <img src="' . base_url() . 'uploads/questiomcq/' . $mcq_picture_one . '" alt="Answer MCQ Picture" style="width: 100px;margin-top:10px;margin-bottom:10px;"><br>';
                              }

                               ?> 

                                <?php $mcq_picture_two = $value['mcq_picture_two'];

                               if (!empty($mcq_picture_two)) {
                                     echo '(b)  <img src="' . base_url() . 'uploads/questiomcq/' . $mcq_picture_two . '" alt="Answer MCQ Picture" style="width: 100px;margin-top:10px;margin-bottom:10px;"><br>';
                              }

                               ?>  

                               <?php $mcq_picture_three = $value['mcq_picture_three'];

                               if (!empty($mcq_picture_three)) {
                                     echo '(c)  <img src="' . base_url() . 'uploads/questiomcq/' . $mcq_picture_three . '" alt="Answer MCQ Picture" style="width: 100px;margin-top:10px;margin-bottom:10px;"><br>';
                              }

                               ?> 

                                <?php $mcq_picture_four = $value['mcq_picture_four'];

                               if (!empty($mcq_picture_four)) {
                                     echo '(d)  <img src="' . base_url() . 'uploads/questiomcq/' . $mcq_picture_four . '" alt="Answer MCQ Picture" style="width: 100px;margin-top:10px;margin-bottom:10px;"><br>';
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
<script>
   CKEDITOR.replace( 'question_fitb' );
   CKEDITOR.replace( 'answer_fitb' );
   CKEDITOR.replace( 'question_qa' );
   CKEDITOR.replace( 'answer_qa' );
   CKEDITOR.replace( 'question_tf' );
   CKEDITOR.replace( 'answer_true' );
   CKEDITOR.replace( 'answer_false' );
   CKEDITOR.replace( 'question_mcq' );
   CKEDITOR.replace( 'answer_mcq_one' );
   CKEDITOR.replace( 'answer_mcq_two' );
   CKEDITOR.replace( 'answer_mcq_three' );
   CKEDITOR.replace( 'answer_mcq_four' );
   CKEDITOR.replace( 'question_picture_mcq' );
   CKEDITOR.replace( 'answer_picture_true' );
   CKEDITOR.replace( 'answer_picture_false' );
</script>
<script>
   function showFields(value) {
       var fitb = document.querySelector(".fitb");
       var mcq = document.querySelector(".mcq");
       var tf = document.querySelector(".tf");
       var qa = document.querySelector(".qa");
       var pmcq = document.querySelector(".pmcq");
       var ptf = document.querySelector(".ptf");
   
       if (value == 1) {
           fitb.style.display = "none";
           mcq.style.display = "block";
           tf.style.display = "none";
           qa.style.display = "none";
           pmcq.style.display = "none";
           ptf.style.display = "none";
       } else if (value == 2) {
           fitb.style.display = "none";
           mcq.style.display = "none";
           tf.style.display = "block";
           qa.style.display = "none";
           pmcq.style.display = "none";
           ptf.style.display = "none";
       } else if (value == 3) {
           fitb.style.display = "block";
           mcq.style.display = "none";
           tf.style.display = "none";
           qa.style.display = "none";
           pmcq.style.display = "none";
           ptf.style.display = "none";
       } else if (value == 4) {
           fitb.style.display = "none";
           mcq.style.display = "none";
           tf.style.display = "none";
           qa.style.display = "block";
           pmcq.style.display = "none";
           ptf.style.display = "none";
       } else if (value == 5) {
           fitb.style.display = "none";
           mcq.style.display = "none";
           tf.style.display = "none";
           qa.style.display = "none";
           pmcq.style.display = "block";
           ptf.style.display = "none";
       } else if (value == 6) {
           fitb.style.display = "none";
           mcq.style.display = "none";
           tf.style.display = "none";
           qa.style.display = "none";
           pmcq.style.display = "none";
           ptf.style.display = "block";
       } 
   }
</script>

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