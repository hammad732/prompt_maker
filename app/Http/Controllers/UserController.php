<?php

namespace App\Http\Controllers;

use App\Traits\BaseQuery;
use App\Models\PromptMaker;
use Illuminate\Http\Request;

class UserController extends Controller
{
    use BaseQuery;
    private $_request = null;
    private $_modal = null;
    public function __construct(Request $request,  PromptMaker $modal)
    {
        $this->_request = $request;
        $this->_modal = $modal;
    }


    public function create()
    {
        // $data = $this->_modal->all();
        
        return view('UserContent.create' );
    }

    public function store()
    {
       
        $this->validate($this->_request, [
            'name' => 'string|nullable|required',
            'type' => 'string|nullable|required',
            'description' => 'string|nullable|required',
            'url'=> 'url',
        ]);

        $data = $this->_request->except('_token');
      
        $var = $this->add($this->_modal, $data);

        return back()->with('success', 'Data created successfully!');
    }
}
