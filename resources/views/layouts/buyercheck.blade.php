@if(!auth()->check())
        <?php
        header("Location: /");
        exit();
        ?>
@endif

@if(auth()->user()->type != 'buyer')
        <?php
        header("Location: /");
        exit();
        ?>
@endif
