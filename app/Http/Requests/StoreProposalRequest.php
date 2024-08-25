<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProposalRequest extends FormRequest
{

    public function rules(): array
    {
        return [
            'lead_id' => 'required|exists:leads,id',
            'proposal_details' => 'required|string',
            'amount' => 'required|numeric',
        ];
    }
}
