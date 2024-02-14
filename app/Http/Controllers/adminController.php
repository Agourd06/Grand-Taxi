<?php

namespace App\Http\Controllers;

use App\Models\Chauffeur;
use App\Models\passager;
use App\Models\reservation;
use Illuminate\Http\Request;

class adminController extends Controller
{
    public function AdminDashboard()
    {

        $driversCount = Chauffeur::count();
        $passengerCount = passager::count();
        $ResrvationsCount = reservation::count();
        $Resrvations = reservation::all();

        return view('admin.admin', [
            'driversCount' => $driversCount,
            'passengerCount' => $passengerCount,
            'ResrvationsCount' => $ResrvationsCount,
            'Resrvations' => $Resrvations,
        ]);
    }
    public function AdminUsers()
    {


        $chauffeurs = chauffeur::with('user')->get();
        $passagers = passager::with('user')->get();

        return view('admin.AdminUsers', [
            'chauffeurs' => $chauffeurs,
            'passagers' => $passagers,

        ]);
    }
    public function archive(Request $request)
    {
        $reservationId =  $request->input('ReservationId');
        $Archive =  $request->input('archiveRe');
       
            reservation::where('id', $reservationId)
                ->update([
                    'archive' => $Archive,

                ]);
        
        return redirect('/admin');
    }
    public function archiveUser(Request $request)
    {
        try {
            $userId =  $request->input('UserId');
            if ($request->input('role') === 'passager') {
                passager::where('id', $userId)
                    ->update([
                        'archive' => $request->input('archiveUs'),

                    ]);
            }
            if ($request->input('role') === 'chauffeur') {
                chauffeur::where('id', $userId)
                    ->update([
                        'archive' => $request->input('archiveUs'),

                    ]);
            }
            return redirect('/AdminUsers');
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->view('errors.404', [], 404);
        }
    }
}
