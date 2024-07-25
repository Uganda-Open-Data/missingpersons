<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VictimStatistics extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $statistics = array();

        $statistics['gender'] =DB::table('victims')->selectRaw('gender, COUNT(*) as value')->groupBy('gender')->pluck('value', 'gender');
        $statistics['status'] =DB::table('victims')->selectRaw('status, COUNT(*) as value')->groupBy('status')->pluck('value', 'status');
        $statistics['security_organs'] =DB::table('victims')->join('security_organs', 'security_organ_id', 'security_organs.id')->selectRaw('security_organs.name as name, COUNT(*) as value')->groupBy('security_organ_id')->pluck('value', 'name');
        $statistics['holding_locations'] =DB::table('victims')->join('holding_locations', 'holding_location_id', 'holding_locations.id')->selectRaw('holding_locations.name as name, COUNT(*) as value')->groupBy('holding_location_id')->pluck('value', 'name');

        return response()->json(["data" =>$statistics]);
    }
}
