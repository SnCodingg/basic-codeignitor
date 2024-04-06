<?php
if(session()->get('success')){
    ?>
    <h1><?= session()->get("success") ?></h1>
    <?php
}
?>
<?php
if(session()->get('error')){
    ?>
    <h1><?= session()->get("error") ?></h1>
    <?php
}
?>

<form action="<?= site_url('my-file') ?>" method="post" enctype="multipart/form-data">
    <p>
        file upload: <input type="file" name="file" id="">
    </p>
    <p>
        <button type="submit">Submit</button>
    </p>
</form>