<?php

namespace App\Http\Controllers;

use App\Models\Part;
use App\Services\PartService;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    private PartService $partService;

    public function __construct(PartService $partService)
    {
        $this->partService = $partService;
    }

    public function showAllParts()
    {
        $parts = $this->partService->returnAllParts();

        return response()->view('home', [
            'title' => 'Spareparts',
            'parts' => $parts,
        ]);
    }

    public function partDetail(Request $request, string $id)
    {
        $part = Part::query()->find($id);

        if (!is_null($part)) {
            return response()->view('part-detail', [
                'title' => 'Update Material',
                'part' => $part->toArray(),
                'columns' => $this->partService->returnColumnOfTable("parts"),
                'selects' => $this->partService->returnSelects(),
                'types' => $this->partService->returnMaterialTypes(),
            ]);
        } else {
            return redirect()->route('home')->with('message', 'Material ' . '"' . $id . '"' . ' not found!');
        }
    }
}
