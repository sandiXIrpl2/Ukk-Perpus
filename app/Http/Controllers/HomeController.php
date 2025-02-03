<?php
  
namespace App\Http\Controllers;
  
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

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
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View|\Illuminate\Http\RedirectResponse
     */
    public function index(): View|RedirectResponse
    {
        if (auth()->user()->type == 1) {
            return redirect()->route('admin');
        }
        return redirect()->route('dashboard');
    } 
  
    /**
     * Show the admin dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function adminHome(): View
    {
        return view('dashboard');
    }
}
