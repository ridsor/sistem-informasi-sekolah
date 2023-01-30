<nav class="navbar navbar-expand-lg navbar-light bg-transparant">
  <div class="container">
    <a class="navbar-brand" href="#">
      <img src="/img/logo-rpl.png" alt="" width="38" height="38" class="d-inline-block" />
      RPL
    </a>
    <div>
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="btn btn-sm btn-outline-secondary"@auth href="/dashboard"@else href="/login"@endauth><i class="bi bi-person"></i></a>
        </li>
      </ul>
    </div>
  </div>
</nav>