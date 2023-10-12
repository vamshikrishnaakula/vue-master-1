<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;

class demoController extends Controller
{
    public function index()
    {
        $items = Item::all();
        return view('index', compact('items'));
    }

    // public function store(Request $request)
    // {
    //     $item = new Item();
    //     $item->title = $request->input('title');
    //     $item->description = $request->input('description');
    //     $item->save();

    //     return redirect('/items');
    // }
    public function store(Request $request)
    {

        //return $request->all();
        $item = new Item;
        $item->title = $request->input('title');
        $item->description = $request->input('description');

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads'), $fileName);
            $item->file_path = 'uploads/' . $fileName;
        }

        $item->save();

        return redirect('/items');
    }

    public function ajax_index()
    {
        $items = Item::all();
        return view('ajaxpage', compact('items'));
    }
    public function storeAjax(Request $request)
    {
        $item = new Item();
        $item->title = $request->input('title');
        $item->description = $request->input('description');
        $item->save();

        // return response()->json(['message' => 'Item added successfully']);
        return response()->json([
            'message' => 'Item added successfully',
            'item' => $item
        ]);
    }
    //
    public function dial(Request $request)
    {
        return view('dial');
    }
    //
    public function makeCall(Request $request)
    {
        $response = [
            'message' => 'dialing...' . $request->input('phoneNumber'),
        ];
        return response()->json($response);
    }
}
