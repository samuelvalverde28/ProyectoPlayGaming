<!-- Modal -->
<div class="modal fade" id="modal_nuevoComentario" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Añadir Comentario</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          
            <form method="POST" action="{{ route('nuevoComentario') }}">
                @csrf

                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Añada aqui su comentario:</label>
                    <label for="">(Maximo 255 caracteres)</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="comentario" maxlength="255"></textarea>
                  </div>
                
                @foreach ($game as $games)
                    <input type="text" name="idgames" value="{{$games->id}}" hidden>
                @endforeach
                

                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4 ">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-per">Registrar</button>

                    </div>
                </div>

            </form>

        </div>
        <div class="modal-footer">
          
          
          
        </div>
      </div>
    </div>
  </div>