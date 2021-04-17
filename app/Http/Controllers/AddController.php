<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddCreateRequest;
use App\Models\Add;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;

class AddController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param AddCreateRequest $request
     * @return Response
     */
    public function store(AddCreateRequest $request): Response
    {
        $banner = $request->file('banner')->store('images/' . date('Y-m-d'));
        $add = Add::create([
            'text' => $request->text,
            'price' => $request->price,
            'amount' => $request->amount,
            'link' => $banner,
        ]);
        return !empty($add)? response('Announcement added') : response('Announcement not added');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show(int $id)
    {
        $add = Add::find($id);
        $newAmount = --$add->amount;
        if ($newAmount >= 0) {
            Add::find($id)->update([
                'amount' => $newAmount
            ]);
            return view('add', compact('add'));
        }
        return response('Ad impressions limit has expired');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function showApi(int $id)
    {
        $add = Add::find($id);
        $newAmount = --$add->amount;
        if ($newAmount >= 0) {
            Add::find($id)->update([
                'amount' => $newAmount
            ]);
            return response($add);
        }
        return response('Ad impressions limit has expired');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(int $id)
    {
        $add = Add::find($id);
        return view('update', compact('id', 'add'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param AddCreateRequest $request
     * @param int $id
     * @return Response
     */
    public function update(AddCreateRequest $request, int $id): Response
    {
        if (Add::where('id', $id)->exists()) {
            Storage::delete(Add::find($id)->banner);
            $banner = $request->file('banner')->store('images/' . date('Y-m-d'));
            Add::where('id', $id)->update([
                'text' => $request->text,
                'price' => $request->price,
                'amount' => $request->amount,
                'link' => $banner,
            ]);
            return response('Announcement updated');
        }
        return response('Announcement not updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return void
     */
    public function destroy(int $id)
    {
        //
    }

    /**
     * Show the most popular ad
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function popular()
    {
        $add = Add::where('amount', '>', 0)
            ->orderBy('price', 'desc')
            ->limit(1)
            ->get();
        return view('add', compact('add'));
    }

    /**
     * Show the most popular ad
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function popularApi()
    {
        $add = Add::where('amount', '>', 0)
            ->orderBy('price', 'desc')
            ->limit(1)
            ->get();
        return response($add);
    }
}
