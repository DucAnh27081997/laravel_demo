<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document edit php</title>
</head>

<body>
    <b>update categrory</b>
    <form method="POST" action="<?php echo route('categrory.update') ?>">
        <!-- <lable>name <?php echo csrf_token(); ?></lable> -->
        <input name="name" type="text" placeholder="nhap categrory .....">
        <input name="_method" type="hidden" value="POST">
        <input name="_token" type="hidden" value="<?php echo csrf_token(); ?>">
        <button type="submit">submit categrory</button>
    </form>
</body>

</html>