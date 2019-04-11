<?php

namespace App\Http\Controllers;

use App\Exports\StudentsExport;
use App\Imports\StudentsImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use App\Student;


class StudentController extends Controller
{

    
    public function index()
    {
        
        $students = Student::orderby('id', 'desc')->get();
        return view('students.index', compact('students'));
    }

    public function export() 
    {
        return Excel::download(new StudentsExport, 'students.xlsx');
    }
   
    public function import() 
    {
        Excel::import(new StudentsImport,request()->file('file'));
        // Excel::import(new StudentsImport,'C:\Users\ivarl\Downloads\users (2).xlsx');
           
        return back()->with('success', 'You have successfully exported file');
    }
}
