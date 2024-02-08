<?php
namespace  Modules\Article\App\Helpers;
use Illuminate\Http\Request;
trait UploadeHelper
{
    public function upload(Request $request, $imageFolder)
    {
        $fileName = time() . rand(0, 2000) . '.' . $request->getClientOriginalExtension();
        $location = public_path('uploads/' . $imageFolder . '/');


        if ($request->file('photo')) {
            $file = $request->file('photo');
            $file->move($location, $fileName);
            $data['image'] = $fileName;
        }

        return $fileName;
    }
}
