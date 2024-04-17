@if(!auth()->check() && $productIsValidate != 1)
        <?php
        header("Location: /");
        exit();
        ?>
@endif

@if(auth()->check() && auth()->user()->type != 'admin' && auth()->user()->id != $productIdOwner && $productIsValidate !=1)
        <?php
        header("Location: /");
        exit();
        ?>
@endif

@if($productIsHidden && auth()->user()->type == 'buyer')
        <?php
        header("Location: /");
        exit();
        ?>
@endif

@if($productIsHidden && auth()->user()->type == 'seller' && auth()->user()->id != $productIdOwner)
        <?php
        header("Location: /");
        exit();
        ?>
@endif
