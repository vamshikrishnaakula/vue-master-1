<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DemoRecord;
use League\Csv\Reader;

class DemoRecordController extends Controller
{

    public function uploadForm()
    {
        return view('uploadfile');
    }

    public function uploadFile(Request $request)
    {
        $data_2 = $request->input('data_2'); 
        return  $data_2;

        foreach ($data_2 as $data) {
            $item = new DemoRecord();
            $item->name = $data[0];
            $item->fathername = $data[1];
            $item->phonenumber = $data[2];
            $item->email = $data[3];
            $item->address = $data[4];
            $item->save();
        }
    
        return response()->json(['message' => 'Records uploaded successfully.']);
    
    }

    public function showRecords()
    {
        $records = DemoRecord::all();
        return view('records', compact('records'));
    }
}
