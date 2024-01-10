<?php

namespace App\Http\Controllers;

use App\Data\MaterialTypes;
use App\Models\Part;
use App\Services\PartService;
use App\Services\UtilityService;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    private PartService $partService;
    private MaterialTypes $materialTypes;
    private UtilityService $utilityService;

    public function __construct(PartService $partService, MaterialTypes $materialTypes, UtilityService $utilityService)
    {
        $this->partService = $partService;
        $this->materialTypes = $materialTypes;
        $this->utilityService = $utilityService;
    }

    public function showAllParts()
    {
        $parts = $this->partService->returnAllParts();

        return response()->view('home', [
            'title' => 'Spareparts',
            'parts' => $parts,
            'materialTypes' => $this->materialTypes,
        ]);
    }

    public function partDetail(string $id)
    {
        $part = Part::query()->find($id);

        if (!is_null($part)) {
            return response()->view('part-detail', [
                'title' => 'Update Material',
                'part' => $part->toArray(),
                'columns' => $this->utilityService->returnColumnOfTable("parts"),
                'materialTypes' => $this->materialTypes,
            ]);
        } else {
            return redirect()->route('home')->with('message', 'Material ' . '"' . $id . '"' . ' not found!');
        }
    }

    public function registryPart()
    {
        return response()->view('part-detail', [
            'title' => 'Update Material',
            'part' => [],
            'columns' => $this->utilityService->returnColumnOfTable("parts"),
            'materialTypes' => $this->materialTypes,
        ]);
    }

    public function deletePart(string $id)
    {
        $part = Part::query()->find($id);

        if (!is_null($part)) {
            $part->delete();
            return redirect()->back()->with('message', '"' . $part->material_description . '"' . ' successfully deleted!');
        } else {
            return redirect()->back()->with('message', 'Material ' . $id . ' not found!');
        }
    }
}
