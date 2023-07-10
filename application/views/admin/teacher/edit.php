 <main id="main" class="main">

    <div class="pagetitle">
      <h1>Users Data</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?php echo base_url()?>admin">Home</a></li>
          <li class="breadcrumb-item active"><a href="<?php echo base_url()?>admin/users">Users List</a></li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Users</h5>

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
              <form role="form" id="member_form" action="<?php echo base_url() ?>admin/teacher/update" method="post" role="form" enctype="multipart/form-data">

                <div class="row mb-3">
                  <input type="hidden" name="id" value="<?php echo $edit_data->id;?>"/>
               </div>

                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Teacher ID</label>
                  <div class="col-sm-10">
                    <input type="text" name="teacher_id" class="form-control" value="<?php echo $edit_data->teacher_id;?>">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Teacher Name</label>
                  <div class="col-sm-10">
                    <input type="text" name="teacher_name" class="form-control" value="<?php echo $edit_data->teacher_name;?>">
                  </div>
                </div>

                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">Subject Of Teacher</label>
                  <div class="col-sm-10">
                    <select class="form-select" name="subject_of_teacher" aria-label="Default select example">
                          <option>Select Subject</option>
                          <option value="<?php echo $subject_name; ?>" <?php echo ($edit_data->subject_of_teacher == $edit_data->subject_of_teacher)?'selected':'';?>  ><?php echo $subject_name; ?></option>
                    </select>
                  </div>
                </div>

                  <div class="row mb-3">
                  <label for="inputEmail" class="col-sm-2 col-form-label">Phone No</label>
                  <div class="col-sm-10">
                    <input type="text" name="phone_no" class="form-control" value="<?php echo $edit_data->phone_no;?>">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Email Id</label>
                  <div class="col-sm-10">
                    <input type="email" name="email_id" class="form-control" value="<?php echo $edit_data->email_id;?>">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Teacher Password</label>
                  <div class="col-sm-10">
                    <input type="text" name="teacher_password" class="form-control" value="<?php echo $edit_data->teacher_password;?>">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Aadhar Card Details</label>
                  <div class="col-sm-10">
                    <input type="text" name="aadhar_details" class="form-control" value="<?php echo $edit_data->aadhar_details;?>">
                  </div>
                </div>


                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Address</label>
                  <div class="col-sm-10">
                    <textarea class="form-control" name="address_teacher"><?php echo $edit_data->address_teacher?></textarea>
                  </div>
                </div>


                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">Class Teacher</label>
                  <div class="col-sm-10">
                    <select class="form-select" name="class_teacher" aria-label="Default select example">
                          <option>Select Class</option>
                          <option value="<?php echo $studentClassName; ?>" <?php echo ($edit_data->class_teacher == $edit_data->class_teacher)?'selected':'';?>  ><?php echo $studentClassName; ?></option>
                    </select>
                  </div>
                </div>

                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">Class Section</label>
                  <div class="col-sm-10">
                    <select class="form-select" name="class_section" aria-label="Default select example">
                          <option>Select Section</option>
                          <option value="<?php echo $studentSectionName; ?>" <?php echo ($edit_data->class_section == $edit_data->class_section)?'selected':'';?>  ><?php echo $studentSectionName; ?></option>
                    </select>
                  </div>
                </div>
                
                  <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Teacher Photo</label>
                  <div class="col-sm-10">
                    <input class="form-control" type="file" name="photo_teacher">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Teacher Photo</label>
                  <div class="col-sm-10">
                    <img  id="preview_image1" src ="<?php echo base_url('uploads/teacher/'). $edit_data->photo_teacher; ?>" width="300"/>
                    <input type="hidden" id="oldimage" name ="oldimage" class="form-control"  value="<?php echo $edit_data->photo_teacher;?>">
                  </div>
                </div>


                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">Status</label>
                  <div class="col-sm-10">
                    <select class="form-select" name="status" aria-label="Default select example">
                      <option>Select Status</option>
                      <option value="1" <?php echo ($edit_data->status == 1)?'selected':'';?>>Active</option>
                      <option value="2" <?php echo ($edit_data->status == 2)?'selected':'';?>>Inactive</option>
                    </select>
                  </div>
                </div>
                

                
 

                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">Submit Button</label>
                  <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">Submit Form</button>
                  </div>
                </div>

              </form><!-- End General Form Elements -->

            </div>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->