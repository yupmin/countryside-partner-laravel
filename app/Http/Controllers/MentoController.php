<?php

namespace App\Http\Controllers;

use App\Http\Requests\MentoJoin;
use App\Models\Mentor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Storage;

class MentoController extends Controller
{

    /**
     * 멘토 가입
     * @param MentoJoin $request
     * @return mixed
     */
    protected function store(MentoJoin $request){

        $validated = $request->validated();

        $filePath = "";
        if ($request->hasFile('profile_image')) {

            $file = $request->file('profile_image');
            $name = time() . $file->getClientOriginalName();
            $filePath = 'profiles/' . $name;
            Storage::disk('ncloud')->put($filePath, file_get_contents($file));
        }
        $validated['profile_image'] = $filePath;
        Mentor::create($validated);
        return Response::success();
    }



}
