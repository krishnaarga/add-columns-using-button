<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Addcolumn;
use Illuminate\Support\Facades\Schema;

class AddcolumnController extends Controller
{
    public function columns(){
        $columns = Schema::getColumnListing('addcolumns');
        $students = Addcolumn::get();

        return view('columns', ['columns'=>$columns, 'students'=>$students]);
    }
    public function AddColumns(Request $request){
        $request->request->remove('_token');

        foreach($request->all() as $req_key => $req_value){
            foreach ($req_value as $key => $value) {
                Addcolumn::where('id', $req_key)->update([$key=>$value]);
            }
        }
    }
}
