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
                      <img src="<?php echo base_url()?>assets/admin/img/school-logo.png">
                      <h4>Infant Jesus' School</h4>
                      <div class="details-connect">
                        <p>support@demo.com </p> | 
                        <p> +91-8878767867</p>
                      </div>
                      <p>Antariksh Golf View-1, Noida, Uttar Pradesh, 273001, India</p>
                    </div>
                    <div class="teacher-details mt-5">
                      <div class="row">
                        <div class="col-lg-3 offset-lg-1">
                          <div class="img-box">
                            <img src="<?php echo base_url()?>assets/admin/img/school-logo.png">
                          </div>
                        </div>
                        <div class="col-lg-8">
                          <p>Teacher ID : M001</p>
                          <p>Teacher Name : Ramesh Kumar</p>
                          <p>Teacher Subject : English</p>
                          <p>Phone No : +91-9876789876</p>
                          <p>Email ID : support@demo.com</p>
                          <p>Aadhar Details : 986789657896</p>
                          <p>Class Teacher : 3A</p>
                          <p>Teacher Address : Antariksh Golf View-1, Noida, Uttar Pradesh, 273001, India</p>
                        </div>
                      </div>
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