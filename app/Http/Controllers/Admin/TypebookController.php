<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\TypebookRequest;
use App\Repositories\Typebook\TypebookRepository;

class TypebookController extends Controller
{
    protected $typebookRepository;

    public function __construct(TypebookRepository $typebookRepository)
    {
        $this->typebookRepository = $typebookRepository;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        
        $typebooks = $this->typebookRepository->index();
        $perPage = $typebooks->perPage();  // Số mục mỗi trang
        $currentPage = $request->query('page', 1);  // Lấy số trang từ request

        // Tính số thứ tự bắt đầu của mục đầu tiên trên trang hiện tại
        $startNumber = ($currentPage - 1) * $perPage + 1;
        return view('layouts.admin.typebook.list', compact('typebooks', 'startNumber','currentPage'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('layouts.admin.typebook.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TypebookRequest $request)
    {
        $image = $request->image->getClientOriginalName();
        $request->image->storeAs('public/images', $image);
        $this->typebookRepository->create([
            'name' => $request->name,
            'description' => $request->description,
            'image' => $image
        ]);

        // return redirect()->route('admin.typebooks.index');
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
        $typebook = $this->typebookRepository->find($id);
        return view('layouts.admin.typebook.edit', compact('typebook'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TypebookRequest $request, $id)
    {
        // $typebook = $this->typebookRepository->find($id);
        // $typebook->fill([
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

        $this->typebookRepository->update($id, $data);
        return response()->json(['success' => true]);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request,$id)
    {
        $this->typebookRepository->delete($id);
        return redirect($request->redirect_url);
    }
}
