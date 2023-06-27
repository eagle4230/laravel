@extends('layouts.main')
@section('content')

<div class="container">
  <h1>{{ $titleCategory }}</h1>
  <h2> {{ $news->title }} </h2>
  <h4> {{ $news->author }} ({{ $news->created_at }}) </h4>
  <p> {{ $news->description }} </p>
</div>

@endsection