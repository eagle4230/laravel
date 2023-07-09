@extends('layouts.main')
@section('content')

<div class="container">
  <h2>{{ $category->title }}</h2>
  <hr>
  <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">

    @foreach ($news as $news)

    <div class="col">
      <div class="card shadow-sm">
        <img src="{{ $news->image }}" />
        <div class="card-body">
          <p>
            <strong>
              <a href="{{ $category->id }}/{{ $news->id }}">
                {{ $news->title }}
              </a>
            </strong>
          </p>
          <p class="card-text">
            @php
            echo mb_substr($news->description, 0, 50) . " ...";
            @endphp
          </p>
          <div class="d-flex justify-content-between align-items-center">
            <div class="btn-group">
              <a href="{{ $category->id }}/{{ $news->id }}" type="button"
                class="btn btn-sm btn-outline-secondary">Подробнее</a>
            </div>
            <small class="text-muted">
              {{ $news->author }} </br> {{ date('d-m-Y H:i', strtotime($news->created_at)) }}
            </small>
          </div>
        </div>
      </div>
    </div>

    @endforeach
  </div>
</div>

@endsection