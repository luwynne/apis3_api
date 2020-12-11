<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ImportProductsRequest;
use App\Http\Resources\{
    ProductResource,
    ProductsResource
};
use App\Http\Services\ProductService;
use App\Models\Product;


class ProductController extends Controller{

    private $product_service;

    public function __construct(){
        $this->product_service = new ProductService();
    }
    
    public function importProducts(ImportProductsRequest $request){
        $this->product_service->importProducts($request);
        return response()->json(['msg'=>'O arquivo de produtos esta sendo processado.']);
    }
    
    public function getProducts(){
        $products = $this->product_service->getProducts();
        return response()->json(new ProductsResource($products));
    }

    public function getProduct(Product $product){
        return response()->json(new ProductResource($product));
    }

    public function deleteProduct(Product $product){
        $this->product_service->deleteProduct($product);
        return response()->json(['msg'=>'O produto foi deletado.']);
    }

    public function getProductsImportStatus(){
        $status = $this->product_service->getProductsImportStatus();
        return response()->json(['msg' => $status]);
    }

}
