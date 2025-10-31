<?php

namespace App\Http\Controllers\Auth;


use App\Models\Role;
use App\Models\User;
use App\Models\RoleUser;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }

    public function showLoginForm(){
        return view('auth.login');
    }

    public function login(Request $request) {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $user = User::with(['roleUser.role']) 
        ->where('email', $request->email)
        ->first();

        if(!$user){
            return redirect()->back()
                ->withErrors(['email' => 'email tidak ditemukan'])
                ->withInput();
        }

        if(!Hash::check($request->password, $user->password)){
            return redirect()->back()
                ->withErrors(['password' => 'password salah'])
                ->withInput();
        }

        $namaRole = Role::where('idrole', $user->role[0]->idrole ?? null)->first();
        Auth::login($user);

        $request->session()->put([
            'user_id' => $user->iduser,
            'user_name' => $user->nama,
            'user_email' => $user->email,
            'user_role' => $user->roleUser[0]->idrole ?? 'user',
            'user_role_name' => $namaRole->nama_role ?? 'User',
            'user_status' => $user->roleUser[0]->status ?? 'active',
        ]);

        $userRole = $user->roleUser[0]->idrole ?? null;

        switch ($userRole) {
            case 1:
                return redirect()->route('admin.dashboard')->with('success', 'Login berhasil sebagai Administrator');
            case 2:
                return redirect()->route('dokter.dashboard')->with('success', 'Login berhasil sebagai Dokter');
            case 3:
                return redirect()->route('perawat.dashboard')->with('success', 'Login berhasil sebagai Perawat');
            case 4:
                return redirect()->route('resepsionis.dashboard')->with('success', 'Login berhasil sebagai Resepsionis');
            default:
                return redirect()->route('pemilik.dashboard')->with('success', 'Login berhasil sebagai Pemilik');
        }

    }

    public function logout(Request $request){
        Auth::logout();
        
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login')->with('success', 'Logout berhasil');
    }

}
