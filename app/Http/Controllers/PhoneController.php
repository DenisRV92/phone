<?php

namespace App\Http\Controllers;

use App\Http\Requests\PhoneIndexRequest;
use App\Http\Requests\PhoneRequest;
use App\Models\Phone;
use App\Services\PhoneServices;
use Illuminate\Http\Request;

class PhoneController extends Controller
{
    /**
     * @var PhoneServices $service
     */
    private $service;

    /**
     * UserController constructor.
     * @param PhoneServices $service
     */
    public function __construct(PhoneServices $service)
    {
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $phones = Phone::all();
        return view('phone.index', ['phones' => $phones]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return PhoneIndexRequest
     */
    public function create(PhoneIndexRequest $request)
    {
        $result = $this->service->create($request->all());
        if (!$result) {
            return redirect()->route('phone.index')->with('error', 'Не удалось добавить телефон');
        }
        return redirect()->route('phone.index')->with('success', 'Телефон успешно создан');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Phone $phone
     * @return \Illuminate\Http\Response
     */
    public function edit(Phone $phone)
    {
        $phones = Phone::all();
        return view('phone.index', [
            'oneBack' => $phone,
            'phones' => $phones
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param PhoneRequest $request
     * @param \App\Models\Phone $phone
     * @return \Illuminate\Http\Response
     */
    public function update(PhoneRequest $request, Phone $phone)
    {
        $result = $this->service->update($phone, $request->all());
        if (!$result) {
            return redirect()->route('phone.index')->with('error', 'Не удалось изменить телефон');
        }
        return redirect()->route('phone.index')->with('success', 'Телефон успешно изменен');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Phone $phone
     * @return \Illuminate\Http\Response
     */
    public function destroy(Phone $phone)
    {
        $result = $this->service->delete($phone);
        if (!$result) {
            return redirect()->route('phone.index')->with('error', 'Не удалось удалить телефон');
        }
        return redirect()->route('phone.index')->with('success', 'Телефон успешно удален');
    }

    public function search(Request $request)
    {
        $phones = $this->service->search($request);
        return view('phone.index', ['phones' => $phones]);
    }
}
