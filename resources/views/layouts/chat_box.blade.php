@if(!auth()->check())
        <?php
        header("Location: /");
        exit();
        ?>
@endif

@if(auth()->user()->id != $UserId || auth()->user()->id == $OtherUserId)
        <?php
        header("Location: /");
        exit();
        ?>
@endif

@if(auth()->user()->type == 'seller' && $OtherUserType == 'seller')
        <?php
        header("Location: /");
        exit();
        ?>
@endif

@if($OtherUserType == 'admin' || auth()->user()->type == 'admin')
        <?php
        header("Location: /");
        exit();
        ?>
@endif
