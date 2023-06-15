@extends('layouts.admin')
@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Добавить новость</h1>

</div>
<form method="post" action="{{ route('admin.news.store') }}" enctype="multipart/form-data">
  @csrf
  <div class="form-group">
    <label for="title">Заголовок</label>
    <input type="text" name="title" id="title" class="form-control">
  </div>
  <div class="form-group">
    <label for="author">Автор</label>
    <input type="text" name="author" id="author" class="form-control">
  </div>
  <div class="form-group">
    <label for="image">Изображение</label>
    <input type="file" name="image" id="image" class="form-control">
  </div>
  <div class="form-group">
    <label for="status">Статус</label>
    <select class="form-control" name="status" id="status">
      <option>DRAFT</option>
      <option>ACTIVE</option>
      <option>BLOCKED</option>
    </select>
  </div>
  <div class="form-group">
    <label for="description">Описание</label>
    <textarea name="description" class="form-control" id="description" cols="30" rows="5"></textarea>
  </div>
  <br>
  <button type="submit" class="btn btn-success">Сохранить</button>
</form>
@endsection