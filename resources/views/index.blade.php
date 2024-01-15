@extends('layouts.app')

@section('bodyClass')
@endsection

@section('content')
@if (session('msg'))
    <div class="text-danger display-6">
        <h5>{{ session('msg') }}</h5>
    </div>
@endif
@endsection

