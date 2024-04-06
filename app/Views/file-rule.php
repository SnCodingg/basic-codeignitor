<?php
if(isset($validation)){
    print_r($validation->listErrors());
}
?>

<form action="<?= site_url('file-rule') ?>" method="post" enctype="multipart/form-data">
    <p>
        file upload: <input type="file" name="profile_image" id="">
    </p>
    <p>
        <button type="submit">Submit</button>
    </p>
</form>