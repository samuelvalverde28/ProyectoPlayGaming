@extends('layouts.app')

@section('content')

<div class="container">
  
    <div class=" ">
        <div class="col-md-12">


        @foreach ($game as $games)
            <img src="{{$games->background_image}}" alt="{{$games->id}}" width="100%" class="centradoImagen">
            <div class="centrado tituloComentarios">
                {{$games->name}}
            </div>
            
        @endforeach

        

        <div class="centrado p-2">
            <a href="{{ route('nuevoComentario')}}" class="btn btn-info " style="margin-bottom: 5px;" data-toggle="modal" data-target="#modal_nuevoComentario">Nuevo Comentario</a>
        </div>

        @include('cliente.modal_nuevoComentario')

         <div id="comentarios">

            <div class="media fondonavbar tituloComentarios centrado">
                <span class="centrado">
            @php
            if($commentsCount == 0){
                echo('No hay comentarios');
            }    
            @endphp
                </span>
            </div>
            
        
        
        
                @foreach ($comments as $comment)
                    <div class="media fondonavbar p-1 m-1">
                        <img src="{{$comment->imgProfile}}" class="mr-3" alt="usuario" width="50px">
                        <div class="media-body">
                        <h5 class="mt-0">{{$comment->name}}</h5>
                        <div class="romper">{{$comment->comentario}}</div>
                        
                        <br>
                        {{$comment->created_at}}
        
        
                            @foreach ($game as $games)
        
                            @php
                            if(Auth::user()->id == $comment->idusers){
                                echo('
                                <a href="borrarComentario/'.
                                    $comment->id.'/'.   
                                    $games->id    
                                    .'">
                                    <i class="far fa-trash-alt"></i>
                                </a>
                                ');
                            }
                        @endphp
        
                                
                            @endforeach
        
                        
        
                        </div>
                    </div>
                @endforeach
        
                {{$comments->links()}}
        
            </div> 

        

         
         



        </div>
    </div>
</div>
@endsection