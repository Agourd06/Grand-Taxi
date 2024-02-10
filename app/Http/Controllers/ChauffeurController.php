<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Chauffeur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChauffeurController extends Controller
{
    public function availibality(Request $request)
    {
        $availibality = $request->validate([
            'Desponability' => 'required|in:Available,Reserved,In Use',
        ], [

            'Desponability.*' => 'Availability is required Or invalide data.',

        ]);

        $user = Auth::user();
        $chauffeur = $user->chauffeur;
        $chauffeur->Desponability = $availibality['Desponability'];
        $chauffeur->save();
        return redirect('/chauffeur');
    }
    public function trip(Request $request)
    {
        $trip = $request->validate([
            'Depart' => 'required',
            'Destination' => 'required',
        ], [

            'Depart.*' => 'Departure is required',
            'Destination.*' => 'Destination is required',

        ]);

        $user = Auth::user();
        $chauffeur = $user->chauffeur;
        $chauffeur->Depart = $trip['Depart'];
        $chauffeur->Destination = $trip['Destination'];
        $chauffeur->save();
        return redirect('/chauffeur');
    }
    public function showUserProfile()
    {
        try {
            $userId = Auth::id();
            $user = User::findOrFail($userId);
            $chauffeur = $user->chauffeur;
    
            return view('drivers.ChauffeurProfil', ['user' => $user, 'chauffeur' => $chauffeur]);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->view('errors.404', [], 404);
        }
    }
    
    
    
}
