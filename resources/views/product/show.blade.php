@extends('layouts.app')
@section('title', $viewData['title'])
@section('subtitle', $viewData['subtitle'])
@section('content')
<div class="card mb-3">
  <div class="row g-0">
    <div class="col-md-4">
      <img src="https://laravel.com/img/logotype.min.svg" class="img-fluid rounded-start">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        @if($viewData['product']->getPrice() > 100)
        <h5 class="card-title text-danger"> {{ $viewData['product']->getName() }} </h5>
        @else
        <h5 class="card-title"> {{ $viewData['product']->getName() }} </h5>
        @endif
        <p class="card-text"> <b> Price: </b> {{ $viewData['product']->getPrice() }} <b> $ </b> </p>
        <ul>
          @foreach($viewData["product"]->comments as $comment)
          <li>
            <p>{{ $comment->getDescription() }}</p>
          </li>
          @endforeach
        </ul>
      </div>
    </div>
  </div>
</div>
@endsection