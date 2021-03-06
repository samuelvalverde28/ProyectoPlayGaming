<!-- Modal -->
<div class="modal fade" id="modal_modificar{{$us->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modificar Usuario</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          
            <form action="actualizarUsuario/{{$us->id}}" method="post">
            
                @csrf
                    <div class="form-group">
                      <label for="exampleFormControlInput1">Name</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="{{$us->name}}" name="name">
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlInput1">Email address</label>
                        <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="{{$us->email}}" name="email">
                      </div>

                    <div class="form-group">
                      <label for="exampleFormControlSelect1">Example select</label>
                      <select class="form-control" id="exampleFormControlSelect1" name="rol">
                        <option></option>
                        <option>admin</option>
                      </select>
                    </div>
            
            </form>

        </div>
        <div class="modal-footer">
          
          <a href="borrarUsuarios/{{$us->id}}" class="btn btn-primary">Eliminar</a>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
  </div>