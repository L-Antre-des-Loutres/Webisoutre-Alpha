<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <img src="../images//logo/logo.png" alt="Antre des Loutres" style="height: 7em">
        </x-slot>

        <div class="mb-4 text-sm text-gray-600">
            {{ __('Tu ne te souviens plus de ton mot de passe ?') }}<br><br>
            {{ __('Pas de soucis, donne-nous ton mail et Arisoutre enverra un mail pour réinitialiser ton mot de passe.') }}
        </div>

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <div class="block">
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                    {{ __('Retour') }}
                </a>

                <x-button class="ms-4">
                    {{ __('Réinitialiser mon mot de passe') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>
