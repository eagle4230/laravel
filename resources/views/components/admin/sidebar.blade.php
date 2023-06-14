<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
  <div class="position-sticky pt-3 sidebar-sticky">
    <ul class="nav flex-column">
      <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="{{ route('admin.index') }}">
          <span data-feather="home" class="align-text-bottom"></span>
          Главная
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.categories.index') }}">
          <span data-feather="file" class="align-text-bottom"></span>
          Категории
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.news.index') }}">
          <span data-feather="file" class="align-text-bottom"></span>
          Новости
        </a>
      </li>
    </ul>
  </div>
</nav>