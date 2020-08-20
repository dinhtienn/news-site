@extends('layouts.errors')

@section('error-info')
    @php
        $error_code = 401;
        $error_message = [trans('errors.unauthorized'), trans('errors.action')];
        $error_code_split_array = [4, 0, 1];
    @endphp
@endsection
