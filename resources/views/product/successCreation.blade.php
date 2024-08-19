@extends('layouts.app')
@section('title', $viewData['title'])
@section('subtitle', $viewData['subtitle'])
@section('content')
<div class="card align-items-center">
    <div class="card-body">
      <h5 class="card-title">Successful creation</h5>
      <p class="card-text">Your product has been successfully created </p>
      <a href="{{route('product.index')}}" class="btn btn-primary">Go to products index page</a>
    </div>
  </div>
@endsection