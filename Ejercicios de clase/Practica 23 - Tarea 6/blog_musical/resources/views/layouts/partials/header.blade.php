<header>
    <nav>
        <ul>
            <li><a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'active' : '' }}">Home</a></li>
            <li><a href="{{ route('gestion-articulos') }}"
                    class="{{ request()->routeIs('articulos') ? 'active' : '' }}">Entradas</a></li>
            <li><a href="{{ route('categorias') }}"
                    class="{{ request()->routeIs('categorias') ? 'active' : '' }}">Categorías</a></li>
            <li><a href="{{ route('comentarios') }}"
                    class="{{ request()->routeIs('comentarios') ? 'active' : '' }}">Comentarios</a></li>
            <li><a href="{{ route('comentarios') }}"
                    class="{{ request()->routeIs('escribir') ? 'active' : '' }}">Escribir</a></li>
            <li><a href="#">Desbloquear(Editores)</a></li>
        </ul>
    </nav>
</header>
