<div class="sidebar">
  <div class="header">
    <h2 id="username">{{ Auth::user()->nombres }}</h2>
    <h5 id="rol">Administrador</h5>
  </div>
  <ul>
      <p>Biblioteca</p>
      <li><a href="/admin/prestamos"><i class="fa fa-exchange"></i> Prestamos</a></li>
      <li><a href="/admin/copias"><i class="fa fa-book"></i> Copias</a></li>
      <li><a href="/admin/libros"><i class="fa-books"></i> Libros</a></li>
      <li><a href="/admin/autores"><i class="fa fa-pencil"></i> Autores</a></li>
      <li><a href="/admin/categorias"><i class="fa fa-tag"></i> Categorias</a></li>
      <li><a href="/admin/estados"><i class="fa fa-check"></i> Estados/Estatus</a></li>
      <br>
      <p>Seguridad</p>
      <li><a href="/admin/usuarios"><i class="fa fa-users"></i> Usuarios</a></li>
      <li><a href="/admin/respaldo"><i class="fa fa-refresh"></i> Respaldo</a></li>
      <li><a href="/admin/ayuda"><i class="fa fa-question-circle"></i> Ayuda</a></li>
  </ul>
</div>