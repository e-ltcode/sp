<?php
   
namespace App\Imports;
   
use App\Models\Quiz;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
    
class QuizImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Quiz([
            'quiz_title'     => $row['quiz_title'],
            'quiz_description'    => $row['quiz_description'], 
            'price'    => $row['price'], 
            'status'    => $row['status'], 
            'created_by'    => $row['created_by'],
        ]);
    }
}