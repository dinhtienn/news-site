@extends('layouts.errors')

@section('error-info')
    @php
        $error_code = 400;
        $error_message = [trans('errors.bad'), trans('errors.request')];
        $error_code_split_array = [4, 0, 0];
    @endphp
@endsection

