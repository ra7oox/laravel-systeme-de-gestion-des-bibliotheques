<?php

use App\Http\Controllers\AuteurController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EmpruntController;
use App\Http\Controllers\EvaluationController;
use App\Http\Controllers\LecteurController;
use App\Http\Controllers\LivreController;
use Illuminate\Support\Facades\Route;

// Redirection de la racine vers /login
Route::redirect("/", "/login");

// Authentification : accessible sans être connecté
Route::get('/login', [AuthController::class, 'loginForm'])->name('loginForm');
Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::get('/register', [AuthController::class, 'registerForm'])->name('registerForm');
Route::post('/register', [AuthController::class, 'register'])->name('register');

Route::middleware('auth')->group(function () {

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::view("/dashboard", "dashboard")->name("dashboard-admin");
    Route::view("/dashboard-lecteur", "dashboard-lecteur")->name("dashboard-lecteur");
    Route::resource("livres", LivreController::class);
    Route::resource("emprunts", EmpruntController::class);
    Route::resource("auteurs", AuteurController::class);
    Route::resource("lecteurs", LecteurController::class);
    Route::resource("evaluations", EvaluationController::class);
    Route::get("/livre-recherche", [LivreController::class, "recherche"])->name("livres.recherche");
    Route::get('/livres-top', [LivreController::class, 'topLivres'])->name('livres.toplivres');
    Route::get('/retour-form', [LivreController::class, 'retourLivreForm'])->name('livres.retour-form');
    Route::post('/retour', [LivreController::class, 'retourLivre'])->name('livres.retour');


});
