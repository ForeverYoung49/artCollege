<div class="wrapper" style="z-index: 2;">
    <nav id="sidebar">
        <div class="sidebar-header">
            <h3>Асбестовский колледж искусств</h3>
            <strong><i class="fas fa-landmark"></i></strong>
        </div>

        <ul class="list-unstyled components">
            <li>
                <a href="/">
                    <i class="fas fa-home"></i>
                    Главная
                </a>
            </li>
            <li>
                <div>
                <a data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                    <i class="fas fa-list"></i>
                    Категории
                </a>
                <div class="collapse" id="collapseExample">
                <ul class="list-unstyled">
                    <li><a href="/graduates">Выпускники</a></li>
                    <li><a href="/directors">Директора</a></li>
                    <li><a href="/events">Важные<br> события</a></li>
                    <li><a href="/teachers">Почетные<br>преподаватели</a></li>
                    <li><a href="/videos">Видеоархив</a></li>
                    <li><a href="/honoredWorkers">Заслуженные<br> работники<br> культуры</a></li>
                </ul>
                </div>
            </li>
            <li>
                <a href="#">
                    <i class="fas fa-address-book"></i>
                    Контакты
                </a>
            </li>
            
            @if(Auth::user())
            <hr>
                <li>
                    <div>
                    <a data-toggle="collapse" href="#AP" role="button" aria-expanded="false" aria-controls="collapseExample">
                        <i class="fas fa-list"></i>
                        Панель администратора
                    </a>
                    <div class="collapse" id="AP">
                    <ul class="list-unstyled">
                        <li><a href="/ap/graduates">Выпускники</a></li>
                        <li><a href="/ap/directors">Директора</a></li>
                        <li><a href="/ap/events">Важные<br> события</a></li>
                        <li><a href="/ap/teachers">Почетные<br>преподаватели</a></li>
                        <li><a href="/ap/videos">Видеоархив</a></li>
                        <li><a href="/ap/honored_workers">Заслуженные<br> работники<br> культуры</a></li>
                        <li><a href="/ap/specialties">Специальности</a></li>
                    </ul>
                    </div>
                </li>
            <li>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-dropdown-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">
                        {{ __('Выйти') }}
                    </x-dropdown-link>
                </form>    
            </li>
            @endif
        </ul>
    </nav>

    <div id="content">
        <nav class="navbar navbar-default" style="background: none;">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" id="sidebarCollapse" class="btn navbar-btn">
                        <i class="fas fa-exchange-alt"></i>
                        <span></span>
                    </button>
                </div>
            </div>
        </nav>
    </div>
</div>

<script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('#sidebarCollapse').on('click', function () {
            $('#sidebar').toggleClass('active');
        });
    });
</script>