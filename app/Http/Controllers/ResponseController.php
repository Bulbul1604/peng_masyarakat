<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;
use App\Models\Tanggapan;
use App\Services\ResponseService;
use Illuminate\Http\Request;

class ResponseController extends Controller
{
    protected $responseService;
    public function __construct()
    {
        $this->responseService = new ResponseService();
    }

    public function index()
    {
        $responses = $this->responseService->handleIndex();
        return view('response.index', compact('responses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $response = Tanggapan::findOrFail($id);
        // $response = Tanggapan::whereTanggapan()->findOrFail($id);
        return view('response.show', compact('response'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
