<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\AuthorRequest;
use App\Repositories\Author\AuthorRepository;

class AuthorController extends Controller
{
    protected $authorRepository;

    public function __construct(AuthorRepository $authorRepository)
    {
        $this->authorRepository = $authorRepository;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        
        $authors = $this->authorRepository->index();
        $perPage = $authors->perPage();  // Số mục mỗi trang
        $currentPage = $request->query('page', 1);  // Lấy số trang từ request

        // Tính số thứ tự bắt đầu của mục đầu tiên trên trang hiện tại
        $startNumber = ($currentPage - 1) * $perPage + 1;
        
        return view('layouts.admin.author.list', compact('authors', 'startNumber','currentPage'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('layouts.admin.author.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AuthorRequest $request)
    {
        $image = $request->image->getClientOriginalName();
        $request->image->storeAs('public/images', $image);
        $this->authorRepository->create([
            'name' => $request->name,
            'description' => $request->description,
            'image' => $image
        ]);

        // return redirect()->route('admin.authors.index');
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
        $author = $this->authorRepository->find($id);
        return view('layouts.admin.author.edit', compact('author'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AuthorRequest $request, $id)
    {
        // $author = $this->authorRepository->find($id);
        // $author->fill([
        //     'name' => $request->name,
        //     'description' => $request->description
        // ])->save();
        $data = [
            'name' => $request->name,
            'description' => $request->description
        ];
        if ($request->image) {
            $image = $request->image->getClientOriginalName();
            $request->image->storeAs('public/images', $image);
            $data['image'] = $image;
        }

        $this->authorRepository->update($id, $data);
        return response()->json(['success' => true]);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $id)
    {
        $this->authorRepository->delete($id);
        return redirect($request->redirect_url);
    }
}
