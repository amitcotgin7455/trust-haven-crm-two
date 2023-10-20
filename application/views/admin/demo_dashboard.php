  <section class="bg-bg-blue px-3">
      <div class="container-fluid ">
          <div class="row">
              <div class="col-12">
                  <div class="page_title pt-1 pb-3 d-flex">                      
                        <!-- <i class="fa-solid fa-house"></i>                      -->
                        <div id="sLogo" class="noCompLogo_img position-relative">

                        </div>
                        
                        <span>Welcome <?=ucwords($user_detail->name)?></span>
                  </div>
              </div>
          </div>
          <div class="row"> 
              <div class="col-lg-3">
                  <div class="cards-analytics card1">
                      <p class="cards-titles">Open Lead</p>
                      <p class="cards-number"><?=count($open_lead)?></p>
                  </div>
              </div>
              <div class="col-lg-3">
                  <div class="cards-analytics card2">
                      <p class="cards-titles">Close Lead</p>
                      <p class="cards-number"><?=count($close_lead)?></p>
                  </div>
              </div>
              <div class="col-lg-3">
                  <div class="cards-analytics card3">
                      <p class="cards-titles">Open Booking</p>
                      <p class="cards-number"><?=$open_booking?></p>
                  </div>
              </div>
              <div class="col-lg-3">
                  <div class="cards-analytics card4">
                      <p class="cards-titles">Close Booking</p>
                      <p class="cards-number"><?=$close_booking?></p>
                  </div>
              </div>
          </div>
          <div class="row pt-4">
              <div class="col-6">
                  <div class="table_scrool">
                      <div class="my_task">
                          <h5>Open Lead </h5>
                            <div class="table-over">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th scope="col" width="5%">#</th>
                                            <th scope="col" width="20%">Name</th>
                                            <th scope="col" width="25%">Email</th>
                                            <th scope="col" width="15%">Mobile No</th>
                                            <th scope="col" width="10%">Status</th>
                                            <th scope="col" width="20%">Date</th>
                                            <th scope="col" width="5%">View</th>
                                        </tr>
                                    </thead>
                                    <?php
                                    if(count($open_lead)>0){
                                        ?>
                                    <tbody>
                                        <?php
                                        $i=1;
                                        foreach($open_lead as $on_lead)
                                        {
                                            switch($on_lead->lead_status)
                                            {
                                            case 1 : $lead_status = "Callback";
                                            break;
                                            case 2 : $lead_status = "Sale";
                                            break;
                                            case 3 : $lead_status = "Not Interese";
                                            break;
                                            case 4 : $lead_status = "VM";
                                            break;
                                            case 5 : $lead_status = "DND";
                                            break;
                                            }
                                            ?>
                                            <tr>
                                                <td scope="row"><?=$i++?></td>
                                                <td><?=ucfirst($on_lead->first_name.' '. $on_lead->last_name)?></td>
                                                <td><a href="mailto:<?=$on_lead->email?>"><?=$on_lead->email?><a></td>
                                                <td><a href="tel:<?=$on_lead->mobile_1?>"><?=$on_lead->mobile_1?></a><?php if($on_lead->mobile_2) { ?>, <a href="tel:<?=$on_lead->mobile_2?>"><?=$on_lead->mobile_2?></a> <?php } ?>
                                                <td><?=$lead_status?></td>
                                                <td><?=date('d M Y h:i:s',strtotime($on_lead->created_date))?></td>
                                                <td><a target="_blank" href="<?=base_url()?>lead-detail?id=<?php echo base64_encode($on_lead->id)?>">View</a></td>
                                                </td>
                                           </tr>
                                                                                  
                                        
                                        <?php } ?>
                                    </tbody>
                                    <?php } ?>
                                </table>
                            </div>
                      </div>
                  </div>
              </div>
              <div class="col-6">
                    <div class="table_scrool">
                        <div class="my_task">
                          <h5>Closed Lead </h5>
                            <div class="table-over">
                                <table class="table table-hover">
                                    <thead>
                                    <tr>
                                    <th scope="col" width="5%">#</th>
                                            <th scope="col" width="20%">Name</th>
                                            <th scope="col" width="25%">Email</th>
                                            <th scope="col" width="15%">Mobile No</th>
                                            <th scope="col" width="10%">Status</th>
                                            <th scope="col" width="20%">Date</th>
                                            <th scope="col" width="5%">View</th>
                                    </tr>
                                    </thead>
                                <?php
                                if(count($close_lead)>0){
                                    ?>
                                    <tbody>
                                    <?php
                                    $i=1;
                                    foreach($close_lead as $closeLead)
                                    {
                                        switch($closeLead->lead_status)
                                        {
                                        case 1 : $lead_status = "Closed";
                                        break;
                                        case 2 : $lead_status = "Sale";
                                        break;
                                        case 3 : $lead_status = "Not Interese";
                                        break;
                                        case 4 : $lead_status = "VM";
                                        break;
                                        case 5 : $lead_status = "DND";
                                        break;
                                        default : $lead_status = "Closed";
                                        break;
                                        }
                                        ?>
                                        <tr>
                                            <td scope="row"><?=$i++?></tds>
                                            <td><?=ucfirst($closeLead->first_name.' '. $closeLead->last_name)?></td>
                                            <td><a href="mailto:<?=$closeLead->email?>"><?=$closeLead->email?><a></td>
                                            <td><a href="tel:<?=$closeLead->mobile_1?>"><?=$closeLead->mobile_1?></a><?php if($closeLead->mobile_2) { ?>, <a href="tel:<?=$on_lead->mobile_2?>"><?=$on_lead->mobile_2?></a> <?php } ?>
                                            <td><?=$lead_status?></td>
                                            <td><?=date('d M Y h:i:s',strtotime($closeLead->created_date))?></td>
                                            <td><a target="_blank" href="<?=base_url()?>contact-detail?id=<?php echo base64_encode($closeLead->id)?>">View</a></td>
                                            </td>
                                        </tr>
                                        
                                    
                                    
                                    <?php } ?>
                                    </tbody>
                                <?php } ?>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
  </section>