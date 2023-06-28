@extends('layouts.main')
@section('content')

<div class="container">
  <h1>Категории новостей</h1>
  <hr /><br>
  @foreach ($categoriesList as $key => $categories)
  <div>
    <h2><a href=categories/{{ $key }}>{{ $categories }}</a></h2>
  </div>
  <br>
  @endforeach
</div>

@endsection