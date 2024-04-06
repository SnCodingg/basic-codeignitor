<?php
if(session()->get("success")){
?>
<p><?php echo session()->get("success"); ?></p>
<?php 
}
if(session()->get("error")){
    ?>
    <p><?php echo session()->get("error"); ?></p>
    <?php 
}

?>

<form action="<?= site_url('form-save') ?>" method="post">
<input type="text" value="Sajid" name="name">
<input type="email" value="sajid@gmail.com" name="email">
<input type="text" value="male" name="gender">
<input type="text" value="active" name="status">
<button type="submit">Submit</button>
</form>