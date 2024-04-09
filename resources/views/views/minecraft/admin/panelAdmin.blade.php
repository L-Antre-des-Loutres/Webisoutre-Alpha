<!-- resources/views/bienvenue.blade.php -->

@extends('layouts.app')

@section('title', 'Panel Administrateur')

@section('content')
    <div class="container mt-4">
        <br>
        <div class="card mb-3" style="max-width: 15rem;">
            <div class="card-body">
                <a href="https://antredesloutres.online/admin/panel/listeServeur">Liste Serveur</a>
            </div>
        </div>
        <div class="card mb-3" style="max-width: 15rem;">
            <div class="card-body">
                <a href="https://antredesloutres.online/admin/panel/creerServeur">Créer Serveur</a>
            </div>
        </div>
        <div class="card mb-3" style="max-width: 15rem;">
            <div class="card-body">
                <a href="https://antredesloutres.online/admin/panel/modifierServeur">Modifier Serveur</a>
            </div>
        </div>



    </div>
@endsection
