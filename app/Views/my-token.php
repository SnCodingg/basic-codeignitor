<form action="<?= site_url('my-token') ?>" method="post">
<!-- <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>"> -->
<?= csrf_field() ?>
    <p>
        Name : <input type="text" name="name">
    </p>
    <p>
        <input type="submit" value="Submit">
    </p>
</form>