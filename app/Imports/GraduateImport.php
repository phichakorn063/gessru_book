<?php

namespace App\Imports;

use App\Graduate;
use App\User;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class GraduateImport implements ToCollection
{
    public function collection(Collection $rows)
    {
        
        foreach ($rows as $no=>$row) 
        {
            if($no > 0){
                $exists = Graduate::where('studentCode', $row[1])->exists();
                if(!$exists){
                    Graduate::create([
                        'numberGraduate'=> $row[0],
                        'studentCode'=> $row[1],
                        'name'=> $row[2],
                        'description'=> $row[3],
                        'type_photo'=> 1,
                        'photo'=> "/student/".$row[1].".jpg",
                        'stauts'=>1
                    ]);
                }
            }
        }
    }
}
