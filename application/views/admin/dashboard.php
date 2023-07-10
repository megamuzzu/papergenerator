  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?php echo base_url()?>admin">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-12">
          <div class="row">
            <!-- Sales Card -->
            <div class="col-xxl-4 col-md-4">
              <div class="card info-card sales-card">

                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Filter</h6>
                    </li>

                    <?php if($this->session->userdata('role') == 1){ ?>
                      <li>
                        <a class="dropdown-item" href="<?php echo base_url()?>admin/lead/addnew">Add New</a>
                      </li>
                    <?php }?>
                    <li><a class="dropdown-item" href="<?php echo base_url()?>admin/lead">All List</a></li>
                  </ul>
                </div>

                <div class="card-body">
                  <h5 class="card-title">Leads <span>| USA</span></h5>

                  <div class="row">
                    <div class="col-sm-6">
                      <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                          <i class="bi bi-list"></i>
                        </div>
                        <div class="ps-3">
                          <h6><?php echo @count($lead_list);?></h6>
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                          <i class="bi bi-currency-dollar"></i>
                        </div>
                        <div class="ps-3">
                          <h6><?php echo number_format($lead_money);?></h6>
                        </div>
                      </div>
                    </div>
                  </div>


                </div>

              </div>
            </div><!-- End Sales Card -->


            <!-- Sales Card -->
            <div class="col-xxl-4 col-md-4">
              <div class="card info-card sales-card">

                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Filter</h6>
                    </li>

                    <?php if($this->session->userdata('role') == 1){ ?>
                      <li>
                        <a class="dropdown-item" href="<?php echo base_url()?>admin/leadaus/addnew">Add New</a>
                      </li>
                    <?php }?>
                    <li><a class="dropdown-item" href="<?php echo base_url()?>admin/leadaus">All List</a></li>
                  </ul>
                </div>

                <div class="card-body">
                  <h5 class="card-title">Leads<span>| Australia</span></h5>

                  <div class="row">
                    <div class="col-sm-6">
                      <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                          <i class="bi bi-list"></i>
                        </div>
                        <div class="ps-3">
                          <h6><?php echo @count($leadaus_list);?></h6>
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                          <i class="bi bi-currency-dollar"></i>
                        </div>
                        <div class="ps-3">
                          <h6><?php echo number_format($leadaus_money);?></h6>
                        </div>
                      </div>
                    </div>
                  </div>

                </div>

              </div>
            </div><!-- End Sales Card -->



            <!-- Revenue Card -->
            <div class="col-xxl-4 col-md-4">
              <div class="card info-card revenue-card">
                <?php if($this->session->userdata('role') == 1){ ?>
                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Filter</h6>
                    </li>

                    <li><a class="dropdown-item" href="<?php echo base_url()?>admin/users/addnew">Add New</a></li>
                    <li><a class="dropdown-item" href="<?php echo base_url()?>admin/users">All List</a></li>
                  </ul>
                </div>
                <?php }?>
                <div class="card-body">
                  <h5 class="card-title">Admin <span>| List</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-person"></i>
                    </div>
                    <div class="ps-3">
                      <h6><?php echo @count($user_list);?></h6>
                    </div>
                  </div>
                </div>
              </div>
            </div><!-- End Revenue Card -->


             <!-- Sales Card -->
            <div class="col-xxl-3 col-md-3">
              <div class="card info-card sales-card">

                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Filter</h6>
                    </li>
                    <li><a class="dropdown-item" href="<?php echo base_url()?>admin/lead/listpopup">All List</a></li>
                  </ul>
                </div>

                <div class="card-body">
                  <h5 class="card-title">Leads (USA)<span>| PopUp</span></h5>

                  <div class="row">
                    <div class="col-sm-6">
                      <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                          <i class="bi bi-list"></i>
                        </div>
                        <div class="ps-3">
                          <h6><?php echo @count($lead_list_pp);?></h6>
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                          <i class="bi bi-currency-dollar"></i>
                        </div>
                        <div class="ps-3">
                          <h6><?php echo number_format($lead_money_pp);?></h6>
                        </div>
                      </div>
                    </div>
                  </div>


                </div>

              </div>
            </div><!-- End Sales Card -->


             <!-- Sales Card -->
            <div class="col-xxl-3 col-md-3">
              <div class="card info-card sales-card">

                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Filter</h6>
                    </li>
                    <li><a class="dropdown-item" href="<?php echo base_url()?>admin/lead/listprinter">All List</a></li>
                  </ul>
                </div>

                <div class="card-body">
                  <h5 class="card-title">Leads (USA)<span>| Printer</span></h5>

                  <div class="row">
                    <div class="col-sm-6">
                      <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                          <i class="bi bi-list"></i>
                        </div>
                        <div class="ps-3">
                          <h6><?php echo @count($lead_list_us_print);?></h6>
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                          <i class="bi bi-currency-dollar"></i>
                        </div>
                        <div class="ps-3">
                          <h6><?php echo number_format($lead_money_us_print);?></h6>
                        </div>
                      </div>
                    </div>
                  </div>


                </div>

              </div>
            </div><!-- End Sales Card -->


            <!-- Sales Card -->
            <div class="col-xxl-3 col-md-3">
              <div class="card info-card sales-card">

                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Filter</h6>
                    </li>
                    <li><a class="dropdown-item" href="<?php echo base_url()?>admin/leadaus/listpopup">All List</a></li>
                  </ul>
                </div>

                <div class="card-body">
                  <h5 class="card-title">Leads (AUS)<span>| PopUp</span></h5>

                  <div class="row">
                    <div class="col-sm-6">
                      <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                          <i class="bi bi-list"></i>
                        </div>
                        <div class="ps-3">
                          <h6><?php echo @count($lead_list_aus_pp);?></h6>
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                          <i class="bi bi-currency-dollar"></i>
                        </div>
                        <div class="ps-3">
                          <h6><?php echo number_format($lead_money_aus_pp);?></h6>
                        </div>
                      </div>
                    </div>
                  </div>


                </div>

              </div>
            </div><!-- End Sales Card -->


            <!-- Sales Card -->
            <div class="col-xxl-3 col-md-3">
              <div class="card info-card sales-card">

                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Filter</h6>
                    </li>
                    <li><a class="dropdown-item" href="<?php echo base_url()?>admin/leadaus/listprinter">All List</a></li>
                  </ul>
                </div>

                <div class="card-body">
                  <h5 class="card-title">Leads (AUS)<span>| Printer</span></h5>

                  <div class="row">
                    <div class="col-sm-6">
                      <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                          <i class="bi bi-list"></i>
                        </div>
                        <div class="ps-3">
                          <h6><?php echo @count($lead_list_aus_print);?></h6>
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                          <i class="bi bi-currency-dollar"></i>
                        </div>
                        <div class="ps-3">
                          <h6><?php echo number_format($lead_money_aus_print);?></h6>
                        </div>
                      </div>
                    </div>
                  </div>


                </div>

              </div>
            </div><!-- End Sales Card -->


            <!-- Recent Sales -->
            <div class="col-12">
              <div class="card recent-sales overflow-auto">
                <div class="card-body">
                  <h5 class="card-title">Recent Leads <span>| USA</span></h5>
                    <table  class="table  table-bordered  table-striped mb-0" id="example" style="width: 100%!important;">
                      <thead>     
                        <tr role="row">
                          <th scope="col">Date</th>
                          <th scope="col">Customer Name</th>
                          <th scope="col">Phone</th>
                          <th scope="col">Email</th>
                          <th scope="col">Amount</th>
                          <th scope="col">Issue</th>
                          <th scope="col">Plan</th>
                          <th scope="col">Agent</th>
                          <?php if($this->session->userdata('role') == 1){ ?>
                          <th scope="col">Action</th>      
                          <?php }?>                       
                          <th scope="col">Action</th>                               
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <?php if($this->session->userdata('role') == 1){ ?>
                          <td></td>    
                        <?php }?>
                          <td></td>                        
                        </tr>
                      </tbody>
                    </table>
                </div>

              </div>
            </div>



            <!-- Recent Sales -->
            <div class="col-12">
              <div class="card recent-sales overflow-auto">
                <div class="card-body">
                  <h5 class="card-title">Recent Leads <span>| AUS</span></h5>
                    <table  class="table  table-bordered  table-striped mb-0" id="exampleaus" style="width: 100%!important;">
                      <thead>     
                        <tr role="row">
                          <th scope="col">Date</th>
                          <th scope="col">Customer Name</th>
                          <th scope="col">Phone</th>
                          <th scope="col">Email</th>
                          <th scope="col">Amount</th>
                          <th scope="col">Issue</th>
                          <th scope="col">Plan</th>
                          <th scope="col">Agent</th>
                          <?php if($this->session->userdata('role') == 1){ ?>
                          <th scope="col">Action</th>      
                          <?php }?>                       
                          <th scope="col">Action</th>                               
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <?php if($this->session->userdata('role') == 1){ ?>
                          <td></td>    
                        <?php }?>
                          <td></td>                        
                        </tr>
                      </tbody>
                    </table>
                </div>

              </div>
            </div>



          </div>
        </div>

      </div>
    </section>

  </main><!-- End #main -->


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

  <!-- Delete Script-->

  <script type="text/javascript">
     jQuery(document).ready(function(){
         jQuery(document).on("change", ".statusBtn", function(){

          var userId = $(this).attr("data-id");
          var value  = $(this).val();

            hitURL = "<?php echo base_url() ?>admin/lead/statusChange",
            currentRow = $(this);
          
            jQuery.ajax({
            type : "POST",
            dataType : "json",
            url : hitURL,
            data : { id : userId, status : value } 
            }).done(function(data){           
              //currentRow.parents('tr').remove();
              if(data.status = true) { alert("successfully status changed"); }
              else if(data.status = false) { alert("status failed failed"); }
              else { alert("Access denied..!"); }
            });
          
        });
    });
    jQuery(document).ready(function(){
       

         jQuery(document).on("click", ".deletebtn", function(){

          var userId = $(this).data("userid"),
            hitURL = "<?php echo base_url() ?>admin/lead/delete",
            currentRow = $(this);
          
          var confirmation = confirm("Are you sure to delete this lead ?");
          
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
<!-- Get Databse List -->

 
<script type="text/javascript">
 
var table;
 
$(document).ready(function() {
 
    //datatables
    table = $('#example').DataTable({ 
 
        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.
 
        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('admin/lead/ajax_list')?>",
            "type": "POST"
        },
 
        //Set column definition initialisation properties.
        "columnDefs": [
        { 
            "targets": [ 0 ], //first column / numbering column
            "orderable": false, //set not orderable
        },
        ],
 
    });
 
});
</script>



<script type="text/javascript">
 
var table;
 
$(document).ready(function() {
 
    //datatables
    table = $('#exampleaus').DataTable({ 
 
        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.
 
        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('admin/leadaus/ajax_list')?>",
            "type": "POST"
        },
 
        //Set column definition initialisation properties.
        "columnDefs": [
        { 
            "targets": [ 0 ], //first column / numbering column
            "orderable": false, //set not orderable
        },
        ],
 
    });
 
});
</script>


 <script type="text/javascript">
     jQuery(document).ready(function(){
         jQuery(document).on("change", ".statusBtn", function(){

          var userId = $(this).attr("data-id");
          var value  = $(this).val();

            hitURL = "<?php echo base_url() ?>admin/leadaus/statusChange",
            currentRow = $(this);
          
            jQuery.ajax({
            type : "POST",
            dataType : "json",
            url : hitURL,
            data : { id : userId, status : value } 
            }).done(function(data){           
              //currentRow.parents('tr').remove();
              if(data.status = true) { alert("successfully status changed"); }
              else if(data.status = false) { alert("status failed failed"); }
              else { alert("Access denied..!"); }
            });
          
        });
    });
    jQuery(document).ready(function(){
       

         jQuery(document).on("click", ".deletebtn", function(){

          var userId = $(this).data("userid"),
            hitURL = "<?php echo base_url() ?>admin/leadaus/delete",
            currentRow = $(this);
          
          var confirmation = confirm("Are you sure to delete this lead ?");
          
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