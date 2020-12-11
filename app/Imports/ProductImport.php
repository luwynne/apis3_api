<?php

namespace App\Imports;

use App\Models\Product;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class ProductImport implements ToCollection{

    public function collection(Collection $rows){

        // aqui saltamos o header da planilha e filtramos os dados
        $rows = $rows->skip(1)->filter(function ($row) {
            return ! empty($row[0]) && ! empty($row[1]) && ! empty($row[2]);
        });

        foreach ($rows as $row) {
            Product::create([
                'id_externo' => $row[0],
                'nome' => $row[1],
                'quantidade' => $row[2]
            ]);
        }
    }

}