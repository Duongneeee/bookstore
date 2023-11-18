<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\BookRequest;
use App\Http\Controllers\Controller;
use App\Repositories\Book\BookRepository;
use App\Repositories\Author\AuthorRepository;
use App\Repositories\Typebook\TypebookRepository;
use App\Repositories\Publisher\PublisherRepository;

class BookController extends Controller
{
    protected $bookRepository;
    protected $typebookRepository;
    protected $authorRepository;
    protected $publisherRepository;

    public function __construct(
        BookRepository $bookRepository,
        TypebookRepository $typebookRepository,
        AuthorRepository $authorRepository,
        PublisherRepository $publisherRepository
    ) {
        $this->bookRepository = $bookRepository;
        $this->typebookRepository = $typebookRepository;
        $this->authorRepository = $authorRepository;
        $this->publisherRepository = $publisherRepository;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $books = $this->bookRepository->index();
       
        $perPage = $books->perPage();  // Số mục mỗi trang
        $currentPage = $request->query('page', 1);  // Lấy số trang từ request

        // Tính số thứ tự bắt đầu của mục đầu tiên trên trang hiện tại
        $startNumber = ($currentPage - 1) * $perPage + 1;

        return view('layouts.admin.book.list', compact('books', 'startNumber', 'currentPage'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $typebooks = $this->typebookRepository->getAll();
        $authors = $this->authorRepository->getAll();
        $publishers = $this->publisherRepository->getAll();
        return view('layouts.admin.book.add',compact('typebooks', 'authors', 'publishers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BookRequest $request)
    {
        $image = $request->image->getClientOriginalName();
        $request->image->storeAs('public/images', $image);
        $this->bookRepository->create([
            'name' => $request->name,
            'description' => $request->description,
            'image' => $image,
            'quantity' => $request->quantity,
            'price' => $request->price,
            'price_discount' => $request->price_discount,
            'page' => $request->page,
            'publish_date'=> $request->publish_date,
            'typebook_id'=> $request->typebook_id,
            'author_id'=>$request->author_id,
            'publisher_id'=> $request->publisher_id
        ]);

        // return redirect()->route('admin.books.index');
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
        $typebooks = $this->typebookRepository->getAll();
        $authors = $this->authorRepository->getAll();
        $publishers = $this->publisherRepository->getAll();
        $book = $this->bookRepository->find($id);
        return view('layouts.admin.book.edit', compact('book','typebooks','authors','publishers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BookRequest $request, $id)
    {
        // $book = $this->bookRepository->find($id);
        // $book->fill([
        //     'name' => $request->name,
        //     'description' => $request->description
        // ])->save();
        $data = [
            'name' => $request->name,
            'description' => $request->description,
            'quantity' => $request->quantity,
            'price' => $request->price,
            'price_discount' => $request->price_discount,
            'page' => $request->page,
            'publish_date'=> $request->publish_date,
            'typebook_id'=> $request->typebook_id,
            'author_id'=>$request->author_id,
            'publisher_id'=> $request->publisher_id
        ];
        if ($request->image) {
            $image = $request->image->getClientOriginalName();
            $request->image->storeAs('public/images', $image);
            $data['image'] = $image;
        }

        $this->bookRepository->update($id, $data);
        return response()->json(['success' => true]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $id)
    {
        $this->bookRepository->delete($id);
        return redirect($request->redirect_url);
    }
}
