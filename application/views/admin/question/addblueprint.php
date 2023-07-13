<script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
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
                  <!-- General Form Elements -->
                  <form role="form" action="<?php echo base_url() ?>admin/question/insertnow" method="post" role="form" enctype="multipart/form-data">

                    


                     <pre>
                        <?php
                           print_r($question_data);

                        ?>
                     </pre> 
 

                  <input type="text" name="blueprint_id" class="form-control" value="<?php echo $edit_data->id;?>" hidden>
                  <input type="text" name="question_paper_name" class="form-control" value="<?php echo $edit_data->question_paper_name;?>" hidden>
                  <input type="text" name="subject_name" class="form-control" value="<?php echo $edit_data->subject_name;?>" hidden>
                  <input type="text" name="subject_code" class="form-control" value="<?php echo $edit_data->subject_code;?>" hidden>

                      


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
                        <div class="row mb-3">
                           <label class="col-sm-2 col-form-label">Marks</label>
                           <div class="col-sm-10">
                              <input type="text" class="form-control" name="marks">
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
                        <div class="row mb-3">
                           <label class="col-sm-2 col-form-label">Marks</label>
                           <div class="col-sm-10">
                              <input type="text" class="form-control" name="marks">
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
                        <div class="row mb-3">
                           <label class="col-sm-2 col-form-label">Marks</label>
                           <div class="col-sm-10">
                              <input type="text" class="form-control" name="marks">
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
                        <div class="row mb-3">
                           <label class="col-sm-2 col-form-label">Marks</label>
                           <div class="col-sm-10">
                              <input type="text" class="form-control" name="marks">
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
                        <div class="row mb-3">
                           <label class="col-sm-2 col-form-label">Marks</label>
                           <div class="col-sm-10">
                              <input type="text" class="form-control" name="marks">
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
                        <div class="row mb-3">
                           <label class="col-sm-2 col-form-label">Marks</label>
                           <div class="col-sm-10">
                              <input type="text" class="form-control" name="marks">
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
                              foreach ($question_data as $key => $value)
                              {
                                   
                      ?>


    <section class="section">
      <div class="row">
         <div class="col-lg-12">
            <div class="card">
               <div class="card-body mt-5">
                
                   <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Q.No : </label>
                        <div class="col-sm-10">
                              <?php echo $value['question_fitb'] ?>
                              <?php echo $value['question_qa'] ?>
                              <?php echo $value['question_tf'] ?>
                              <?php echo $value['question_mcq'] ?>
                              <?php echo $value['question_picture_mcq'] ?>
                              <?php echo $value['tf_picture_question'] ?>
                           </div>
                     </div>


                     <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Note : </label>
                        <div class="col-sm-10">
                              <?php echo $value['answer_fitb'] ?>
                              <?php echo $value['answer_qa'] ?>
                              <?php echo $value['answer_true'] ?>
                              <?php echo $value['answer_false'] ?>
                              <?php echo $value['answer_mcq_one'] ?>
                              <?php echo $value['answer_mcq_two'] ?>
                              <?php echo $value['answer_mcq_three'] ?>
                              <?php echo $value['answer_mcq_four'] ?>
                              <?php echo $value['mcq_picture_one'] ?>
                              <?php echo $value['mcq_picture_two'] ?>
                              <?php echo $value['mcq_picture_three'] ?>
                              <?php echo $value['mcq_picture_four'] ?>
                              <?php echo $value['answer_picture_true'] ?>
                              <?php echo $value['answer_picture_false'] ?>
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