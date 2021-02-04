<!-- {{ $menuActive = strtolower($menuActive) }} -->

<ul class="nav">
  <li class="nav-item {{ ($menuActive == 'daftarcategory')?'active':'non-active' }} ">
    <a class="nav-link" href="{{route('viewCategory')}}">
      <i class="material-icons">list</i>
      <p> Categories </p>
    </a>
  </li>
  <li class="nav-item {{ ($menuActive == 'daftararticles')?'active':'non-active' }} ">
    <a class="nav-link" href="{{route('viewArticles')}}">
      <i class="material-icons">list</i>
      <p> Articles </p>
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#" data-toggle="modal" data-target="#myModal10">
        <i class="material-icons">power_settings_new</i>
        <p> Logout </p>
      </button>
    </a>
  </li>
</ul>
