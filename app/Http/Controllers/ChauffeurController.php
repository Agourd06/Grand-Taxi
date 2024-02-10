<?php

namespace App\Http\Controllers;

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
}
