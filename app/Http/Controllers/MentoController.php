<?php

namespace App\Http\Controllers;

use App\Http\Requests\MentoJoin;
use App\Models\Mentor;
use App\Services\FileUpload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class MentoController extends Controller
{

    /**
     * 멘토 가입
     * @param MentoJoin $request
     * @return mixed
     */
    protected function store(MentoJoin $request, FileUpload $fileUpload){

        $validated = $request->validated();
        $validated['profile_image'] = $request->hasFile('profile_image') ? $fileUpload->profileUpload($request->file('profile_image')) : "";
        Mentor::create($validated);

        return Response::success();
    }



}
