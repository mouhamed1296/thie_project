<?php
    if(!$error):
?>
        <div class="alert alert-success alert-dismissable mt-2">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong><?= $message ?></strong>
        </div>
<?php
    else:
?>
        <div class="alert alert-danger alert-dismissable mt-2">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong><?= $message ?></strong>
        </div>
<?php
    endif;
?>
