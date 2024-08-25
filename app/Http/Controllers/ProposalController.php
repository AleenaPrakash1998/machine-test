<?php

namespace App\Http\Controllers;

use App\DataTables\proposalsDataTable;
use App\Http\Requests\StoreProposalRequest;
use App\Models\Lead;
use App\Models\Proposal;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProposalController extends Controller
{

    public function index(proposalsDataTable $dataTable)
    {
        return $dataTable->render('pages.proposals.index');
    }


    public function create(): View
    {
        $leads = Lead::all();

        return view('pages.proposals.create', compact('leads'));
    }


    public function store(StoreProposalRequest $request): JsonResponse
    {
        Proposal::create($request->all());

        return response()->json(['success' => true]);

    }


    public function show(Proposal $proposal)
    {
        abort(404);
    }


    public function edit(Proposal $proposal)
    {
       abort(404);
    }


    public function update(Request $request, Proposal $proposal)
    {
       abort(404);
    }


    public function destroy(string $id): RedirectResponse
    {
        $proposal = Proposal::findOrFail($id);

        $proposal->delete();

        return redirect()->route('proposals.index')
            ->with('success', 'Proposal deleted successfully.');
    }
}
