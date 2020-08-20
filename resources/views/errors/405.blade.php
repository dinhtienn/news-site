@extends('layouts.errors')

@section('error-info')
    @php
        $error_code = 405;
        $error_message = [trans('errors.method'), trans('errors.not_allowed')];
        $error_code_split_array = [4, 0, 5];
    @endphp
@endsection
