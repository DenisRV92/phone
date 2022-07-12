<?php

namespace App\Services;

use App\Models\Phone;
use Illuminate\Http\Request;

/**
 * Class PhoneServices
 * @package App\Services
 */
class PhoneServices implements Service
{
    /**
     * @param array $request
     * @return bool
     */
    public function create($request)
    {
        $phone = new Phone($request);
        return $phone->save();
    }

    /**
     * @param Phone $phone
     * @param array $request
     * @return mixed
     */
    public function update($phone, $request)
    {
        $phone->fill($request);
        return $phone->save();
    }

    /**
     * @param Phone $phone
     * @return bool
     * @throws \Exception
     */
    public function delete($phone)
    {
        return $phone->delete();
    }

    /**
     * @param array $request
     * @return mixed
     */
    public function search(Request $request)
    {
        if ($request->has('number')) {
            $phones = Phone::where('number', $request->number)->get();
            return $phones;
        } else {
            $phones = Phone::where('name', $request->name)->get();
            return $phones;
        }
    }
}
