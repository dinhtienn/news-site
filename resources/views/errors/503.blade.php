@extends('layouts.errors')

@section('error-info')
    @php
        $error_code = 503;
        $error_message = [trans('errors.service'), trans('errors.unavailable')];
        $error_code_split_array = [5, 0, 3];
    @endphp
@endsection
