<?php

namespace App\Http\Controllers;

use App\Exports\EmployeesExport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ReportController extends Controller
{
    public function index()
    {
        return Excel::download(new EmployeesExport, 'Data-employees.xlsx');
    }
}
