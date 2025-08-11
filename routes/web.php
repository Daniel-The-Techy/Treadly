<?php

use Inertia\Inertia;
use App\Models\Posts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ConnectController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Dashboard\PostController;
use App\Http\Controllers\Dashboard\DashboardController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use App\Http\Controllers\Dashboard\UserProfileController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});
Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
 
    return redirect('/home');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
 
    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

//Route::get('/User', [UserController::class, 'show'])->name('User');




Route::get('Home', function(){
      return Inertia::render('Account/Home');
})->name('Home');


//Route::get('Auth/Posts', function(){
//return Inertia::render('Posts');
//})->middleware(['auth'])->name('posts');

Route::get('Auth/Approval', function(){
    return Inertia::render('Approval');
})->middleware(['auth', 'verified'])->name('approval');



Route::get('Auth/Analytics', [DashboardController::class, 'miniAnalytics'])
->middleware(['auth', 'verified'])->name('Analytics');

//Route::get('Auth/dashboard', function () {
  //  return Inertia::render('Dashboard');
//})->middleware(['auth', 'verified'])->name('dashboard');
//

Route::get('Auth/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::get('/Choose/Category', function () {
    return Inertia::render('UserCategory');
})->name('User.Category');
//

//Route::get('Auth/Profile', function(){
  //  return Inertia::render('Profile');
//})->middleware(['auth', 'verified'])->name('profile');



Route::get('/Home/Post/{id} - {slug}', [PostController::class, 'show'])->name('Post.show');


Route::middleware('auth')->group(function () {
    Route::get('Auth/setting', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('Auth/setting', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('Auth/setting', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('Auth/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('Auth/Profile', [UserProfileController::class, 'index'])->name('profile');
    Route::Post('Auth/Profile', [UserProfileController::class, 'store'])->name('Profile.save');
   
  //  Route::get('Auth/Profile', [UserProfileController::class, 'getProfile'])->name('Profile.get');
    Route::get('Auth/Posts/{posts?}', [PostController::class, 'showCategory'])->name('posts');
    Route::Post('Auth/Posts', [PostController::class, 'store'])->name('Posts.save');
    Route::Post('Auth/Posts/CategoryCreate', [CategoryController::class, 'store'])->name('Category.save');
   // Route::Post('Home/Profile/f/{profile:user_id}', [UserProfileController::class, 'action'])->name('Follows');
   Route::Post('/Profiles/{user}/follow/', [UserProfileController::class, 'action'])->name('Follows');
    Route::get('Home/Profile/{profile:Username?}', [UserProfileController::class, 'showProfile'])->name('profile-view');
    Route::get('/Home/Post/', [PostController::class, 'AllPosts'])->name('posts.showAll');
      Route::get('/Home/Post/search', [PostController::class, 'searchPost'])->name('posts.search');
    Route::Post('/Post/{posts}/comment', [CommentController::class,'store'])->name('Comment.create');
    Route::Post('Home/Post/r/', [CommentController::class, 'replyComment'])->name('Reply.create');
    Route::Post('/posts/{posts}/like/', [PostController::class,'Like_Post'])->name('post.like');
    Route::delete('Home/Comment/d/{comments}', [CommentController::class, 'removeComment'])->name('Comment.delete');
    Route::POST('/comment/{comments}/like', [CommentController::class, 'likeComment'])->name('like_Comment');
    Route::delete('Home/Reply/d/{reply}', [CommentController::class, 'removeReply'])->name('Reply.delete');
    Route::put('Home/Comment/edit/{comments}', [CommentController::class, 'editComment'])->name('comment.Edit');
    
    Route::get('Home/Connect', [ConnectController::class, 'listUsers'])->name('Connect');
    
    Route::get('Home/Profile/Posts', function(){
        return Inertia::render('Account/Posts');
    });
    
    Route::get('Home/Profile/Activity', function(){
         return Inertia::render('Account/Activity');
    });
    
    Route::get('Home/Profile/Following', function(){
        return Inertia::render('Account/Following');
    });
    
    Route::get('Home', function(){
        return Inertia::render('Account/Home');
  })->name('Home');

});

require __DIR__.'/auth.php';
