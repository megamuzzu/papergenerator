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
                   <form role="form" action="<?php echo base_url() ?>admin/question/updatemarks" method="post" role="form" enctype="multipart/form-data">
              
 

                 <input type="text" name="blueprint_id" class="form-control" value="<?php echo $edit_data->blueprint_id;?>" hidden>
                  <input type="text" name="question_paper_name" class="form-control" value="<?php echo $edit_data->question_paper_name;?>" hidden>
                  <input type="text" name="subject_name" class="form-control" value="<?php echo $edit_data->subject_name;?>" hidden>
                  <input type="text" name="subject_code" class="form-control" value="<?php echo $edit_data->subject_code;?>" hidden>

                  <input type="text" name="id" class="form-control" value="<?php echo $edit_data->id;?>" hidden>

                     <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Marks</label>
                        <div class="col-sm-10">
                           <input type="text" class="form-control" name="marks">
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