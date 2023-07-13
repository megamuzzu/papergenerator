<script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
<main id="main" class="main">
   <div class="pagetitle">
      <h1>Question Blueprint</h1>
      <nav>
         <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo base_url()?>admin/blueprint/">Home</a></li>
            <li class="breadcrumb-item"><a href="<?php echo base_url()?>admin/blueprint/">Questions</a></li>
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
                  <form role="form" action="<?php echo base_url() ?>admin/question/update" method="post" role="form" enctype="multipart/form-data">
              
 

                  <input type="text" name="blueprint_id" class="form-control" value="<?php echo $edit_data->blueprint_id;?>" hidden>
                  <input type="text" name="question_paper_name" class="form-control" value="<?php echo $edit_data->question_paper_name;?>" hidden>
                  <input type="text" name="subject_name" class="form-control" value="<?php echo $edit_data->subject_name;?>" hidden>
                  <input type="text" name="subject_code" class="form-control" value="<?php echo $edit_data->subject_code;?>" hidden>

               <input type="text" name="id" class="form-control" value="<?php echo $edit_data->id;?>" hidden>








                     <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Question Type</label>
                        <div class="col-sm-10">
                           <select class="form-select" name="question_type" aria-label="Default select example" onchange="showFields(this.value)">
                              <option selected>Select Question Type</option>
                              <option value="1" <?php echo ($edit_data->question_type == 1)?'selected':'';?>>MCQ</option>
                              <option value="2" <?php echo ($edit_data->question_type == 2)?'selected':'';?>>True & False</option>
                              <option value="3" <?php echo ($edit_data->question_type == 3)?'selected':'';?>>Fill In The Blanks</option>
                              <option value="4" <?php echo ($edit_data->question_type == 4)?'selected':'';?>>Question & Answers</option>
                              <option value="5" <?php echo ($edit_data->question_type == 5)?'selected':'';?>>Picture MCQ</option>
                              <option value="6" <?php echo ($edit_data->question_type == 6)?'selected':'';?>>Picture True & False</option>
                           </select>
                        </div>
                     </div>
                     <div class="fitb" style="display: none;">
                        <div class="row mb-3">
                           <label class="col-sm-2 col-form-label">Question FITB</label>
                           <div class="col-sm-10">
                              <textarea name="question_fitb" class="form-control"><?php echo $edit_data->question_fitb;?></textarea>
                           </div>
                        </div>
                        <div class="row mb-3">
                           <label class="col-sm-2 col-form-label">Answer FITB</label>
                           <div class="col-sm-10">
                              <textarea name="answer_fitb" class="form-control"><?php echo $edit_data->answer_fitb;?></textarea>
                           </div>
                        </div>
                        <div class="row mb-3">
                           <label class="col-sm-2 col-form-label">Marks</label>
                           <div class="col-sm-10">
                              <input type="text" class="form-control" name="marks" value="<?php echo $edit_data->marks;?>">
                           </div>
                        </div>
                     </div>
                     <div class="mcq" style="display: none;">
                        <div class="row mb-3">
                           <label class="col-sm-2 col-form-label">Question MCQ</label>
                           <div class="col-sm-10">
                              <textarea name="question_mcq" class="form-control"><?php echo $edit_data->question_mcq;?></textarea>
                           </div>
                        </div>
                        <div class="row mb-3">
                           <label class="col-sm-2 col-form-label">Option One</label>
                           <div class="col-sm-10">
                              <textarea name="answer_mcq_one" class="form-control"><?php echo $edit_data->answer_mcq_one;?></textarea>
                           </div>
                        </div>
                        <div class="row mb-3">
                           <label class="col-sm-2 col-form-label">Option Two</label>
                           <div class="col-sm-10">
                              <textarea name="answer_mcq_two" class="form-control"><?php echo $edit_data->answer_mcq_two;?></textarea>
                           </div>
                        </div>
                        <div class="row mb-3">
                           <label class="col-sm-2 col-form-label">Option Three</label>
                           <div class="col-sm-10">
                              <textarea name="answer_mcq_three" class="form-control"><?php echo $edit_data->answer_mcq_three;?></textarea>
                           </div>
                        </div>
                        <div class="row mb-3">
                           <label class="col-sm-2 col-form-label">Option Four</label>
                           <div class="col-sm-10">
                              <textarea name="answer_mcq_four" class="form-control"><?php echo $edit_data->answer_mcq_four;?></textarea>
                           </div>
                        </div>
                        <div class="row mb-3">
                           <label class="col-sm-2 col-form-label">Marks</label>
                           <div class="col-sm-10">
                              <input type="text" class="form-control" name="marks" value="<?php echo $edit_data->marks;?>">
                           </div>
                        </div>
                     </div>
                     <div class="tf" style="display: none;">
                        <div class="row mb-3">
                           <label class="col-sm-2 col-form-label">Question True & False</label>
                           <div class="col-sm-10">
                              <textarea name="question_tf" class="form-control"><?php echo $edit_data->question_tf;?></textarea>
                           </div>
                        </div>
                        <div class="row mb-3">
                           <label class="col-sm-2 col-form-label">Answer One</label>
                           <div class="col-sm-10">
                              <textarea name="answer_true" class="form-control"><?php echo $edit_data->answer_true;?></textarea>
                           </div>
                        </div>
                        <div class="row mb-3">
                           <label class="col-sm-2 col-form-label">Answer Two</label>
                           <div class="col-sm-10">
                              <textarea name="answer_false" class="form-control"><?php echo $edit_data->answer_false;?></textarea>
                           </div>
                        </div>
                        <div class="row mb-3">
                           <label class="col-sm-2 col-form-label">Marks</label>
                           <div class="col-sm-10">
                              <input type="text" class="form-control" name="marks" value="<?php echo $edit_data->marks;?>">
                           </div>
                        </div>
                     </div>
                     <div class="qa" style="display: none;">
                        <div class="row mb-3">
                           <label class="col-sm-2 col-form-label">Question & Answer</label>
                           <div class="col-sm-10">
                              <textarea name="question_qa" class="form-control"><?php echo $edit_data->question_qa;?></textarea>
                           </div>
                        </div>
                        <div class="row mb-3">
                           <label class="col-sm-2 col-form-label">Answer</label>
                           <div class="col-sm-10">
                              <textarea name="answer_qa" class="form-control"><?php echo $edit_data->answer_qa;?></textarea>
                           </div>
                        </div>
                        <div class="row mb-3">
                           <label class="col-sm-2 col-form-label">Marks</label>
                           <div class="col-sm-10">
                              <input type="text" class="form-control" name="marks" value="<?php echo $edit_data->marks;?>">
                           </div>
                        </div>
                     </div>
                     <div class="pmcq" style="display: none;">
                        <div class="row mb-3">
                           <label class="col-sm-2 col-form-label">Picture MCQ</label>
                           <div class="col-sm-10">
                              <textarea name="question_picture_mcq" class="form-control"><?php echo $edit_data->question_picture_mcq;?></textarea>
                           </div>
                        </div>


                        <div class="row mb-3">
                           <label class="col-sm-2 col-form-label">Picture One</label>
                           <div class="col-sm-10">
                              <input class="form-control" type="file" name="mcq_picture_one">
                           </div>
                        </div>

                             <div class="row mb-3">
                           <label for="inputText" class="col-sm-2 col-form-label">Preview One</label>
                           <div class="col-sm-10">
                           <img  id="preview_image1" src ="<?php echo base_url('uploads/questiomcq/'). $edit_data->mcq_picture_one; ?>" width="100"/>
                           <input type="hidden" id="oldimage" name ="oldimage" class="form-control"  value="<?php echo $edit_data->mcq_picture_one;?>">
                           </div>
                           </div>

                        <div class="row mb-3">
                           <label class="col-sm-2 col-form-label">Picture Two</label>
                           <div class="col-sm-10">
                              <input class="form-control" type="file" name="mcq_picture_two">
                           </div>
                        </div>

                             <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Preview Two</label>
                  <div class="col-sm-10">
                    <img  id="preview_image1" src ="<?php echo base_url('uploads/questiomcq/'). $edit_data->mcq_picture_two; ?>" width="100"/>
                    <input type="hidden" id="oldimage" name ="oldimage" class="form-control"  value="<?php echo $edit_data->mcq_picture_two;?>">
                  </div>
                </div>


                        <div class="row mb-3">
                           <label class="col-sm-2 col-form-label">Picture Three</label>
                           <div class="col-sm-10">
                              <input class="form-control" type="file" name="mcq_picture_three">
                           </div>
                        </div>

                             <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Preview Three</label>
                  <div class="col-sm-10">
                    <img  id="preview_image1" src ="<?php echo base_url('uploads/questiomcq/'). $edit_data->mcq_picture_three; ?>" width="100"/>
                    <input type="hidden" id="oldimage" name ="oldimage" class="form-control"  value="<?php echo $edit_data->mcq_picture_three;?>">
                  </div>
                </div>


                        <div class="row mb-3">
                           <label class="col-sm-2 col-form-label">Picture Four</label>
                           <div class="col-sm-10">
                              <input class="form-control" type="file" name="mcq_picture_four">
                           </div>
                        </div>

                             <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Preview Four</label>
                  <div class="col-sm-10">
                    <img  id="preview_image1" src ="<?php echo base_url('uploads/questiomcq/'). $edit_data->mcq_picture_four; ?>" width="100"/>
                    <input type="hidden" id="oldimage" name ="oldimage" class="form-control"  value="<?php echo $edit_data->mcq_picture_four;?>">
                  </div>
                </div>


                        <div class="row mb-3">
                           <label class="col-sm-2 col-form-label">Marks</label>
                           <div class="col-sm-10">
                              <input type="text" class="form-control" name="marks" value="<?php echo $edit_data->marks;?>">
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
                  <label for="inputText" class="col-sm-2 col-form-label">Preview Four</label>
                  <div class="col-sm-10">
                    <img  id="preview_image1" src ="<?php echo base_url('uploads/questiontf/'). $edit_data->tf_picture_question; ?>" width="100"/>
                    <input type="hidden" id="oldimage" name ="oldimage" class="form-control"  value="<?php echo $edit_data->tf_picture_question;?>">
                  </div>
                </div>



                        <div class="row mb-3">
                           <label class="col-sm-2 col-form-label">Option One</label>
                           <div class="col-sm-10">
                              <textarea name="answer_picture_true" class="form-control"><?php echo $edit_data->answer_picture_true;?></textarea>
                           </div>
                        </div>
                        <div class="row mb-3">
                           <label class="col-sm-2 col-form-label">Option Two</label>
                           <div class="col-sm-10">
                              <textarea name="answer_picture_false" class="form-control"><?php echo $edit_data->answer_picture_false;?></textarea>
                           </div>
                        </div>
                        <div class="row mb-3">
                           <label class="col-sm-2 col-form-label">Marks</label>
                           <div class="col-sm-10">
                              <input type="text" class="form-control" name="marks" value="<?php echo $edit_data->marks;?>">
                           </div>
                        </div>
                     </div>
                     <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">Status</label>
                  <div class="col-sm-10">
                    <select class="form-select" name="status" aria-label="Default select example">
                      <option>Select Status</option>
                      <option value="1" <?php echo ($edit_data->status == 1)?'selected':'';?>>Active</option>
                      <option value="0" <?php echo ($edit_data->status == 0)?'selected':'';?>>Inactive</option>
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