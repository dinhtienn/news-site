@extends('layouts.errors')

@section('error-info')
    @php
        $error_code = 408;
        $error_message = [trans('errors.request'), trans('errors.timeout')];
        $error_code_split_array = [4, 0, 8];
    @endphp
@endsection

