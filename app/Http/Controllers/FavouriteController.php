<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Favourite;
use Illuminate\Support\Facades\Auth;
use App\Models\Book;


class FavouriteController extends Controller
{
    public function submit(Request $request)
{
    $validatedData = $request->validate([
        'book_id' => 'required|integer',
    ]);

    $favourite = new Favourite();
    $favourite->book_id = $validatedData['book_id'];
    $favourite->user_id = Auth::id();
    $favourite->save();

    return redirect()->route('books-data')->with('success', 'Книга была добавлена в избранное');
}

    public function allData1(){
        return view('favourite', [
            'favourite' => auth()->user()->favorite
        ]);
    }
    
    public function destroy($id)
    {
        $book = Book::findOrFail($id);
        auth()->user()->favorite()->detach($book);

        return redirect()->route('addfavourite-data')
            ->with('success', 'Book removed from favorites.');
    }
}

?>