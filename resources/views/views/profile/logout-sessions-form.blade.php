<x-action-section>
    <x-slot name="title">
        {{ __('Déconnexion') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Permet de te déconnecter de ta session actuelle.') }}
    </x-slot>

    <x-slot name="content">
        <div class="max-w-xl text-sm text-gray-600">
            {{ __("Cette action ne t'empêche bien sur pas de te connecter plus tard.") }}
        </div>

        <div class="flex items-center mt-5">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <x-danger-button href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();">
                    <i class="fa fa-sign-out"></i>{{ __('Logout') }}
                </x-danger-button>
            </form>

            <!-- In your Blade view
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                -- <button type="submit" class="btn btn-danger">Déconnexion</button>
            </form> -->
            
            <x-action-message class="ms-3" on="loggedOut">
                {{ __('Fait !') }}
            </x-action-message>
        </div>
    </x-slot>
</x-action-section>
