<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Game;
use App\Image;
use App\GamesPlatform;
use App\Platform;
use App\Users_game;
use App\User;
use App\Comments;
use App\Follower;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * shows the main page after login, where you see the user's profile
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $Usersgame = Users_game::all()->where('idusers', Auth::user()->id);
        return view('home', compact(['Usersgame']));
    }

    /**
     * shows game page, you see all games
     *
     * @param Request $request
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function all(Request $request)
    {
        $nombrejuegos = $request->get('buscarjuegos');
        
        //It is used to make the search engine of the page 'all'
        $Game = Game::orderBy('name','ASC')->where('name','like',"%$nombrejuegos%")->paginate(10);
        $Image = Image::all();
        $GamesPlatform = GamesPlatform::all();
        $Platform = Platform::all();
        $Usersgame = Users_game::all();
        
        return view('all', compact(['Game', 'Image', 'GamesPlatform', 'Platform', 'Usersgame']));
    }

    /**
     * it is used to make the search engine list with ajax
     *
     * @param Request $request
     * @return void
     */
    public function fetch(Request $request)
    {
        //if you receive the query parameter, which is what you get from typing in the search 
        if($request->get('query'))
        {
            $query = $request->get('query');
            $data = Game::where('name', 'like', "%$query%")->take(5)->get();

            $output = '<ul class="dropdown-menu"
                style="display:block;
                position:relative" >';
                
            foreach($data as $row)
            {
                $output .= '<li><a href="#"> '.$row->name.'
                    </a></li>';
            }

            $output .= '</ul>';
            echo $output;
        }
    }

    /**
     * save the game that you select, and add in you catalog
     *
     * @param $id
     * @return 
     */
    public function guardar($id)
    {
        $Usersgame = new Users_game;
        $Usersgame->idgames = $id;
        $Usersgame->idusers = Auth::user()->id;
        $Usersgame->estado = 'jugando';
        $Usersgame->save();

        return redirect('all')->with('datos', 'Juego añadido a su catálogo correctamente!');    
    }

    /**
     * delete the game that you select in you catalog
     *
     * @param $id
     * @return 
     */
    public function borrar($id)
    {
        // return dd($id);

        Users_game::where('idgames', $id)->where('idusers', Auth::user()->id)->delete();
        
        return redirect('all')->with('datos',  'Juego borrado de su catálogo correctamente!');
        
    }

    /**
     * show view catalog ('catalogo')
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function catalogo()
    {
        $Game = Game::all();
        $Image = Image::all();
        $GamesPlatform = GamesPlatform::all();
        $Platform = Platform::all();
        $Usersgame = Users_game::all();
        return view('cliente.catalogo', compact(['Game', 'Image', 'GamesPlatform', 'Platform', 'Usersgame']));
    }

    /**
     * show view playing ('jugando')
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function jugando()
    {
        $Game = Game::all();
        $Image = Image::all();
        $GamesPlatform = GamesPlatform::all();
        $Platform = Platform::all();
        $Usersgame = Users_game::all();
        return view('cliente.jugando', compact(['Game', 'Image', 'GamesPlatform', 'Platform', 'Usersgame']));
    }

    /**
     * show view completed ('completado')
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function completado()
    {
        $Game = Game::all();
        $Image = Image::all();
        $GamesPlatform = GamesPlatform::all();
        $Platform = Platform::all();
        $Usersgame = Users_game::all();
        return view('cliente.completado', compact(['Game', 'Image', 'GamesPlatform', 'Platform', 'Usersgame']));
    }

    /**
     * show view wait ('espera')
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function espera()
    {
        $Game = Game::all();
        $Image = Image::all();
        $GamesPlatform = GamesPlatform::all();
        $Platform = Platform::all();
        $Usersgame = Users_game::all();
        return view('cliente.espera', compact(['Game', 'Image', 'GamesPlatform', 'Platform', 'Usersgame']));
    }

    /**
     * show view left ('dejado')
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function dejado()
    {
        $Game = Game::all();
        $Image = Image::all();
        $GamesPlatform = GamesPlatform::all();
        $Platform = Platform::all();
        $Usersgame = Users_game::all();
        return view('cliente.dejado', compact(['Game', 'Image', 'GamesPlatform', 'Platform', 'Usersgame']));
    }

    /**
     * you can change the state of the game
     * 
     * @param Request $request
     * @param $id
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function actualizarEstado(Request $request, $id)
    {
        Users_game::where('idgames', $id)->where('idusers', Auth::user()->id)->update(["estado" => $request->estad]);
        return redirect('catalogo')->with('datos',  'Juego actualizado de su catálogo correctamente!');
    }

    /**
     * this view you can configurate the users of yhe app, only users with the administrator role can enter
     * 
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function configUsuarios()
    {
        $rol = Auth::user()->role;
        // if you role isn't admin you return to view 'home'
        if( $rol != 'admin'){
            $Usersgame = Users_game::all()->where('idusers', Auth::user()->id);
            return view('home', compact(['Usersgame']));
        }
        $User = User::all();
        return view('admin.configUsuarios', compact('User'));    
    }

    /**
     * this function you can delete users, only users with the administrator role can enter
     * 
     * @param $id
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function borrarUsuarios($id)
    {
        $rol = Auth::user()->role;
        // if you role isn't admin you return to view 'home'
        if( $rol != 'admin'){
            $Usersgame = Users_game::all()->where('idusers', Auth::user()->id);
            return view('home', compact(['Usersgame']));
        }
        User::where('id', $id)->delete();
        return redirect('configUsuarios')->with('datos',  'Usuario borrado de su base de datos correctamente!'); 
    }

    /**
     * this function you can update users, only users with the administrator role can enter
     * 
     * @param Request $request
     * @param $id
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function actualizarUsuario(Request $request, $id)
    {
        $usuarios = User::all();
        foreach ($usuarios as $us) {
            // if the email is repeated it is canceled
            if ($us->email == $request->email) {
                return redirect('configUsuarios')->with('cancelar', 'Error el correo ya existe');
            }
        }

        $rol = Auth::user()->role;
        // if you role isn't admin you return to view 'home'
        if( $rol != 'admin'){
            $Usersgame = Users_game::all()->where('idusers', Auth::user()->id);
            return view('home', compact(['Usersgame']));
        }

        //update the field role ('rol')
        if ( $request->name == null && $request->email == null) {
            User::where('id', $id)->update([ "role" => $request->rol ]);
            return redirect('configUsuarios')->with('datos',  'Usuario actualizado de la base de datos correctamente!');
        }

        //update the field name and role ('rol')
        if ($request->email == null) {
            User::where('id', $id)->update(["name" => $request->name, "role" => $request->rol ]);
            return redirect('configUsuarios')->with('datos',  'Usuario actualizado de la base de datos correctamente!');
        }

        //update the field email and role ('rol')
        if ( $request->name == null) {
            User::where('id', $id)->update([  "email" => $request->email, "role" => $request->rol ]);
            return redirect('configUsuarios')->with('datos',  'Usuario actualizado de la base de datos correctamente!');
        }

        User::where('id', $id)->update(["name" => $request->name, "email" => $request->email, "role" => $request->rol ]);
        return redirect('configUsuarios')->with('datos',  'Usuario actualizado de la base de datos correctamente!');

    }

    /**
     * this function redirect to view actualizar in the folder admin
     * 
     * @param $id
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function actualizar($id)
    {
        $rol = Auth::user()->role;
        // if you role isn't admin you return to view 'home'
        if( $rol != 'admin'){
            $Usersgame = Users_game::all()->where('idusers', Auth::user()->id);
            return view('home', compact(['Usersgame']));
        }
        $Usuario = User::all()->where('id', $id); 
        return view('admin.actualizar', compact([ 'Usuario']));
    }

    /**
     * this function you create users.
     * 
     * @param Request $request
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function nuevoUsuario(Request $request)
    {   
        $rol = Auth::user()->role;
        // if you role isn't admin you return to view 'home'
        if( $rol != 'admin'){
            $Usersgame = Users_game::all()->where('idusers', Auth::user()->id);
            return view('home', compact(['Usersgame']));
        }
        // if the passwords isn't the same, cancel the function
        if ($request->password != $request->password_confirmation) {
            return redirect('configUsuarios')->with('cancelar', 'Error!! vuelve a intentarlo.');
        }

        $usuari = User::all();
        foreach ($usuari as $us) {
            // if the email exist, cancel the function
            if ($us->email == $request->email) {
                return redirect('configUsuarios')->with('cancelar', 'Error!! vuelve a intentarlo.');
            }
        }
        
        $usuario = new User;
        $usuario->name = $request->name; 
        $usuario->email = $request->email; 
        $usuario->password = Hash::make($request->password); 
        $usuario->role = $request->rol; 
        $usuario->save();
        return redirect('configUsuarios')->with('datos', 'Usuario añadido correctamente!');
    }

    /**
     * redirect to view configJuegos in the folder admin
     * 
     * @param Request $request
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function configJuegos(Request $request)
    {
        $rol = Auth::user()->role;
        // if you role isn't admin you return to view 'home'
        if( $rol != 'admin'){
            $Usersgame = Users_game::all()->where('idusers', Auth::user()->id);
            return view('home', compact(['Usersgame']));
        }
        
        $nombrejuegos = $request->get('buscarjuegos');
        $Game = Game::orderBy('name','ASC')->where('name', 'like', "%$nombrejuegos%")->paginate(12);
        $Image = Image::all();
        $GamesPlatform = GamesPlatform::all();
        $Platform = Platform::all();
        return view('admin.configJuegos', compact(['Game', 'Image', 'GamesPlatform', 'Platform']));
    }

    /**
     * with this function you can delete games
     * 
     * @param $id
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function borrarJuegos($id)
    {
        $rol = Auth::user()->role;
        // if you role isn't admin you return to view 'home'
        if( $rol != 'admin'){
            $Usersgame = Users_game::all()->where('idusers', Auth::user()->id);
            return view('home', compact(['Usersgame']));
        }

        Game::where('id', $id)->delete();        
        return redirect('configJuegos')->with('datos',  'Juego borrado de su base de datos correctamente!');     
    }

    /**
     * with this function you can created games
     * 
     * @param Request $request
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function nuevoJuego(Request $request)
    {   
        $rol = Auth::user()->role;
        // if you role isn't admin you return to view 'home'
        if( $rol != 'admin'){
            $Usersgame = Users_game::all()->where('idusers', Auth::user()->id);
            return view('home', compact(['Usersgame']));
        }

        $Platform = Platform::all();
        //if you not enter id, cancel the function
        if ($request->id == null) {
            return redirect('configJuegos')->with('cancelar', 'No has introducido ID!');
        }

        $juegos = Game::all();
        foreach ($juegos as $game) {
            //if the id exist,, cancel the function
            if($request->id == $game->id){
                return redirect('configJuegos')->with('cancelar', 'El ID ya existe!');
            }
        }

        $games = new Game;
        $games->id = $request->id;
        $games->name = $request->name;
        $games->released = $request->released;
        $games->background_image = $request->background_image;
        $games->rating = $request->rating;
        $games->rating_top = $request->rating_top;
        $games->clip = $request->clip;
        $games->save();

        $i=1;
        foreach ($Platform as $plat) {
            //if the platform is the same, add the platform
            if($plat->id == $request->$i){
                $gp = new GamesPlatform;
                $gp->idgames = $request->id;
                $gp->idplatforms = $request->$i;     
                $gp->save();
            }
            $i++;
        }
        return redirect('configJuegos')->with('datos', 'Juego añadido correctamente!');
    }    

    /**
     * show the view update game ('actualizarJue') in the folder adminJuegos
     * 
     * @param $id
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function actualizarJue($id)
    {
        $rol = Auth::user()->role;
        // if you role isn't admin you return to view 'home'
        if( $rol != 'admin'){
            $Usersgame = Users_game::all()->where('idusers', Auth::user()->id);
            return view('home', compact(['Usersgame']));
        }
    
        $Game = Game::all()->where('id', $id); 
        $Platform = Platform::all();
        $GamePlatform = GamesPlatform::all();
        return view('adminJuegos.actualizarJue', compact([ 'Game', 'Platform', 'GamePlatform']));
    }

    /**
     * you can update the game with this function
     * 
     * @param $id
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function actualizarJuego(Request $request, $id)
    {
        $rol = Auth::user()->role;
        // if you role isn't admin you return to view 'home'
        if( $rol != 'admin'){
            $Usersgame = Users_game::all()->where('idusers', Auth::user()->id);
            return view('home', compact(['Usersgame']));
        }
        $Platform = Platform::all();
        $games = Game::all();
        GamesPlatform::where('idgames', $id)->delete();

        $i=1;
        foreach ($Platform as $plat) {
            //if the platform is the same, add the platform
            if($plat->id == $request->$i){
                $gp = new GamesPlatform;
                $gp->idgames = $id;
                $gp->idplatforms = $request->$i;     
                $gp->save();
            }
            $i++;

        }

        //if the name isn't null, update the game
        if($request->name != null){
            Game::where('id', $id)->update([ 
                "name" => $request->name
            ]);
        }
        //if the released isn't null, update the game
        if($request->released != null){
            Game::where('id', $id)->update([ 
                "released" => $request->released
            ]);
        }
        //if the background image isn't null, update the game
        if($request->background_image != null){
            Game::where('id', $id)->update([ 
                "background_image" => $request->background_image   
            ]);
        }
        //if the clip isn't null, update the game
        if($request->clip != null){
            Game::where('id', $id)->update([ 
                "clip" => $request->clip
            ]);
        }
        //if the rating isn't null, update the game
        if($request->rating != null){
            Game::where('id', $id)->update([ 
                "rating" => $request->rating
            ]);
        }
        //if the rating top isn't null, update the game
        if($request->rating_top != null){
            Game::where('id', $id)->update([ 
                "rating_top" => $request->rating_top
            ]);
        }
        
        return redirect('configJuegos')->with('datos',  'juego actualizado de la base de datos correctamente!');
    }

    /**
     * show the view configImagenes
     * 
     * @param $id
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function configImagenes($id)
    {
        $rol = Auth::user()->role;
        // if you role isn't admin you return to view 'home'
        if( $rol != 'admin'){
            $Usersgame = Users_game::all()->where('idusers', Auth::user()->id);
            return view('home', compact(['Usersgame']));
        }
        
        $Image = Image::where('idgames', $id)->get();
        return view('adminImagenes.configImagenes', compact(['Image']));
    }

    /**
     * this funtion you can deleted image
     * 
     * @param $id
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function borrarImagenes($id)
    {
        $rol = Auth::user()->role;
        // if you role isn't admin you return to view 'home'
        if( $rol != 'admin'){
            $Usersgame = Users_game::all()->where('idusers', Auth::user()->id);
            return view('home', compact(['Usersgame']));
        }
        Image::where('id', $id)->delete();
        
        return redirect('configJuegos')->with('datos',  'Imagen borrado de su base de datos correctamente!');
        
    }

    /**
     * this funtion return to view nuevaImagen in the folder adminImanges
     * 
     * @param $id
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function nuevoImagen($id)
    {
        $rol = Auth::user()->role;
        // if you role isn't admin you return to view 'home'
        if( $rol != 'admin'){
            $Usersgame = Users_game::all()->where('idusers', Auth::user()->id);
            return view('home', compact(['Usersgame']));
        }
        
        $ID = $id; 
        return view('adminImagenes.nuevaImagen', compact(['ID']));
    }

    /**
     * this funtion you can add image
     * 
     * @param $id
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function agregarImagen(Request $request, $id)
    {
        $rol = Auth::user()->role;
        // if you role isn't admin you return to view 'home'
        if( $rol != 'admin'){
            $Usersgame = Users_game::all()->where('idusers', Auth::user()->id);
            return view('home', compact(['Usersgame']));
        }
                   
        $image = new Image;
        $image->idgames = $id;
        $image->img = $request->img;     
        $image->save();

        return redirect('configJuegos')->with('datos',  'juego Añadido de la base de datos correctamente!');
    }

    /**
     * this funtion return the view comentarios in the folder cliente
     * 
     * @param $id
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function comentarios($id)
    {
        $game = Game::all()->where('id',$id);
        $user = User::all();
        $comments = DB::table('comments')
                    ->join('users', 'users.id', '=', 'comments.idusers')
                    ->select('comments.id', 'comments.comentario', 'comments.idusers', 'comments.created_at', 'users.name', 'users.imgProfile')
                    ->where('idgames',$id)
                    ->orderBy('comments.id', 'desc')
                    ->simplePaginate(5);      

        $commentsCount = $comments->count();         
        return view('cliente.comentarios', compact(['comments', 'game', 'commentsCount']));    
    }

    /**
     * this funtion you create a comment about one game
     * 
     * @param Request $request
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function nuevoComentario(Request $request)
    {   
        $comment = new Comments;
        $comment->comentario  = $request->comentario;
        $comment->idgames  = $request->idgames;
        $comment->idusers  = Auth::user()->id;
        $comment->save();
        
        return redirect('comentarios/'.$request->idgames)->with('datos', 'Usuario añadido correctamente!');
    }

    /**
     * this funtion you delete a comment about one game
     * 
     * @param $idgame
     * @param $id
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function borrarComentario($id, $idgame)
    {
        Comments::where('id', $id)->delete();
        return redirect('comentarios/'.$idgame)->with('datos',  'Juego borrado de su base de datos correctamente!'); 
    }
    
    /**
     * this funtion you update image profile
     * 
     * @param Request $request
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function modificarImagenProfile(Request $request)
    {
        $id = Auth::user()->id; 
        User::where('id', $id)->update(["imgProfile" => $request->img]); 
        return redirect('home')->with('datos',  'Imagen actualizado de la base de datos correctamente!');
    }

    /**
     * return view follower in the folder cliente
     * 
     * @param Request $request
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function follower(Request $request)
    {
        $correoFollower = '*';
        if( !empty($request->get('buscarfollower'))){
            $correoFollower = $request->get('buscarfollower');
        }
        
        $usuario = User::where('email','like',"%$correoFollower%")->get();
        $follow = Follower::all();

        $followInfo = DB::table('follower')
                    ->join('users', 'users.id', '=', 'follower.idfollow')
                    ->select('follower.id', 'follower.iduser', 'follower.idfollow', 'users.email', 'users.name', 'users.imgProfile')
                    ->where('iduser', Auth::user()->id)
                    ->get(); 
       
        return view('cliente.follower' , compact(['usuario', 'follow', 'followInfo']));
    }

    /**
     * this funtion you follow other user
     * 
     * @param $id
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function guardarFollower($id)
    {
        $follow = new Follower;
        $follow->iduser = Auth::user()->id;
        $follow->idfollow = $id;
        $follow->save();
        return redirect('follower');     
    }

    /**
     * this funtion you unfollow other user
     * 
     * @param $id
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function borrarFollower($id)
    {
        Follower::where('idfollow', $id)->where('iduser', Auth::user()->id)->delete();   
        return redirect('follower');
    }

    /**
     * this funtion you view the profile about other users
     * 
     * @param $id
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function profile($id)
    {
        $user = User::where('id', $id)->get();
        $Usersgame = Users_game::all()->where('idusers', $id);        
        $Game = Game::all();
        $Image = Image::all();
        $GamesPlatform = GamesPlatform::all();
        $Platform = Platform::all();
             
        return view('cliente.profile', compact(['user', 'Usersgame', 'Game', 'Image', 'GamesPlatform', 'Platform' ]));
    }


    
}