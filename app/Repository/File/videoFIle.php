<?php


namespace App\Repository\File;


use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class videoFIle
{
    protected $videoname;
    protected $slug;

    public function videoStore($request)
    {
        $video =$request->file('video');
        $this->slug = Str::slug($request->title);

        if (isset($video)) {
//            make unique name for image
            $currentDate = Carbon::now()->toDateString();
            $this->videoname = $this->slug . '-' . $currentDate . '-' . uniqid() . '.' . $video->getClientOriginalExtension();
//            check category dir is exists
            if (!Storage::disk('public')->exists('post')) {

                Storage::disk('public')->makeDirectory('post');
            }
//
            Storage::disk('public')->put('post/' . $this->videoname,$video);

        } else {
            $imagename = "default.png";
        }
        return $this;

    }
}
