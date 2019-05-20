<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreNoteRequest;
use App\Services\NoteInterface;
use Illuminate\Http\Request;

class NoteController extends Controller
{

    /**
     * @param StoreNoteRequest $request
     * @param NoteInterface $note
     * @return mixed
     */
    public function store(StoreNoteRequest $request, NoteInterface $note){

        $note->create($request);
        return response()->success();
    }


    public function index(){

//        return response()->success();
    }


}
