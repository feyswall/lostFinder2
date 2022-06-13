<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    // ?php
 
    // namespace App\Http\Controllers;
     
    // use Illuminate\Http\Request;
     
    // use DB;
     
    // class LocationController extends Controller
    // {
    //     // ---------------- [ Load View ] ----------------
    //     public function index(Request $request) {
     
    //                 $lat = YOUR_CURRENT_LATTITUDE;
    //         $lon = YOUR_CURRENT_LONGITUDE;
                
    //         $data = DB::table("users")
    //             ->select("users.id"
    //                 ,DB::raw("6371 * acos(cos(radians(" . $lat . ")) 
    //                 * cos(radians(users.lat)) 
    //                 * cos(radians(users.lon) - radians(" . $lon . ")) 
    //                 + sin(radians(" .$lat. ")) 
    //                 * sin(radians(users.lat))) AS distance"))
    //                 ->groupBy("users.id")
    //                 ->get();
     
    //       dd($data);
    //     }
    // }







    // $gr_circle_radius = 6371;
    // $max_distance = 500;

    // $distance_select = sprintf(
    //                               "           
    //                               ( %d * acos( cos( radians(%s) ) " .
    //                                       " * cos( radians( lat ) ) " .
    //                                       " * cos( radians( long ) - radians(%s) ) " .
    //                                       " + sin( radians(%s) ) * sin( radians( lat ) ) " .
    //                                   " ) " . 
    //                               ")
    //                                ",
    //                               $gr_circle_radius,               
    //                               $lat,
    //                               $long,
    //                               $lat
    //                              );

    //   $properties = Property::select('*')
    //   ->having(DB::raw($distance_select), '<=', $max_distance)
    //   ->groupBy('properties.id')->paginate(1);








}
