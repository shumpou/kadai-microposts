<?php
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UsersController; // 追記
use App\Http\Controllers\MicropostsController; //追記
use App\Http\Controllers\UserFollowController;  // 追記
use App\Http\Controllers\FavoritesController;  // 追記
use Livewire\Volt\Volt;

Route::get('/', [MicropostsController::class, 'index'])->name('home');

Route::get('/dashboard', [MicropostsController::class, 'index'])->middleware(['auth'])->name('dashboard');

Route::group(['middleware' => ['auth']], function () {

    // 追記ここから
    Route::prefix('users/{id}')->group(function () {
        Route::post('follow', [UserFollowController::class, 'store'])->name('user.follow');
        Route::delete('unfollow', [UserFollowController::class, 'destroy'])->name('user.unfollow');
        Route::get('followings', [UsersController::class, 'followings'])->name('users.followings');
        Route::get('followers', [UsersController::class, 'followers'])->name('users.followers');
        Route::get('favorites', [UsersController::class, 'favoritedPost'])->name('users.favorites');


    });


    // 追記ここまで

    // お気に入りここから
    Route::prefix('microposts/{id}')->group(function() {
        Route::post('favorites', [FavoritesController::class, 'store'])->name('favorites.favorite');
        Route::delete('unfavorite', [FavoritesController::class, 'destroy'])->name('favorites.unfavorite');
        });


    Route::resource('users', UsersController::class, ['only' => ['index', 'show']]);

    // Route::redirect('settings', 'settings/profile');

    // Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    // Volt::route('settings/password', 'settings.password')->name('settings.password');
    // Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');

    Route::resource('microposts', MicropostsController::class, ['only' => ['store', 'destroy']]);

});



require __DIR__.'/auth.php';
