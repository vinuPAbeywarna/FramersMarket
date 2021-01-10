<?php

namespace App\Http\Controllers;

use App\Models\ReportModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ReportController extends Controller
{
    public function AddReport(Request $request)
    {
        try {
            $newReport = new ReportModel();
            $newReport->FarmerNIC = Session::get('NIC');
            $newReport->HarvestType = $request->input('HarvestType');
            $newReport->Amount = $request->input('Amount');
            $newReport->WAmount = $request->input('WAmount');
            $newReport->Lat = $request->input('Lat');
            $newReport->Lang = $request->input('Lang');
            $newReport->District = $request->input('District');
            $newReport->Description = $request->input('Description');
            $newReport->save();
            return view('Submitreport');
        } catch (\Exception $e) {
            return response($e, 200);
        }
    }

    public function setStatus(Request $request){
        //return response($request->has('BUY'));
        if ($request->has('BUY')){
            ReportModel::where('id','=',$request->get('ID'))->update(['SaleStatus'=>'Bought']);
        } else if ($request->has('IGNORE')){
            ReportModel::where('id','=',$request->get('ID'))->update(['SaleStatus'=>'Ignored']);
        } else if ($request->has('Status')){
            ReportModel::where('id','=',$request->get('ID'))->update(['Status'=>$request->get('Status')]);
        }
        return redirect()->back();
    }

    public function showGraphs()
    {
        $Reports = ReportModel::get();

        $Waste = 0;
        $Amount = 0;

        foreach ($Reports as $rp) {
            $Waste = $Waste + $rp->WAmount;
            $Amount = $Amount + $rp->Amount;
        }

        $Wastage = [
            $Waste, $Amount
        ];

        $HarvestGraph = [
            ReportModel::where('HarvestType', '=', 'Vegetables')->count(),
            ReportModel::where('HarvestType', '=', 'Fruits')->count(),
            ReportModel::where('HarvestType', '=', 'Nuts')->count(),
            ReportModel::where('HarvestType', '=', 'Grain')->count(),
        ];

        $Location = [

            ReportModel::where('District', '=', 'Hambanthota')->count(),
            ReportModel::where('District', '=', 'Jaffna')->count(),
            ReportModel::where('District', '=', 'Colombo')->count(),
            ReportModel::where('District', '=', 'Galle')->count(),


        ];



        if (Session::get('Logged')) {
            //return response($HarvestGraph,200);
            return view('Graphs')->with(['HarvestGraph' => $HarvestGraph, 'Wastage' => $Wastage, 'Location'=>$Location]);
        } else {
            return redirect()->route('SignIn');
        }
    }

    public function DeleteReport(Request $request)
    {
        ReportModel::where('id','=',$request->get('id'))->delete();
        return redirect()->back();
    }

    public function UpdateReport(Request $request, $id)
    {
        $Report =  ReportModel::where('id','=',$id)->first();
        return view('UpdateReport')->with(['Report'=>$Report]);

    }


    public function UpdateReportSave(Request $request)
    {
        ReportModel::where('id','=',$request->get('id'))->update([
            'HarvestType'=>$request->get('HarvestType'),
            'Amount'=>$request->get('Amount')
        ]);
    }
}
