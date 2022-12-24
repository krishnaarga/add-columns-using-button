<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $session = session()->all();
        $students = $session['database']??[];
        return view('students', ['students'=>$students]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Form
        $request->request->remove('_token');
        $form_data = $request->all();
        
        // Session
        $session = session()->all();
        $session_database = $session['database']??[];
        array_push($session_database, $form_data);
        $request->session()->put('database', $session_database);

        session()->flash('message', 'Student Added in Session');
        return redirect('/students');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $session = session()->all();
        $student_details = $session['database'][$id];

        return view('student-edit', ['student_details'=>array_merge($student_details, ['id'=>$id])]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $id = $request->id;
        $session = session()->all();
        $session_database = $session['database'];    
        
        $session_database[$id]['name'] = $request->name;
        $session_database[$id]['email'] = $request->email;
        $session_database[$id]['age'] = $request->age;

        session()->put('database', $session_database);

        session()->flash('message', 'Student Updated successfully');
        return redirect('/students');

        
        // echo '<pre>';
        // print_r($session_database);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $session = session()->all();
        $session_database = $session['database'];

        unset($session_database[$id]);
        session()->put('database', $session_database);
        session()->flash('message', 'Student Deleted successfully');
        return redirect('/students');
    }
}
