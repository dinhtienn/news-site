@extends('layouts.errors')

@section('error-info')
    @php
        $error_code = 500;
        $error_message = [trans('errors.it\'s_not_you'), trans('errors.it\'s_me')];
        $error_code_split_array = [5, 0, 0];
    @endphp
@endsection
