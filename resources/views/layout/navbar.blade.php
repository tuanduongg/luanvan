<nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
    id="layout-navbar">
    <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
        <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
            <i class="bx bx-menu bx-sm"></i>
        </a>
    </div>

    <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
        <!-- Search -->
        <div class="navbar-nav align-items-center">
            <div class="nav-item d-flex align-items-center">
                <i class="bx bx-search fs-4 lh-0"></i>
                <input type="text" class="form-control border-0 shadow-none" placeholder="Tìm kiếm..."
                    aria-label="Search..." />
            </div>
        </div>
        <!-- /Search -->

        <ul class="navbar-nav flex-row align-items-center ms-auto">
            <!-- Place this tag where you want the button to render. -->
            
            <div class="btn-group dropstart d-none d-md-block">
                <button type="button" class="btn p-1" data-bs-toggle="dropdown" aria-haspopup="true">
                    <i class='bx bxs-bell-ring'><span class="flex-shrink-0  badge badge-center rounded-pill bg-danger w-px-20 h-px-20">4</span></i> 
                  </button>
                <ul class="dropdown-menu mt-3">
                    <li> <a class="dropdown-item" href="javascript:void(0);">Tháng này có 2 người sinh nhật</a> </li>
                    <li> <a class="dropdown-item" href="javascript:void(0);">Tháng này có 2 người sinh nhật</a> </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li> <a class="dropdown-item" href="javascript:void(0);">Tháng này có 4 công văn đến</a> </li>
                </ul>
            </div>
            <li class="nav-item navbar-dropdown dropdown-user dropdown">
                <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                    <div class="avatar avatar-online">
                        <div class="avatar me-2">
                            <span class="avatar-initial rounded-circle bg-label-secondary">{{Auth::user()->format_name ?? '' }}</span>
                        </div>
                    </div>
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                        <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#modalTop">
                            <div class="d-flex">
                                <div class="flex-shrink-0 me-3">
                                    <div class="avatar avatar-online">
                                        <div class="avatar me-2">
                                            <span class="avatar-initial rounded-circle bg-label-secondary">{{Auth::user()->format_name ?? '' }}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center">
                                    <span class="fw-semibold d-block">{{Auth::user()->name ?? '' }}</span>
                                    {{-- <small class="text-muted">Admin</small> --}}
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <div class="dropdown-divider"></div>
                    </li>
                    <li>
                        <a class="dropdown-item" href="#">
                            <span class="d-flex align-items-center align-middle">
                                <i class="flex-shrink-0 bx bxs-bell-ring  me-2"></i>
                                <span class="flex-grow-1 align-middle">Thông báo</span>
                                <span
                                    class="flex-shrink-0 badge badge-center rounded-pill bg-danger w-px-20 h-px-20">4</span>
                            </span>
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#modalTop">
                            <i class="bx bx-user me-2"></i>
                            <span class="align-middle">Trang cá nhân</span>
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="#">
                            <i class="bx bx-cog me-2"></i>
                            <span class="align-middle">Thiết lập</span>
                        </a>
                    </li>

                    <li>
                        <div class="dropdown-divider"></div>
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{ route('auth.logout') }}">
                            <i class="bx bx-power-off me-2"></i>
                            <span class="align-middle">Đăng xuất</span>
                        </a>
                    </li>
                </ul>
            </li>
            <!--/ User -->
        </ul>
    </div>
    <!-- Modal -->

</nav>
<div class="modal modal-top fade" id="modalTop" tabindex="-1">
    <div class="modal-dialog">
        <form class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTopTitle">Thông tin cá nhân</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row mb-3">
                    <div class="card">
                        <div class="col-12">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <strong>
                                        Mã:
                                    </strong>
                                    19103100063
                                </li>
                                <li class="list-group-item">
                                    <strong>
                                        Họ và Tên:
                                    </strong>
                                    Dương Ngô Tuấn
                                </li>
                                <li class="list-group-item">
                                    <strong>
                                        Email:
                                    </strong>
                                    sv.1903100063@uneti.edu.vn
                                </li>
                                <li class="list-group-item">
                                    <strong>
                                        SĐT:
                                    </strong>
                                    0912312321
                                </li>
                                <li class="list-group-item">
                                    <strong>
                                        Chức Vụ:
                                    </strong>
                                    Giảng viên
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col mb-3">
                        <label for="input-name" class="form-label">Họ và tên</label>
                        <input type="text" id="input-name" class="form-control" placeholder="Nhập họ tên">
                    </div>
                </div>
                <div class="row g-2">
                    <div class="col mb-0">
                        <label for="input-email" class="form-label">Email</label>
                        <input type="email" id="input-email" class="form-control" placeholder="xxxx@xxx.xx">
                    </div>
                    <div class="col mb-0">
                        <label for="input-sdt" class="form-label">Số điện thoại</label>
                        <input type="text" id="input-sdt" class="form-control" placeholder="Nhập số điện thoại">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">Đóng</button>
                <button type="button" id="btn-update-profile" class="btn btn-primary">Cập nhật thông tin</button>
            </div>
        </form>
    </div>
</div>
