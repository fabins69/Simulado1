<?php

namespace App\Livewire\Auth;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Login extends Component
{
    public $email = '';
    public $password = '';
    public $remember = false;

    public function login()
    {
        $credentials = $this->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ], [
            'email.required' => 'O email é obrigatório.',
            'email.email' => 'Formato de email inválido.',
            'password.required' => 'Senha obrigatória.',
        ]);

        if(!Auth::attempt($credentials, $this->remember)){
            session()->flash('error', 'email e senha invalidos');
        }

        $user = Auth::user();
        
        if(!$user->isAdmin()){
            Auth::logout();

            request()->session()->invalidate();
            request()->session()->regenerateToken();

            session()->flash('error', 'não autorizado');
        }

        request()->session()->regenerate();

        return redirect()->route('produto.index');
    }
          


    public function render()
    {
        return view('livewire.auth.login');
    }
}