<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Exception;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{
    // Redirection vers Google pour l'authentification
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    // Callback pour gérer la réponse de Google
    public function handleGoogleCallback()
    {
        try {
            $googleUser = Socialite::driver('google')->stateless()->user();

            // Vérifier si l'utilisateur existe déjà dans la base de données
            $user = User::where('email', $googleUser->getEmail())->first();

            if ($user) {
                // L'utilisateur existe, connexion
                Auth::login($user);
            } else {
                // L'utilisateur n'existe pas, création de compte
                $user = User::create([
                    'name' => $googleUser->getName(),
                    'email' => $googleUser->getEmail(),
                    'google_id' => $googleUser->getId(),
                    'password' => bcrypt('password') // Ou vous pouvez générer un mot de passe aléatoire
                ]);

                Auth::login($user);
            }

            return redirect()->intended('dashboard'); // Rediriger après connexion
        } catch (Exception $e) {
            return redirect('auth/google');
        }
    }
}
