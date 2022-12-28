<h1>Helloword</h1>
<form method="POST" action="/submit-form">
    <lable>name <?php echo csrf_token();?></lable>
    <input name="name"   type="text" placeholder="nhap ten .....">
    <input name="_method" type="hidden" value="DELETE">
    <input name="_token" type="hidden" value="<?php echo csrf_token();?>">
    <button type="submit">submit</button>
</form>

<h1><?php echo route('categrory.index')?></h1>