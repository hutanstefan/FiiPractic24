@if(!auth()->check())
        <?php
        header("Location: /");
        exit();
        ?>
@endif

@if(auth()->user()->type != 'admin')
        <?php
        header("Location: /");
        exit();
        ?>
@endif
