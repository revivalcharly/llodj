<?php

use Illuminate\Support\Facades\Route;
use Spatie\Menu\Link;
use Spatie\Menu\Menu;
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
    // $menux = Menu::new([
    // Link::to("/","Accueil"),
    // Link::to("/about","À propos"),
    // ])->addClass("nav");

    $menux = Menu::new()
    ->link('/','Menu')
    ->add((Menu::new()
        ->link('/test/hello', 'premier sous-menu !')
        ->link('/test/hellodeux', 'deuxième sous-menu !')
        )
    ->link('/', 'Test second menu !'))
    ->addClass('nav');

    return view('welcome')->with('menux',$menux);
});

Route::get('/lodj', function () {
    return view('lodj');
});

Route::get('/compte', function () {
    $compte = new \App\Models\Compte(); 
    $compte->Numero = "101100000";
    $compte->Libelle = "Capital souscrit - non appelé";
    $compte->Debit = 0.0;
    $compte->Credit = 0.0;
    $compte->Commentaire = "https://www.comptabilisation.fr/compte.php?compta_n=1011&nom=Capital-souscrit-non-appele&i=1";
    $compte->save();

    $compte1 = new \App\Models\Compte(); 
    $compte1->Numero = "101200000";
    $compte1->Libelle = "Capital souscrit – appele, non verse";
    $compte1->Debit = 0.0;
    $compte1->Credit = 0.0;
    $compte1->Commentaire = "https://www.comptabilisation.fr/compte.php?compta_n=1012&nom=Capital-souscrit-appele-non-verse&i=2";
    $compte1->save();


    
    return $compte;
//    return view('compte');
});