 <main id="main" class="main">

    <div class="pagetitle">
      <h1>Teacher Data</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?php echo base_url()?>admin">Home</a></li>
          <li class="breadcrumb-item active"><a href="<?php echo base_url()?>admin/teacher">Teacher Details</a></li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Teacher</h5>

              <div class="container">
                <div class="row">
                  <div class="col-lg-12">
                    <div class="school_logo">

                         <?php
                              foreach ($school_data as $key => $value)
                              {
                                  $logo = $value->logo  != null ? $value->logo: 'School Logo';
                      ?>

                      <img src="<?php echo base_url()?>uploads/school/<?php echo $logo?>" style="width: 50%;">
                      <h4><?php echo $value->school_name;?></h4>
                      <div class="details-connect">
                        <p><?php echo $value->email_id;?></p> | 
                        <p> <?php echo $value->phone_no;?></p>
                      </div>
                      <p><?php echo $value->address;?></p>

                      <?php

                    }

                        ?>

                    </div>
                    <div class="teacher-details mt-5">
                  

                      <?php
                              foreach ($teacher_data as $key => $value)
                              {
                                  $photo_teacher = $value->photo_teacher  != null ? $value->photo_teacher: 'Teacher Image';
                      ?>

                      <div class="row">
                        <div class="col-lg-3 offset-lg-1">
                          <div class="img-box">
                            <img src="<?php echo base_url()?>uploads/teacher/<?php echo $photo_teacher?>">
                          </div>
                        </div>
                        <div class="col-lg-8">
                          <p>Teacher ID : <?php echo $value->teacher_id;?></p>
                          <p>Teacher Name : <?php echo $value->teacher_name;?></p>
                          <p>Teacher Subject : <?php echo $value->subject_of_teacher;?></p>
                          <p>Phone No : <?php echo $value->phone_no;?></p>
                          <p>Email ID : <?php echo $value->email_id;?></p>
                          <p>Aadhar Details : <?php echo $value->aadhar_details;?></p>
                          <p>Class Teacher : <?php echo $value->class_teacher;?> - <?php echo $value->class_section;?></p>
                          <p>Teacher Address : <?php echo $value->address_teacher;?></p>
                        </div>
                      </div>
                      <?php
                           }
                      ?>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-12 text-center mt-5">
                    <button type="button" onclick="printPDF()" class="btn btn-primary">Print Details</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

  </main><!-- End #main -->

  <script>
  function printPDF() {
    window.print();
  }
</script>