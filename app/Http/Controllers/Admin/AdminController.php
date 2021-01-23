<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use App\Models\Option;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;

class AdminController extends BaseController
{
    public function index(Request $request)
    {
        return view('admin.index');
    }


    protected function upload($file, $type)
    {
        try {
            $year = Carbon::now()->year;
            $name = time() . '.' . $file->extension();
            $directory = "/media/{$type}/{$year}/";
            $file->move(public_path($directory), $name);
            return ['status' => true, 'url' => url('/') . $directory . $name];
        } catch (Exception $e) {
            return ['status' => false, 'error' => $e->getMessage()];
        }
    }

    public function ckeditor(Request $request)
    {
        $image = $request->file('upload');

        $result = $this->upload($image, 'content');

        if ($result['status']) {
            return response()->json([
                'url' => $result['url']
            ]);
        } else {
            return response()->json([
                'error' => ['message' => $result['error']]
            ]);
        }
    }
}
