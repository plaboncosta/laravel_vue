@extends('layouts.app')

@section('content')
    @if(Session::has('customer_delete'))
        <div>{{ Session::get('customer_delete') }}</div>
    @endif
    <customer-component></customer-component>
    <div class="mt-5"></div>
    <preview-customer-component></customer-component>
@endsection