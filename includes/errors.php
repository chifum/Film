<?php
if(count($errors) > 0) : ?>
<div style="color: red;">
    <?php foreach($errors as $error) : ?>
    <p style="text-align: center;"><?php echo $error ?></p>   
    <?php endforeach ?> 
</div>
<?php endif ?>