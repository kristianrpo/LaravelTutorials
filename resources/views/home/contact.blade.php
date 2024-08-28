@extends('layouts.app')
@section('title', $viewData['title'])
@section('subtitle', $viewData['subtitle'])
@section('content')
<table class="table table-striped-columns bg-primary text-white">
    <thead>
        <tr>
            <th scope="col"> Email </th>
            <th scope="col"> Address </th>
            <th scope="col"> Phone Number </th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td> {{ $viewData['email'] }} </td>
            <td> {{ $viewData['address'] }} </td>
            <td> {{ $viewData['phoneNumber'] }} </td>
        </tr>
    </tbody>
</table>
@endsection