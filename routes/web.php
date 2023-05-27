<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Profile\AvatarController;
use Illuminate\Support\Facades\Route;
use App\Models\User;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {

    // To create a user
    // $user = DB::insert('insert into users (name, email, password) values (?, ?, ?)', [
    //     'Marc',
    //     'marc@mail.com',
    //     '1234567890'
    // ]);
    // DB::table('users')->insert([
    //     'name' => 'Marc',
    //     'email' => 'marc@mail.com',
    //     'password' => '1234567890'
    // ]);
    // $user = User::create([
    //     'name' => 'Marc',
    //     'email' => 'marc7@mail.com',
    //     'password' => '1234567890',
    // ]);

    // To update a user
    // $affected = DB::update(
    //     'update users set email = ? where id = ?',
    //     [
    //         'Anita@mail.com',
    //         2
    //     ]
    // );
    // DB::table('users')->where('id', 6)->update([
    //         'email' => 'Anita@mail.com',
    //     ]
    // );

    // To delete a user
    // $deleted = DB::delete('delete from users where id=?', [
    //     '2'
    // ]);
    // DB::table('users')->where('id', 6)->delete();

    // To selet all the users
    // $users = DB::select('select * from users');
    // $users = DB::table('users')->get();
    $users = User::find(1);

    dd($users->name);
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::patch('/profile/avatar', [AvatarController::class, 'update'])->name('profile.avatar');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
