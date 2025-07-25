<ul class="nav nav-underline navbar-expand-md">

  <button class="navbar-toggler m-3" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <div class="btn btn-outline-primary"> <i class="bi bi-menu-up"></i> </div>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <li class="nav-item">
      <a class="nav-link" href="{{ route('contact.index') }}">Contatti</a>
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
      <a class="nav-link" href="{{ route('curriculum.index') }}">Curriculum</a>
    </li>
    <li class="nav-item ms-auto">
      <a class="nav-link" href="{{ route('logout') }}">Logout</a>
    </li>
  </div>
</ul>

