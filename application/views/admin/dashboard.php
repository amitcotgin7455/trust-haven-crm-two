  <section class="mt-3 px-3">
      <div class="container-fluid ">
          <div class="row">
              <div class="col-12">
                  <div class="page_title py-4">
                      <i class="fa-solid fa-house"></i>
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
                          <h5>
                              Open Lead </h5>
                          <table class="table  table-hover overflow-auto h-50">
                              <thead>
                                  <tr>
                                      <th scope="col">#</th>
                                      <th scope="col">Name</th>
                                      <th scope="col">Email</th>
                                      <th scope="col">Mobile No</th>
                                      <th scope="col">Status</th>
                                      <th scope="col">Date</th>
                                      <th scope="col">View</th>
                                  </tr>
                              </thead>
                              <?php
                              if(count($open_lead)>0){
                                ?>
                              <tbody class="table-group-divider ">
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
                                      <th scope="row"><?=$i++?></th>
                                      <td><?=ucfirst($on_lead->first_name.' '. $on_lead->last_name)?></td>
                                      <td><a href="mailto:<?=$on_lead->email?>" style="color:#1ea5b4"><?=$on_lead->email?><a></td>
                                      <td><a href="tel:<?=$on_lead->mobile_1?>" style="color:#1ea5b4"><?=$on_lead->mobile_1?></a><?php if($on_lead->mobile_2) { ?>, <a href="tel:<?=$on_lead->mobile_2?>"  style="color:#1ea5b4"><?=$on_lead->mobile_2?></a> <?php } ?>
                                      <td><?=$lead_status?></td>
                                      <td><?=date('d M Y h:i:s',strtotime($on_lead->created_date))?></td>
                                      <td><a target="_blank" href="<?=base_url()?>list-lead">View</a></td>
                                    </td>
                                  </tr>
                                  <?php } ?>
                              </tbody>
                              <?php } ?>
                          </table>
                      </div>
                  </div>
              </div>
              <div class="col-6">
                  <div class="table_scrool">
                      <div class="my_task">
                          <h5>

                            Closed Lead </h5>
                          <table class="table  table-hover overflow-auto h-50">
                          <thead>
                                  <tr>
                                      <th scope="col">#</th>
                                      <th scope="col">Name</th>
                                      <th scope="col">Email</th>
                                      <th scope="col">Mobile No</th>
                                      <th scope="col">Status</th>
                                      <th scope="col">Date</th>
                                      <th scope="col">View</th>
                                  </tr>
                             </thead>
                             <?php
                              if(count($close_lead)>0){
                                ?>
                              <tbody class="table-group-divider ">
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
                                      <th scope="row"><?=$i++?></th>
                                      <td><?=ucfirst($closeLead->first_name.' '. $closeLead->last_name)?></td>
                                      <td><a href="mailto:<?=$closeLead->email?>" style="color:#1ea5b4"><?=$closeLead->email?><a></td>
                                      <td><a href="tel:<?=$closeLead->mobile_1?>" style="color:#1ea5b4"><?=$closeLead->mobile_1?></a><?php if($closeLead->mobile_2) { ?>, <a href="tel:<?=$on_lead->mobile_2?>"  style="color:#1ea5b4"><?=$on_lead->mobile_2?></a> <?php } ?>
                                      <td><?=$lead_status?></td>
                                      <td><?=date('d M Y h:i:s',strtotime($closeLead->created_date))?></td>
                                      <td><a target="_blank" href="<?=base_url()?>list-lead">View</a></td>
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
  </section>