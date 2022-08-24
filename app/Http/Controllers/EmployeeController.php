<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Image;
use League\CommonMark\Extension\DescriptionList\Parser\DescriptionTermContinueParser;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('employees.index', [
            'employees' => Employee::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('employees.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $validated = $request->validate([
        'nip' => 'required',
        'name' => 'required',
        'gender' => 'required',
        'address' => 'required',
        'handphone' => 'required',
        'picture' => 'required',
       ]);
       $originalImage = $validated['picture'];
       $img = Image::make($originalImage)->resize(150,150);
       $imgName = $originalImage->getClientOriginalName();
       $img->save($imgName, 60);
        //    input to database.
       $employee = new Employee();
       DB::beginTransaction();
       try {
        $employee->nip = $validated['nip'];
        $employee->name = $validated['name'];
        $employee->gender = $validated['nip'];
        $employee->address = $validated['address'];
        $employee->handphone = $validated['handphone'];
        $employee->picture = $imgName;
        $employee->save();
        DB::commit();
        return to_route('employee.index')->with('success', 'Employee created successfully!');
       } catch (\Exception $e) {
        DB::rollBack();
        return $e;
       }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('employees.show', [
            'employee' => Employee::findOrFail($id),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('employees.edit', [
            'employee' => Employee::findOrFail($id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nip' => 'required',
            'name' => 'required',
            'gender' => 'required',
            'address' => 'required',
            'handphone' => 'required',
            'picture' => 'required',
           ]);
           $originalImage = $validated['picture'];
           $img = Image::make($originalImage)->resize(150,150);
           $imgName = $originalImage->getClientOriginalName();
           $img->save($imgName, 60);

           $employee = Employee::findOrFail($id);
           $employee->update([
            'nip' => $validated['nip'],
            'name' => $validated['name'],
            'gender' => $validated['nip'],
            'address' => $validated['address'],
            'handphone' => $validated['handphone'],
            'picture' => $imgName,
           ]);
           return to_route('employee.index')
            ->with('success', 'Employee was updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employee = Employee::findOrFail($id);
        $employee->delete();
        return to_route('employee.index')
            ->with('success', 'Employee was destroyed!');
    }
}
