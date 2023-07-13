
<script src="https://cdn.ckeditor.com/ckeditor5/33.0.0/classic/ckeditor.js"></script>


<style>
    .dropdown {
      margin-bottom: 10px;
    }

    .questionContainer {
      display: none;
      margin-top: 10px;
    }

    .questionContainer .option {
      margin-top: 5px;
    }
    select.questionType.form-select {
    background: #000000;
    color: white;
}
  </style>
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
                  <form role="form" action="<?php echo base_url() ?>admin/blueprint/insertnow" method="post" role="form" enctype="multipart/form-data">
                     <div class="row mb-3">
                        <div class="col-sm-2">
                           <button id="addMoreBtn" class="btn btn-primary" type="button">Add More Question</button>
                        </div>
                        <div class="col-sm-10">
                           <div id="dropdownContainer"></div>
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

                     <textarea id="editor"></textarea>  <button onclick="getContent()">Get Content</button>


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
    // JavaScript
    document.getElementById('addMoreBtn').addEventListener('click', function() {
      var dropdownContainer = document.getElementById('dropdownContainer');
      var dropdownHTML = `
        <div class="dropdown">
        <button class="deleteBtn btn btn-primary mb-3" type="button">Delete</button>
          <select class="questionType form-select">
            <option>Select Question Type</option>
            <option value="FITB">FITB</option>
            <option value="Q&A">Q&A</option>
            <option value="True&False">True&False</option>
            <option value="MCQ">MCQ</option>
          </select>
          <div class="questionContainer"></div>
        </div>
      `;
      dropdownContainer.insertAdjacentHTML('beforeend', dropdownHTML);
    });

    // Add event listener to dynamically created delete buttons
    document.addEventListener('click', function(e) {
      if (e.target && e.target.classList.contains('deleteBtn')) {
        e.target.parentNode.remove();
      }
    });

    // Add event listener to question type dropdowns
    document.addEventListener('change', function(e) {
      if (e.target && e.target.classList.contains('questionType')) {
        var questionContainer = e.target.parentNode.querySelector('.questionContainer');
        var selectedOption = e.target.value;

        if (selectedOption === 'FITB') {
          questionContainer.innerHTML = getFITBQuestionHTML();
        } else if (selectedOption === 'Q&A') {
          questionContainer.innerHTML = getQAQuestionHTML();
        } else if (selectedOption === 'True&False') {
          questionContainer.innerHTML = getTrueFalseQuestionHTML();
        } else if (selectedOption === 'MCQ') {
          questionContainer.innerHTML = getMCQQuestionHTML();
        } else {
          questionContainer.innerHTML = '';
        }

        questionContainer.style.display = questionContainer.innerHTML ? 'block' : 'none';
      }
    });

    function getFITBQuestionHTML() {
      return `
        <input type="text" class="questionInput form-control mt-2 mb-2" placeholder="Enter the Question" />
        <input type="text" class="answerInput form-control mt-2 mb-2" placeholder="Enter the Answer" />
        <input type="text" class="explanationInput form-control mt-2 mb-2" placeholder="Answer Explanation" />
      `;
    }

    function getQAQuestionHTML() {
      return `
        <input type="text" class="questionInput form-control mt-2 mb-2" placeholder="Enter the Question" />
        <textarea class="answerInput form-control mt-2 mb-2" placeholder="Enter the Answer"></textarea>
        <input type="text" class="explanationInput form-control mt-2 mb-2" placeholder="Answer Explanation" />
      `;
    }

    function getTrueFalseQuestionHTML() {
      return `
        <input type="text" class="questionInput form-control mt-2 mb-2" placeholder="Enter the question" />
        <div class="optionsContainer">
          <input type="text" class="answerInput form-control mt-2 mb-2" placeholder="True" />
          <input type="text" class="answerInput form-control mt-2 mb-2" placeholder="False" />
        </div>
        <input type="text" class="explanationInput form-control mt-2 mb-2" placeholder="Answer Explanation" />
      `;
    }

    function getMCQQuestionHTML() {
      return `
        <input type="text" class="questionInput form-control mt-2 mb-2" placeholder="Enter the Question" />
        <input type="text" class="explanationInput form-control mt-2 mb-2" placeholder="Answer Explanation" />
        <div class="optionsContainer">
          <div class="option">
            <input type="text" class="optionInput form-control mt-2 mb-2" placeholder="Option" />
            <button class="deleteOptionBtn btn btn-primary mt-2 mb-2" type="button">Delete</button>
          </div>
        </div>
        <button class="addOptionBtn btn btn-primary mt-2 mb-2" type="button">Add Option</button>
      `;
    }

    // Add event listener to dynamically created add option buttons
    document.addEventListener('click', function(e) {
      if (e.target && e.target.classList.contains('addOptionBtn')) {
        var optionsContainer = e.target.previousElementSibling;
        var optionHTML = `
          <div class="option">
            <input type="text" class="optionInput form-control mt-2 mb-2" placeholder="Option" />
            <button class="deleteOptionBtn btn btn-primary mt-2 mb-2" type="button">Delete</button>
          </div>
        `;
        optionsContainer.insertAdjacentHTML('beforeend', optionHTML);
      }
    });

    // Add event listener to dynamically created delete option buttons
    document.addEventListener('click', function(e) {
      if (e.target && e.target.classList.contains('deleteOptionBtn')) {
        e.target.parentNode.remove();
      }
    });




  </script>

     <script>
        ClassicEditor
            .create(document.querySelector('#editor'), {
                toolbar: ['heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote', 'insertTable', 'imageUpload', 'undo', 'redo']
            })
            .then(editor => {
                console.log('Editor initialized');
            })
            .catch(error => {
                console.error(error);
            });

        function getContent() {
            var editorData = CKEDITOR.instances.editor.getData();
            console.log(editorData);
        }
    </script>