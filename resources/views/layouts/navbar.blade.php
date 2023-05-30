<div class="container-fluid">
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-lg">
            <a class="navbar-brand" href="#">Телефонная книга</a>
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                {{--
                @if($_SERVER['REQUEST_URI'] != "/contact/create")
                    <li><a class="nav-link active" href="<?='/contact/create'?>">Добавить контакт</a></li>
                @endif

                @if($_SERVER['REQUEST_URI'] != "/contact/read")
                    <li><a class="nav-link active" href="<?='/contact/read'?>">Все контакты</a></li>
                @endif
                @if($_SESSION['is_admin'] != 0 && $_SERVER['REQUEST_URI'] != '/user/read')
                    <li><a class="nav-link active" href="<?='/user/read'?>">Список пользователей</a></li>
                @endif
                --}}
                <li><a class="nav-link active" href="<?='/contact/create'?>">Добавить контакт</a></li>
                <li><a class="nav-link active" href="<?='/contact/read'?>">Все контакты</a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                       aria-expanded="false">
                        Справочники
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="<?='/type/read'?>">Типы номеров</a></li>
                    </ul>
                </li>
                <li><a class="nav-link active" href="<?='/dashboard'?>">Личный кабинет</a></li>
                {{--
                <li><a class="btn btn-outline-danger btn-sm" href="<?='/logout'?>">Выйти</a></li>
                --}}
            </ul>
        </div>
    </nav>
</div>
