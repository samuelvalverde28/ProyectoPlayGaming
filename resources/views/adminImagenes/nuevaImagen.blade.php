


@extends('layouts.app')

@section('content')




<div class="container ">
  
    <div class="">
        <div class="col-md-12 " style="color: white">


            
        <form class="form-inline" action="agregarImagen/{{$ID}}" method="POST">
            @csrf
            <div class="form-group col-md-8">
              
              <input type="URL" class="form-control col-md-12" id="inputPassword2" placeholder="URL" name="img">
            </div>


            <button type="submit" class="btn btn-primary col-md-2">Añadir Imagen</button>
            <a href="/configImagenes/{{$ID}}" class="btn btn-danger col-md-2">Cancelar</a>
          </form>   

            



        </div>
    </div>
</div>

@endsection