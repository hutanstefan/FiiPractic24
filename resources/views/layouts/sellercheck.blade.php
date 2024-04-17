@if(!auth()->check())
        <?php
        header("Location: /");
        exit();
        ?>
@endif

@if(auth()->user()->type != 'seller')
        <?php
        header("Location: /");
        exit();
        ?>
@endif


