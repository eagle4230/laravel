@extends('layouts.main')
@section('content')

<h1>{{ $titleCategory }}</h1>

<div class="container">
  <h2> {{ $news['title'] }} </h2>
  <h4> {{ $news['author'] }} ({{ $news['created_at']->format('d-m-Y H:i') }}) </h4>
  <p> {{ $news['description'] }} </p>
</div>

@endsection