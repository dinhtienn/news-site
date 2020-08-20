@extends('layouts.errors')

@section('error-info')
    @php
        $error_code = 404;
        $error_message = [trans('errors.page'), trans('errors.not_found')];
        $error_code_split_array = [4, 0, 4];
    @endphp
@endsection

