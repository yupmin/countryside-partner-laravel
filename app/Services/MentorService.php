<?php


namespace App\Services;
use App\Models\Mentor;
use App\Traits\UserTrait;

class MentorService
{
    use UserTrait;

    // 회원 가입 후 토큰 전달
    public function mentorCreateAfterResponseToken($validated, $request){

        $fileUploadProfile = new FileUploadProfile();

        $validated['profile_image'] = $request->hasFile('profile_image') ? $fileUploadProfile->upload($request->file('profile_image')) : "";

        $mentor = Mentor::create($validated);

        return $this->makeToken($mentor);
    }
}