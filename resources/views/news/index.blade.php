@extends('layouts.main')
@section('content')

<div class="container">

  <h1>{{ $titleCategory }}</h1>

  <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">

    @foreach ($newsList as $news)

    <div class="col">
      <div class="card shadow-sm">
        <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg"
          role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
          <title>Placeholder</title>
          <rect width="100%" height="100%" fill="#55595c" /><text x="50%" y="50%" fill="#eceeef"
            dy=".3em">Thumbnail</text>
        </svg>

        <div class="card-body">
          <p>
            <strong>
              <a href="{{ $news['category'] }}/{{ $news['id'] }}">
                {{ $news['title'] }}
              </a>
            </strong>
          </p>
          <p class="card-text">
            {{ $news['description'] }}
          </p>
          <div class="d-flex justify-content-between align-items-center">
            <div class="btn-group">
              <a href="{{ $news['category'] }}/{{ $news['id'] }}" type="button"
                class="btn btn-sm btn-outline-secondary">Подробнее</a>
            </div>
            <small class="text-muted">
              {{ $news['author'] }} </br> {{ $news['created_at']->format('d-m-Y H:i') }}
            </small>
          </div>
        </div>
      </div>
    </div>

    @endforeach
  </div>
</div>

@endsection