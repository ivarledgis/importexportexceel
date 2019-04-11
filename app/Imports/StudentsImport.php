<?php

namespace App\Imports;

use App\Student;
use Maatwebsite\Excel\Concerns\ToModel;

class StudentsImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Student([
            'id'       => $row[0],
            'name'     => $row[1],
            'roll_no'  => $row[2], 
            'class'    => $row[3],
        ]);
    }
}
