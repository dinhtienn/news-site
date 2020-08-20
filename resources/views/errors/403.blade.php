@extends('layouts.errors')

@section('error-info')
    @php
        $error_code = 403;
        $error_message = [trans('errors.forbidden'), ''];
        $error_code_split_array = [4, 0, 3];
    @endphp
@endsection
