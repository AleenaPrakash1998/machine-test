<?php

namespace App\Http\Controllers;

use App\DataTables\LeadsDataTable;
use App\Http\Requests\StoreLeadRequest;
use App\Http\Requests\UpdateLeadRequest;
use App\Mail\LeadCreatedMail;
use App\Models\Lead;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;

class LeadController extends Controller
{

    public function index(LeadsDataTable $dataTable)
    {
        return $dataTable->render('pages.leads.index');
    }


    public function create():  View
    {
        return view('pages.leads.create');
    }


    public function store(StoreLeadRequest $request): JsonResponse
    {
        $lead = Lead::create($request->all());

        Mail::to('admin@gmail.com')->send(new LeadCreatedMail($lead));

        return response()->json(['success' => true]);
    }


    public function show(Lead $lead): void
    {
        abort(404);
    }


    public function edit($id): View
    {
        $lead = Lead::query()->findOrFail($id);

        return view('pages.leads.edit', compact('lead'));
    }


    public function update(UpdateLeadRequest $request, string $id): JsonResponse
    {
        $lead =  Lead::findOrFail($id);

        $lead->update($request->all());

        return response()->json(['success' => true]);
    }


    public function destroy(string $id): RedirectResponse
    {
        $lead = Lead::findOrFail($id);

        $lead->delete();

        return redirect()->route('leads.index')
            ->with('success', 'Lead deleted successfully.');
    }
}
