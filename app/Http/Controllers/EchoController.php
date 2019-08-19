<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EchoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function echo()
    {
        return response([
            'echo' => 'echo',
        ]);
    }

    public function reflect(Request $request)
    {
        return response(
            $request->all()
        );
    }

    public function header_reflect(Request $request)
    {
        return response(
            $request->header()
        );
    }
}
