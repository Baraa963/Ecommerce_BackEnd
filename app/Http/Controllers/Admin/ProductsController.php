<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Validator;

use App\Http\Controllers\Controller;
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

        if ($title !=="All products") {
            // 'productTitle' alanında arama yap
            $products = Products::where('productTitle', 'LIKE', "%$title%")->get();
            return response()->json($products);
        } else {
            // Eğer title parametresi yoksa tüm ürünleri döndür
            $products = Products::all();
            return response()->json($products);
        }
    }
    
    
    public function setNewProduct(Request $request)
    {
        $request->validate([
            'productTitle' => 'required|string|max:255',
            'productPrice' => 'required|numeric',
            'productDescription' => 'required|string',
            'productRating' => 'required|numeric|min:0|max:5',
            'productCategory' => 'required|string',
            'productImg' => 'nullable|url',
        ]);
    
        
        Products::create([
            'productTitle' => $request->input('productTitle'),
            'productPrice' => $request->input('productPrice'),
            'productDescription' => $request->input('productDescription'),
            'productRating' => $request->input('productRating'),
            'productCategory' => $request->input('productCategory'),
            'productImg' => $request->input('productImg'),
        ]);
    
        return response()->json(['message' => 'Product added successfully'], 201);
    }
    
 
}
