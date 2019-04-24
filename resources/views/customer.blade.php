@extends('layouts.app')

@section('content')
    <customer-component :customers="{{ $customers }}"></customer-component>
@endsection