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
                        <div class="question-area">
                           <div class="header-question">
                              <div class="row">
                                 <div class="col-sm-6">
                                    <h4>School Term : <?php echo $edit_data->term;?></h4>
                                 </div>
                                 <div class="col-sm-6">
                                    <h4 style="float: right;">Duration : <?php echo $edit_data->duration;?></h4>
                                 </div>
                              </div>
                              <div class="subject-details">
                                 <h4><?php echo $edit_data->sub_name;?> - <?php echo $edit_data->sub_code;?></h4>
                              </div>
                           </div>
                        </div>
                        <div class="questionBox">
                           <div class="col-sm-12">
                              <?php
                                 $counter = 1;
                                 foreach ($questionsPaper as $key => $value)
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
                                       <?php echo $value->question_fitb;?>
                                       <?php echo $value->question_qa;?>
                                       <?php echo $value->question_tf;?>
                                       <?php echo $value->question_mcq;?>
                                       <?php echo $value->question_picture_mcq;?>
                                       <?php $tf_picture_question = $value->tf_picture_question;?>
                                       <?php
                                          if (!empty($tf_picture_question)) {
                                                echo '<img src="' . base_url() . 'uploads/questiontf/' . $tf_picture_question . '" alt="Picture T&F Picture" style="width:100px;">';
                                          }
                                          ?>
                                          <div class="marks">
                                             <p style="float: right;">Marks : <?php echo $value->marks;?></p>
                                          </div>
                                    </div>
                                 </div>
                                 <div class="row mt-3">
                                    <div class="col-sm-2">
                                       Options :
                                    </div>
                                    <div class="col-sm-10">
                                       <?php echo $value->answer_fitb;?>
                                       <?php echo $value->answer_qa;?>
                                       <?php echo $value->answer_true;?>
                                       <?php echo $value->answer_false;?>
                                       <?php echo $value->answer_mcq_one;?>
                                       <?php echo $value->answer_mcq_two;?>
                                       <?php echo $value->answer_mcq_three;?>
                                       <?php echo $value->answer_mcq_four;?>
                                       <?php echo $value->answer_picture_true;?>
                                       <?php echo $value->answer_picture_false;?>
                                       <?php $mcq_picture_one = $value->mcq_picture_one;
                                          if (!empty($mcq_picture_one)) {
                                                echo '(a) &nbsp;&nbsp;<img src="' . base_url() . 'uploads/questiomcq/' . $mcq_picture_one . '" alt="Answer MCQ Picture" style="width: 100px;margin-top:10px;margin-bottom:10px;"><br>';
                                          }
                                          
                                          ?> 
                                       <?php $mcq_picture_two = $value->mcq_picture_two;
                                          if (!empty($mcq_picture_two)) {
                                                echo '(b) &nbsp;&nbsp;<img src="' . base_url() . 'uploads/questiomcq/' . $mcq_picture_two . '" alt="Answer MCQ Picture" style="width: 100px;margin-top:10px;margin-bottom:10px;"><br>';
                                          }
                                          
                                          ?>  
                                       <?php $mcq_picture_three = $value->mcq_picture_three;
                                          if (!empty($mcq_picture_three)) {
                                                echo '(c) &nbsp;&nbsp;<img src="' . base_url() . 'uploads/questiomcq/' . $mcq_picture_three . '" alt="Answer MCQ Picture" style="width: 100px;margin-top:10px;margin-bottom:10px;"><br>';
                                          }
                                          
                                          ?> 
                                       <?php $mcq_picture_four = $value->mcq_picture_four;
                                          if (!empty($mcq_picture_four)) {
                                                echo '(d) &nbsp;&nbsp;<img src="' . base_url() . 'uploads/questiomcq/' . $mcq_picture_four . '" alt="Answer MCQ Picture" style="width: 100px;margin-top:10px;margin-bottom:10px;"><br>';
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