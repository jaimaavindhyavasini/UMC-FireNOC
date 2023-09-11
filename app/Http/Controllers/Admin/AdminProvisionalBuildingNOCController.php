<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Building_NOC;
use App\Models\NOC_Master;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class AdminProvisionalBuildingNOCController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($status)
    {
        $data = DB::table('building_noc AS t1')
                ->select('t1.*', 't2.*', 't1.id as P_NOC_ID')
                ->leftJoin('noc_master AS t2', 't2.id', '=', 't1.noc_mst_id' )
                ->where('t2.noc_mode', 5)  // ==== Renew Hospital NOC (status=5)
                ->where('t1.status', $status)
                ->whereNUll('t1.deleted_at')
                ->whereNUll('t2.deleted_at')
                ->orderBy('t1.id','DESC')
                ->get();
        // dd($data);

        return view('admin.building_noc.provisional_building_noc.grid')->with('data', $data)->with('status', $status);
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, $status)
    {
        $data = DB::table('building_noc as t1')
                ->select('t1.*', 't2.*')
                ->leftJoin('noc_master as t2', 't2.id', '=', 't1.noc_mst_id' )
                ->where('t2.noc_mode', 5)  // ==== Provisional Building NOC (status=5)
                ->where('t1.status', $status)
                ->where('t1.id', $id)
                ->whereNUll('t1.deleted_at')
                ->whereNUll('t2.deleted_at')
                ->first();

        return view('admin.building_noc.provisional_building_noc.view')->with('data', $data)->with('status', $status);
    }
}