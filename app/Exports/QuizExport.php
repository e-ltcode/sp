<?php
  
namespace App\Exports;
  
use App\Quiz;
use Maatwebsite\Excel\Concerns\FromCollection;
  
class QuizExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Quiz::all();
    }
}