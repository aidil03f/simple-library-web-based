<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\JenisBukuResource;
use App\Http\Requests\JenisBukuRequest;
use App\Models\JenisBuku;

class JenisBukuController extends Controller
{
    public function index()
    {
        $jenis = JenisBuku::get();
        return JenisBukuResource::collection($jenis);
    }


    public function store(JenisBukuRequest $request)
    {
        JenisBuku::create(['label' => request('label')]);
    }

    public function edit($id)
    {
        return JenisBuku::find($id);
    }

    public function update(JenisBukuRequest $request, $id)
    {
        $jenisbuku = JenisBuku::find($id);
        $jenisbuku->update(['label' => request('label')]);

        return new JenisBukuResource($jenisbuku);
    }


    public function destroy($id)
    {
        JenisBuku::find($id)->delete();
        return response()->json('deleted',200);
    }
}
