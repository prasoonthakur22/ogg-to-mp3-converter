<?php

namespace App\Http\Controllers;

// use FFMpeg\FFMpeg;
// use Pbmedia\LaravelFFMpeg\FFMpegFacade as FFMpeg;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;
use ProtoneMedia\LaravelFFMpeg\Support\FFMpeg;

class AudioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $event = null;
        return view('home', compact(['event']));
    }


    public function about()
    {
        return view('about');
    }

    public function privacy()
    {
        return view('privacy');
    }
    /**
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function audio_convert(Request $request)
    {
        $input =  $request->all();

        $file = $request->file('file')->getClientOriginalName();
        $file = preg_replace('#[ -]+#', '-', $file);
        $name = pathinfo($file, PATHINFO_FILENAME);
        $fileName = time() . '_' .  $name . '_converted.mp3';

        $finalPath =  Storage::url($fileName);

        $data['name'] = $fileName;
        $data['url'] = $finalPath;

        $status = FFMpeg::open($input['file'])
            ->export()
            ->toDisk('public')
            ->inFormat(new \FFMpeg\Format\Audio\Mp3)
            ->save($fileName);

        if (!$status) {
            return $this->sendError("File Conversion Failed, Please Try Again");
        }

        return $this->sendResponse($data, "File Converted successfully");
    }


    public function sendError($message)
    {
        return Response::json([
            'success' => false,
            'message' => $message,
        ], 403);
    }

    public function sendResponse($data, $message)
    {
        return Response::json([
            'success' => true,
            'data' => $data,
            'message' => $message,
        ], 200);
    }
}
