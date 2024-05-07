<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\UniversityController;
use App\Http\Controllers\Admin\CriteriaController;
use App\Http\Controllers\User\RatingController;
use App\Http\Controllers\User\CommentController;
use App\Http\Controllers\Pages\PageController;

/*Route::get('/', function () {
    return view('welcome');
});
*/

Route::get('/', function () {
    return view('pages.index');
})->name('index');


/*
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
*/

//New
Route::group(['middleware' => 'admin'], function () {
    Route::get('/manage-users', [UserController::class, 'getUsers'])
        ->middleware(['auth', 'verified'])
        ->name('manage.users');

    Route::delete('/users/{id}', [UserController::class, 'deleteUser'])
        ->middleware(['auth', 'verified'])
        ->name('delete.user');

    Route::get('/manage-university', [UniversityController::class, 'getUniversities'])
        ->middleware(['auth', 'verified'])
        ->name('manage.universities');

    Route::delete('/university/{id}', [UniversityController::class, 'deleteUniversity'])
        ->middleware(['auth', 'verified'])
        ->name('delete.university');

    Route::get('/manage-university/universities/create', [UniversityController::class, 'create'])
        ->middleware(['auth', 'verified'])
        ->name('universities.create');

    Route::post('/manage-university/universities/store', [UniversityController::class, 'store'])
        ->middleware(['auth', 'verified'])
        ->name('universities.store');

    Route::get('/manage-university/universities/universities/{id}/edit', [UniversityController::class, 'edit'])
        ->middleware(['auth', 'verified'])
        ->name('universities.edit');

    Route::put('/manage-university/universities/universities/{id}', [UniversityController::class, 'update'])
        ->middleware(['auth', 'verified'])
        ->name('universities.update');

    //New
    Route::get('/manage-criteria/criteria', [CriteriaController::class, 'showCriteriaForm'])
        ->middleware(['auth', 'verified'])
        ->name('manage.criteria');

    Route::get('/manage-criteria/criteria/create', [CriteriaController::class, 'create'])
        ->middleware(['auth', 'verified'])
        ->name('criteria.create');

    Route::post('/manage-criteria/criteria/store', [CriteriaController::class, 'storeCriteria'])
        ->middleware(['auth', 'verified'])
        ->name('criteria.store');

    Route::get('/manage-criteria/criteria/{id}/edit', [CriteriaController::class, 'editCriteria'])
        ->middleware(['auth', 'verified'])
        ->name('criteria.edit');

    Route::put('/manage-criteria/criteria/{id}', [CriteriaController::class, 'updateCriteria'])
        ->middleware(['auth', 'verified'])
        ->name('criteria.update');

    Route::delete('/manage-criteria/criteria/{id}', [CriteriaController::class, 'deleteCriteria'])
        ->middleware(['auth', 'verified'])
        ->name('criteria.destroy');

    Route::get('/notes-commentaires', [CriteriaController::class, 'afficherNotesEtCommentaires'])
        ->middleware(['auth', 'verified'])
        ->name('afficherNotesEtCommentaires');
});

Route::get('/dashboard', [HomeController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::get('/dashboard/university/{university}', [RatingController::class, 'showRatingForm'])
    ->middleware(['auth', 'verified'])
    ->name('universities.show');

// Route pour afficher le formulaire avec le commentaire
Route::get('/university/{universityId}/user/{userId}/comment', [CommentController::class, 'showForm'])->name('comment.show');

Route::post('/dashboard/universities/{university}/ratings', [RatingController::class, 'storeRatingAndUpdateComment'])
    ->middleware(['auth', 'verified'])
    ->name('ratings.storeAndUpdateComment');

Route::get('university/search', [UniversityController::class, 'search'])
    ->middleware(['auth', 'verified'])
    ->name('universities.search');

//Pour les pages
Route::get('/university',[PageController::class,'createCourse'])
    ->name(name:'createCourse');
Route::get('/contact',[PageController::class,'createContact'])
    ->name(name:'createContact');

Route::get('/blog', [PageController::class, 'createBlog'])
    ->middleware(['auth', 'verified'])
    ->name('createBlog');

Route::get('/classement', [RatingController::class,'classementUniversitesParCritere'])
    //->middleware(['auth', 'verified'])
    ->name('classement.critere');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
