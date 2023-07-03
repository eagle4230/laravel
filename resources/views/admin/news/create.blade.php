@extends('layouts.admin')
@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Добавить новость</h1>

</div>
<form method="post" action="{{ route('admin.news.store') }}" enctype="multipart/form-data">
  @csrf
  <div class="form-group">
    <label for="categories">Категории</label>
    <select class="form-control" type="multiple" name="categories[]" id="categories">
      @foreach ($categories as $category)
      <option value="{{ $category->id }}">{{ $category->title }}</option>
      @endforeach
    </select>
  </div>
  <div class="form-group">
    <label for="title">Заголовок</label>
    <input type="text" name="title" id="title" class="form-control" value="{{ old('title') }}">
  </div>
  <div class="form-group">
    <label for="author">Автор</label>
    <input type="text" name="author" id="author" class="form-control" value="{{ old('author') }}">
  </div>
  <div class="form-group">
    <label for="image">Изображение</label>
    <input type="file" name="image" id="image" class="form-control" value="{{ old('image') }}">
  </div>
  <div class="form-group">
    <label for="status">Статус</label>
    <select class="form-control" name="status" id="status">
      <option @if (old('status')==='DRAFT' ) selected @endif>DRAFT</option>
      <option @if (old('status')==='ACTIVE' ) selected @endif>ACTIVE</option>
      <option @if (old('status')==='BLOCKED' ) selected @endif>BLOCKED</option>
    </select>
  </div>
  <div class="form-group">
    <label for="description">Описание</label>
    <textarea name="description" class="form-control" id="description" cols="30" rows="5">
      {!! old('description') !!}
    </textarea>
  </div>
  <br>
  <button type="submit" class="btn btn-success">Сохранить</button>
</form>
@endsection