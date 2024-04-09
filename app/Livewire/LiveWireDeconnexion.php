<?php

namespace App\Livewire;

use Livewire\Component;

class LiveWireDeconnexion extends Component
{
    public function logout()
    {
        return view('profile.logout-sessions-form');
    }

    public function render()
    {
        return view('profile.logout-sessions-form');
    }
}
