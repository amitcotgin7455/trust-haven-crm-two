<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<!-- Display posts list -->
<div class="post-list">
<?php if(!empty($posts)){ foreach($posts as $row){ ?>
    <div class="list-item"><a href="javascript:void(0);"><?php echo $row["title"]; ?></a></div>
<?php } }else{ ?>
    <p>Post(s) not found...</p>
<?php } ?>
</div>

<!-- Render pagination links -->
<div class="pagination">
    <?php echo $this->pagination->create_links(); ?>
</div>