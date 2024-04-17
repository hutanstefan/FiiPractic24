@if(auth()->user()->id != $userId)
        <?php
        header("Location: /");
        exit();
        ?>
@endif
