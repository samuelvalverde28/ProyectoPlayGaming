@extends('layouts.app')

@section('content')
<div class="container">
  
    <div class="">
        <div class="col-md-12">


            @if( session('datos') )
              <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{session('datos')}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="">&times;</span>
                </button>
              </div>
            @endif

            @if( session('cancelar') )
              <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{session('cancelar')}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="">&times;</span>
                </button>
              </div>
            @endif

            <div class="barraconmargin">
            <a href="/configJuegos" class="btn btn-secondary"><i class="fas fa-arrow-left"></i></a>
            
            <a href="/nuevoImagen/{{$Image[0]->idgames}}" class="btn btn-primary"  >Nueva Imagen</a>
            
            

              
            </div>

            

            <div class="cardImagenes">
              @foreach ($Image as $imagen)
                  <div class="card" style="width: 360px; ">
                    <img src="{{$imagen->img}}" class="card-img-top" alt="{{$imagen->id}}" style="height:201px;">
                    <div class="card-body">
                      <p class="card-text">{{$imagen->idgames}} / {{$imagen->id}}</p>
                      <a href="borrarImagenes/{{$imagen->id}}"><i class="fas fa-trash-alt"></i></a>
                      
                    </div>
                  </div>
                @endforeach
            </div>

            



           
            

        </div>
    </div>
</div>
@endsection