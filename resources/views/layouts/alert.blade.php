{{--
<div class="container-lg">
    @if (isset($message))
        <div class="alert alert-success" role="alert">
            <?= $message ?>
        </div>
    @endif
    @if (isset($error))
        <div class="alert alert-danger" role="alert">
            <?= $error ?>
        </div>
    @endif
</div>
--}}
<div class="container-lg">
    @if ($errors->has('number'))
        <div class="alert alert-danger">
            {{ $errors->first('number') }}
        </div>
    @endif
</div>
