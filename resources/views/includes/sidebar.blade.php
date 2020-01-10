<div class="sidebar">
  <div class="header">
    <h2 id="username">{{ Auth::user()->nombres }}</h2>
    <h5 id="rol">Administrador</h5>
  </div>
  <ul>
      <p>Biblioteca</p>
      <li><a href="/prestamos/realizados"><i class="fa fa-exchange"></i> Prestamos</a></li>
      <li><a href="/copias"><i class="fa fa-book"></i> Copias</a></li>
      <li><a href="/libros"><i class="fa-books"></i> Libros</a></li>
      <li><a href="/autores"><i class="fa fa-pencil"></i> Autores</a></li>
      <li><a href="/categorias"><i class="fa fa-tag"></i> Categorias</a></li>
      <li><a href="/estados"><i class="fa fa-check"></i> Estados/Estatus</a></li>
      <br>
      <p>Seguridad</p>
      <li><a href="/usuarios"><i class="fa fa-users"></i> Usuarios</a></li>
      <li><a href="/respaldo"><i class="fa fa-refresh"></i> Respaldo</a></li>
      <li><a href="/ayuda"><i class="fa fa-question-circle"></i> Ayuda</a></li>
  </ul>
</div>