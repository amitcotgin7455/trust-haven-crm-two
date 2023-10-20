<style>
.error-page {
    height: 80vh;
}
section .error{
  font-size: 150px;
  color: #B31942;
  margin: 0;
  text-shadow: 
    1px 1px 1px #0a316175,    
    2px 2px 1px #0a316175,
    3px 3px 1px #0a316175,
    4px 4px 1px #0a316175,
    5px 5px 1px #0a316175,
    6px 6px 1px #0a316175,
    7px 7px 1px #0a316175,
    8px 8px 1px #0a316175,
    25px 25px 8px rgba(0,0,0, 0.2);
}
.page-error {
    position: absolute;
    left: 50%;
    top: 50%;
    transform: translate(-50%, -50%);
    text-align: center;
}
.page{
  margin: 2rem 0;
  font-size: 20px;
  color: #444;
}

.contact-button{
    background-color: #B31942;
    color: white;
    padding: 12px 26px;
    border-radius: 4px;
    font-size: 18px;
    text-decoration: none;
}
.contact-button:hover{
  background: #222;
  color: #ddd;
}
</style>
<section class="error-page">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="page-error">
                    <h1 class="error">404</h1>
                    <p class="page">Ooops!!! The page you are looking for is not found</p>
                    <a class="contact-button butn me-3" href="<?php echo base_url();?>">Back to home</a>
                  </div>
            </div>
        </div>
    </div> 
</section>