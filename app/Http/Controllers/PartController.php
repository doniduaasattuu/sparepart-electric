<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\MaterialType;
use App\Models\Part;
use App\Models\Product;
use GuzzleHttp\Handler\Proxy;
use Illuminate\Database\QueryException;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

use function Laravel\Prompts\select;

class PartController extends Controller
{
    // // ========================================
    // // ============ RETURN IMAGE ==============
    // // ========================================
    // public function getImage(Request $request, string $part_id)
    // {
    //     // return response()->json($part_id);
    //     // return response()->file('storage/images/' . $part_id . '.jpg');
    //     $image = Storage::get('storage/images/' . $part_id . '.jpg');

    //     if (!is_null($image)) {
    //         return response()->file($image);
    //     } else {
    //         return abort(404);
    //     }
    // }

    // ========================================
    // ========= RETURN ALL PRODUCT ===========
    // ========================================
    public function showAllParts()
    {
        $parts = Part::get();

        return response()->view('home', [
            'title' => 'Spareparts',
            'parts' => $parts,
        ]);
    }

    // ========================================
    // =========== PRODUCT DETAIL =============
    // ========================================
    public function partDetail(Request $request, string $id)
    {
        $part = Part::query()->find($id);
        $columns = DB::getSchemaBuilder()->getColumnListing('parts');
        $material_types = MaterialType::get();

        $selects = [];
        $types = [];

        foreach ($material_types as $material) {
            array_push($selects, $material->type . ' - ' . $material->type_description);
            array_push($types, $material->type);
        }
        // return response()->json($types);

        if (!is_null($part)) {
            return response()->view('part-detail', [
                'title' => 'Update Material',
                'part' => $part->toArray(),
                'columns' => $columns,
                'selects' => $selects,
                'types' => $types,
            ]);
        } else {
            return redirect()->route('home')->with('message', 'Material ' . '"' . $id . '"' . ' not found!');
        }
    }

    // ========================================
    // ============= UPDATE PART ==============
    // ========================================
    public function updatePart(Request $request)
    {
        $data = $request->except(['_token', 'image']);
        $id = $data['id'];
        $part = Part::query()->find($id);

        $image = $request->file('image');
        if (!is_null($image)) {
            $image->storePubliclyAs('images', $id . '.jpg', 'public');
        }

        if (!is_null($part)) {

            try {

                foreach ($data as $key => $value) {
                    if ($key == 'id') {
                        continue;
                    } else {
                        $part->$key = $value;
                    }
                }

                // return response()->json($updated);
                $result = $part->update();
            } catch (QueryException $error) {
                return redirect()->action([PartController::class, 'partDetail'], ['id' => $id])->with('message', $error->getMessage());
            }

            if ($result) {
                return redirect()->action([PartController::class, 'partDetail'], ['id' => $id])->with('message', 'Successfuly Updated');
            } else {
                return redirect()->action([PartController::class, 'partDetail'], ['id' => $id])->with('message', 'Error Occured!');
            }
        } else {
            return redirect()->action([PartController::class, 'partDetail'], ['id' => $id])->with('message', 'Material not found!');
        }
    }

    // // public function updateOrCreateProduct(Request $request)
    // // {
    // //     $id = $request->input('id');
    // //     $name = $request->input('name');
    // //     $qty = $request->input('qty');

    // //     $product = Product::query()->find($id);
    // //     // return response()->json($product);

    // //     if (!is_null($product)) {

    // //         $product->id = $id;
    // //         $product->name = $name;
    // //         $product->qty = $qty;

    // //         $result = $product->update();

    // //         if ($result) {
    // //             return redirect()->action([ProductController::class, 'productDetail'], ['id' => $id])->with('message', 'Successfuly Updated');
    // //         } else {
    // //             return redirect()->action([ProductController::class, 'productDetail'], ['id' => $id])->with('message', 'Error Occured!');
    // //         }
    // //     } else {
    // //         // return redirect()->action([ProductController::class, 'productDetail'], ['id' => $id])->with('message', 'Product Not Found!');

    // //         try {
    // //             Product::create([
    // //                 'id' => $id,
    // //                 'name' => $name,
    // //                 'qty' => $qty,
    // //             ]);
    // //         } catch (QueryException $error) {

    // //             return redirect()->back()->with("message", $error->getMessage());
    // //         }
    // //     }
    // // }

    // ========================================
    // ========== REGISTRY PRODUCT ============
    // ========================================
    public function registryPart()
    {
        $part = [];
        $columns = DB::getSchemaBuilder()->getColumnListing('parts');
        $material_types = MaterialType::get();

        $selects = [];
        $types = [];

        foreach ($material_types as $material) {
            array_push($selects, $material->type . ' - ' . $material->type_description);
            array_push($types, $material->type);
        }
        // return response()->json($types);

        if (!is_null($part)) {
            return response()->view('part-detail', [
                'title' => 'Registry Material',
                'part' => $part,
                'columns' => $columns,
                'selects' => $selects,
                'types' => $types,
            ]);
        } else {
            return redirect()->route('home')->with('message', 'Error Occured!');
        }
    }

    // // ========================================
    // // ========== REGISTER PRODUCT ============
    // // ========================================
    // public function registerProduct(Request $request)
    // {
    //     $id = $request->input('id');
    //     $name = $request->input('name');
    //     $price = $request->input('price');
    //     $qty = $request->input('qty');

    //     $product = Product::query()->find($id);

    //     if (!empty($id) && !empty($name) && !empty($price) && !empty($qty)) {

    //         if (!is_null($product)) {
    //             return redirect()->back()->with('message', 'Product already exist!');
    //         } else {

    //             try {
    //                 Product::create([
    //                     'id' => $id,
    //                     'name' => $name,
    //                     'price' => $price,
    //                     'qty' => $qty,
    //                 ]);
    //             } catch (QueryException $error) {
    //                 return redirect()->back()->with("message", $error->getMessage() . " ⚠️");
    //             }

    //             return redirect()->back()->with('message', 'Product successfully saved!');
    //         };
    //     } else {
    //         return redirect()->back()->with('message', 'All field is required!');
    //     }
    // }

    // ========================================
    // =========== DELETE PART =============
    // ========================================
    public function deletePart(Request $request)
    {
        $id = $request->input('id');

        $part = Part::query()->find($id);

        if (!is_null($part)) {

            try {
                $result = $part->delete();
            } catch (QueryException $error) {
                return redirect()->back()->with('message', $error->getMessage());
            }

            if ($result) {
                return redirect()->back()->with('message', '"' . $part->material_description . '"' . ' Successfully Deleted');
            } else {
                return redirect()->back()->with('message', 'Error Occured!');
            }
        } else {
            return redirect()->back()->with('message', 'Product ' . $id . ' Not Found!');
        }
    }

    // ========================================
    // ============= SEARCH PART ==============
    // ========================================
    public function searchPart(Request $request)
    {
        $id = $request->input("part");

        $part = Part::query()->find($id);

        if (!is_null($part)) {
            return redirect()->action([PartController::class, 'partDetail'], ['id' => $id]);
        } else {
            return redirect()->route('home')->with('message', 'Part ' . '"' . $id . '"' . ' not found!');
        }
    }
}
