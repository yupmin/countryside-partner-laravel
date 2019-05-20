<?php


namespace App\Services;


use App\Models\Note;

class NoteService implements NoteInterface
{


    /**
     * @param $formData
     */
    public function create($formData)
    {
        // TODO: Implement create() method.
        Note::create($formData);
    }
}
