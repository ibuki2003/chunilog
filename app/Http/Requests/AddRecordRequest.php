<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddRecordRequest extends FormRequest
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
        return [
            'music_id' => ['required', 'integer', 'exists:musics,id'],
            'store' => ['string'],
            'time' => ['required', 'date'],
            'level' => ['required', 'integer'],

            'jc_cnt' => ['required', 'integer'],
            'cr_cnt' => ['required', 'integer'],
            'at_cnt' => ['required', 'integer'],
            'ms_cnt' => ['required', 'integer'],
            'max_cmb' => ['required', 'integer'],
            'track_no' => ['required', 'integer'],
        ];
    }
}
