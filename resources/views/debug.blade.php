@extends('layouts.app')

@section('content')
<div class="container">
    <div style="margin-top: 50px;"></div>
    <table class="table table-borderd table-hover table-striped">
        <thead>
            <tr>
                <td>Name</td>
                <td>Email</td>
                </td>
                <td>Phone</td>
                </td>
                <td>Address</td>
                </td>
            </tr>
        </thead>
        <tbody>
            @foreach($customers as $customer)
            <tr>
                <td>{{ $customer->name }}</td>
                <td>{{ $customer->email }}</td>
                <td>{{ $customer->phone }}</td>
                <td>{{ $customer->address }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
