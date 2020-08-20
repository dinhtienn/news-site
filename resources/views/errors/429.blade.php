@extends('layouts.errors')

@section('error-info')
    @php
        $error_code = 429;
        $error_message = [trans('errors.too_many'), trans('errors.request')];
        $error_code_split_array = [4, 2, 9];
    @endphp
@endsection

