<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\BookRequest;
use App\Models\Book;
use League\Csv\Writer;

class BookController extends Controller
{
    public function submit(BookRequest $req){
        $book = new Book();
        $book -> name = $req->input('name');
        $book -> genre = $req->input('genre');
        $book -> avtor = $req->input('avtor');
        $book -> data = $req->input('data');

        $book->save();
        return redirect()->route('main')->with('success','Книга была добавлена');

    }

    public function allData(){
        $book = new Book();
        return view('messages', ['data'=>$book->all()]);
    }

    public function ShowOneMessage($id){
        $book = new Book();
        return view('one-message', ['data'=>$book->find($id)]);
    }

    public function UpdateBook($id){
        $book = new Book();
        return view('update-message', ['data'=>$book->find($id)]);
    }

    public function UpdateBookSubmit($id, BookRequest $req){
        $book = Book::find($id);
        $book -> name = $req->input('name');
        $book -> genre = $req->input('genre');
        $book -> avtor = $req->input('avtor');
        $book -> data = $req->input('data');

        $book->save();
        return redirect()->route('books-data-one', $id)->with('success','Информация о книге была обновлена');

    }

    public function deleteMessage($id){
        $book = Book::find($id)->delete();
        return redirect()->route('books-data-one', $id)->with('success','Книга была удалена');
    }

    public function export()
    {
    // Fetch the books data
    $books = Book::all();

    // Create a new CSV file
    $csv = Writer::createFromString('', 'ANSI');


    // Add the header row
    $csv->insertOne(['Название', 'Автор', 'Жанр', 'Дата']);

    // Add the data rows
    foreach ($books as $book) {
        $csv->insertOne([$book->name, $book->avtor, $book->genre, $book->data]);
    }

    // Output the CSV file to the browser
    header('Content-Type: text/csv; charset=ansi');
    header('Content-Disposition: attachment; filename="books.csv"');
    echo $csv->getContent();
    }

}
