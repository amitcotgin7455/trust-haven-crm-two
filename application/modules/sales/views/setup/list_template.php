<div class="container">
  <div class="row">
    <div class="col-md-4">

    </div>
    <div class="col-md-4 mt-5">
    
    <?php if(!empty($this->session->flashdata('done'))){?>
    <div class="alert alert-success" style="background-color:green;color:white;"
        id="success">
        <?php echo $this->session->flashdata('done');?>

    </div>
    <?php } ?>
    <?php if(!empty($this->session->flashdata('error'))){?>
    <div class="alert alert-danger" style="background-color:red; color:white;" id="error">
        <?php echo $this->session->flashdata('error');?>

    </div>
    <?php } ?>
  </div>
    
    <div class="col-md-4">

    </div>
  </div>
</div>
<h1 class="text-center name-t"> If You Create A Email Template Please Choose 600px Width </h1>
<section class="">
  <div class="container">
    <div class="row text-center mt-5">
      <div class="col-md-3 mt-3 ">
        <div class="">
        <div class="card temp-card" aria-hidden="true">
          <img src="<?php echo base_url(); ?>assets/lead/front_assets/assets/images/template-p1.svg" class="card-img-top" alt="...">
          <a href="<?php echo base_url();?>sales/Builder/third_template" tabindex="-1" class="btn primaryflatbtn d-none m-btn px-2 mx-2 theme-btn">Select</a>
          <div class="card-body">
            <h5 class="card-title placeholder-glow">
              <span class="placeholder col-6"></span>
            </h5>
            <p class="card-text placeholder-glow">
              <span class="placeholder col-7"></span>
              <span class="placeholder col-4"></span>
              <span class="placeholder col-4"></span>
              <span class="placeholder col-6"></span>
              <span class="placeholder col-8"></span>
            </p>
          </div>
        </div>
        </div>
      </div>
      <div class="col-md-3 mt-3 ">
        <div class="">
        <div class="card temp-card" aria-hidden="true">
          <img src="<?php echo base_url(); ?>assets/lead/front_assets/assets/images/template-p2.svg" class="card-img-top" alt="...">
          <a href="<?php echo base_url(); ?>sales/Builder/tempheader" tabindex="-1" class="btn primaryflatbtn d-none m-btn px-2 mx-2  theme-btn">Select</a>
          <div class="card-body">
            <h5 class="card-title placeholder-glow">
              <span class="placeholder col-6"></span>
            </h5>
            <p class="card-text placeholder-glow">
              <span class="placeholder col-7"></span>
              <span class="placeholder col-4"></span>
              <span class="placeholder col-4"></span>
              <span class="placeholder col-6"></span>
              <span class="placeholder col-8"></span>
            </p>

          </div>
        </div>
        </div>
      </div>
      <div class="col-md-3 mt-3 ">
        <div class="">
        <div class="card temp-card" aria-hidden="true">
          <img src="<?php echo base_url(); ?>assets/lead/front_assets/assets/images/template-p3.svg" class="card-img-top" alt="...">
          <a href="<?php echo base_url();?>sales/Builder/second_template" tabindex="-1" class="btn primaryflatbtn d-none m-btn px-2 mx-2  theme-btn">Select</a>
          <div class="card-body">
            <h5 class="card-title placeholder-glow">
              <span class="placeholder col-6"></span>
            </h5>
            <p class="card-text placeholder-glow">
              <span class="placeholder col-7"></span>
              <span class="placeholder col-4"></span>
              <span class="placeholder col-4"></span>
              <span class="placeholder col-6"></span>
              <span class="placeholder col-8"></span>
            </p>

          </div>
        </div>
        </div>
      </div>
      <div class="col-md-3 mt-3 ">
        <div class="">
        <div class="card temp-card" aria-hidden="true">
          <img src="<?php echo base_url(); ?>assets/lead/front_assets/assets/images/blank.png" style="height: 450px;" class="card-img-top" alt="...">
          <a href="<?php echo base_url();?>sales/Builder/blank" tabindex="-1" class="btn primaryflatbtn d-none m-btn px-2 mx-2  theme-btn">Select</a>
          <div class="card-body">
            <h5 class="card-title placeholder-glow">
              <span class="placeholder col-6"></span>
            </h5>
            <p class="card-text placeholder-glow">
              <span class="placeholder col-7"></span>
              <span class="placeholder col-4"></span>
              <span class="placeholder col-4"></span>
              <span class="placeholder col-6"></span>
              <span class="placeholder col-8"></span>
            </p>

          </div>
        </div>
        </div>
      </div>

    </div>
  </div>
</section>