<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class UpdateLeadRequest extends FormRequest
{

    public function rules(Request $request): array
    {
        $lead =  $request->route('lead');
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:leads,email,' . $lead->id,
            'phone' => 'required|string',
            'notes' => 'required|string',
        ];
    }
}
