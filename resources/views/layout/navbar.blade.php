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

            <li class="nav-item dropdown-notifications navbar-dropdown dropdown me-3 me-xl-1" id="icon-show-noti">
                <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown"
                    data-bs-auto-close="outside" aria-expanded="false">
                    <i class="bx bx-bell bx-sm"></i>
                    <span class="badge bg-danger rounded-pill badge-notifications" id="total_notification"></span>
                </a>
                <ul class="dropdown-menu dropdown-menu-end py-0" id="dropdown-noti" style="width: 300px; ">
                    <li class="dropdown-menu-header border-bottom">
                        <div class="dropdown-header d-flex align-items-center py-3">
                            <h5 class="text-body mb-0 me-auto">Công văn đến trong tuần</h5>
                            <a href="javascript:void(0)" class="dropdown-notifications-all text-body"
                                data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Mark all as read"
                                data-bs-original-title="Thông báo"><i class="bx fs-4 bx-envelope-open"></i></a>
                        </div>
                    </li>
                    <li class="dropdown-notifications-list scrollable-container  ps ps--active-y">
                        <ul class="list-group list-group-flush " id="ul-noti"
                            style="height: 250px; overflow-y: auto;">
                        </ul>
                        <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
                            <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
                        </div>
                        <div class="ps__rail-y" style="top: 0px; right: 0px; height: 480px;">
                            <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 260px;"></div>
                        </div>
                    </li>
                    <li class="dropdown-menu-footer border-top">
                        <a href="{{ route('dispatche.receive') }}"
                            class="dropdown-item d-flex justify-content-center p-3">
                            Xem tất cả
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item navbar-dropdown dropdown-user dropdown">
                <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                    <div class="avatar avatar-online">
                        <div class="avatar me-2">
                            <span
                                class="avatar-initial rounded-circle bg-label-secondary">{{ Auth::user()->format_name ?? '' }}</span>
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
                                            <span
                                                class="avatar-initial rounded-circle bg-label-secondary">{{ Auth::user()->format_name ?? '' }}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center">
                                    <span
                                        class="fw-semibold d-block span-name-profile">{{ Auth::user()->name ?? '' }}</span>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <div class="dropdown-divider"></div>
                    </li>
                    <li>
                        <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#modalTop">
                            <i class="bx bx-user me-2"></i>
                            <span class="align-middle">Trang cá nhân</span>
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="#">
                            {{-- <i class="bx bx-cog me-2"></i> --}}
                            <i class='bx bx-align-justify'></i>
                            <span class="align-middle">Thống kê cá nhân</span>
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
                                    {{ Auth::user()->code ?? '' }}
                                </li>
                                <li class="list-group-item">
                                    <strong>
                                        Họ và Tên:
                                    </strong>
                                    <span class="span-name-profile">
                                        {{ Auth::user()->name ?? '' }}
                                    </span>
                                </li>
                                <li class="list-group-item">
                                    <strong>
                                        Email:
                                    </strong>
                                    {{ Auth::user()->email ?? '' }}
                                </li>
                                <li class="list-group-item">
                                    <strong>
                                        SĐT:
                                    </strong>
                                    <span class="span-phone-profile">
                                        {{ Auth::user()->phone ?? '' }}
                                    </span>
                                </li>
                                <li class="list-group-item">
                                    <strong>
                                        Chức Vụ:
                                    </strong>
                                    {{ Auth::user()->name_role }}
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-md-6 mb-3">
                        <label for="input-new_name" class="form-label">Họ và tên</label>
                        <input type="text" id="input-new_name" value="{{ Auth::user()->name ?? '' }}"
                            class="form-control" placeholder="Nhập họ tên">
                        <div class="invalid-feedback error-new_name"></div>
                    </div>
                    @csrf
                    <div class="col-12 col-md-6 mb-3">
                        <label for="input-new_phone" class="form-label">Số điện thoại</label>
                        <input type="text" id="input-new_phone" value="{{ Auth::user()->phone ?? '' }}"
                            name="new_phone" class="form-control" placeholder="Nhập số điện thoại">
                        <div class="invalid-feedback error-new_phone"></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-md-6 mb-3">
                        <label for="input-old_password" class="form-label">Mật khẩu hiện tại</label>
                        <input type="password" id="input-old_password" value="" class="form-control"
                            placeholder="Nhập mật khẩu hiện tại...">
                        <div class="invalid-feedback error-old_password"></div>
                    </div>
                    <div class="col-12 col-md-6 mb-3">
                        <label for="input-new_password" class="form-label">Mật khẩu mới</label>
                        <input type="password" id="input-new_password" value="" class="form-control"
                            placeholder="Nhập mật khẩu mới...">
                        <div class="invalid-feedback error-new_password"></div>
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
@push('scripts')
    <script>
        
        
        //get notification
        //get công văn theo tuần
        
        
        
        $(document).ready(function() {
            var status = false; // default hidden 
            async function getAllNotification() {
                var current = Date.now();
                $.ajax({
                    type: "get",
                    url: "{{ route('api.dispatche.getDispatcheReceiveByWeek') }}",
                    dataType: "json",
                    success: function(response) {
                        $('#total_notification').append(response.data.length);
                        $.each(response.data, function(index, value) {
                            let urlView =
                                "{{ route('dispatche.receive.view', [':id', ':slug']) }}";
                            urlView = urlView.replace(':id', value.id);
                            urlView = urlView.replace(':slug', string_to_slug(value
                                .tittle));
                            $('#ul-noti').append(`
                                    <li class="list-group-item list-group-item-action dropdown-notifications-item">
                                            <div class="d-flex">
                                                <div class="flex-shrink-0 me-3  d-flex align-items-center">
                                                    <div class="avatar">
                                                        <span class="avatar-initial rounded-circle bg-label-primary">CVĐ</span>
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <p class="mb-0 ">
                                                        <a href="${urlView}" class="text-secondary">${value.tittle.length > 75 ? value.tittle.substring(0, 75) + '...' : value.tittle}</a>
                                                        </p>
                                                    <small class="text-muted">${timeDifference(current, new Date(value.created_at))}</small>
                                                </div>
                                            </div>
                                        </li>
                            `);
                        });
    
                    },
                    error: function(response) {
                        console.error(response);
                    }
                });
    
            }
            getAllNotification();

            $(document).on('click', '#btn-update-profile', () => {
                let new_name = $('#input-new_name').val();
                let new_phone = $('#input-new_phone').val();
                let old_password = $('#input-old_password').val();
                let new_password = $('#input-new_password').val();
                let _token = $('input[name=_token]').val();
                let data = {
                    'new_name': new_name,
                    'new_phone': new_phone,
                    '_token': _token
                }
                if (old_password !== '' || new_password !== '') {
                    data = {
                        'new_name': new_name,
                        'new_phone': new_phone,
                        'old_password': old_password,
                        'new_password': new_password,
                        '_token': _token
                    }
                }
                $.ajax({
                    type: "post",
                    url: "{{ route('api.profile.update') }}",
                    data: data,
                    dataType: "json",
                    success: function(response) {
                        $.each(response.data, function(index, value) {
                            $(`.span-${index}-profile`).text(value);
                        });
                        toastr["success"](response.message, "Thông báo");
                        $('#modalTop').modal('hide');
                    },
                    error: function(response) {
                        if (response.responseJSON.errors) {

                            $.each(response.responseJSON.errors, function(index,
                                value) {
                                $(`#input-${index}`).addClass(
                                    'is-invalid');
                                $(`.error-${index}`).text(value[0]);
                            });
                        } else {
                            toastr["error"](response.responseJSON.message, "Thông báo");
                        }
                    }
                });
            });
        });
    </script>
@endpush
