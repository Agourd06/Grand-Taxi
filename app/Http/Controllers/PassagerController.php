<?php

namespace App\Http\Controllers;

use Log;
use App\Models\User;
use App\Models\route;
use App\Models\passager;
use App\Models\Chauffeur;
use App\Models\reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class PassagerController extends Controller
{
    public function DriversPassanger(Request $request)
    {

        try {
            $query = Chauffeur::with('user')->where('Desponability', 'Available')->where('archive', '0');
            if ($request->input('filtertrip')) {

                $query = $query->where('trip', $request->input('filtertrip'));
            }
            if ($request->input('filterCars')) {
                $query = $query->where('VoitureType', $request->input('filterCars'));
            }
            if ($request->input('filterNote') !== null || in_array($request->input('filterNote'), ['1', '2', '3', '4', '5'])) {
                $averageRating = $request->input('filterNote');

                $query = $query->whereRaw('ROUND(average) = ?', [$averageRating]);

                // $maxrating = $request->input('filterNote') + 0.9;
                // $query = $query->whereBetween('average', [$request->input('filterNote'), $maxrating]);
            }

            $chauffeurs = $query->get();

            $trips = Chauffeur::with('user')->where('Desponability', 'Available')->groupBy('trip')->get();
            $carTypes = Chauffeur::with('user')->where('Desponability', 'Available')->groupBy('VoitureType')->get();



            return view('passengers.passager', [
                'chauffeurs' => $chauffeurs,
                'trips' => $trips,
                'carTypes' => $carTypes,
                'scrollToId' => 'DriversContainer',
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
        $userId = Auth::id();
        $passagerId = Passager::where('user_id', $userId)->value('id');

        // Create new reservation 
        $resrvation = new reservation;
        $resrvation->trip = $data['trip'];
        $resrvation->date = $data['date'];
        $resrvation->Chauffeur_id = $data['driverId'];
        $resrvation->passager_id = $passagerId;


        $resrvation->save();
        // Create new Road
        $route = new route;
        $route->trip = $data['trip'];
        $route->date = $data['date'];
        $route->Chauffeur_id = $data['driverId'];
        $route->passager_id = $passagerId;

        $route->save();




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
    public function showPaHistory()
    {
        try {
            $userId = Auth::id();
            $passagerId = Passager::where('user_id', $userId)->value('id');

            $routes = Route::with('passager.user')
                ->where('passager_id', $passagerId)
                ->where('passagerDelete', '0')
                ->orderby('id', 'Desc')
                ->get();





            return view('passengers.HistoriquePassager', ['routes' => $routes]);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->view('errors.404', [], 404);
        }
    }

    public function favorit(Request $request)
    {
        $request->validate([
            'favori' => 'required',
            'tripname' => 'required',

        ]);




        Route::where('trip', $request->tripname)
            ->update([
                'favori' => $request->favori,

            ]);
        return redirect('/PaHistory');
    }

    public function favoritRoads()
    {

        $userId = Auth::id();
        $passagerId = Passager::where('user_id', $userId)->value('id');
$favoritRoads = Route::where('favori', '1')
    ->where('passager_id', $passagerId)
    ->orderBy('id', 'DESC')
    ->groupby('trip')
    ->get();




        return view('/passengers.favorite', ['favoritRoads' => $favoritRoads]);
    }
    public function noter(Request $request)
    {
        $request->validate([
            'note' => 'required',
            'routeId' => 'required',
        ]);

        Route::where('id', $request->routeId)
            ->update([
                'note' => $request->note,
            ]);

        $chauffeurId = Route::where('id', $request->routeId)->value('chauffeur_id');

        $averageValue = Route::where('chauffeur_id', $chauffeurId)->avg('Note');

        $chauffeur = Chauffeur::find($chauffeurId);
        $averageValues = number_format($averageValue, 2, '.', '');

        $chauffeur->average = $averageValues - 1;
        $chauffeur->save();

        return redirect('/PaHistory');
    }

    public function DeleteReservation(Request $request)
    {
        $request->validate([
            'reservationId' => 'required',
        ]);

        DB::table('Reservations')->where('id', $request->reservationId)->delete();
        return redirect('/PaReservation');
    }
    public function deleteDoneReservation(Request $request)
    {
        $request->validate([
            'reservationId' => 'required',
        ]);

        DB::table('Reservations')->where('id', $request->reservationId)->delete();
        return redirect('/PaHistory');
    }
    public function DeletHistorique(Request $request)
    {
        $request->validate([
            'RouteId' => '',
        ]);

        Route::where('id', $request->RouteId)
            ->update([
                'passagerDelete' => '1',

            ]);
        return redirect('/PaHistory');
    }


    public function PaReservation()
    {
        try {
            $userId = Auth::id();
            $passagerId = Passager::where('user_id', $userId)->value('id');

            $reservations = reservation::with('passager.user')
                ->where('passager_id', $passagerId)
                ->where('archive', '0')
                ->orderby('id', 'DESC')
                ->get();


            $time = now();
            $timenow = $time->timestamp;


            return view('passengers.Reservations', ['reservations' => $reservations, 'timenow' => $timenow]);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->view('errors.404', [], 404);
        }
    }
}
