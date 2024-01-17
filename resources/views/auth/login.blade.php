@extends('layouts.app')

@section('bodyClass')
@endsection

@section('content')
<form action="{{ route('post.login') }}" method="post">
@csrf
<div class="position-absolute top-50 start-50 translate-middle mt-5 w-25 p-3 col-auto bg-light border border-secondary border-2 m-2 rounded-4">
    @if (session('msg'))
    <div class="text-danger display-6">
        <h5>{{ session('msg') }}</h5>
    </div>
    @endif
    <div class="mb-3">
        <h3>Login</h3>
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="text" class="form-control" id="email" name="email" placeholder="Type Your Email" maxlength="128" autocomplete="off" value="{{ old('email') }}">
        @if ($errors->has('email'))
            <h5 class="text-danger">{{ $errors->first('email') }}</h5>
        @endif
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control" id="password" name="password" placeholder="Type Your Password" >
    </div>
    <div class="mb-3">
        <input type="submit" class="btn btn-primary" value="Login"/>        
    </div>

</div>
</form>
@endsection


@section('top_scripts')
<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
@endsection

@section('bottom_scripts')
<script type="text/javascript">
      $(function() {
        $('#email').focus();
      );
      </script>
@endsection
