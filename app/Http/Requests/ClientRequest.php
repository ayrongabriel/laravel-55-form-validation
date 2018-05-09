<?php

namespace App\Http\Requests;

use App\Client;
use Illuminate\Foundation\Http\FormRequest;

class ClientRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $clientType = Client::getClientType($this->get('client_type'));
        $docNumberType = $clientType == Client::TYPE_INDIVIDUAL ? 'cpf' : 'cnpj';
        $client = $this->route('client');
        $clientId = $client instanceof Client ? $client->id : null;
        $rules = [
            'name' => 'required|max:50',
            'document_number' => "required|unique:clients,document_number,$clientId|document_number:$docNumberType",
            'email' => 'required|email',
            'phone' => 'required',
        ];
        $maritalStatus = implode(',',array_keys(Client::MARITAL_STATUS));
        $ruleIndicidual = [
            'date_birth' => 'required|date',
            'sex' => 'required|in:m,f',
            'marital_status' => "required|in:$maritalStatus",
            'physical_disability' => 'max:100',
        ];

        $rulesLegal = [
            'company_name' => 'required|max:150'
        ];

        return $clientType == Client::TYPE_INDIVIDUAL ? $rules + $ruleIndicidual : $rules + $rulesLegal;
    }
}
