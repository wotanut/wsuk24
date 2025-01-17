<?php

use App\Models\competitors;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

// GET URL's

Route::get('/', function () {
    return view('index');
});

Route::get('/login', function () {
    return view('login');
})->name('login'); // Used so that the auth middleware can redirect to here

Route::get('/register', function () {
    $permissionsAvail = DB::table('Permissions')->orderBy('name')->lazy();

    return view('register', ['permissionsAvail' => $permissionsAvail]);
//})->middleware('auth');
});

Route::get('/results', function () {
    $resultsQuery = DB::table('competitors')->orderByDesc('score')->paginate(15);
    $skills = DB::table('skills')->orderByDesc('id')->lazy();

    return view('results',[ 'results' => $resultsQuery, 'skills' => $skills ]);
});

Route::get('/dashboard', function () {
    return view('dashboard');
//})->middleware('auth');
});

Route::get('/logout', function (Request $request) {
    Auth::logout();

    $request->session()->invalidate();

    $request->session()->regenerateToken();

    return redirect('/');
});

// POST URL's

Route::post('/login', function(Request $request) {

    $credentials = $request->validate([
        'username' => ['required', 'username'],
        'password' => ['required', 'password'],
    ]);

    if (Auth::attempt($credentials)) {
        $request->session()->regenerate();

        return redirect()->intended('dashboard');
    }

    return redirect('/login')->withErrors([
        'username' => 'The provided credentials do not match our records.',
    ])->onlyInput('email');

});

Route::post('/register', function(Request $request) {
    $information = $request->only('name', 'Country', 'Skill', 'Score');


});
//})->middleware('auth');

Route::post('/competitor/{x}/delete', function(int $id) {
   $competitor = competitors::query()->findOrFail($id);

   $competitor->delete();
   return redirect('/results')->with('success', 'Competitor deleted');
});
//})->middleware('auth');

Route::post('/competitor/add', function(Request $request) {
    $competitor = $request->validate([
        'competitor-name' => ['required', 'string'],
        'competitor-member' => ['required', 'string'],
        'skill' => ['required', 'id'],
        'score' => ['required', 'integer']
    ]);

    DB::table('competitors')->insert($competitor);
});
//})->middleware('auth');
