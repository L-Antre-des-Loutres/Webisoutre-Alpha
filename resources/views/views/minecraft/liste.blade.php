@extends('layouts.page')

@section('title', 'Accueil')
<style>
    .block {
        width: 90px;
    }
</style>

@section('content')
    <!-- Contenu spécifique à la page de liste des joueurs -->
    <h1>Liste des serveurs</h1>
    <p class="lead">Vous trouverez ici l'ensemble des serveurs disponibles à l'ouverture.</p>
    <div class="table-responsive">
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th></th>
                    <th scope="col">Nom du serveur</th>
                    <th scope="col">Modpack</th>
                    <th scope="col">Version</th>
                    <th scope="col">Joueurs</th>
                    <th scope="col">Disponibilité</th>
                    <th scope="col">Voir plus d'informations</th>
                    @if ($admin == 1)
                        <th scope="col">Modifier</th>
                        <th scope="col">Suprimer</th>
                    @endif
                </tr>
            </thead>
            <tbody>
                @foreach ($serveurs as $serveur)
                    <tr>
                        @if ($serveur->modpack == 'Aucun (Vanilla)')
                            <td><img src="{{ asset('images/logo/minecraft-launcher.png') }}" class="block"></td>
                        @else
                            <td><img src="{{ asset('images/icon/anvil.webp') }}" class="block"></td>
                        @endif
                        <th scope="row">{{ $serveur->nom_serv }}</th>
                        <td><a href="{{ $serveur->modpack_url }}">{{ $serveur->modpack }}</a></td>
                        <td>{{ $serveur->version_serv }}</td>
                        <td>{{ $nb_joueurs_par_serveur[$serveur->id_serv] }}</td>
                        <td>{{ $serveur->actif ? 'Disponible' : 'Indisponible' }}</td>
                        <td>
                            <a href="{{ route('detail-minecraft', ['id_serv' => $serveur->id_serv]) }}"
                                class="btn btn-primary btn-sm">Voir plus</a>
                        </td>
                        @if ($admin == 1)
                            <td>
                                <a href="{{ route('admin-modifierServeur', ['serveurID' => $serveur->id_serv]) }}" class="btn btn-primary btn-sm">Modifier</a>
                            </td>
                            <td>
                                <form id="delete-form-{{ $serveur->id_serv }}"
                                    action="{{ route('admin-delete', ['id_serv' => $serveur->id_serv]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn btn-sm btn-danger"
                                        onclick="confirmDelete({{ $serveur->id_serv }})">Supprimer</button>
                                </form>
                            </td>
                        @endif
                    </tr>
                @endforeach

                <script>
                    // Fonction pour afficher une boîte de dialogue de confirmation avant de supprimer le serveur
                    function confirmDelete(serveurId) {
                        if (confirm('Êtes-vous sûr de vouloir supprimer ce serveur?')) {
                            var deleteForm = document.getElementById('delete-form-' + serveurId);
                            deleteForm.submit();
                        }
                    }
                </script>

            </tbody>
        </table>
        <a href="{{ route('admin.creerServeur') }}"><button type="button" class="btn btn-primary btn-lg btn-block">Créer
                un serveur</button></a>
    </div>
    <br>
    <h1>Plus d'informations sur les serveurs</h1>
    <ul class="lead">
        <li>Pour changer le serveur actif, utilisez notre bot Discord disponible sur l'<a
                href="https://discord.gg/Vtv5skwAx5">Antre des Loutres</a>.</li>
        <li>Un seul serveur peut être actif à la fois.</li>
        <li>Tous les serveurs sont réservés aux joueurs premium.</li>
        <li>Le serveur Vanilla est permanent et ne sera jamais désactivé.</li>
        <li>La Vanilla est le seul serveur avec une whitelist.</li>
        <li>Il est recommandé de rejoindre notre Discord avant de vous connecter à nos serveurs.</li>
    </ul>
    <br>
    <p class="lead"></p>
    <div class="discord-button-container">
        <p class="lead">Vous voulez nous rejoindre et intéragir avec les serveurs ? En suggéré un nouveau ?</p>
        <a href="https://discord.gg/Vtv5skwAx5"><button type="button" class="btn btn-primary btn-lg btn-block">Venez
                rejoindre l'Antre des Loutres sur Discord</button></a>
    </div>
@endsection
