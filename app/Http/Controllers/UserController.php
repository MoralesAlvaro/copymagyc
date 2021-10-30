<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->is_admin == 1) {
            $slug = 'user';
            $encabezados= ['ID', 'Nombre', 'Apellido', 'Correo'];
            $campos= ['id', 'name', 'surname', 'email'];
            $data = User::orderBy('id', 'DESC')->paginate();
            return view('user.index', compact('slug','encabezados', 'campos', 'data'));
        }
        return redirect()->back()->with('warning', 'No estas autorizado para llevar a cabo esta operación !.');
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        if (Auth::user()->is_admin == 1) {
            $slug = 'user';
            return view('user.create', compact('slug'));
        }
        return redirect()->back()->with('warning', 'No estas autorizado para llevar a cabo esta operación !.');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (Auth::user()->is_admin == 1) {
            // Validando data
            $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'surname' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => 'required|string|confirmed|min:8',
                'avatar' => '',
                'is_admin' => 'required|boolean',
                'active' => 'required|boolean',
            ]);

            
            $user = new User($request->all());
            $user->save();
            $user->fill(['password' => Hash::make($request->password)])->save();
                
            // IMG
            if (!$request->file('avatar')) {
                // Imagen default de usuario
                $pathImgUrl = "https://via.placeholder.com/1350x280.png/05ff8f?text=DEFAULT";
                // Actualizando ruta img
                $user->fill(['avatar' => asset($pathImgUrl)])->save();
            }else{
                // Ruta de guardado
                $pathImgUrl = Storage::disk('public')->put('img/users', $request->file('avatar'));
                // Actualizando ruta img
                $user->fill(['avatar' => asset($pathImgUrl)])->save();
            }

            return redirect()->back()->with('success', 'El usuario se ha registrado correctamente!.');
        }
        return redirect()->back()->with('warning', 'No estas autorizado para llevar a cabo esta operación !.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (Auth::user()->is_admin == 1 or Auth::user()->id == $id) {
            $slug = 'user';
            $data = User::findOrFail($id);
            return view('user.show', compact('slug', 'data'));
        }
        return redirect()->back()->with('warning', 'No estas autorizado para llevar a cabo esta operación !.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $es
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (Auth::user()->is_admin == 1 or Auth::user()->id == $id) {
            $slug = 'user';
            $data = User::findOrFail($id);
            return view('user.edit', compact('slug', 'data'));
        }
        return redirect()->back()->with('warning', 'No estas autorizado para llevar a cabo esta operación !.');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (Auth::user()->is_admin == 1) {
            $usuario = User::findOrFail($id);
            //return $usuario;
            if ($usuario) {
                
                // Validando data
                $request->validate([
                    'name' => ['required', 'string', 'max:255'],
                    'surname' => ['required', 'string', 'max:255'],
                    'email' => 'required', 'string', 'email', 'max:255', 'unique:users,email'.$usuario->id,
                    'avatar' => '',
                    'is_admin' => 'required|boolean',
                    'active' => 'required|boolean',
                ]);

                // Verificando si ha habido modificaciones
                $campos = ['name', 'surname', 'email', 'is_admin', 'active'];
                foreach ($campos as $item) {
                    // Valor traido de la bd
                    $valor_campo_old = $usuario->$item;
                    // Valor traido del formulario
                    $valor_campo_new = $request->get($item);
                    if ($valor_campo_new != $valor_campo_old) {
                        // Actualizando campo
                        $usuario->fill([$item => $valor_campo_new])->save();
                    }
                }

                // IMG: Verificación de cambios de avatar
                if ($request->file('avatar') ) {
                    // Ruta de guardado
                    $pathImgUrl = Storage::disk('public')->put('img/users', $request->file('avatar'));
                    // Comprobando que la imagen no sea la default
                    if ($usuario->avatar != "https://via.placeholder.com/1350x280.png/05ff8f?text=DEFAULT") {
                        $reemplazo = str_replace( env('APP_URL'), "", $usuario->avatar );
        
                        // Comprobando que exista el archivo
                        if (file_exists($reemplazo)) {
                            unlink($reemplazo);
                        }
                    }
        
                    // actualiznado campo
                    $usuario->fill(['avatar' => asset($pathImgUrl)])->update();
                }else{
                    $pathImgUrl = $usuario->avatar;
                    // actualiznado campo
                    $usuario->fill(['avatar' => asset($pathImgUrl)])->update();
                }

                return redirect('/user'.'/'.$id)->with('success', 'El usuario se ha sido actualizado correctamente!.');      
            }
            //return redirect()->back()->with('success', 'No es posible actualizar el usuario.');
        }
        return redirect()->back()->with('warning', 'No estas autorizado para llevar a cabo esta operación !.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Auth::user()->is_admin == 1) {
            // $data = User::find($id);
            // $data->delete();
            // return redirect('/user')->with('success', 'El registro se ha sido eliminado correctamente!.'); 

            $data = User::find($id);
            if ($data == null) {
                return redirect('/user')->with('success', 'El registro que desea eliminar no se encuentra!.');
            }

            // Eliminando foto asociada al registro
            $rutaAvatar = $data->avatar;
            if (file_exists($rutaAvatar)) {
                unlink($rutaAvatar);
            }
            
            $data->delete();
            return redirect('/user')->with('success', 'El registro se ha sido eliminado correctamente!.');

        }
        return redirect()->back()->with('warning', 'No estas autorizado para llevar a cabo esta operación !.');
    }

    public function update_password(Request $request)
    {
        $id = Auth::user()->id;
        if ($request->password != $request->password_confirmation) {
            return redirect('/user'.'/'.$id)->with('warning', 'Las contraseñas no son iguales!.');  
        }
        
        $user = User::find($request->user_id);
        $pass = bcrypt($request->password);
        $user->password = $pass;
        $user->update();

        return redirect('/user'.'/'.$user->id)->with('success', 'Contraseña actualizada con exito!.');  
    }
}