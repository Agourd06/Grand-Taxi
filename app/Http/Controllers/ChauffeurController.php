<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Chauffeur;
use App\Models\route as ModelsRoute;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Route;

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
        $chauffeur->trip = $trip['Depart'] . '-' . $trip['Destination'];
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

    public function Disponibility()
    {
        try {
            $userId = Auth::id();
            $user = User::findOrFail($userId);
            $chauffeur = $user->chauffeur;

            return view('drivers.chauffeur', ['chauffeur' => $chauffeur]);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->view('errors.404', [], 404);
        }
    }
    public function ShowReHistory()
    {
        try {
            $userId = Auth::id();
            $chauffeurId = chauffeur::where('user_id', $userId)->value('id');


$route = new ModelsRoute;
$routes = $route
->where('chauffeur_id', $chauffeurId)
->where('chauffeurDelete', '0')
->get();



            return view('drivers.chauffeurHistorique', ['routes' => $routes]);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->view('errors.404', [], 404);
        }
    }
    public function DeletHistorique(Request $request)
    {
        $request->validate([
            'RouteId' => '',
        ]);
    
        $route = Route::find($request->RouteId);
    
        if ($route) {
            $route->update([
                'PassagerDelete' => '1',
            ]);
        }
    
        return redirect('/ChHistory');
    }
   
    
}

