<?php

namespace App\Http\Controllers;
use Auth;
use App\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
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

        $res = new employee;
        $res->name = $request->input('name');
        $res->email = $request->input('email');
        $res->date_of_joining = $request->input('date_of_joining');
        $res->bio = $request->input('bio');
        $res->user_id = auth()->user()->id;
        $res->save();

        $request->session()->flash('msg', 'Employee added sucessfully');
        return redirect('home');

        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        //
        // $user_id = auth()->user()->id;
        // $user = Employee::find($user_id);
        //return view('home')->with('employeeArr',$user->$employee);

         //return view('home')->with('employeeArr',Employee::all());
         $data = Employee::where('user_id',Auth::id() )->get();
         //var_dump($data);
        // $employees = Employee::where('user_id', Auth::id());
         return view('home')->with('employeeArr', $data);
     }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee,$id)
    {
        //

        return view('edit')->with('employeeArr',Employee::find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employee)
    {
        //

        $res = Employee::find($request->id);
        $res->name = $request->input('name');
        $res->email = $request->input('email');
        $res->date_of_joining = $request->input('date_of_joining');
        $res->bio = $request->input('bio');
        $res->user_id = auth()->user()->id;
        $res->save();

        $request->session()->flash('msg', 'Employee updated sucessfully');
        return redirect('home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee,$id)
    {
        //
        Employee::destroy(array('id',$id));

        return redirect('home');
    }
}
