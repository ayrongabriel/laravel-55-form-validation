<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    const MARITAL_STATUS = [
        1 => 'Solteiro',
        2 => 'Casado',
        3 => 'Divorciado',
    ];

    const TYPE_INDIVIDUAL = 'individual';
    const TYPE_LEGAL = 'legal';

    protected $fillable = [
        'name',
        'document_number',
        'email',
        'phone',
        'defaulter',
        'date_birth',
        'sex',
        'marital_status',
        'physical_disability',
        'client_type',
        'company_name'
    ];

    public static function getClientType($type){
        return $type == Client::TYPE_LEGAL ? $type : Client::TYPE_INDIVIDUAL;
    }

    public function getDocumentNumberFormattedAttribute(){
        $document = $this->document_number;
        if (!empty($document)){
            if(strlen($document) == 11){
                $document = preg_replace('/(\d{3})(\d{3})(\d{3})(\d{2})/', '$1.$2.$3-$4', $document);
            }else{
                $document = preg_replace('/(\d{2})(\d{3})(\d{3})(\d{4})(\d{2})/', '$1.$2.$3/$4-$5', $document);
            }
        }
        return $document;
    }

    public function getSexFormattedAttribute(){
        if ($this->client_type == self::TYPE_INDIVIDUAL)
            return $this->sex == 'm' ? 'M' : 'F';
    }

    public function getDateBirthFormattedAttribute(){
        return $this->client_type == self::TYPE_INDIVIDUAL ? (new \DateTime($this->date_birth))->format('d/m/Y') : "";
    }
}
