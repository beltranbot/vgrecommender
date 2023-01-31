<?php

namespace App\Http\Requests;

use App\Models\ListModel;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class PutListRequest extends FormRequest
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
        $list = $this->route("list");
        return [
            "name" => [
                "required",
                "max:255",
                Rule::unique("lists")->ignore($list->id)
            ],
            "description" => [
                "required",
                "string",
                "max:2000"
            ],
            "id" => [
                Rule::exists("lists")->where(fn ($query) => $query->where("user_id", Auth::user()->id))
            ]
        ];
    }

    public function all($keys = null)
    {
        $data = parent::all($keys);
        $list = $this->route("list");
        $data["id"] = ($list instanceof ListModel) ? $list->id : null;
        return $data;
    }
}
