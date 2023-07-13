<main id="main" class="main">

    <div class="pagetitle">
      <h1>Lead Data</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?php echo base_url()?>admin">Home</a></li>
          <li class="breadcrumb-item active"><a href="<?php echo base_url()?>admin/dashboardaus">Leads List</a></li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Lead Data</h5>


                <div class="row mb-3">
                  <label for="inputDate" class="col-sm-2 col-form-label">Date</label>
                  <div class="col-sm-10">
                    <input type="hidden" name="id" value="<?php echo $edit_data->id;?>"/>
                    <input type="date" name="date_at" class="form-control" disabled value="<?php echo $edit_data->date_at;?>">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Customer Name</label>
                  <div class="col-sm-10">
                    <input type="text" name="customer_name" class="form-control" disabled value="<?php echo $edit_data->customer_name;?>">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputNumber" class="col-sm-2 col-form-label">Phone Number</label>
                  <div class="col-sm-10">
                    <input type="number" name="phone" class="form-control" disabled value="<?php echo $edit_data->phone;?>">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                  <div class="col-sm-10">
                    <input type="email" name="email" class="form-control" disabled value="<?php echo $edit_data->email;?>">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Amount</label>
                  <div class="col-sm-10">
                    <input type="text" name="amount" class="form-control" disabled value="<?php echo $edit_data->amount;?>">
                  </div>
                </div>


                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Issue</label>
                  <div class="col-sm-10">
                    <textarea class="tinymce-editor" disabled name="issue"><?php echo $edit_data->issue;?></textarea>
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Plan</label>
                  <div class="col-sm-10">
                    <input type="text" name="plan" class="form-control" disabled value="<?php echo $edit_data->plan;?>">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Merchant Type</label>
                  <div class="col-sm-10">
                    <input type="text" name="merchant" class="form-control" disabled value="<?php echo $edit_data->merchant;?>">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Call Type</label>
                  <div class="col-sm-10">
                    <input type="text" name="call_type" class="form-control" disabled value="<?php echo $edit_data->call_type;?>">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Agent</label>
                  <div class="col-sm-10">
                    <input type="text" name="agent" class="form-control" disabled value="<?php echo $edit_data->agent;?>">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Remote Tool</label>
                  <div class="col-sm-10">
                    <input type="text" name="remote_tool" class="form-control" disabled value="<?php echo $edit_data->remote_tool;?>">
                  </div>
                </div>
                
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Remote Id</label>
                  <div class="col-sm-10">
                    <input type="text" name="remote_id" class="form-control" disabled value="<?php echo $edit_data->remote_id;?>">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Card Number</label>
                  <div class="col-sm-10">
                    <input type="text" name="card_number" class="form-control" disabled value="<?php echo $edit_data->card_number;?>">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Remote Password</label>
                  <div class="col-sm-10">
                    <input type="text" name="remote_password" class="form-control" disabled value="<?php echo $edit_data->remote_password;?>">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Special Comments</label>
                  <div class="col-sm-10">
                    <textarea class="tinymce-editor" disabled name="special_comments"><?php echo $edit_data->special_comments;?></textarea>
                  </div>
                </div>

                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">Lead Type</label>
                  <div class="col-sm-10">
                    <select class="form-select" name="lead_type" disabled aria-label="Default select example">
                      <option>Select Option</option>
                      <option value="1" <?php echo ($edit_data->lead_type == 1)?'selected':'';?> >PP</option>
                      <option value="2" <?php echo ($edit_data->lead_type == 2)?'selected':'';?> >Printer</option>
                    </select>
                  </div>
                </div>

                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">Status</label>
                  <div class="col-sm-10">
                    <select class="form-select" name="status" disabled aria-label="Default select example">
                      <option>Select Option</option>
                      <option value="1" <?php echo ($edit_data->status == 1)?'selected':'';?>>Active</option>
                      <option value="0" <?php echo ($edit_data->status == 0)?'selected':'';?>>Inactive</option>
                    </select>
                  </div>
                </div>

            </div>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->