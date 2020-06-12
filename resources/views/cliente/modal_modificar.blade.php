<!-- Modal -->
<div class="modal fade" id="modal_modificar{{$Gamer->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modificar estado del juego</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          
        <form method="post" action="{{ route('actualizarEstado', $Gamer->id) }}">
            
            @csrf
           
            
            <div class="form-group">
            <label for="exampleFormControlSelect1">{{$Gamer->name}}</label>
                <select class="form-control" id="exampleFormControlSelect1" name="estad">
                    @switch($Usergame->estado)
                        @case('jugando')
                            <option selected >jugando</option>
                            <option >completado</option>
                            <option >espera</option>
                            <option >dejado</option>
                            @break
                        @case('completado')
                            <option >jugando</option>
                            <option selected >completado</option>
                            <option >espera</option>
                            <option >dejado</option>
                            @break
                        @case('espera')
                            <option >jugando</option>
                            <option >completado</option>
                            <option selected >espera</option>
                            <option >dejado</option>
                            @break
                        @case('dejado')
                            <option >jugando</option>
                            <option >completado</option>
                            <option >espera</option>
                            <option selected >dejado</option>
                            @break
                    
                        
                    @endswitch
                    
                </select>
            </div>
            <a href="{{route('cancelarModalCatalogo')}}" class="btn btn-secondary derecha">cancelar</a>
            <button type="submit" class="btn btn-primary espacioentrebotonesderecho derecha">Enviar</button>
          </form>

        </div>
        <div class="modal-footer">     
            
            
        </div>
      </div>
    </div>
  </div>