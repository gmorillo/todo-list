<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todowork;
use App\Models\Category;
use Carbon\Carbon;

class TodoworkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        /*$categories = Category::all();
        dd($categories);*/
        return Todowork::orderBy('created_at', 'DESC')->get();
    }

    public function getCategories()
    {
        return Category::all();;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        //dd($request['category_id']);

        $newTodowork = new Todowork;
        $newTodowork->category_id = $request['category_id'];
        $newTodowork->name = $request['name'];
        $newTodowork->save();

        return $newTodowork;
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $message = "El item al que intenta acceder no existe......";
        $existingTodowork = Todowork::find($id);
        if($existingTodowork) {
            $existingTodowork->completed = $request->item['completed'] ? true : false;
            $existingTodowork->completed_date = $request->item['completed'] ? Carbon::now() : null;
            $existingTodowork->save();
            return $existingTodowork;
        }

        return $message;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $message = "El item que intenta eliminar, no existe......";
        $existingTodowork = Todowork::find($id);

        if($existingTodowork) {
            $existingTodowork->delete();
            return "El item eliminado correctamente";
        }

        return $message;
    }
}
