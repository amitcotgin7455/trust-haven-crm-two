<?php
if($page_type!='Create_invoice')
{
?>
<style>
 
</style>
<footer class="footer-bottom">
  <div class="footer-icon">
    <div class="container-fluid">
      <div class="row align-content-right footer-bottom px-0">
        <div class="col-2">
        <div class="d-flex" id="chatbot-btn-sec">
                    <div class="chatbot__button icons text-center">
                        <!-- <img src="<?php echo base_url(); ?>assets/lead/front_assets/assets/images/chats.png" width="44px"  alt="" style="cursor: pointer;" > -->
                        <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="20" height="20" x="0" y="0" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><path d="M480.052 369.741c49.476-69.417 41.913-164.522-25.665-226.473-30.877-28.305-70.24-45.926-112.761-50.847a15.224 15.224 0 0 0-.833-.958C303.802 53.038 250.658 31 194.988 31 89.049 31 0 109.933 0 211c0 35.435 11.007 69.404 31.916 98.741L2.707 401.447a14.999 14.999 0 0 0 21.09 17.923l88.827-45.167c18.242 7.855 37.586 13.009 57.618 15.354C208.884 430.193 262.315 451 316.98 451c28.416 0 56.729-5.791 82.36-16.798l88.831 45.169a14.973 14.973 0 0 0 6.795 1.629c10.123 0 17.38-9.865 14.295-19.553zm-361.374-25.72a14.997 14.997 0 0 0-13.233.179l-63.267 32.17 20.66-64.866a14.998 14.998 0 0 0-2.473-13.788C40.499 272.286 29.998 242.301 29.998 211c0-82.71 74.014-150 164.99-150 36.636 0 71.905 11.099 100.514 31.086-96.348 9.688-173.51 84.942-173.51 178.914 0 29.228 7.492 57.366 21.617 82.576a173.556 173.556 0 0 1-24.931-9.555zm287.845 60.178a14.998 14.998 0 0 0-13.233-.178C369.905 415.129 343.518 421 316.98 421c-90.976 0-164.99-67.29-164.99-150s74.014-150 164.99-150 164.99 67.29 164.99 150c0 31.301-10.501 61.286-30.368 86.715a15.004 15.004 0 0 0-2.473 13.788l20.66 64.866z" fill="#999999" data-original="#000000" opacity="1" class=""></path><circle cx="255.984" cy="271" r="15" fill="#999999" data-original="#000000" opacity="1" class=""></circle><circle cx="315.981" cy="271" r="15" fill="#999999" data-original="#000000" opacity="1" class=""></circle><circle cx="375.977" cy="271" r="15" fill="#999999" data-original="#000000" opacity="1" class=""></circle></g></svg>
                        <p>chats</p>
                    </div>
                    <div class="chatbot__buttons icons ms-auto text-center" >
                        <!-- <img src="<?php echo base_url(); ?>assets/lead/front_assets/assets/images/chats.png" width="44px"  alt="" style="cursor: pointer;" > -->
                        <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="20" height="20" x="0" y="0" viewBox="0 0 512 512.001" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><path d="M210.352 246.633c33.882 0 63.218-12.153 87.195-36.13 23.969-23.972 36.125-53.304 36.125-87.19 0-33.876-12.152-63.211-36.129-87.192C273.566 12.152 244.23 0 210.352 0c-33.887 0-63.22 12.152-87.192 36.125s-36.129 53.309-36.129 87.188c0 33.886 12.156 63.222 36.13 87.195 23.98 23.969 53.316 36.125 87.19 36.125zM144.379 57.34c18.394-18.395 39.973-27.336 65.973-27.336 25.996 0 47.578 8.941 65.976 27.336 18.395 18.398 27.34 39.98 27.34 65.972 0 26-8.945 47.579-27.34 65.977-18.398 18.399-39.98 27.34-65.976 27.34-25.993 0-47.57-8.945-65.973-27.34-18.399-18.394-27.344-39.976-27.344-65.976 0-25.993 8.945-47.575 27.344-65.973zM426.129 393.703c-.692-9.976-2.09-20.86-4.149-32.351-2.078-11.579-4.753-22.524-7.957-32.528-3.312-10.34-7.808-20.55-13.375-30.336-5.77-10.156-12.55-19-20.16-26.277-7.957-7.613-17.699-13.734-28.965-18.2-11.226-4.44-23.668-6.69-36.976-6.69-5.227 0-10.281 2.144-20.043 8.5a2711.03 2711.03 0 0 1-20.879 13.46c-6.707 4.274-15.793 8.278-27.016 11.903-10.949 3.543-22.066 5.34-33.043 5.34-10.968 0-22.086-1.797-33.043-5.34-11.21-3.622-20.3-7.625-26.996-11.899-7.77-4.965-14.8-9.496-20.898-13.469-9.754-6.355-14.809-8.5-20.035-8.5-13.313 0-25.75 2.254-36.973 6.7-11.258 4.457-21.004 10.578-28.969 18.199-7.609 7.281-14.39 16.12-20.156 26.273-5.558 9.785-10.058 19.992-13.371 30.34-3.2 10.004-5.875 20.945-7.953 32.524-2.063 11.476-3.457 22.363-4.149 32.363C.343 403.492 0 413.668 0 423.949c0 26.727 8.496 48.363 25.25 64.32C41.797 504.017 63.688 512 90.316 512h246.532c26.62 0 48.511-7.984 65.062-23.73 16.758-15.946 25.254-37.59 25.254-64.325-.004-10.316-.351-20.492-1.035-30.242zm-44.906 72.828c-10.934 10.406-25.45 15.465-44.38 15.465H90.317c-18.933 0-33.449-5.059-44.379-15.46-10.722-10.208-15.933-24.141-15.933-42.587 0-9.594.316-19.066.95-28.16.616-8.922 1.878-18.723 3.75-29.137 1.847-10.285 4.198-19.937 6.995-28.675 2.684-8.38 6.344-16.676 10.883-24.668 4.332-7.618 9.316-14.153 14.816-19.418 5.145-4.926 11.63-8.957 19.27-11.98 7.066-2.798 15.008-4.329 23.629-4.56 1.05.56 2.922 1.626 5.953 3.602 6.168 4.02 13.277 8.606 21.137 13.625 8.86 5.649 20.273 10.75 33.91 15.152 13.941 4.508 28.16 6.797 42.273 6.797 14.114 0 28.336-2.289 42.27-6.793 13.648-4.41 25.058-9.507 33.93-15.164 8.043-5.14 14.953-9.593 21.12-13.617 3.032-1.973 4.903-3.043 5.954-3.601 8.625.23 16.566 1.761 23.636 4.558 7.637 3.024 14.122 7.059 19.266 11.98 5.5 5.262 10.484 11.798 14.816 19.423 4.543 7.988 8.208 16.289 10.887 24.66 2.801 8.75 5.156 18.398 7 28.675 1.867 10.434 3.133 20.239 3.75 29.145v.008c.637 9.058.957 18.527.961 28.148-.004 18.45-5.215 32.38-15.937 42.582zm0 0" fill="#999999" data-original="#000000" opacity="1" class=""></path></g></svg>
                        <p>contacts</p>
                    </div>
                </div>   
        </div>
       
        <div class="col-4"></div>
        <div class="col-6">
          <div class="footer-icon float-end">
            <a href="javascript:void(0)" data-bs-toggle="modal"  data-bs-target="#ExpirePlans" title="Recent Expired Plan">
              <span>
                <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="17" height="17" x="0" y="0" viewBox="0 0 379.5 379.5" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><path d="m81.425 332.434-18.563 28.563c-3.593 5.569-2.036 12.994 3.533 16.587 2.036 1.317 4.252 1.916 6.527 1.916 3.952 0 7.785-1.916 10.06-5.449l18.144-27.905c25.988 15.449 56.288 24.372 88.624 24.372 32.396 0 62.695-8.922 88.624-24.431l18.084 27.905c2.275 3.533 6.168 5.449 10.06 5.449 2.216 0 4.491-.599 6.527-1.916 5.569-3.593 7.126-11.018 3.533-16.587l-18.503-28.563c39.761-31.797 65.33-80.72 65.33-135.511 0-95.75-77.905-173.655-173.655-173.655S16.095 101.113 16.095 196.863c0 54.791 25.569 103.714 65.33 135.571zM189.75 47.16c82.576 0 149.703 67.127 149.703 149.703S272.326 346.566 189.75 346.566 40.047 279.439 40.047 196.863 107.174 47.16 189.75 47.16z" fill="#000000" data-original="#000000"></path><path d="M229.751 247.822c2.275 1.976 5.09 2.934 7.904 2.934a12.03 12.03 0 0 0 9.042-4.072c4.371-4.97 3.832-12.515-1.138-16.886l-43.833-38.384V95.065c0-6.587-5.389-11.976-11.976-11.976s-11.976 5.389-11.976 11.976v101.798c0 3.473 1.497 6.767 4.072 9.042zM40.047 62.31c3.114 0 6.228-1.198 8.563-3.593C62.862 44.166 79.03 32.01 96.575 22.549c5.808-3.114 8.024-10.359 4.91-16.228-3.114-5.808-10.359-8.024-16.228-4.91-19.76 10.599-37.844 24.192-53.832 40.54-4.611 4.731-4.551 12.335.18 16.946 2.394 2.276 5.448 3.413 8.442 3.413zM282.925 22.549c17.605 9.401 33.713 21.617 47.965 36.168 2.335 2.395 5.449 3.593 8.563 3.593a12.03 12.03 0 0 0 8.383-3.413c4.731-4.611 4.79-12.216.18-16.946-15.928-16.288-34.072-29.941-53.833-40.539-5.868-3.114-13.114-.898-16.228 4.91-3.054 5.868-.898 13.113 4.97 16.227z" fill="#000000" data-original="#000000"></path></g></svg>
              </span>
            </a>
            <a  href="javascript:void(0)"  title="recent item" data-bs-toggle="modal" data-bs-target="#myModals">
              <span>
                <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="17" height="17" x="0" y="0" viewBox="0 0 491.276 491.276" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><path d="M443.436 218.278c-6.241-6.204-16.319-6.204-22.56 0l-48 48 22.56 22.56 19.04-19.04c-13.343 105.196-109.438 179.657-214.634 166.314S20.185 326.674 33.528 221.478C45.7 125.521 127.351 53.601 224.076 53.638v-32C100.364 21.596.042 121.85 0 245.562s100.212 224.034 223.924 224.076c115.375.039 211.907-87.563 223.032-202.4l21.76 21.76 22.56-22.56-47.84-48.16z" fill="#000000" data-original="#000000" class=""></path><path d="M224.076 165.638v80a15.999 15.999 0 0 0 4.64 11.36l48 48 22.56-22.56-43.2-43.36v-73.44h-32z" fill="#000000" data-original="#000000" class=""></path></g></svg>
              </span>
            </a>
            <a href="#">
              <span>
              <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="17" height="17" x="0" y="0" viewBox="0 0 64 64" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><path d="M48.38 9.45h-7.06l-.45-1.23a1.49 1.49 0 0 0-1.41-1H38a6.22 6.22 0 0 0-12 .01h-1.46a1.49 1.49 0 0 0-1.41 1l-.45 1.23h-7a6.38 6.38 0 0 0-6.37 6.37v39.31a6.37 6.37 0 0 0 6.37 6.36h32.7a6.37 6.37 0 0 0 6.36-6.36V15.82a6.38 6.38 0 0 0-6.36-6.37zm-21.11.78a1.5 1.5 0 0 0 1.5-1.5 3.23 3.23 0 1 1 6.46 0 1.5 1.5 0 0 0 1.5 1.5h1.68l.88 2.45H24.71l.88-2.45zm24.47 44.91a3.37 3.37 0 0 1-3.36 3.36H15.63a3.37 3.37 0 0 1-3.37-3.36V15.82a3.37 3.37 0 0 1 3.37-3.37h6l-.43 1.22a1.49 1.49 0 0 0 .15 1.33 1.5 1.5 0 0 0 1.23.64h18.84a1.5 1.5 0 0 0 1.23-.64 1.49 1.49 0 0 0 .18-1.37l-.43-1.22h6a3.37 3.37 0 0 1 3.36 3.37z" data-name="Layer 8" fill="#000000" data-original="#000000" class=""></path></g></svg>
              </span>
            </a>
            <a href="#" data-bs-toggle="tooltip" data-bs-placement="top" title="sticky notes">
              <span>
                <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="17" height="17" x="0" y="0" viewBox="0 0 60 60" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><path d="M56 6H14.474l-2.3-3.949-.011.006a3.91 3.91 0 0 0-.648-.859A4.251 4.251 0 0 0 8.424 0h-.009a8.519 8.519 0 0 0-5.738 2.677A8.51 8.51 0 0 0 0 8.424a4.25 4.25 0 0 0 1.2 3.087 3.859 3.859 0 0 0 .87.635l-.015.026L6 14.473V56a4 4 0 0 0 4 4h34a3.984 3.984 0 0 0 2.827-1.173l12-12A3.984 3.984 0 0 0 60 44V10a4 4 0 0 0-4-4Zm-42.227 4.354a8.188 8.188 0 0 1-3.413 3.417 1.788 1.788 0 0 1-1.718-.071l-2.3-1.338a9.489 9.489 0 0 0 3.684-2.326 9.489 9.489 0 0 0 2.326-3.684l1.338 2.3a1.787 1.787 0 0 1 .083 1.702ZM4.091 4.091A6.6 6.6 0 0 1 8.414 2h.006a2.344 2.344 0 0 1 1.677.61c1.222 1.223.545 3.973-1.48 6.007S3.83 11.316 2.608 10.1A2.342 2.342 0 0 1 2 8.42a6.6 6.6 0 0 1 2.091-4.329ZM44 58H10a2 2 0 0 1-2-2V15.608a3.849 3.849 0 0 0 1.584.352 3.682 3.682 0 0 0 1.712-.421 10.4 10.4 0 0 0 1.682-1.147l2.315 2.315a1 1 0 0 0 1.414-1.414l-2.315-2.315a10.359 10.359 0 0 0 1.15-1.688A3.734 3.734 0 0 0 15.61 8H56a2 2 0 0 1 2 2v34a2 2 0 0 1-2 2h-6a4 4 0 0 0-4 4v6a2 2 0 0 1-2 2Zm10.83-10L48 54.829V50a2 2 0 0 1 2-2Z" fill="#000000" data-original="#000000" class=""></path><path d="M14 24a1 1 0 0 0-1-1 1.355 1.355 0 0 1 .524-1.148 1 1 0 0 0-1.032-1.713A3.351 3.351 0 0 0 11 23v1a1 1 0 0 0 1 1h1a1 1 0 0 0 1-1ZM17 25h1a1 1 0 0 0 0-2 1.355 1.355 0 0 1 .524-1.148 1 1 0 0 0-1.032-1.713A3.351 3.351 0 0 0 16 23v1a1 1 0 0 0 1 1ZM52 39a1 1 0 0 0 1 1 1.355 1.355 0 0 1-.524 1.148 1 1 0 0 0 1.032 1.713A3.351 3.351 0 0 0 55 40v-1a1 1 0 0 0-1-1h-1a1 1 0 0 0-1 1ZM49 38h-1a1 1 0 0 0 0 2 1.355 1.355 0 0 1-.524 1.148 1 1 0 0 0 1.032 1.713A3.351 3.351 0 0 0 50 40v-1a1 1 0 0 0-1-1ZM13 28a1 1 0 0 0 1 1h38a1 1 0 0 0 0-2H14a1 1 0 0 0-1 1ZM53 34a1 1 0 0 0-1-1H14a1 1 0 0 0 0 2h38a1 1 0 0 0 1-1ZM40 39H14a1 1 0 0 0 0 2h26a1 1 0 0 0 0-2Z" fill="#000000" data-original="#000000" class=""></path></g></svg>
              </span>
            </a>
            <a href="#" data-bs-toggle="tooltip" data-bs-placement="top" title="annoucment">
              <span>
              <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="20" height="20" x="0" y="0" viewBox="0 0 32 32" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><path d="M31 14a5.009 5.009 0 0 0-4-4.899V4a1.002 1.002 0 0 0-1.298-.955L9.848 8H4c-1.654 0-3 1.346-3 3v7c0 1.371.93 2.518 2.188 2.874l1.842 7.369A1 1 0 0 0 6 29h4a.998.998 0 0 0 .97-1.243L9.28 21h.597l15.881 3.97a.996.996 0 0 0 .857-.182A.998.998 0 0 0 27 24v-5.101A5.009 5.009 0 0 0 31 14zM3 11c0-.551.448-1 1-1h5v9H4c-.552 0-1-.449-1-1zm5.719 16H6.781l-1.5-6h1.938zM25 22.719l-14-3.5V9.735L25 5.36zm2-5.903v-5.632c1.161.415 2 1.514 2 2.816s-.839 2.401-2 2.816z" fill="#000000" data-original="#000000"></path></g></svg>
              </span>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</footer>
<?php include_once('chat.php'); ?>
<!-- notification code  -->
<div class="toast-container toast_booking_list" style="position: absolute; bottom: 5%; right: 10px;">
</div>
<div class="modal" id="myModals">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">
            <div class="modal-header" style="background-color: rgb(48 135 233);">
                <div class="send-msg-top">
                    <h6 class="modal-title">Recent Reminders</h6>
                </div>
                <div class="fun-btn">
                  <button type="button" class="btn-close" data-bs-dismiss="modal">
                  <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="16" height="16" x="0" y="0" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                  <g>
                      <g data-name="02 User">
                          <path d="M25 512a25 25 0 0 1-17.68-42.68l462-462a25 25 0 0 1 35.36 35.36l-462 462A24.93 24.93 0 0 1 25 512z" fill="#ffffff" data-original="#000000" opacity="1" class=""></path>
                          <path d="M487 512a24.93 24.93 0 0 1-17.68-7.32l-462-462A25 25 0 0 1 42.68 7.32l462 462A25 25 0 0 1 487 512z" fill="#ffffff" data-original="#000000" opacity="1" class=""></path>
                      </g>
                  </g>
                  </svg>
                  </button>
                </div>
            </div>  
            <div class="modal-body" id="recent_reminders">
            
            </div>
        </div>
    </div>
</div>
<!-- notification code  -->


<div class="modal" id="ExpirePlans">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">
            <div class="modal-header" style="background-color: rgb(48 135 233);">
                <div class="send-msg-top">
                    <h6 class="modal-title">Expire Soon/Expired Plan</h6>
                </div>
                <div class="fun-btn">
                  <button type="button" class="btn-close" data-bs-dismiss="modal">
                  <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="16" height="16" x="0" y="0" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                  <g>
                      <g data-name="02 User">
                          <path d="M25 512a25 25 0 0 1-17.68-42.68l462-462a25 25 0 0 1 35.36 35.36l-462 462A24.93 24.93 0 0 1 25 512z" fill="#ffffff" data-original="#000000" opacity="1" class=""></path>
                          <path d="M487 512a24.93 24.93 0 0 1-17.68-7.32l-462-462A25 25 0 0 1 42.68 7.32l462 462A25 25 0 0 1 487 512z" fill="#ffffff" data-original="#000000" opacity="1" class=""></path>
                      </g>
                  </g>
                  </svg>
                  </button>
                </div>
            </div>  
            <div class="modal-body" id="recent_expire_plans">
            
            </div>
        </div>
    </div>
</div>
<!-- notification code  -->
<?php } ?>
<script src="<?php echo base_url(); ?>assets/js/all.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/js/standalone/selectize.min.js" integrity="sha256-+C0A5Ilqmu4QcSPxrlGpaZxJ04VjsRjKu+G82kl5UJk=" crossorigin="anonymous"></script>
<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/booking.js"></script>
<script src="<?php echo base_url(); ?>assets/js/slick.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/custom.js"></script>
<script src="<?php echo base_url(); ?>assets/js/contact.js"></script>
<script src="<?php echo base_url(); ?>assets/js/main.js"></script>
<!-- Bootstrap DatePicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.js" type="text/javascript"></script>
<!-- Bootstrap DatePicker -->

 
<script type="text/javascript">
      monthly_checkup();
    setInterval(monthly_checkup,1000);
        //Get User Activity
        function monthly_checkup() {
        $.ajax({
            url: '<?php echo base_url()?>Automation/monthly_checkup',
            type: 'post',
            success: function (data) {
                
            }
        });
    }
  // $(function() {
  //   $('#txtDate').datepicker({
  //     format: "mm/dd/yyyy"
  //   });
  // });
    $("#myInput").on("keyup", function() {
      var value = $(this).val().toLowerCase();
      $("#myTable tr").filter(function() {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
      });
    });
    $("#myInput1").on("keyup", function() {
      var value = $(this).val().toLowerCase();
      $("#sub_chk_draft tr").filter(function() {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
      });
    });
    
  $(document).ready(function() {
    $('#select-state22').selectize({
      sortField: 'text'
    });
    $('.getvalue').on('input', function() {
      var getname = $('#getvaluename').val();
      var getnumber = $('#getvaluenumber').val();
      var title_str = getname.replace(/ /g, '');
      var customer_id_val = $('.customer_id').val();
      
      if(customer_id_val.length!=8)
      {
      $(".customer_id").val(title_str.substring(0, 4) + getnumber.substring(0, 4));
      }
    });
    $(".customer_id").click(function() {
      $('.customer_id').attr('type', 'text');
      setTimeout(function() {
        $('.customer_id').attr('type', 'password', function() {});
      }, 5000);
    });
    $(".amount_id").click(function() {
      $('.amount_id').attr('type', 'text');
      setTimeout(function() {
          $('.amount_id').attr('type', 'password', function() {});
      }, 5000);
    });
    // $(".customer_id_list").click(function() {
    //   $(".customer_id_list").addClass('d-none');
    //   $(".customer_id_list-hidden").removeClass('d-none');
    //   setTimeout(function() {
    //     $(".customer_id_list").removeClass('d-none', function() {});
    //     $(".customer_id_list-hidden").addClass('d-none', function() {});
    //   }, 5000);
    // });
    $(".amount_id_list").click(function() {
      var amount_id = $(this).attr('data-id');
      var real_amount = $(this).attr('data-amount');
      var id = $(this).attr('id');
      $('#'+id).html(real_amount);
      setTimeout(function() {
        $('#'+id).html('<span class="fa fa-eye-slash text-danger"></span>');
      }, 5000);
    });
    $(".customer_id_list").click(function() {
      var amount_id = $(this).attr('data-id');
      var real_amount = $(this).attr('data-customer');
      var id = $(this).attr('id');
      $('#'+id).html(real_amount);
      setTimeout(function() {
        $('#'+id).html('<span class="fa fa-eye-slash text-danger"></span>');
      }, 5000);
    });
    $(".mobile_no_list").click(function() {
      var mobile_id = $(this).attr('data-id');
      var mobile_no = $(this).attr('data-mobile1');
      var id = $(this).attr('id');
      $('#'+id).html(mobile_no);
      setTimeout(function() {
        $('#'+id).html('<span class="fa fa-eye-slash text-danger"></span>');
      }, 5000);
    });
    $(".mobile_no_list2").click(function() {
      var mobile_id = $(this).attr('data-id');
      var mobile_no = $(this).attr('data-mobile2');
      var id = $(this).attr('id');
      $('#'+id).html(mobile_no);
      setTimeout(function() {
        $('#'+id).html('<span class="fa fa-eye-slash text-danger"></span>');
      }, 5000);
    });
    
    
    $(".dt").on('input', function() {
      let dates = $(".dt").val();
      var date = dates;
      var d = new Date(date.split("/").reverse().join("-"));
      var dd = d.getDate();
      var mm = d.getMonth() + 1;
      var yy = d.getFullYear();
      var newdate = mm + "-" + dd + "-" + yy;
      $(".dt").attr('type', 'text');
      $(".dt").val(newdate);
    });
  });
</script>
<script>
var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
  return new bootstrap.Tooltip(tooltipTriggerEl)
})
</script>
<script>
  // (() => {
  // 'use strict'
  // Fetch all the forms we want to apply custom Bootstrap validation styles to
  // const forms = document.querySelectorAll('.needs-validation')
  // Loop over them and prevent submission
  //   Array.from(forms).forEach(form => {
  //     form.addEventListener('submit', event => {
  //       if (!form.checkValidity()) {
  //         event.preventDefault()
  //         event.stopPropagation()
  //       }
  //       form.classList.add('was-validated')
  //     }, false)
  //   })
  // })()
  // 
</script>
<script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#chatContactlist li").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>
<!-- notification code  -->
<script>
$(document).ready(function(){
    $(".toast").toast({
    	autohide: false
    });
});
BookingStatus();
    setInterval(BookingStatus,1000);
    
    function BookingStatus() {
        $.ajax({
            url: '<?php echo base_url()?>timezone/getBooking',
            type: 'post',
            success: function (data) {
                $('.toast_booking_list').html(data);
            }
        });
    }
    function CloseBookingByUser(str,time_slot)
    {
      
      $.ajax({
            url: '<?php echo base_url()?>timezone/CloseBookingByUser',
            type: 'post',
            data: {booking_id : str, time_slot : time_slot, status : "Delete"},
            success: function (data) {
                $('.toast_booking_list').html(data);
            }
        });
    }
    function gotBookingByUser(str)
    {
      
      $.ajax({
            url: '<?php echo base_url()?>timezone/gotBookingByUser',
            type: 'post',
            data: {booking_id : str, status : "accecpt"},
            success: function (data) {
                $('.toast_booking_list').html(data);
            }
        });
    }
    RecentBookingStatus();
setInterval(RecentBookingStatus,1000);
function RecentBookingStatus() {
    $.ajax({
        url: '<?php echo base_url()?>timezone/getRecentBookings',
        type: 'post',
        success: function (data) {
            $('#recent_reminders').html(data);
        }
    });
}

setInterval(RecentExpirePlanStatus,3000);
function RecentExpirePlanStatus() {
    $.ajax({
        url: '<?php echo base_url()?>timezone/getRecentExpirePlans',
        type: 'post',
        success: function (data) {
            $('#recent_expire_plans').html(data);
        }
    });
}
</script>
<!-- toaster bootstrap  -->
<script src="<?php echo base_url();?>assets/js/toast.js"></script>                   
    <script>
      $( document ).ready(function() {
        // $.toast({
        //     type: 'info',
        //     title: 'Notice!',
        //     content: 'Hello, world! This is a toast message.',
        //     delay: 5000,
        // });
        <?php if ($_SESSION['done']) { ?>
          $.toast({
              type: 'success',
              title: 'Success',
              content: '<?php echo $_SESSION['done'] ; ?>',
              delay: 50000,
          });
        
        <?php unset($_SESSION['done']); } ?>  
        <?php if ($_SESSION['error']) { ?>
        $.toast({
            type: 'error',
            title: 'Error',
            content: '<?php echo $_SESSION['error'] ; ?>',
            delay: 50000,
        });
        <?php unset($_SESSION['error']); } ?>  
        // $.toast({
        //     type: 'warning',
        //     title: 'Success',
        //     content: 'Hello, world! This is a toast message.',
        //     delay: 5000,
        // });

        // $.toast({
        //     type: 'toast',
        //     title: 'Success',
        //     content: 'Hello, world! This is a toast message.',
        //     delay: 5000,
        // });

      });
    </script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>
<!-- toaster bootstrap  -->
<!-- notification code  -->
</body>
</html>