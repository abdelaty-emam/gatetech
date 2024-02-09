<?php

namespace  Modules\Article\App\Helpers;

trait UploadeHelper
{
    public function upload($request, $imageFolder)
    {
        $fileName = time() . rand(0, 2000) . '.' . $request->getClientOriginalExtension();
        $location = public_path('uploads/' . $imageFolder . '/');


        if ($request->hasFile('photo')) {
            $file = $request->hasFile->file('photo');
            $file->move($location, $fileName);
            $request->photo = $fileName;
        }

        return $fileName;
    }
}
