<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\PublisherRequest;
use App\Repositories\Publisher\PublisherRepository;

class PublisherController extends Controller
{
    protected $publisherRepository;

    public function __construct(PublisherRepository $publisherRepository)
    {
        $this->publisherRepository = $publisherRepository;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        
        $publishers = $this->publisherRepository->index();
        $perPage = $publishers->perPage();  // Số mục mỗi trang
        $currentPage = $request->query('page', 1);  // Lấy số trang từ request

        // Tính số thứ tự bắt đầu của mục đầu tiên trên trang hiện tại
        $startNumber = ($currentPage - 1) * $perPage + 1;
        
        return view('layouts.admin.publisher.list', compact('publishers', 'startNumber','currentPage'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('layouts.admin.publisher.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PublisherRequest $request)
    {
        $this->publisherRepository->create([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        // return redirect()->route('admin.publishers.index');
        return response()->json(['success' => true]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $publisher = $this->publisherRepository->find($id);
        return view('layouts.admin.publisher.edit', compact('publisher'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PublisherRequest $request, $id)
    {
        $data = [
            'name' => $request->name,
            'description' => $request->description
        ];

        $this->publisherRepository->update($id, $data);
        return response()->json(['success' => true]);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $id)
    {
        $this->publisherRepository->delete($id);
        return redirect($request->redirect_url);
    }
}
