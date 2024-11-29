<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>GrahaTekno - Admin Dashboard</title>
    <meta content="width=device-width, initial-scale=1.0, shrink-to-fit=no" name="viewport" />
    <link rel="icon" href="{{ asset('images/LogoGratek.png') }}" type="image/x-icon" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">


    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!-- Fonts and icons -->
    <script src="{{ asset('assets/js/plugin/webfont/webfont.min.js') }}"></script>
    <script>
        WebFont.load({
            google: {
                families: ["Public Sans:300,400,500,600,700"]
            },
            custom: {
                families: [
                    "Font Awesome 5 Solid",
                    "Font Awesome 5 Regular",
                    "Font Awesome 5 Brands",
                    "simple-line-icons",
                ],
                urls: ["assets/css/fonts.min.css"],
            },
            active: function() {
                sessionStorage.fonts = true;
            },
        });
    </script>

    <!-- CSS Files -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/plugins.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/kaiadmin.min.css') }}" />

    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link rel="stylesheet" href="{{ asset('assets/css/demo.css') }}" />

</head>

<body>
    <!-- Sweet Alert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        // Cek jika ada session flash 'success'
        @if (session('success'))
            Swal.fire({
                title: 'Success!',
                text: "{{ session('success') }}",
                icon: 'success',
                confirmButtonText: 'OK'
            });
        @endif

        // Cek jika ada session flash 'error'
        @if ($errors->any())
            <
            script >
                Swal.fire({
                    title: 'Error!',
                    html: `
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            `,
                    icon: 'error',
                    confirmButtonText: 'OK'
                });
        @endif

        function confirmDelete(id) {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!',
                showCancelButton: true,
            }).then((result) => {
                if (result.isConfirmed) {
                    // If user confirms, submit the form
                    document.getElementById('delete-form-' + id).submit();
                }
            });
        }

        function confirmLogout() {
            Swal.fire({
                title: 'Are you sure?',
                text: "You will be logged out!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, log out!'
            }).then((result) => {
                if (result.isConfirmed) {
                    // If user confirms, submit the logout form
                    document.getElementById('logout-form').submit();
                }
            });
        }
    </script>
    <div class="wrapper">
        <!-- Sidebar -->
        <div class="sidebar" data-background-color="dark">
            <div class="sidebar-logo">
                <!-- Logo Header -->
                <div class="logo-header" data-background-color="dark">
                    <a href="index.html" class="logo" style="color: white">
                        <img src="{{ asset('images/LogoGraTek.png') }}" alt="navbar brand" class="navbar-brand"
                            height="50" />
                        <div class="ms-2"> Graha Teknologi </div class="">
                    </a>
                    <div class="nav-toggle">
                        <button class="btn btn-toggle toggle-sidebar">
                            <i class="gg-menu-right"></i>
                        </button>
                        <button class="btn btn-toggle sidenav-toggler">
                            <i class="gg-menu-left"></i>
                        </button>
                    </div>
                    <button class="topbar-toggler more">
                        <i class="gg-more-vertical-alt"></i>
                    </button>
                </div>
                <!-- End Logo Header -->
            </div>
            <div class="sidebar-wrapper scrollbar scrollbar-inner">
                <div class="sidebar-content">
                    <ul class="nav nav-secondary">
                        <li class="nav-item {{ Request::is('admin-dashboard') ? 'active' : '' }}">
                            <a data-bs-toggle="collapse" href="#dashboard" class="collapsed" aria-expanded="false">
                                <i class="fas fa-home"></i>
                                <p>Dashboard</p>
                                <span class="caret"></span>
                            </a>
                            <div class="collapse" id="dashboard">
                                <ul class="nav nav-collapse">
                                    <li>
                                        <a href="{{ route('admin.dashboard') }}">
                                            <span class="sub-item">Dashboard 1</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        <li class="nav-section">
                            <span class="sidebar-mini-icon">
                                <i class="fa fa-ellipsis-h"></i>
                            </span>
                            <h4 class="text-section">Components</h4>
                        </li>
                        <li class="nav-item {{ Request::is('admin-dashboard/configuration') ? 'active' : '' }}">
                            <a href="{{ route('configuration.index') }}">
                                <i class="fas fa-cog"></i>
                                <p>Configuration</p>
                                <span class="badge badge-secondary"></span>
                            </a>
                        </li>
                        <li class="nav-item {{ Request::is('admin-dashboard/slider', 'admin-dashboard/slider/create', 'admin-dashboard/slider/*/edit') ? 'active' : '' }}">
                            <a href="{{ route('slider.index') }}">
                                <i class="fas fa-sliders-h"></i>
                                <p>Slider</p>
                                <span class="badge badge-secondary"></span>
                            </a>
                        </li>

                        <li class="nav-item {{ Request::is('admin-dashboard/bout-us') ? 'active' : '' }}">
                            <a href="{{ route('about-us.index') }}">
                                <i class="fas fa-info-circle"></i>
                                <p>About Us</p>
                                <span class="badge badge-secondary"></span>
                            </a>
                        </li>

                        <li class="nav-item {{ Request::is('admin-dashboard/superiority', 'admin-dashboard/superiority/create', 'admin-dashboard/superiority/*/edit') ? 'active' : '' }}">
                            <a href="{{ route('superiority.index') }}">
                                <i class="fas fa-medal"></i>
                                <p>Superiority</p>
                                <span class="badge badge-secondary"></span>
                            </a>
                        </li>

                        <li class="nav-item {{ Request::is('admin-dashboard/why-us') ? 'active' : '' }}">
                            <a href="{{ route('why-us.index') }}">
                                <i class="fas fa-thumbs-up"></i>
                                <p>Why Us</p>
                                <span class="badge badge-secondary"></span>
                            </a>
                        </li>

                        <li class="nav-item {{ Request::is('admin-dashboard/services', 'admin-dashboard/services/create', 'admin-dashboard/services/*/edit', 'admin-dashboard/categories-services/create',  'admin-dashboard/categories-services/*/edit') ? 'active' : '' }}">
                            <a href="{{ route('services.index') }}">
                                <i class="fas fa-hand-holding"></i>
                                <p>Services</p>
                                <span class="badge badge-secondary"></span>
                            </a>
                        </li>

                        <li class="nav-item {{ Request::is('admin-dashboard/pricings', 'admin-dashboard/pricings/create', 'admin-dashboard/pricings/*/edit', 'admin-dashboard/categories-pricings/create',  'admin-dashboard/categories-pricings/*/edit') ? 'active' : '' }}">
                            <a href="{{ route('pricings.index') }}">
                                <i class="fas fa-wallet"></i>
                                <p>Pricing</p>
                                <span class="badge badge-secondary"></span>
                            </a>
                        </li>

                        <li class="nav-item {{ Request::is('admin-dashboard/gallery', 'admin-dashboard/gallery/create', 'admin-dashboard/gallery/*/edit') ? 'active' : '' }}">
                            <a href="{{ route('gallery.index') }}">
                                <i class="fas fa-images"></i>
                                <p>Gallery</p>
                                <span class="badge badge-secondary"></span>
                            </a>
                        </li>

                        <li class="nav-item {{ Request::is('admin-dashboard/partner', 'admin-dashboard/partner/create', 'admin-dashboard/partner/*/edit') ? 'active' : '' }}">
                            <a href="{{ route('partner.index') }}">
                                <i class="fas fa-handshake"></i>
                                <p>Partner</p>
                                <span class="badge badge-secondary"></span>
                            </a>
                        </li>

                        <li class="nav-item {{ Request::is('admin-dashboard/blogs', 'admin-dashboard/blogs/create', 'admin-dashboard/blogs/*/edit', 'admin-dashboard/categories-blogs/create',  'admin-dashboard/categories-blogs/*/edit') ? 'active' : '' }}">
                            <a href="{{ route('blogs.index') }}">
                                <i class="fas fa-pen"></i>
                                <p>Blog</p>
                                <span class="badge badge-secondary"></span>
                            </a>
                        </li>

                        <li class="nav-item {{ Request::is('admin-dashboard/contact', 'admin-dashboard/contact.create', 'admin-dashboard/contact.*.edit') ? 'active' : '' }}">
                            <a href="{{ route('contacts.index') }}">
                                <i class="fas fa-phone"></i>
                                <p>Contact</p>
                                <span class="badge badge-secondary"></span>
                            </a>
                        </li>

                        <li class="nav-item {{ Request::is('admin-dashboard/testimonial-clients', 'admin-dashboard/testimonial.create', 'admin-dashboard/testimonial.*.edit') ? 'active' : '' }}">
                            <a href="{{ route('testimonial-clients.index') }}">
                                <i class="fas fa-comments"></i>
                                <p>Testimonial Client</p>
                                <span class="badge badge-secondary"></span>
                            </a>
                        </li>

                        <li class="nav-item {{ Request::is('admin-dashboard/our-team', 'admin-dashboard/our-team.create', 'admin-dashboard/our-team.*.edit') ? 'active' : '' }}">
                            <a href="{{ route('our-team.index') }}">
                                <i class="fas fa-user-friends"></i>
                                <p>Our Team</p>
                                <span class="badge badge-secondary"></span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a data-bs-toggle="collapse" href="#submenu">
                                <i class="fas fa-bars"></i>
                                <p>Template DropDown</p>
                                <span class="caret"></span>
                            </a>
                            <div class="collapse" id="submenu">
                                <ul class="nav nav-collapse">
                                    <li>
                                        <a data-bs-toggle="collapse" href="#subnav1">
                                            <span class="sub-item">DropDown</span>
                                            <span class="caret"></span>
                                        </a>
                                        <div class="collapse" id="subnav1">
                                            <ul class="nav nav-collapse subnav">
                                                <li>
                                                    <a href="#">
                                                        <span class="sub-item">DropDown</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <span class="sub-item">DropDown</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                    <li>
                                        <a data-bs-toggle="collapse" href="#subnav2">
                                            <span class="sub-item">DropDown 2</span>
                                            <span class="caret"></span>
                                        </a>
                                        <div class="collapse" id="subnav2">
                                            <ul class="nav nav-collapse subnav">
                                                <li>
                                                    <a href="#">
                                                        <span class="sub-item">DropDown</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <span class="sub-item">DropDown 3</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- End Sidebar -->

        <div class="main-panel">
            <div class="main-header">
                <div class="main-header-logo">
                    <!-- Logo Header -->
                    <div class="logo-header" data-background-color="dark">
                        <a href="{{ url('index.html') }}" class="logo">
                            <img src="{{ asset('assets/img/kaiadmin/logo_light.svg') }}" alt="navbar brand" class="navbar-brand" height="20" />
                        </a>
                        <div class="nav-toggle">
                            <button class="btn btn-toggle toggle-sidebar">
                                <i class="gg-menu-right"></i>
                            </button>
                            <button class="btn btn-toggle sidenav-toggler">
                                <i class="gg-menu-left"></i>
                            </button>
                        </div>
                        <button class="topbar-toggler more">
                            <i class="gg-more-vertical-alt"></i>
                        </button>
                    </div>
                    <!-- End Logo Header -->
                </div>
                <!-- Navbar Header -->
                <nav class="navbar navbar-header navbar-header-transparent navbar-expand-lg border-bottom">
                    <div class="container-fluid">
                        <nav class="navbar navbar-header-left navbar-expand-lg navbar-form nav-search p-0 d-none d-lg-flex">
                            <form action="" method="GET" id="pageDropdownForm">
                                <div class="input-group">
                                    <select class="form-control" id="pageDropdown" onchange="navigateToPage()">
                                        <option value="">Select a page...</option>
                                        <option value="{{ route('configuration.index') }}">Configuration</option>
                                        <option value="{{ route('slider.index') }}">Slider</option>
                                        <option value="{{ route('about-us.index') }}">About Us</option>
                                        <option value="{{ route('superiority.index') }}">Superiority</option>
                                        <option value="{{ route('why-us.index') }}">Why Us</option>
                                        <option value="{{ route('services.index') }}">Services</option>
                                        <option value="{{ route('gallery.index') }}">Gallery</option>
                                        <option value="{{ route('partner.index') }}">Partner</option>
                                        <option value="{{ route('blogs.index') }}">Blog</option>
                                        <!-- Add more options as needed -->
                                    </select>
                                </div>
                            </form>

                            <script>
                                function navigateToPage() {
                                    const dropdown = document.getElementById('pageDropdown');
                                    const selectedValue = dropdown.value;
                                    if (selectedValue) {
                                        window.location.href = selectedValue;
                                    }
                                }
                            </script>
                        </nav>

                        <ul class="navbar-nav topbar-nav ms-md-auto align-items-center">
                            <li class="nav-item topbar-icon dropdown hidden-caret d-flex d-lg-none">
                                <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false" aria-haspopup="true">
                                    <i class="fa fa-search"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-search animated fadeIn">
                                    <form class="navbar-left navbar-form nav-search">
                                        <div class="input-group">
                                            <input type="text" placeholder="Search ..." class="form-control" />
                                        </div>
                                    </form>
                                </ul>
                            </li>

                            <li class="nav-item topbar-user dropdown hidden-caret">
                                <a class="dropdown-toggle profile-pic" data-bs-toggle="dropdown" href="#" aria-expanded="false">
                                    <div class="avatar-sm">
                                        <i class="fas fa-user-shield avatar-img rounded" style="font-size: 30px;"></i>
                                    </div>
                                    <span class="profile-username">
                                        <span class="op-7">Hi,</span>
                                        <span class="fw-bold">{{  auth()->user()->name }}</span>
                                    </span>
                                </a>
                                <ul class="dropdown-menu dropdown-user animated fadeIn">
                                    <div class="dropdown-user-scroll scrollbar-outer">
                                        <li>
                                            <div class="user-box">
                                                <div class="avatar-lg">
                                                    <i class="fas fa-user-shield avatar-img rounded" style="font-size: 30px;"></i>
                                                </div>
                                                <div class="u-text">
                                                    <h4>{{  auth()->user()->name }}</h4>
                                                    <p class="text-muted">{{ auth()->user()->email }}</p>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                @csrf
                                            </form>

                                            <!-- Logout Link -->
                                            <a class="dropdown-item" href="#" onclick="confirmLogout()">Logout</a>
                                        </li>
                                    </div>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </nav>
                <!-- End Navbar -->
            </div>

            @yield('content')

            <footer class="footer">
                <div class="container-fluid d-flex justify-content-between">
                    <nav class="pull-left">
                        <ul class="nav">
                            <li class="nav-item">
                                {{-- <a class="nav-link" href="http://www.themekita.com"> ThemeKita </a> --}}
                            </li>
                            <li class="nav-item">
                                {{-- <a class="nav-link" href="#"> Help </a> --}}
                            </li>
                            <li class="nav-item">
                                {{-- <a class="nav-link" href="#"> Licenses </a> --}}
                            </li>
                        </ul>
                    </nav>
                    <div class="copyright">
                        2024, made with <i class="fas fa-globe text-info"></i> by
                        <a href="https://grahateknologi.com" target="blank">Graha Teknologi</a>
                    </div>
                    <div>
                        Distributed by
                        <a target="_blank" href="https://grahateknologi.com">GraTek</a>.
                    </div>
                </div>
            </footer>
        </div>

        <!-- Custom template | don't include it in your project! -->
        <div class="custom-template">
            <div class="title">Settings</div>
            <div class="custom-content">
                <div class="switcher">
                    <div class="switch-block">
                        <h4>Logo Header</h4>
                        <div class="btnSwitch">
                            <button type="button" class="selected changeLogoHeaderColor" data-color="dark"></button>
                            <button type="button" class="changeLogoHeaderColor" data-color="blue"></button>
                            <button type="button" class="changeLogoHeaderColor" data-color="purple"></button>
                            <button type="button" class="changeLogoHeaderColor" data-color="light-blue"></button>
                            <button type="button" class="changeLogoHeaderColor" data-color="green"></button>
                            <button type="button" class="changeLogoHeaderColor" data-color="orange"></button>
                            <button type="button" class="changeLogoHeaderColor" data-color="red"></button>
                            <button type="button" class="changeLogoHeaderColor" data-color="white"></button>
                            <br />
                            <button type="button" class="changeLogoHeaderColor" data-color="dark2"></button>
                            <button type="button" class="changeLogoHeaderColor" data-color="blue2"></button>
                            <button type="button" class="changeLogoHeaderColor" data-color="purple2"></button>
                            <button type="button" class="changeLogoHeaderColor" data-color="light-blue2"></button>
                            <button type="button" class="changeLogoHeaderColor" data-color="green2"></button>
                            <button type="button" class="changeLogoHeaderColor" data-color="orange2"></button>
                            <button type="button" class="changeLogoHeaderColor" data-color="red2"></button>
                        </div>
                    </div>
                    <div class="switch-block">
                        <h4>Navbar Header</h4>
                        <div class="btnSwitch">
                            <button type="button" class="changeTopBarColor" data-color="dark"></button>
                            <button type="button" class="changeTopBarColor" data-color="blue"></button>
                            <button type="button" class="changeTopBarColor" data-color="purple"></button>
                            <button type="button" class="changeTopBarColor" data-color="light-blue"></button>
                            <button type="button" class="changeTopBarColor" data-color="green"></button>
                            <button type="button" class="changeTopBarColor" data-color="orange"></button>
                            <button type="button" class="changeTopBarColor" data-color="red"></button>
                            <button type="button" class="selected changeTopBarColor" data-color="white"></button>
                            <br />
                            <button type="button" class="changeTopBarColor" data-color="dark2"></button>
                            <button type="button" class="changeTopBarColor" data-color="blue2"></button>
                            <button type="button" class="changeTopBarColor" data-color="purple2"></button>
                            <button type="button" class="changeTopBarColor" data-color="light-blue2"></button>
                            <button type="button" class="changeTopBarColor" data-color="green2"></button>
                            <button type="button" class="changeTopBarColor" data-color="orange2"></button>
                            <button type="button" class="changeTopBarColor" data-color="red2"></button>
                        </div>
                    </div>
                    <div class="switch-block">
                        <h4>Sidebar</h4>
                        <div class="btnSwitch">
                            <button type="button" class="changeSideBarColor" data-color="white"></button>
                            <button type="button" class="selected changeSideBarColor" data-color="dark"></button>
                            <button type="button" class="changeSideBarColor" data-color="dark2"></button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="custom-toggle">
                <i class="icon-settings"></i>
            </div>
        </div>
        <!-- End Custom template -->
    </div>
    <!--   Core JS Files   -->
    <script src="{{ asset('assets/js/core/jquery-3.7.1.min.js') }}"></script>
    <script src="{{ asset('assets/js/core/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/core/bootstrap.min.js') }}"></script>

    <!-- jQuery Scrollbar -->
    <script src="{{ asset('assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js') }}"></script>

    <!-- Chart JS -->
    {{-- <script src="{{ asset('assets/js/plugin/chart.js/chart.min.js') }}"></script> --}}

    <!-- jQuery Sparkline -->
    <script src="{{ asset('assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js') }}"></script>

    <!-- Chart Circle -->
    <script src="{{ asset('assets/js/plugin/chart-circle/circles.min.js') }}"></script>

    <!-- Datatables -->
    <script src="{{ asset('assets/js/plugin/datatables/datatables.min.js') }}"></script>

    <!-- Bootstrap Notify -->
    <script src="{{ asset('assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js') }}"></script>

    <!-- jQuery Vector Maps -->
    <script src="{{ asset('assets/js/plugin/jsvectormap/jsvectormap.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugin/jsvectormap/world.js') }}"></script>

    <!-- Kaiadmin JS -->
    <script src="{{ asset('assets/js/kaiadmin.min.js') }}"></script>

    <!-- Kaiadmin DEMO methods, don't include it in your project! -->
    <script src="{{ asset('assets/js/setting-demo.js') }}"></script>
    <script src="{{ asset('assets/js/demo.js') }}"></script>

    <!-- Include CKEditor script -->
    <script src="https://cdn.ckeditor.com/ckeditor5/38.1.0/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#description'))
            .then(editor => {
                // When the form is submitted, manually retrieve the data from the editor
                document.querySelector('form').addEventListener('submit', function(event) {
                    // Assign the editor content to the original textarea before submitting
                    const descriptionTextarea = document.querySelector('#description');
                    descriptionTextarea.value = editor.getData();
                });
            })
            .catch(error => {
                console.error(error);
            });
    </script>

    <script>
        $("#lineChart").sparkline([102, 109, 120, 99, 110, 105, 115], {
            type: "line",
            height: "70",
            width: "100%",
            lineWidth: "2",
            lineColor: "#177dff",
            fillColor: "rgba(23, 125, 255, 0.14)",
        });

        $("#lineChart2").sparkline([99, 125, 122, 105, 110, 124, 115], {
            type: "line",
            height: "70",
            width: "100%",
            lineWidth: "2",
            lineColor: "#f3545d",
            fillColor: "rgba(243, 84, 93, .14)",
        });

        $("#lineChart3").sparkline([105, 103, 123, 100, 95, 105, 115], {
            type: "line",
            height: "70",
            width: "100%",
            lineWidth: "2",
            lineColor: "#ffa534",
            fillColor: "rgba(255, 165, 52, .14)",
        });
    </script>
    <script>
        function previewImage(inputId, previewId) {
            const input = document.getElementById(inputId);
            const preview = document.getElementById(previewId);
            const file = input.files[0];

            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.style.display = 'block'; // Menampilkan gambar pratinjau
                }
                reader.readAsDataURL(file);
            }
        }
    </script>
</body>

</html>
