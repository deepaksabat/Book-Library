<?php

namespace App\Http\Controllers;
use App\Book;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;

class BooksController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		$books = Book::paginate(10);
		//dd($books);
		return view('Book.index', compact('books'));
	}

	protected function validator(array $data) {
		return Validator::make($data, [
			'name' => 'required|max:255',
			'description' => 'required',
			'author' => 'required',
			'publisher' => 'required',
			'edition' => 'required',
			'pages' => 'required|numeric',
			'published' => 'required|date|date_format: Y-m-d',
			'posted' => 'required|date|date_format:Y-m-d',
			'language' => 'required',
			'bookformat' => 'required',
			'booksize' => 'required',
			'image' => 'required|image|mimes:jpeg,jpg,png',
			'book_fl' => 'required|mimes:pdf,chm,djvu,epub|max:50000',

		]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		return view('Book.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request) {
		//dd($request->all());
		$validator = $this->validator($request->all());

		if ($validator->fails()) {
			$this->throwValidationException(
				$request, $validator
			);
		}
		//dd($request->all());
		$book = new Book($request->input());
		if ($file = $request->hasFile('image')) {

			$file = $request->file('image');

			$bookfile = $book->name . '.' .
			$request->file('book_fl')->getClientOriginalExtension();

			$request->file('book_fl')->move(
				public_path() . '/public/uploads', $bookfile
			);

			$fileName = $file->getClientOriginalName();
			$destinationPath = public_path() . '/images/';
			$file->move($destinationPath, $fileName);
			$book->image = $fileName;
			$book->book_fl = $bookfile;
		}
		$book->save();
		return \Redirect::route('book.index')->withSuccess('Successfully added');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id) {
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id) {
		$book = Book::find($id);
		return view('Book.edit', compact('book'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id) {
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id) {
		//
	}
}
