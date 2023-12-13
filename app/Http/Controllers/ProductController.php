<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use GuzzleHttp\Handler\Proxy;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    // ========================================
    // ========= RETURN ALL PRODUCT ===========
    // ========================================
    public function returnProducts()
    {
        $products = Product::query()
            ->orderBy('id', "DESC")
            ->get();

        // return response()->json($products);

        return response()->view('home', [
            'title' => 'Data Products',
            'products' => $products,
            'total' => count($products),
        ]);
    }

    // ========================================
    // =========== PRODUCT DETAIL =============
    // ========================================
    public function productDetail(Request $request, string $id)
    {
        $product = Product::query()->find($id);

        // return response()->json($product->toArray());

        if (!is_null($product)) {
            return response()->view('/product-detail', [
                'title' => 'Update Product',
                'product' => $product
            ]);
        } else {
            return redirect()->route('home')->with('message', 'Product ' . '"' . $id . '"' . ' not found!');
        }
    }

    // ========================================
    // =========== PRODUCT DETAIL =============
    // ========================================
    public function updateProduct(Request $request)
    {
        $id = $request->input('id');
        $name = $request->input('name');
        $price = $request->input('price');
        $qty = $request->input('qty');

        $product = Product::query()->find($id);
        // return response()->json($product);

        if (!is_null($product)) {

            try {
                $product->id = $id;
                $product->name = $name;
                $product->price = $price;
                $product->qty = $qty;

                $result = $product->update();
            } catch (QueryException $error) {
                return redirect()->action([ProductController::class, 'productDetail'], ['id' => $id])->with('message', $error->getMessage());
            }

            if ($result) {
                return redirect()->action([ProductController::class, 'productDetail'], ['id' => $id])->with('message', 'Successfuly Updated');
            } else {
                return redirect()->action([ProductController::class, 'productDetail'], ['id' => $id])->with('message', 'Error Occured!');
            }
        } else {
            return redirect()->action([ProductController::class, 'productDetail'], ['id' => $id])->with('message', 'Product Not Found!');
        }
    }
    // public function updateOrCreateProduct(Request $request)
    // {
    //     $id = $request->input('id');
    //     $name = $request->input('name');
    //     $qty = $request->input('qty');

    //     $product = Product::query()->find($id);
    //     // return response()->json($product);

    //     if (!is_null($product)) {

    //         $product->id = $id;
    //         $product->name = $name;
    //         $product->qty = $qty;

    //         $result = $product->update();

    //         if ($result) {
    //             return redirect()->action([ProductController::class, 'productDetail'], ['id' => $id])->with('message', 'Successfuly Updated');
    //         } else {
    //             return redirect()->action([ProductController::class, 'productDetail'], ['id' => $id])->with('message', 'Error Occured!');
    //         }
    //     } else {
    //         // return redirect()->action([ProductController::class, 'productDetail'], ['id' => $id])->with('message', 'Product Not Found!');

    //         try {
    //             Product::create([
    //                 'id' => $id,
    //                 'name' => $name,
    //                 'qty' => $qty,
    //             ]);
    //         } catch (QueryException $error) {

    //             return redirect()->back()->with("message", $error->getMessage());
    //         }
    //     }
    // }

    // ========================================
    // ========== REGISTRY PRODUCT ============
    // ========================================
    public function registryProduct()
    {
        return response()->view('registry-product', [
            'title' => 'Registry Product',
        ]);
    }

    // ========================================
    // ========== REGISTER PRODUCT ============
    // ========================================
    public function registerProduct(Request $request)
    {
        $id = $request->input('id');
        $name = $request->input('name');
        $price = $request->input('price');
        $qty = $request->input('qty');

        $product = Product::query()->find($id);

        if (!empty($id) && !empty($name) && !empty($price) && !empty($qty)) {

            if (!is_null($product)) {
                return redirect()->back()->with('message', 'Product already exist!');
            } else {

                try {
                    Product::create([
                        'id' => $id,
                        'name' => $name,
                        'price' => $price,
                        'qty' => $qty,
                    ]);
                } catch (QueryException $error) {
                    return redirect()->back()->with("message", $error->getMessage() . " ⚠️");
                }

                return redirect()->back()->with('message', 'Product successfully saved!');
            };
        } else {
            return redirect()->back()->with('message', 'All field is required!');
        }
    }

    // ========================================
    // =========== DELETE PRODUCT =============
    // ========================================
    public function deleteProduct(Request $request)
    {
        $id = $request->input('id');

        $product = Product::query()->find($id);

        if (!is_null($product)) {
            $result = $product->delete();
            if ($result) {
                return redirect()->back()->with('message', '"' . $product->name . '"' . ' Successfully Deleted');
                // return response()->json(['message' => 'Successfully Deleted']);
            } else {
                return redirect()->back()->with('message', 'Error Occured!');
                // return response()->json(['message' => 'Error Occured!']);
            }
        } else {
            return redirect()->back()->with('message', 'Product ' . $id . ' Not Found!');
            // return response()->json(['message' => 'Product Not Found!']);
        }
    }

    // ========================================
    // =========== SEARCH PRODUCT =============
    // ========================================
    public function searchProduct(Request $request)
    {
        $id = $request->input("id");

        $product = Product::query()->find($id);

        if (!is_null($product)) {
            return redirect()->action([ProductController::class, 'productDetail'], ['id' => $id]);
        } else {
            return redirect()->route('home')->with('message', 'Product ' . '"' . $id . '"' . ' not found!');
        }
    }
}
