<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use App\Models\User;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PasswordResetLinkController extends Controller
{
    /**
     * Display the password reset link request view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.forgot-password');
    }

    /**
     * Handle an incoming password reset link request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = DB::select('select * from users where email = ?', [$request->email]);
        if (!$user) {
            return redirect()->back()->with('warning', 'No hemos encontrado tu usuario. Ponte en contacto con el administrador el sistema.');
        }

        // return response()->json($user[0]->id);
        $user = User::find($user[0]->id);
        // alvaroalvaro
        // $user[0]->fill(['password' => Hash::make($request->password)])->save();
        $pass = bcrypt($request->password);
        $user->password = $pass;
        $user->update();

        return redirect('/login')->with('success', 'Cambio de contraseña exitoso!.'); 
    }

    
}
