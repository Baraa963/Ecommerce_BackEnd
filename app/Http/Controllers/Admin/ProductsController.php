<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use Illuminate\Http\Request;
use App\Models\Products;

class ProductsController extends Controller
{
    public function AllProductsView()
    {
        $result = Products::all();
        return response()->json($result);
    }

    // Sadece ürün başlıklarını döndürür
    public function ProductCategory()
    {
        $Category = Products::pluck('productCategory'); // Ürün başlıklarını alır
        return response()->json($Category);
    }
    public function ProductsTitle()
    {
        $Category = Products::pluck('productTitle'); // Ürün başlıklarını alır
        return response()->json($Category);
    }

    public function getProductsByTitle(Request $request)
    {
        // 'title' query parametresini al
        $title = $request->query('title');

        if ($title !== "All products") {
            // 'productTitle' alanında arama yap
            $products = Products::where('productTitle', 'LIKE', "%$title%")->get();
            return response()->json($products);
        } else {
            // Eğer title parametresi yoksa tüm ürünleri döndür
            $products = Products::all();
            return response()->json($products);
        }
    }

    public function createProduct(ProductRequest $request)
    {

        // Products::query()->create();

        $attributes = $request->validated();

        Products::query()->create($attributes);

        return response()->json([200, "The product added successfully"]);
    }


    // public function MenProductsView()
    // {
    // $menProducts = Products::where('productCategory', 'men')->get();
    // return response()->json($menProducts);
    // }

    // public function WomenProductsView()
    // {
    // $womenProducts = Products::where('productCategory', 'women')->get();
    // return response()->json($womenProducts);
    // }

    // public function KidsProductsView()
    // {
    // $kidsProducts = Products::where('productCategory', 'kids')->get();
    // return response()->json($kidsProducts);
    // }


}
