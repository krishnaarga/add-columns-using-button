<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Addcolumn;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Redirect;


class AddcolumnController extends Controller
{
    public function columns(){
        $columns = Schema::getColumnListing('addcolumns');
        $students = Addcolumn::get();

        return view('columns', ['columns'=>$columns, 'students'=>$students]);
    }
    public function AddColumns(Request $request){
        $request->request->remove('_token');

        $columns = Schema::getColumnListing('addcolumns');
        $last_column = end($columns);
        $last_column_exp = explode('column', $last_column);
        $last_column_num = end($last_column_exp);


        $form_column = array_keys(array_values($request->all())[0]);
        $form_last_column = end($form_column);
        $form_last_column_exp = explode('column', $form_last_column);
        $form_last_column_num = end($form_last_column_exp);


        if($form_last_column_num > $last_column_num){
            $last_column_num = $last_column_num+1; 

            $items = [];
            for ($i=$last_column_num; $i <= $form_last_column_num; $i++) { 
                $create_column = 'column'.$last_column_num++;
                $items[] = $create_column;
            }

            foreach ($items as $i => $item) {
                Schema::table('addcolumns', function (Blueprint $table) use ($item) {
                    $table->string($item)->nullable();
                });
            }
        }

        foreach($request->all() as $req_key => $req_value){
            foreach ($req_value as $key => $value) {
                Addcolumn::where('id', $req_key)->update([$key=>$value]);
            }
        }

        session()->flash('message', 'Added Column and update value');
        return redirect('/columns');
    }
}
