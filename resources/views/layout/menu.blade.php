@push('css')
    <style>

    </style>
@endpush

<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand p-2" style="background-color: #39527b">
        <a href="/" class="app-brand-link w-100 h-100 ">
            <img src="{{ asset('dist/img/logo/logokhoa.png') }}" class="w-100 h-auto" alt="logo">
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <ul class="menu-inner py-1" style="background-color: #39527b">
        <!-- Dashboard -->
        <li class="menu-item active-menu">
            <a href="{{ route('home') }}" class="menu-link  text-white ">
                <i class="menu-icon tf-icons bx bxs-home-circle"></i>
                <div data-i18n="Analytics">Trang chủ</div>
            </a>
        </li>
        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Công văn</span>
        </li>
        <!-- Layouts -->
        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle text-white">
                <i class="menu-icon tf-icons bx bxs-file-blank"></i>
                <div data-i18n="Quản lý công văn">Quản lý công văn</div>
            </a>

            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="{{ route('dispatche.receive') }}" class="menu-link text-white">
                        <div data-i18n="Công văn đến">Công văn đến</div>
                    </a>
                </li>
                <li class="menu-item ">
                    <a href="{{ route('dispatche.send') }}" class="menu-link text-white">
                        <div data-i18n="Công văn đi">Công văn đi</div>
                    </a>
                </li>
                @if ((int) Auth::user()->role <= 2)
                    <li class="menu-item ">
                        <a href="{{ route('dispatche_type') }}" class="menu-link text-white">
                            <div data-i18n="loaị công văn">Loại công văn</div>
                        </a>
                    </li>
                @endif

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
                    <a href="{{ route('theses') }}" class="menu-link text-white">
                        <div data-i18n="Luận văn sinh viên">Sinh viên</div>
                    </a>
                </li>
            </ul>
        </li>
        <li class="menu-header small text-uppercase"><span class="menu-header-text">Nghiên cứu khoa học</span></li>
        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle text-white">
                <i class="menu-icon tf-icons bx bxs-file-find"></i>
                <div data-i18n="Nghiên cứu khoa học">Nghiên cứu khoa học</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="{{ route('basicresearch') }}" class="menu-link text-white">
                        <div data-i18n="Basic">Cơ sở</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{ route('studentresearch') }}" class="menu-link text-white">
                        <div data-i18n="Basic">Sinh viên</div>
                    </a>
                </li>
            </ul>
        </li>
        <li class="menu-header small text-uppercase"><span class="menu-header-text">Ý tưởng sáng tạo khởi nghiệp</span>
        </li>
        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle text-white">
                <i class="menu-icon tf-icons bx bxs-award"></i>
                <div data-i18n="Ý tưởng sáng tạo">Ý tưởng sáng tạo</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="{{ route('creativeidea') }}" class="menu-link text-white">
                        <div data-i18n="Basic">Sinh viên</div>
                    </a>
                </li>
            </ul>
        </li>
        {{-- giang vien va pho khoa --}}
        @if ((int) Auth::user()->role <= 2)

            <li class="menu-header small text-uppercase"><span class="menu-header-text">Thành viên</span></li>
            <li class="menu-item">
                <a href="javascript:void(0);" class="menu-link menu-toggle text-white">
                    <i class="menu-icon tf-icons bx bxs-user"></i>
                    <div data-i18n="Nghiên cứu khoa học">Quản lý thành viên</div>
                </a>
                <ul class="menu-sub">
                    @if ((int) Auth::user()->role < 3)
                        <li class="menu-item">
                            <a href="{{ route('lecturer') }}" class="menu-link text-white">
                                <div data-i18n="Basic">Giảng viên</div>
                            </a>
                        </li>
                    @endif
                    <li class="menu-item">
                        <a href="{{ route('student') }}" class="menu-link text-white">
                            <div data-i18n="Basic">Sinh viên</div>
                        </a>
                    </li>
                </ul>
            </li>
        @endif

        <!-- Components -->
        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Hệ thống</span>
        </li>
        <!-- Cards -->
        @if ((int) Auth::user()->role < 3)
        <li class="menu-item">
            <a href="{{route('setting')}}" class="menu-link text-white">
                <i class="menu-icon tf-icons bx bx-cog"></i>
                <div data-i18n="Basic">Thiết lập</div>
            </a>
        </li>
        @endif
        <li class="menu-item">
            <a href="{{ route('support') }}" class="menu-link text-white">
                <i class="menu-icon tf-icons bx bx-support"></i>
                <div data-i18n="Basic">Hỗ trợ</div>
            </a>
        </li>
    </ul>
</aside>

@push('scripts')
    <script>
        
        let url = window.location;

        $('.menu-link').each(function(index, item) {
            let text = $(this).attr('href');
            let currentUrl = url.pathname.split('/')[1];
            if (!text.includes('javascript:void(0)')) {
                if (text != '#') {
                    let arr = text.split('/');
                    if (arr.length > 3) {
                        if (arr.at(-1) == currentUrl) {
                            $(".menu-item").removeClass('open');
                            $(".menu-item").removeClass('active-menu');
                            $(this).parents('.menu-item').addClass('open');
                            $(this).parent().removeClass('active-menu');
                            $(this).parent().addClass('active-menu');
                            return;
                        }
                    }
                }
            }
        });
    </script>
@endpush
