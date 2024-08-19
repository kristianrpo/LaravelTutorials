@extends('layouts.app')
@section('title', $data['title'])
@section('subtitle', $data['subtitle'])
@section('content')
<table class="table table-dark table-striped-columns">
    <thead>
        <tr>
            <th scope="col">Email</th>
            <th scope="col">Address</th>
            <th scope="col">Phone Number</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>{{$data['email']}}</td>
            <td>{{$data['address']}}</td>
            <td>{{$data['phoneNumber']}}</td>
        </tr>
    </tbody>
</table>
@endsection