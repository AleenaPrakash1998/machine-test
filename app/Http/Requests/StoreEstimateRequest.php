<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEstimateRequest extends FormRequest
{

    public function rules(): array
    {
        return [
            'proposal_id' => 'required|exists:proposals,id',
            'estimate_notes' => 'required|string',
            'estimated_amount' => 'required|numeric',
        ];
    }
}
