<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <h6 class="d-block d-lg-none"> ALS Database System</h6>
      <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
        <h6 class="navbar-brand d-none d-lg-block">ALS Database System</h6>
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{route('dashboard')}}"><i class="bi bi-house"></i> Home</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link active dropdown-toggle"  id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="bi bi-person-video2"></i>
                Applicants
            </a>
            <ul class="dropdown-menu dropdown-menu-lg-end" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="#"><i class="bi bi-person-plus"></i> New</a></li>
                <li><a class="dropdown-item" href="#"><i class="bi bi-person-lines-fill"></i> List</a></li>
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link active dropdown-toggle"  id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="bi bi-people"></i>
                Accounts
            </a>
            <ul class="dropdown-menu dropdown-menu-lg-end" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="#"><i class="bi bi-person-plus"></i> New</a></li>
                <li><a class="dropdown-item" href="#"><i class="bi bi-person-lines-fill"></i> List</a></li>
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link active "  id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="bi bi-person-circle"></i>
                {{ Auth::user()->username }}
            </a>
            <ul class="dropdown-menu dropdown-menu-lg-end" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="#"><i class="bi bi-gear"></i> Settings</a></li>

                <li class="dropdown-item">
                    <form action="{{route('logout')}}" class="mb-0 py-2" method="POST">
                        @csrf
                        <button class="dropdown-item btn btn-link p-0" type="submit"><i class="bi bi-box-arrow-right"></i> Logout</button>
                    </form>
                  </li>
            </ul>
          </li>
        </ul>

      </div>
    </div>
  </nav>
