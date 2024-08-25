<?php

namespace App\Http\Controllers;

use App\DataTables\estimatesDataTable;
use App\Http\Requests\StoreEstimateRequest;
use App\Models\Estimate;
use App\Models\Proposal;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class EstimateController extends Controller
{

    public function index(estimatesDataTable $dataTable)
    {
        return $dataTable->render('pages.estimates.index');
    }


    public function create(): View
    {
        $proposals = Proposal::all();

        return view('pages.estimates.create', compact('proposals'));
    }



    public function store(StoreEstimateRequest $request)
    {
        Estimate::create($request->all());

        return response()->json(['success' => true]);
    }


    public function show(Estimate $estimate)
    {
        abort(404);
    }


    public function edit(Estimate $estimate)
    {
        abort(404);
    }


    public function update(Request $request, Estimate $estimate)
    {
        abort(404);
    }


    public function destroy(string $id): RedirectResponse
    {
        $proposal = Estimate::findOrFail($id);

        $proposal->delete();

        return redirect()->route('estimates.index')
            ->with('success', 'estimates deleted successfully.');
    }
}
