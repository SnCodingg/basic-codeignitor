<?php 
// if(isset($validation)){
//     print_r($validation->listErrors());
// }
?>

<form action="<?= site_url('my-formdata') ?>" method="post">
<p>
    Name : <input type="text" value="" name="name">
    <?php 
    if(isset($validation)){
        if($validation->hasError("name")){
            echo $validation->getError("name");
        }
    }
    ?>
</p>
<p>
    Email : <input type="email" value="" name="email">
    <?php 
    if(isset($validation)){
        if($validation->hasError("email")){
            echo $validation->getError("email");
        }
    }
    ?>
</p>
<p>
    Phone : <input type="text" value="" name="mobile">
    <?php 
    if(isset($validation)){
        if($validation->hasError("mobile")){
            echo $validation->getError("mobile");
        }
    }
    ?>
</p>
<input type="submit" value="Submit">
</form>