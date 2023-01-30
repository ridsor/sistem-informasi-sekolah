<aside>
<div class="flex-shrink-0 p-3 bg-white responsive-sidebar bg-secondary-subtle">
  <ul class="list-unstyled ps-0">
    <li class="mb-1">
      <a href="/dashboard" class="single-link rounded link-dark text-decoration-none d-inline-flex btn btn-toggle{{ Request::is('dashboard') ? ' active' : '' }}"><i class="bi bi-grid-fill me-2"></i>Dashboard</a>
    </li>
    <li class="mb-1">
      <a href="/dashboard/siswa" class="single-link rounded link-dark text-decoration-none d-inline-flex btn btn-toggle{{ Request::is('dashboard/siswa') ? ' active' : '' }}"><i class="bi bi-people-fill me-2"></i>Siswa</a>
    </li>
    <li class="mb-1">
      <a href="/dashboard/kelas" class="single-link rounded link-dark text-decoration-none d-inline-flex btn btn-toggle{{ Request::is('dashboard/kelas') ? ' active' : '' }}"><i class="bi bi-house-door-fill me-2"></i>Kelas</a>
    </li>
    <li class="mb-1">
      <a href="/dashboard/jurusan" class="single-link rounded link-dark text-decoration-none d-inline-flex btn btn-toggle{{ Request::is('dashboard/jurusan') ? ' active' : '' }}"><i class="bi bi-file-earmark-fill me-2"></i>Jurusan</a>
    </li>
    <li class="mb-1">
      <a href="/dashboard/laporan" class="single-link rounded link-dark text-decoration-none d-inline-flex btn btn-toggle{{ Request::is('dashboard/laporan') ? ' active' : '' }}"><i class="bi bi-book-fill me-2"></i>Laporan</a>
    </li>
    <li class="border-top my-3"></li>
    <li class="mb-1">
      <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed" data-bs-toggle="collapse" data-bs-target="#account-collapse" aria-expanded="false">
        Account
      </button>
      <div class="collapse" id="account-collapse">
        <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
          <li><a href="/logout" class="link-dark d-inline-flex text-decoration-none rounded">Log out</a></li>
        </ul>
      </div>
    </li>
  </ul>
</div>
</aside>