<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FeeReceiptDocumentRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        if ($this->id){
            $rule = [
                // ===== Other Document
                'payment_recepit_doc' => 'mimes:jpeg,png,jpg,pdf|max:2048',
            ];
        }else{
            $rule = [
                // ===== Other Document
                'payment_recepit_doc' => 'required|mimes:jpeg,png,jpg,pdf|max:2048',
            ];
        }
        return $rule;
    }

    public function messages()
    {
        return [
             // ===== Other Document
            'payment_recepit_doc.required' => 'Payment Receipt is required',
            'payment_recepit_doc.max' => 'The file size should be less than 2MB.',
            'payment_recepit_doc.mimes' => ' Only files in .jpg, .jpeg, .png, .pdf format can be uploaded .',
        ];
    }
}
