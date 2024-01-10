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
    // ========================================
    // ============== ID CHECK ================
    // ========================================
    public function idCheck(Request $request, string $id)
    {
        $id = Part::query()->find($id);

        if (!is_null($id)) {
            return "Material Number is already registered!";
        }
    }

    // ========================================
    // ============= UPDATE PART ==============
    // ========================================
    public function upsertPart(Request $request)
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
                return redirect()->action([HomeController::class, 'partDetail'], ['id' => $id])->with('message', $error->getMessage());
            }

            if ($result) {
                return redirect()->action([HomeController::class, 'partDetail'], ['id' => $id])->with('message', 'Successfully updated!');
            } else {
                return redirect()->action([HomeController::class, 'partDetail'], ['id' => $id])->with('message', 'Error Occured!');
            }
        } else if (is_null($part)) {

            if (
                !empty($data['id']) && !is_null($data['id']) && (strlen($data['id']) == 8) &&
                !empty($data['material_description']) && !is_null($data['material_description']) &&
                !empty($data['material_type']) && !is_null($data['material_type']) &&
                !is_null($data['qty'])
            ) {

                try {

                    $new_part = new Part();
                    $new_part->id = $data['id'];
                    $new_part->material_description = $data['material_description'];
                    $new_part->material_type = $data['material_type'];
                    $new_part->qty = $data['qty'];
                    $new_part->location = $data['location'];

                    $result = $new_part->save();

                    if ($result) {
                        return redirect()->back()->with('message', 'Material ' . '"' . $data['id'] . '"' . ' successfully saved!');
                    } else {
                        return redirect()->back()->with('message', 'Material ' . $data['id'] . ' cannot be saved!');
                    }
                } catch (QueryException $error) {
                    return redirect()->back()->with('message', $error->getMessage());
                }
            } else {
                return redirect()->back()->with('message', 'Fields marked with * are mandatory!');
            }
        } else {
            return redirect()->action([PartController::class, 'partDetail'], ['id' => $id])->with('message', 'Material not found!');
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
            return redirect()->action([HomeController::class, 'partDetail'], ['id' => $id]);
        } else {
            return redirect()->route('home')->with('message', 'Material ' . '"' . $id . '"' . ' not found!');
        }
    }
}
