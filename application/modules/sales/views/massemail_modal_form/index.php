<div class="modal fade" id="sendemailModal">
    <div class="modal-dialog modal-lg  mx-auto">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title"><b>Mass Email</b></h3>
            </div>
            <form action="<?php echo base_url();?>sales/massemail/selectedusermail" method="post" class="s-email-form" onsubmit="return valid();">  
                <div class="modal-body pt-4 pb-5">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="d-flex">
                                    <div class="py-2">
                                        <label class="form-label">To</label>
                                    </div>
                                    <div class="px-4 py-2">
                                        <p><?php echo $activeSender[0]->sender_email; ?></p>
                                    </div>
                                </div>
                                <div class="d-flex">
                                    <div class="py-2">
                                        <label class="form-label">Tamplates</label>
                                    </div>
                                    <div class="px-4 py-2 group-btn-dropdowms">
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-secondary">Select Tampaltes</button>
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-default dropdown-toggle" data-bs-toggle="dropdown"></button>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" onclick="getTemplate(1);" href="#">Cancellation Mail</a>
                                                    <a class="dropdown-item" href="#" onclick="getTemplate(2);">Followup Mail</a>
                                                    <a class="dropdown-item" href="#" onclick="getTemplate(3);">Schedule Maintenence</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="date-e-mail">
                        <p>Email Sent Today: <?php echo date('m-d-Y') ?></p>
                    </div>
                    <div class="btn-e-mail">
                        <button type="button" class="btn newgraybtn" data-bs-dismiss="modal">Cancel</button>
                        <input type="text" class="d-none  template_value" name="template_id" >
                        <input type="text" class="d-none" value="<?php echo $activeSender[0]->sender_email; ?>" name="sender_email">
                        <input type="text" class="d-none email_id"  name="email_id[]">
                        <input type="text" class="d-none module_type"  name="module_type">
                        <input type="text" class="d-none sender_id"  name="sender_id">
                        <input type="text" class="d-none user_id"  name="user_id">
                        <input type="text" class="d-none sent_by_email"  name="sent_by_email">
                        <input type="text" class="d-none sent_by_name"  name="sent_by_name">
                        <button type="submit" class="btn theme-btn-2">Send</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    function getTemplate(id){
        let template_id = id;
        $(".template_value").val(template_id);
    }
</script>
<script>
    function valid(){   
        if($(".template_value").val()==''){
            alert('Please Select Template');
            return false;
        }
    }
</script>
<!-- $('.delete_all_draft').on('click', function(e) {

var allVals = [];
$(".sub_chk_draft:checked").each(function() {
    allVals.push($(this).attr('data-id'));
});

if (allVals.length <= 0) {
    alert("Please select row.");
} else {

    var check = confirm("Are you sure you want to delete this row?");
    if (check == true) {

        var join_selected_values = allVals.join(",");

        $.ajax({
            url: "<?php echo base_url(); ?>sales/Lead/deletelead",
            type: 'POST',
            data: 'ids=' + join_selected_values,
            success: function(data) {
                console.log(data);
                $(".sub_chk_draft:checked").each(function() {
                    $(this).parents("tr").remove();
                });
                alert("Deleted Lead Row successfully.");
                location.reload();
            },
            error: function(data) {
                alert(data.responseText);
            }
        });

        $.each(allVals, function(index, value) {
            $('table tr').filter("[data-row-id='" + value + "']").remove();
        });
    }
}
}); -->