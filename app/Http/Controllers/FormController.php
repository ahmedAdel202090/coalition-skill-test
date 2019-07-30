<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FormController extends Controller
{
    public function submit(Request $request)
    {
        $data=$request->all();
        $storgeJson=Storage::disk('local')->get('data.json');
        $storgeData=json_decode($storgeJson);
        if($storgeData==null)
        {
            $storgeData=[];
        }
        array_push($storgeData,$data);
        Storage::disk('local')->put('data.json',json_encode($storgeData));
        return redirect('/');
    }
    public function fetchDetails()
    {
        $storgeJson=Storage::disk('local')->get('data.json');
        $storgeData=json_decode($storgeJson);
        return view('form')->with('data',$storgeData);
    }
    public function update(Request $request)
    {
        $id=$request->input('id');
        $storgeJson=Storage::disk('local')->get('data.json');
        $storgeData=json_decode($storgeJson);
        $updatedData=[];
        foreach($storgeData as $row)
        {
            if($row['_token']==$id)
            {
                $row['product']=$request->input('product');
                $row['quantity']=$request->input('quantity');
                $row['price']=$request->input('price');
            }
            array_push($updatedData,$row);
        }
        Storage::disk('local')->put('data.json',json_encode($updatedData));
        return redirect('/');
    }
}
