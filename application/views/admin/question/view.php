<script src="https://polyfill.io/v3/polyfill.min.js?features=es6"></script>
<script src="https://cdn.jsdelivr.net/npm/mathjax@3/es5/tex-chtml.js" async></script>
<style>
           
        .header-school {
            text-align: center;
            margin-bottom: 20px;
        }
        
        .section {
            margin-bottom: 30px;
        }
        
        .section-title {
            font-weight: bold;
            margin-bottom: 10px;
        }
        
        .question {
            margin-bottom: 10px;
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
        }
        
        .marks {
            font-weight: bold;
            margin-right: 10px;
        }
        
        .options {
            margin-left: 20px;
            list-style-type: lower-alpha;
            padding-left: 0;
        }
        
        .answer {
            font-weight: bold;
            margin-top: 5px;
        }

           .header-details {
            display: flex;
            justify-content: space-between;
        }

        .header-details h6 {
            margin: 0;
        }
      
    </style>
<main id="main" class="main">
   <section class="section dashboard">
      <div class="row">
         <!-- Left side columns -->
         <div class="col-lg-12">
            <div class="row">
               <!-- Recent Sales -->
               <div class="col-12">
                  <div class="card recent-sales overflow-auto" id="printPaper">
                     <div class="card-body">
                        <?php
                           foreach ($schoolDetails as $key => $value)
                           {
                               $logo = $value->logo  != null ? $value->logo: 'School Logo';
                           ?>
                         <div class="header-school">
                                 <h1><?php echo $value->school_name;?></h1>
                           </div>
                        <?php
                           }
                           
                               ?>

                          


                  



                               <?php
                               $first_iteration = true;
                               foreach ($question_data as $key => $value)
                                 {
                                      
                                 ?>

                         <div class="header-school">
                                 <h4>School Term :  <?php echo $value['term'] ?></h4>
                                 <h6>Subject: <?php echo $value['sub_name'] ?> -  <?php echo $value['sub_code'] ?></h6>
                                 <div class="header-details">
                                    <h6>Class: <?php echo $value['class_name'] ?> - <?php echo $value['class_sec'] ?></h6>
                                    <h6>Time: <?php echo $value['dura'] ?> Mins</h6>
                                 </div>
                           </div>


<?php 

   if ($first_iteration) {
        $first_iteration = false;
        break;
    }


}
                     ?>


         <div class="section">
        <div class="section-title">Section A: Multiple Choice Questions</div>
        <div class="question">
            <span>1. What is the square root of 64?</span>
           <span class="marks">2 marks</span>
        </div>
        <ul class="options">
            <li>a) 4</li>
            <li>b) 8</li>
            <li>c) 16</li>
            <li>d) 10</li>
        </ul>
        <div class="answer">Answer: a) 4</div>
        
        <div class="question">
            
            <span>2. Which of the following is a prime number?</span>
<span class="marks">3 marks</span>
        </div>
        <ul class="options">
            <li>a) 20</li>
            <li>b) 31</li>
            <li>c) 50</li>
            <li>d) 15</li>
        </ul>
        <div class="answer">Answer: b) 31</div>
    </div>

                       
                        <div class="questionBox">
                           <div class="col-sm-12">
                              <?php
                                 $counter = 1;
                                 foreach ($question_data as $key => $value)
                                 {
                                      
                                 ?>
                              <div class="questionsStart">
                                 <div class="row">
                                    <div class="col-sm-2">
                                       <?php
                                          echo '<label class="col-form-label">Q.No ' . $counter . '</label>';
                                          $counter++;
                                          ?>
                                    </div>
                                    <div class="col-sm-10">
                                       <span class="math-tex">
                                          <?php echo $value['question_fitb'] ?>
                                       </span>
                                       <span class="math-tex">
                                          <?php echo $value['question_qa'] ?>
                                       </span>
                                       <span class="math-tex">
                                          <?php echo $value['question_tf'] ?>
                                       </span>
                                       <span class="math-tex">
                                          <?php echo $value['question_mcq'] ?>
                                       </span>

                                        <?php $tf_picture_question = $value['tf_picture_question'];

                               if (!empty($tf_picture_question)) {
                                     echo '<img src="' . base_url() . 'uploads/questiontf/' . $tf_picture_question . '" alt="Picture T&F Picture" style="width:100px;">';
                              }

                               ?>
                               <span class="math-tex">
                               <?php echo $value['question_picture_mcq'] ?>
                            </span>

                                       
                                          <div class="marks">
                                             <p style="float: right;">Marks : <?php echo $value['marks'] ?></p>
                                          </div>
                                    </div>
                                 </div>
                                 <div class="row mt-3">
                                    <div class="col-sm-2">
                                       Options :
                                    </div>
                                    <div class="col-sm-10">
                                       <span class="math-tex">
                              <?php echo $value['answer_fitb'] ?>
                           </span>
                           <span class="math-tex">
                              <?php echo $value['answer_qa'] ?>
                           </span>
                           <span class="math-tex">
                              <?php echo $value['answer_true'] ?>
                           </span>
                           <br>
                           <span class="math-tex">
                              <?php echo $value['answer_false'] ?>
                           </span>


                           <span class="math-tex">
                              <?php echo $value['answer_mcq_one'] ?>
                           </span>
                           <br>
                           <span class="math-tex">
                              <?php echo $value['answer_mcq_two'] ?>
                           </span>
                           <br>
                           <span class="math-tex">
                              <?php echo $value['answer_mcq_three'] ?>
                           </span>
                           <br>
                           <span class="math-tex">
                              <?php echo $value['answer_mcq_four'] ?>
                           </span>
                           <br>
                           <span class="math-tex">
                              <?php echo $value['answer_picture_true'] ?>
                           </span>
                           <br>
                           <span class="math-tex">
                              <?php echo $value['answer_picture_false'] ?>
                           </span>

                               <?php $mcq_picture_one = $value['mcq_picture_one'];

                               if (!empty($mcq_picture_one)) {
                                     echo '<img src="' . base_url() . 'uploads/questiomcq/' . $mcq_picture_one . '" alt="Answer MCQ Picture" style="width: 100px;margin-top:10px;margin-bottom:10px;"><br>';
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
                           </div>
                           <?php
                              }
                              
                              ?>
                        </div>
                        <div class="printBtn">
                           <button onclick="printDiv('printPaper')">Print PDF</button>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>
</main>
<script>
    function printDiv(divId) {
        var printContents = document.getElementById(divId).innerHTML;
        var originalContents = document.body.innerHTML;
        document.body.innerHTML = printContents;
        window.print();
        document.body.innerHTML = originalContents;
    }
</script>