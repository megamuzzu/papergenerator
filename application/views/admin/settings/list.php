  <main id="main" class="main">

    <div class="pagetitle">
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?php echo base_url()?>admin/settings/addnew" class="addnewbtn">Add New</a></li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">
        <!-- Left side columns -->
        <div class="col-lg-12">
          <div class="row">
            <!-- Recent Sales -->
            <div class="col-12">
              <div class="card recent-sales overflow-auto">
                <div class="card-body">
                  <h5 class="card-title">School Data <span>| List</span></h5>
                    <table  class="table  table-bordered  table-striped mb-0" id="example" style="width: 100%!important;">
                      <thead>     
                        <tr role="row">
                          <th scope="col">No</th>
                          <th scope="col">School Name</th>
                          <th scope="col">Phone No</th>
                          <th scope="col">Email Id</th>
                          <th scope="col">Logo</th>
                          <th scope="col">Watermark</th>
                          <th scope="col">Address</th>
                          <th scope="col">Status</th>
                           <?php if($this->session->userdata('role') == 1){ ?>
                          <th scope="col">Action</th>     
                          <?php }?>                              
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
                          <td></td>
                           <?php if($this->session->userdata('role') == 1){ ?>
                          <td></td>  
                          <?php }?>                          
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

            hitURL = "<?php echo base_url() ?>admin/settings/statusChange",
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
            hitURL = "<?php echo base_url() ?>admin/settings/delete",
            currentRow = $(this);
          
          var confirmation = confirm("Are you sure to delete this Categorys ?");
          
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
            "url": "<?php echo site_url('admin/settings/ajax_list')?>",
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