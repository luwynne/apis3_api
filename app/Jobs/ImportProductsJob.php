<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Imports\ProductImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\{
    JobTrack,
    Product
};

class ImportProductsJob implements ShouldQueue{

    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected function start(){

        // esvaziando a tabela antes de começar a importar
        $products = Product::all();
        if($products->count() > 0){
            $products->each(function($product){
                $product->delete();
            });
        }
        // nosso proprio log salvo no banco
        $job_track = new JobTrack();
        $job_track->nome_job = get_class($this);
        $job_track->status = 'EM_PROGRESSO';
        $job_track->save();

        return true;
    }

    public function handle(){
        if($this->start()){
            // usando a library oficial do Laravel para importacao de dados do Excel
            Excel::import(new ProductImport, storage_path('app/imports/produtos/produtos.xlsx'));
        }
    }

}
