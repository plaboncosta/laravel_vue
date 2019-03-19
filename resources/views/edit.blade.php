@extends('layouts.app')

@section('content')
    <customer-edit-component v-bind:customer="{{ $customer }}"></customer-edit-component>
@endsection