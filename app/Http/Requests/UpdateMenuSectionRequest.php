<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateMenuSectionRequest extends FormRequest
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
        return [
            'main_menu_id' => 'required',
            'title' => 'required',
            // 'link' => 'required',
            'img_link' => 'required',
            'sort' => 'required',
            'type' => 'required|in:links_list,cards',
        ];
    }
}
