<!-- Modal -->
<div class="modal fade" id="modal_nuevoJuego" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Añadir nuevo juego</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

            <form method="post" action="{{ route('nuevoJuego') }}">
                @csrf
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="inputname4">Nombre</label>
                    <input type="text" class="form-control" id="inputname4" name="name">
                  </div>
                  <div class="form-group col-md-6">
                    <label for="inputreleased4">Fecha de Lanzamiento</label>
                    <input type="date" class="form-control" id="inputreleased4" name="released">
                  </div>
                </div>
                <div class="form-group">
                  <label for="imagenfondo4">Imagen de portada</label>
                  <input type="url" class="form-control" id="imagenfondo4" placeholder="URL imagen" name="background_image">
                </div>
                <div class="form-group">
                  <label for="clip4">Clip</label>
                  <input type="url" class="form-control" id="clip4" placeholder="URL clip" name="clip">
                </div>
                <div class="form-row">
                  <div class="form-group col-md-3">
                    <label for="inputrating4">Nota</label>
                    <input type="number" class="form-control" id="inputrating4" name="rating">
                  </div>
                  
                  <div class="form-group col-md-3">
                    <label for="inputratingtop4">Nota Maxima</label>
                    <input type="number" class="form-control" id="inputratingtop4" name="rating_top">
                  </div>

                  <div class="form-group col-md-3">
                    <label for="inputid4">ID</label>
                    <input type="number" class="form-control" id="inputid4" name="id">
                  </div>
                </div>

                <div>
                  <p>Plataformas</p> 
                  @foreach ($Platform as $plat)
                  <div class="form-check form-check-inline">
                      <input class="form-check-input" type="checkbox" id="inlineCheckbox{{$plat->id}}" name="{{$plat->id}}" value="{{$plat->id}}" >
                      <label class="form-check-label" for="inlineCheckbox{{$plat->id}}" >{{$plat->name}}</label>
                    </div>
                  @endforeach
                  
                    
              </div>
                
                <button type="submit" class="btn btn-primary derecha">Añadir</button>
                <a href=" {{ route('cancelarConfigJuego') }} " class="btn btn-danger derecha espacioentrebotonesderecho">Cancelar</a>
              </form>

        </div>
        <div class="modal-footer">
          
          
          
        </div>
      </div>
    </div>
  </div>