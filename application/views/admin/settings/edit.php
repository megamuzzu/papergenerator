<main id="main" class="main">

      <div class="pagetitle">
      <h1>School Data</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?php echo base_url()?>admin">Home</a></li>
          <li class="breadcrumb-item active"><a href="<?php echo base_url()?>admin/settings">School List</a></li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    



    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">General Form Elements</h5>

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
              <form role="form" action="<?php echo base_url() ?>admin/settings/update" method="post" role="form" enctype="multipart/form-data">

                <div class="row mb-3">
                  <input type="hidden" name="id" value="<?php echo $edit_data->id;?>"/>
                  <label for="inputText" class="col-sm-2 col-form-label">School Name</label>
                  <div class="col-sm-10">
                    <input type="text" name="school_name" class="form-control" value="<?php echo $edit_data->school_name;?>">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputNumber" class="col-sm-2 col-form-label">Phone Number</label>
                  <div class="col-sm-10">
                    <input type="number" name="phone_no" class="form-control" value="<?php echo $edit_data->phone_no;?>">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                  <div class="col-sm-10">
                    <input type="email" name="email_id" class="form-control" value="<?php echo $edit_data->email_id;?>">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Address</label>
                  <div class="col-sm-10">
                    <textarea name="address" class="form-control"><?php echo $edit_data->address;?></textarea>
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">School Logo</label>
                  <div class="col-sm-10">
                    <input type="file" id="logo" name="logo" class="form-control" multiple="multiple">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">School Logo</label>
                  <div class="col-sm-10">
                    <img  id="preview_image1" src ="<?php echo base_url('uploads/school/'). $edit_data->logo; ?>" width="300"/>
                    <input type="hidden" id="oldimage" name ="oldimage" class="form-control"  value="<?php echo $edit_data->logo;?>">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">School Watermark</label>
                  <div class="col-sm-10">
                    <input class="form-control" type="file" name="watermark">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">School Watermark</label>
                  <div class="col-sm-10">
                    <img  id="preview_image1" src ="<?php echo base_url('uploads/school/'). $edit_data->watermark; ?>" width="300"/>
                    <input type="hidden" id="oldimage" name ="oldimage" class="form-control"  value="<?php echo $edit_data->watermark;?>">
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

              </form><!-- End General Form Elements -->

            </div>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->