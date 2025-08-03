<ul class="nav nav-underline navbar-expand-md">

  <button class="navbar-toggler m-3 noLoading" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <div class="btn btn-outline-primary"> <i class="bi bi-menu-up"></i> </div>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <li class="nav-item">
      <a class="nav-link" href="{{ route('contact.index') }}">Contatti</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{ route('text.index') }}">Testi</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{ route('skill.index') }}">Skills</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{ route('course.index') }}">Corsi</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{ route('project.index') }}">Progetti</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{ route('job.index') }}">Lavori</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{ route('language.index') }}">Lingue</a>
    </li>
    <li class="nav-item ms-auto">
     <div class="dropdown">
        <a class="btn btn-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="text-decoration: none">
          Actions
        </a>
        <ul class="dropdown-menu nav-dropdown">
          <li><a class="dropdown-item" href="{{ route('curriculum.index') }}"> Curriculum </a></li>
          <li><a class="dropdown-item" href="{{ route('logs') }}" target="_blank"> Logs </a></li>
          <li><hr class="dropdown-divider"></li>
          <li><a class="dropdown-item text-danger" href="{{ route('logout') }}"> Logout </a></li>
        </ul>
      </div>
    </li>
  </div>
</ul>

