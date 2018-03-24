<?php

namespace App\Http\Requests;

class ArticleSaveRequest extends Request
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title' => 'required',
            'body' => 'required',
            'published_at' => 'required|date_format:d/m/Y H:i',
            'metadescription' => 'required',
            'metakeys' => 'required',
        ];
    }

    public function messages()
    {
        return [
          'title.required' => 'Specificare il titolo!',
          'body.required' => 'Un articolo non può essere vuoto!',
          'published_at.required' => 'Specificare la data di pubblicazione!',
          'published_at.date_format' => 'Specificare una data nel formato gg/mm/aaaa oo:mm',
          'metadescription.required' => 'inserire una Meta Description',
          'metakeys.required' => 'Inserire delle MetaKeys', 
        ];
    }
}
