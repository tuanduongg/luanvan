<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand p-2" style="background-color: #39527b">
        <a href="/" class="app-brand-link w-100 h-100 ">
            <img src="http://media.uneti.edu.vn/Media/2_SVUNETI/Images/sv-logo-dashboard.png" class="w-100 h-100 " alt="logo">
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <ul class="menu-inner py-1" style="background-color: #39527b">
        <!-- Dashboard -->
        <li class="menu-item">
            <a href="/" class="menu-link text-white">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Trang chủ</div>
            </a>
        </li>
        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Công văn</span>
        </li>
        <!-- Layouts -->
        <li class="menu-item  open">
            <a href="javascript:void(0);" class="menu-link menu-toggle text-white">
                <i class="menu-icon tf-icons bx bx-file-blank"></i>
                <div data-i18n="Quản lý công văn">Quản lý công văn</div>
            </a>

            <ul class="menu-sub ">
                <li class="menu-item ">
                    <a href="/cong-van" class="menu-link text-white">
                        <div data-i18n="Công văn đến">Công văn đến</div>
                    </a>
                </li>
                <li class="menu-item ">
                    <a href="#" class="menu-link text-white">
                        <div data-i18n="Công văn đi">Công văn đi</div>
                    </a>
                </li>
                <li class="menu-item ">
                    <a href="/loai-cong-van" class="menu-link text-white">
                        <div data-i18n="Công văn đi">Loại công văn</div>
                    </a>
                </li>

            </ul>
        </li>
        <li class="menu-header small text-uppercase"><span class="menu-header-text">Luận văn</span></li>
        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle text-white">
                {{-- <i class='bx bxs-graduation'></i> --}}
                <i class="menu-icon tf-icons bx bxs-graduation"></i>
                <div data-i18n="Quản lý luận văn">Quản lý luận văn</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="/luan-van" class="menu-link text-white">
                        <div data-i18n="Luận văn sinh viên">Sinh viên</div>
                    </a>
                </li>
            </ul>
        </li>
        <li class="menu-header small text-uppercase"><span class="menu-header-text">Nghiên cứu khoa học</span></li>
        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle text-white">
                <i class="menu-icon tf-icons bx bx-file-find"></i>
                <div data-i18n="Nghiên cứu khoa học">Nghiên cứu khoa học</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="" class="menu-link text-white">
                        <div data-i18n="Basic">Giảng viên</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="" class="menu-link text-white">
                        <div data-i18n="Basic">Sinh viên</div>
                    </a>
                </li>
            </ul>
        </li>
        <li class="menu-header small text-uppercase"><span class="menu-header-text">Ý tưởng sáng tạo khởi nghiệp</span>
        </li>
        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle text-white">
                <i class="menu-icon tf-icons bx bx-award"></i>
                <div data-i18n="Ý tưởng sáng tạo">Ý tưởng sáng tạo</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="{{ route('creative_idea')}}" class="menu-link text-white">
                        <div data-i18n="Basic">Sinh viên</div>
                    </a>
                </li>
            </ul>
        </li>
        <li class="menu-header small text-uppercase"><span class="menu-header-text">Người dùng</span></li>
        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle text-white">
                <i class="menu-icon tf-icons bx bx-user"></i>
                <div data-i18n="Nghiên cứu khoa học">Quản lý người dùng</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="{{ route('lecturer') }}" class="menu-link text-white">
                        <div data-i18n="Basic">Giảng viên</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{ route('student') }}" class="menu-link text-white">
                        <div data-i18n="Basic">Sinh viên</div>
                    </a>
                </li>
            </ul>
        </li>
        <!-- Components -->
        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Thiết Lập</span>
        </li>
        <!-- Cards -->
        <li class="menu-item">
            <a href="cards-basic.html" class="menu-link text-white">
                <i class="menu-icon tf-icons bx bx-cog"></i>
                <div data-i18n="Basic">Thiết lập</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="cards-basic.html" class="menu-link text-white">
                <i class="menu-icon tf-icons bx bx-support"></i>
                <div data-i18n="Basic">Hỗ trợ</div>
            </a>
        </li>
    </ul>
</aside>
