<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;
use App\Models\Box;
use App\Models\ExcelFile;
use Auth;
// use App\Models\Box;

class BoxController extends Controller
{
    //
    public function new() {
        if(Auth::check()){
            return view('boxes.new');
        }
        return abort(404);
        // $user = Auth::user();
        // dd($user->role_id);
    }
    public function all() {
        if(Auth::check()){
            $files = ExcelFile::All();
            return view('boxes.all',[
                'files' => $files
            ]);
        }
        // dd($boxes);
        return abort(404);
    }
    public function store(Request $request) {
        if(Auth::check()){
            $data = [
                "box_number" => $request->box_number,
                "box_date_consultation" => $request->box_date_consultation,
                "box_part_number" => $request->box_part_number,
                "box_issue" => $request->box_issue,
                "box_batch_number" => $request->box_batch_number,
                "sp_designation" => $request->sp_designation,
                "sp_claim_number" => $request->sp_claim_number,
                "sp_date_claim" => $request->sp_date_claim,
                "box_quantity" => $request->box_quantity,
                "box_good_part" => $request->box_good_part,
                "box_bad_part" => $request->box_bad_part,
                "box_rework" => $request->box_rework,
                "sp_name" => $request->sp_name,
                "sp_ref" => $request->sp_ref,
                "technicien" => $request->box_rework
            ];
            $box = new Box();
            $box->numero = $data['box_number'];
            $box->dateConsultation = $data['box_date_consultation'];
            $box->partNumber = $data['box_part_number'];
            $box->issue = $data['box_issue'];
            $box->batchNumbers = $data['box_batch_number'];
            $box->quantity = $data['box_quantity'];
            $box->goodParts = $data['box_good_part'];
            $box->ngParts = $data['box_bad_part'];
            $box->rework = $data['box_rework'];
            $box->supplierName = $data['sp_name'];
            $box->supplierReference = $data['sp_ref'];
            $box->supplierIssue = $data['sp_designation'];
            $box->supplierClaimNumber = $data['sp_claim_number'];
            $box->supplierDateClaim = $data['sp_date_claim'];
            $box->technicien = Auth::user()->name;
            $box->save();
            //  dd(Auth::user()->name);
            return redirect()->route('all');
        }
        return abort(404);
    }
    public function delete($id){
        if(Auth::check()){
            $box = Box::find($id);
            $box->delete();
            return redirect()->route('all');
        }
        return abort(404);
    }

    public function import() {
        return view('boxes.import');
    }

    public function upload(Request $request){
        $excelFile = new ExcelFile();
        $excelFile->supplier = $request->supplier;
        $excelFile->reference = $request->reference;
        $excelFile->technicien = Auth::user()->name;
        // $path = explode('/',$request->file->store('public'));
        $path = $request->file->store('public');
        $path = explode('/',$path);
        $excelFile->path = $path[1];
        $excelFile->save();
        $request->file->store('public');
        return 'Success !!';
    }
    public function download($id){
        $excelFile = ExcelFile::find($id);
        $file= public_path(). "\\storage\\" . $excelFile->path;
        $headers = array('Content-Type: application/xlsx');
        return Response::download($file,$excelFile->path, $headers);  
    }
}
