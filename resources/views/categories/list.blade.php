@extends('layouts.main')
@section('content')

<div class="container">
  <h1>Категории новостей</h1>
  <hr /><br>
  <h2><a href=categories/all>Смотреть все новости</a></h2>
  <br>
  @foreach ($categoriesList as $categories)
  <div>
    <h2><a href=categories/{{ $categories->id }}>{{ $categories->title }}</a></h2>
  </div>
  <br>
  @endforeach
</div>

@endsection