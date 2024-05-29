@extends('layouts.classement')

@section('title', 'Statistique du joueur')

@section('content')
    @if ($username == null)
    <div class="alert alert-warning" role="alert">
        Merci de choisir un joueur pour lequel vous souhaitez voir ses statistiques.
    </div>
    @else
        <!-- Contenu spécifique à la page de détails d'un serveur -->
        <h1>Statistique du joueur {{ $username }} <img src="https://mc-heads.net/avatar/{{ $username }}/50"
                alt="Tête Minecraft"></h1>
        <div class="table-responsive">

            @if ($joueurStats->isEmpty())
                <div class="alert alert-warning" role="alert">
                    Ce joueur n'a pas de statistiques de jeu sur nos serveurs.
                </div>
            @else
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">Nom du serveur</th>
                            <th scope="col">Temps de jeu</th>
                            <th scope="col">Nombre de morts</th>
                            <th scope="col">Distance parcourue</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($joueurStats as $stat)
                            <tr>
                                <td>{{ $stat->nom_serv }}</td>
                                <td>{{ $stat->temp_jeux }}h</td>
                                <td>{{ $stat->nb_mort }}</td>
                                <td>{{ $stat->distTotale }} bloc</td>
                                @if ($admin == 1)
                                    <td>
                                        <form id="delete-form-{{ $stat->id }}"
                                            action="{{ route('admin-deleteStats', ['id_stats' => $stat->id, 'username' => $username]) }}"
                                            method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" class="btn btn-sm btn-danger"
                                                onclick="confirmDelete({{ $stat->id }})">Supprimer</button>
                                        </form>
                                    </td>
                                @endif
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
        <script>
            // Fonction pour afficher une boîte de dialogue de confirmation avant de supprimer le serveur
            function confirmDelete(statId) {
                if (confirm('Êtes-vous sûr de vouloir supprimer ce serveur?')) {
                    var deleteForm = document.getElementById('delete-form-' + statId);
                    deleteForm.submit();
                }
            }
        </script>
    @endif
@endsection
