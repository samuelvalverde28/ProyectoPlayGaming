
@extends('layouts.app')

@section('content')




<div class="container ">
  
    <div class="">
        <div class="col-md-12 " style="color: white">


            @foreach ($Usuario as $us)
                

                <form action="actualizarUsuario/{{$us->id}}" method="POST"  >
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
                              @switch($us->role)
                                  @case('')
                                    <option selected></option>
                                    <option>admin</option>
                                      @break
                                  @case('admin')
                                    <option></option>
                                    <option selected>admin</option>
                                      @break
                                  @default
                                      
                              @endswitch
                            
                          </select>
                        </div>
                        <button type="submit" class="btn btn-per derecha">Enviar</button>
                        <a href=" {{route('cancelarConfigUsuario')}} " class="btn btn-danger derecha espacioentrebotonesderecho">Cancelar</a>
                        
                </form>




            @endforeach

            

            



        </div>
    </div>
</div>

@endsection