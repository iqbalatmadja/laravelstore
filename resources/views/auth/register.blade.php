@extends('layouts.app')

@section('bodyClass')
@endsection

@section('content')
<form action="{{ route('post.register') }}" method="post">
@csrf
<div class="position-absolute top-50 start-50 translate-middle mt-5 w-25 p-3 col-auto bg-light border border-secondary border-2 m-2 rounded-4">
    @if (session('msg'))
    <div class="text-danger display-6">
        <h5>{{ session('msg') }}</h5>
    </div>
    @endif
    <div class="mb-3">
        <h3>Register New Account</h3>
    </div>

    <div class="mb-3">
        <label for="name" class="form-label">Full Name</label>
        <input type="text" class="form-control" id="name" name="name" placeholder="Type Your Name | Max 32 chars " maxlength="32" autocomplete="off" value="{{ old('name') }}">
        @if ($errors->has('name'))
            <h5 class="text-danger">{{ $errors->first('name') }}</h5>
        @endif
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" id="email" name="email" placeholder="Type Your Email | Max 128 chars" maxlength="128" autocomplete="off" value="{{ old('email') }}">
        @if ($errors->has('email'))
            <h5 class="text-danger">{{ $errors->first('email') }}</h5>
        @endif
    </div>
    <div class="mb-3">
        <label for="dob" class="form-label">Date Of Birth (yyyy-mm-dd)</label>
        <input type="text" class="form-control" id="dob" name="dob" placeholder="Your Date Of Birth (yyyy-mm-dd)" readonly >
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control" id="password" name="password" placeholder="Type Your Password" >
    </div>
    <div class="mb-3">
        <label for="password_confirmation" class="form-label">Confirm Password</label>
        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Repeat Your Password" >
        @if ($errors->has('password'))
            <h5 class="text-danger">{{ $errors->first('password') }}</h5>
        @endif
    </div>
    <div class="mb-3">
        <input type="submit" class="btn btn-primary" />        
    </div>

</div>
</form>
@endsection


@section('top_scripts')
<link rel="stylesheet" type="text/css" media="all" href="{{ asset('css/daterangepicker.css') }}" />
<script type="text/javascript" src="{{ asset('js/moment.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/daterangepicker.js') }}"></script>
<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
@endsection

@section('bottom_scripts')
<script type="text/javascript">
      $(function() {
        $('#name').focus();
           
        var options = {};
        options.singleDatePicker = true;
        options.showDropdowns = true;
        options.showWeekNumbers = false;
        options.timePicker = false;
        options.showISOWeekNumbers = false;
        options.timePicker24Hour = false;
        options.timePickerIncrement = parseInt(3, 10);  
        options.timePickerSeconds = true;
        options.autoApply = true;
        options.dateLimit = { days: 7 };
        options.autoUpdateInput = true;
        options.alwaysShowCalendars = false;
        options.startDate = moment().subtract(50, 'years');
        options.endDate = moment();
        options.opens = 'left';
        options.drops = 'down';
        options.parentEl = 'body';
        options.linkedCalendars = true;
        options.minDate = moment().subtract(50, 'years');
        options.maxDate = moment().subtract(20, 'years');
        options.showCustomRangeLabel = false;
        options.locale = {
            "format": "YYYY-MM-DD"
        };

        $('#dob').daterangepicker(options, function(start, end, label) { console.log('New date range selected: ' + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD') + ' (predefined range: ' + label + ')'); }).click();;
        


      });
      </script>
@endsection
