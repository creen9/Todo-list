<nav class="navbar navbar-inverse">
    <div class="container">
        <div class="navbar-header">
            <a class="navbar-brand" href="/opravila">Seznam opravil</a>
        </div>

        <div class="collapse navbar-collapse" id="navbar">
            <ul class="navbar-nav nav">
                <li class="{{Request::is('/') ? 'active' : ''}}"><a href="/">Domov</a></li>
                <li class="{{Request::is('opravila/create') ? 'active' : ''}}"><a href="/opravila/create">Dodaj opravilo</a></li>
            </ul>
        </div>
  </div>
</nav>