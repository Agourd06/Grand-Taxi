<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Chauffeur;
use App\Models\reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PassagerController extends Controller
{
    public function DriversPassanger(Request $request)
    {

        try {
            $query = Chauffeur::with('user')->where('Desponability', 'Available');
            if ($request->input('filtertrip')) {
                // $chauffeurs = Chauffeur::with('user')->where('Desponability', 'Available')->where('trip', $request->input('filtertrip'))->get();

                $query = $query->where('trip', $request->input('filtertrip'));
            } if ($request->input('filterCars')) {
                $query = $query->where('VoitureType', $request->input('filterCars'));

                // $chauffeurs = Chauffeur::with('user')->where('Desponability', 'Available')->where('VoitureType', $request->input('filterCars'))->get();
            }
            //  else {
            //     $chauffeurs = Chauffeur::with('user')->where('Desponability', 'Available')->get();
            // }
            $filtarge = Chauffeur::with('user')->where('Desponability', 'Available')->get();
            $chauffeurs = $query->get();


            

            return view('passengers.passager', [
                'chauffeurs' => $chauffeurs,
                'filtarge' => $filtarge,
            ]);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->view('errors.404', [], 404);
        }
    }
    public function Resevationdata(Request $request)
    {
        try {
            if ($request->input('driverId')) {
                $reservationtrip = Chauffeur::with('user')->where('Desponability', 'Available')->where('id', $request->input('driverId'))->firstOrFail();
            } else {
                $reservationtrip = '';
            }

            return view('passengers.AddReservation', [

                'DriverReservationtrip' => $reservationtrip,
            ]);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->view('errors.404', [], 404);
        }
    }
    public function confirmeResrvations(Request $request)
    {
        $data = $request->validate(
            [
                'trip' => 'required',
                'date' => 'required',
                'driver' => 'required',
                'driverId' => 'required',
            ],
            [
                'date.*' => 'Can You Give your trip a date'
            ]
        );
        $passagerId = Auth::id();

        $resrvation = new reservation;
        $resrvation->trip = $data['trip'];
        $resrvation->date = $data['date'];
        $resrvation->Chauffeur_id = $data['driverId'];
        $resrvation->passager_id = $passagerId;

        $resrvation->save();

        return redirect('/passager');
    }
    public function showUserProfile()
    {
        try {
            $userId = Auth::id();
            $user = User::findOrFail($userId);
            $passager = $user->Passager;
    
            return view('passengers.PassagerProfil', ['user' => $user, 'passager' => $passager]);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->view('errors.404', [], 404);
        }
    }
    
}
