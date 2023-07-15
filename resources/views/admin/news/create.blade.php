@extends('layouts.admin')
@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Добавить новость</h1>
</div>

@if ($errors->any())
@foreach($errors->all() as $error)
<x-alert type="danger" :message="$error"></x-alert>
@endforeach
@endif


<form method="post" action="{{ route('admin.news.store') }}" enctype="multipart/form-data">
  @csrf
  <div class="form-group">
    <label for="categories">Категории</label>
    <select class="form-control" multiple name="categories[]" id="categories">
      @foreach ($categories as $category)
      <option @if(in_array($category->id, old('categories') ?? [])) selected @endif value="{{ $category->id }}">
        {{ $category->title }}
      </option>
      @endforeach
    </select>
    @error('categories') <strong style="color: red;">{{ $message }}</strong> @enderror
  </div>
  <div class="form-group">
    <label for="title">Заголовок</label>
    <input type="text" name="title" id="title" class="form-control" value="{{ old('title') }}">
    @error('title') <strong style="color: red;">{{ $message }}</strong> @enderror
  </div>
  <div class="form-group">
    <label for="author">Автор</label>
    <input type="text" name="author" id="author" class="form-control" value="{{ old('author') }}">
    @error('author') <strong style="color: red;">{{ $message }}</strong> @enderror
  </div>
  <div class="form-group">
    <label for="image">Изображение</label>
    <input type="file" name="image" id="image" class="form-control" value="{{ old('image') }}">
  </div>
  <div class="form-group">
    <label for="status">Статус</label>
    <select class="form-control" name="status" id="status">
      <option @if(old('status')==='draft' ) selected @endif value="{{ \App\Enums\NewsStatus::DRAFT->value }}">
        DRAFT
      </option>
      <option @if(old('status')==='active' ) selected @endif value="{{ \App\Enums\NewsStatus::ACTIVE->value }}">
        ACTIVE
      </option>
      <option @if(old('status')==='blocked' ) selected @endif value="{{ \App\Enums\NewsStatus::BLOCKED->value }}">
        BLOCKED
      </option>
    </select>
    @error('status') <strong style="color: red;">{{ $message }}</strong> @enderror
  </div>
  <div class="form-group">
    <label for="description">Описание</label>
    <textarea name="description" class="form-control" id="description" cols="30" rows="5">
      {!! old('description') !!}
    </textarea>
    @error('description') <strong style="color: red;">{{ $message }}</strong> @enderror
  </div>
  <br>
  <button type="submit" class="btn btn-success">Сохранить</button>
</form>
@endsection