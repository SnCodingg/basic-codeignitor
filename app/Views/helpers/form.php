<?= form_open('admin/save') ?>
<?php 
$name_input = [
    "name"=>"name",
    "id"=>"name",
    "class"=>"form-control",
    "value"=>"Sajid"
];
$comment_textarea = [
    "name"=>"name",
    "id"=>"name",
    "class"=>"form-control",
    "value"=>"Sajid"
];
$submit_button = [
    "name"=>"name",
    "id"=>"name",
    "class"=>"form-control",
    "onclick"=>"clickMe();",
    "value"=>true,
    'content' => 'Ok',
];
?>
<?= form_input($name_input) ?>
<?= form_textarea($comment_textarea) ?>
<?= form_button($submit_button) ?>

<?= form_close() ?>

<script>
   function clickMe(){
    alert('sajid');
   }
</script>