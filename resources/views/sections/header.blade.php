<nav class="bg-white">
    <div class="py-4 px-5">
        <div class="row">
            <div class="col">
                <h5 class="fq-bold mb-0 f-fredoka">Hola Amilcar, Buenas tardes 🐱</h5>
                <span>Ponte al dia con las noticias</span>
            </div>
            <div class="col-auto">

            </div>
            <div class="col-auto">

            </div>
            <div class="col-auto">
                @auth
                <span class="fw-bold">{{ Auth::user()->name }}</span>
                <img src="{{ Storage::url(Auth::user()->avatar) }}" class="user-img-small">
                <button class="btn btn-primary" onclick="document.getElementById('logout').submit();"> Cerrar sesión</button>


                <form action="{{ route('logout') }}" method="POST" id="logout">
                    @csrf
                </form>
                @else
                <a href="{{ route('login.facebook') }}" class="btn btn-primary"> Iniciar sesión</a>
                @endauth
            </div>
        </div>
    </div>
</nav>



