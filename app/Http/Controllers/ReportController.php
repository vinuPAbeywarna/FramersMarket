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

    public function showGraphs(){

        $Reports = ReportModel::get();

        $Waste = 0;
        $Amount = 0;

        foreach($Reports as $rp){
            $Waste = $Waste + $rp->WAmount;
            $Amount = $Amount + $rp->Amount;
        }

        $Wastage = [
            $Waste,$Amount
        ];

        $HarvestGraph = [
            ReportModel::where('HarvestType','=','Vegetables')->count(),
            ReportModel::where('HarvestType','=','Fruits')->count(),
            ReportModel::where('HarvestType','=','Nuts')->count(),
            ReportModel::where('HarvestType','=','Grain')->count(),
        ];



        if (Session::get('Logged')){
            //return response($HarvestGraph,200);
            return view('Graphs')->with(['HarvestGraph'=>$HarvestGraph, 'Wastage'=>$Wastage]);
        } else {
            return redirect()->route('SignIn');
        }
    }
}
