<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class BookingRequest extends Request
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
            'room_id'   => 'required',
            'start_date'   => 'required',
            'start_time'    =>  'required',
            'end_date'      =>  'required',
            'end_time'      =>  'required',
            'purpose'       =>  'required',

        ];
    }
}
