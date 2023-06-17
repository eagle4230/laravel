@extends('layouts.main')
@section('content')

<h1>Категории новостей</h1>
<hr /><br>
@foreach ($categoriesList as $key => $categories)
<div class="container">
  <h2><a href=categories/{{ $key }}>{{ $categories }}</a></h2>
</div>
<br>
@endforeach

@endsection