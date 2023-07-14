<script src="https://polyfill.io/v3/polyfill.min.js?features=es6"></script>
<script src="https://cdn.jsdelivr.net/npm/mathjax@3/es5/tex-chtml.js" async></script>
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
                        <div class="school_details">
                           <img src="<?php echo base_url()?>uploads/school/<?php echo $logo?>" style="width: 100px;">
                           <h4 class="mt-2"><?php echo $value->school_name;?></h4>
                           <p><?php echo $value->email_id;?></p>
                           <p><?php echo $value->phone_no;?></p>
                           <p><?php echo $value->address;?></p>
                        </div>
                        <?php
                           }
                           
                               ?>
                               <?php
                               $first_iteration = true;
                               foreach ($question_data as $key => $value)
                                 {
                                      
                                 ?>

                                      <div class="question-area">
                           <div class="header-question">
                              <div class="row">
                                 <div class="col-sm-6">
                                    <h4>School Term :  <?php echo $value['term'] ?></h4>
                                 </div>
                                 <div class="col-sm-6">
                                    <h4 style="float: right;">Duration :  <?php echo $value['duration'] ?> Mins</h4>
                                 </div>
                              </div>
                              <div class="subject-details">
                                 <h4> <?php echo $value['sub_name'] ?> -  <?php echo $value['sub_code'] ?></h4>
                              </div>
                           </div>
                        </div>
<?php 

   if ($first_iteration) {
        $first_iteration = false;
        break;
    }


}
                     ?>

                       
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