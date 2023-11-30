<!-- sidebar.blade.php -->
<div class="ui visible inverted left vertical labeled menu" style="height: calc(100vh - 50px);">
    <a class="item" href="{{ route('empleados.index') }}">
        Empleados(Usuarios)
    </a>
    <a class="item" href="{{ route('categorias.index') }}">
        Categorias
    </a>
    <a class="item" href="{{ route('platillos.index') }}">
        Platillos
    </a>
    <a class="item" href="{{ route('ordenes.index') }}">
        Ordenes
    </a>
    <a class="item" href="{{ route('pagos.index') }}">
        Pagos
    </a>
    <a class="item" href="">
        Ayuda
    </a>
    <!-- Agrega más elementos aquí -->
</div>


