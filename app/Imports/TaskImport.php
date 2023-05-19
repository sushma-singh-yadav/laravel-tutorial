<?php

namespace App\Imports;

use App\Models\Task;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\withHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class TaskImport implements ToModel,withHeadingRow, WithValidation
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        print_r($row);
        return new Task([
            //
            'title' => $row['title'],
            'description' => $row['description'],
        ]);
    }

    public function rules(): array
    {
        return [
            'title' => 'required',
            'description' => 'required',
        ];
    }

    public function customValidationMessages(){
        return [
            'title.required' => 'Title field is required',
        ];
    }
}
