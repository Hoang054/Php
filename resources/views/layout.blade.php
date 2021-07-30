<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ManHourReport</title>
    <!-- BootstrapのCSS読み込み -->
    <link href="../resources/css/bootstrap.css" rel="stylesheet" />
    
    <style>
        body {
            font-size: .875rem;
        }

        th {
            white-space: nowrap;
        }

        td {
            white-space: nowrap;
        }

        .feather {
            width: 16px;
            height: 16px;
            vertical-align: text-bottom;
        }

        .sidebar {
            position: fixed;
            top: 0;
            bottom: 0;
            left: 0;
            z-index: 100; /* Behind the navbar */
            padding: 48px 0 0; /* Height of navbar */
            box-shadow: inset -1px 0 0 rgba(0, 0, 0, .1);
        }

        .sidebar-sticky {
            position: relative;
            top: 0;
            height: calc(100vh - 48px);
            padding-top: .5rem;
            overflow-x: hidden;
            overflow-y: auto; /* Scrollable contents if viewport is shorter than content. */
        }

        .sidebar .nav-link {
            font-weight: 500;
            color: #333;
        }

            .sidebar .nav-link .feather {
                margin-right: 4px;
                color: #999;
            }

            .sidebar .nav-link.active {
                color: #007bff;
            }

                .sidebar .nav-link:hover .feather,
                .sidebar .nav-link.active .feather {
                    color: inherit;
                }

        .sidebar-heading {
            font-size: .80rem;
            text-transform: uppercase;
        }

        .sidebar-sub {
            font-size: .80rem;
            padding-bottom: .25rem;
        }

        [role="main"] {
            padding-top: 10px; /* Space for fixed navbar */
        }

        .navbar-brand {
            padding-top: .75rem;
            padding-bottom: .75rem;
            font-size: 1rem;
            background-color: rgba(0, 0, 0, .25);
            box-shadow: inset -1px 0 0 rgba(0, 0, 0, .25);
        }

        .navbar .form-control {
            padding: .75rem 1rem;
            border-width: 0;
            border-radius: 0;
        }

        .form-control-dark {
            color: #fff;
            background-color: rgba(255, 255, 255, .1);
            border-color: rgba(255, 255, 255, .1);
        }

            .form-control-dark:focus {
                border-color: transparent;
                box-shadow: 0 0 0 3px rgba(255, 255, 255, .25);
            }

        .form-control-menu {
            padding-top: .75rem;
            padding-bottom: .75rem;
            padding-left: .75rem;
            font-size: 1rem;
            color: #fff;
        }


        .form-control-user {
            padding-left: .75rem;
            padding-right: .75rem;
            font-size: 1rem;
            color: #fff;
        }

        .modal {
            font-size: .8rem;
        }
    </style>
    <!-- FontAwesomeの読み込み -->
    <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
</head>
<body>
    <!-- Header-->
    <header>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <nav class="navbar navbar-expand-sm navbar-dark bg-primary sticky-top flex-md-nowrap p-0 shadow">
            <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#"><i class="fa fa-home"></i> 工数管理システム</a>
            <div class="collapse navbar-collapse" id="navmenu1">
                <div class="navbar-nav">
                    <span class="form-control-menu">ManHourReport</span>
                </div>
            </div>
            <ul class="navbar-nav px-3 d-flex align-items-center">
                <li class="nav-item text-nowrap">
                    <button type="button" class="btn btn-light"><i class="fas fa-backward"></i> 戻る</button>
                </li>
                <span class="form-control-user">テスト太郎さん</span>
                <li class="nav-item text-nowrap">
                    <button type="button" class="btn btn-light">ログアウト <i class="fas fa-sign-out-alt"></i></button>
                </li>
            </ul>
        </nav>
    </header>
    <!-- Render body-->
    <div class="container-fluid">

        <main role="main" class="pb-3">
            @yield('content')
        </main>

    </div>

    <!-- Script -->
    <script src="../resources/js/bootstrap.js"></script>
    <script src="../resources/js/jquery.js"></script>
    <script src="../resources/js/bootstrap.min.js"></script>
    @yield('script')
</body>
</html>
 