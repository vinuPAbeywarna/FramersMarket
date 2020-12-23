<?php

namespace App\Http\Controllers;

use App\Models\ReportModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ReportController extends Controller
{
    public function AddReport(Request $request){
        try{
            $newReport = new ReportModel();
            $newReport->FarmerNIC = Session::get('NIC');
            $newReport->HarvestType = $request->input('HarvestType');
            $newReport->Amount = $request->input('Amount');
            $newReport->WAmount = $request->input('WAmount');
            $newReport->Lat = $request->input('Lat');
            $newReport->Lang = $request->input('Lang');
            $newReport->Description = $request->input('Lang');
            $newReport->save();
            return view('Submitreport');
        } catch (\Exception $e){
            return response($e,200);
        }
    }
}
