<?php
  
namespace App\Http\Controllers\Auth;
  
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use Illuminate\Auth\Events\Validated;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
  
class AuthController extends Controller
{
    /**
     * Show login form.
     *
     * @return View
     */
    public function index(): View
    {
        return view('auth.login');
    }  
      
    /**
     * Show registration form.
     *
     * @return View
     */
    public function registration(): View
    {
        return view('auth.registration');
    }
      
    /**
     * Handle login request.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function postLogin(Request $request): RedirectResponse
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
   
        $credentials = $request->only('email', 'password');

        if ($credentials['email'] === 'admin@gmail.com' && $credentials['password'] === 'admin1234') {
            // Hardcoded admin login
            session(['is_admin' => true]);
            return redirect()->intended('dashboard')
                        ->withSuccess('You have Successfully logged in as admin');
        }

        if (Auth::attempt($credentials)) {
            return redirect()->intended('dashboard')
                        ->withSuccess('You have Successfully logged in');
        }
  
        return redirect("login")->withErrors('Oops! You have entered invalid credentials');
    }
      
    /**
     * Handle registration request.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function postRegistration(Request $request): RedirectResponse
    {  
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);
      
        $data = $request->all();
        $user = $this->create($data);
        
        Auth::login($user); 

        return redirect("dashboard")->withSuccess('Great! You have Successfully registered and logged in');
    }
    
    /**
     * Show dashboard.
     *
     * @return mixed
     */
    public function dashboard()
    {
        if (session('is_admin')) {
            return view('admin.dashboard');
        }

        if (Auth::check()) {
            return view('user.dashboard');
        }

        return redirect("login")->withErrors('Oops! You do not have access');
    }
    
    /**
     * Create a new user.
     *
     * @param array $data
     * @return User
     */
    public function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password'])
        ]);
    }
    
    /**
     * Handle logout request.
     *
     * @return RedirectResponse
     */
    public function logout(): RedirectResponse
    {
        Session::flush();
        Auth::logout();
  
        return redirect('login');
    }
}
