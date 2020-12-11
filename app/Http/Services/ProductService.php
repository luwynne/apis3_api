<?php

namespace App\Http\Services;

use Storage;
use File;

use App\Jobs\ImportProductsJob;
use App\Models\{
    JobTrack,
    Product
};

class ProductService{

    public function importProducts($request){
        // deletando tabela antiga de produto se existente
        if(File::exists(storage_path('imports/produtos/produtos.xlsx'))){
            File::delete(storage_path('imports/produtos/produtos.xlsx'));
        }

        // salvando no storage local para porteriormente ser usado na execucao do job
        Storage::disk('local')->put('imports/produtos/produtos.xlsx',$request->file('produtos')->get());

        // job processara a insercao dos produtos dentro do banco
        ImportProductsJob::dispatch();
        return true;
    }
    
    public function getProducts(){
        $products = Product::all();
        return $products;
    }

    public function deleteProduct($product){
        $product->delete();
        return true;
    }

    public function getProductsImportStatus(){
        $job_track = JobTrack::where('nome_job', ImportProductsJob::class)->orderBy('created_at', 'desc')->first();
        return $job_track ? $job_track->status : null;
    }

}