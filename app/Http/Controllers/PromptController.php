<?php

namespace App\Http\Controllers;

use App\Models\PromptForm;
use App\Models\PromptMaker;
// use App\Models\User;
use Illuminate\Http\Request;
use App\Traits\BaseQuery;

class PromptController extends Controller
{

    use BaseQuery;
    private $_request = null;
    private $_modal = null;
    private $_prompt = null;
    public function __construct(Request $request,  PromptMaker $modal, PromptForm $prompt)
    {
        $this->_request = $request;
        $this->_modal = $modal;
        $this->_prompt = $prompt;
    }


    /**
     * Show the form for creating a new resource.
     */
    public function prompt_create()
    {
        $data = $this->_modal->all();
        
        return view('adminContent.Form2.create', compact('data'));
    }
    public function prompt_store()
    {
        $data1 = $this->_modal->where('id', $this->_request->work1)->first();
        $data2 = $this->_modal->where('id', $this->_request->work2)->first();
        $data = $this->validate($this->_request, [
            'post' => 'string|nullable',
            'c_name' => 'string|nullable',
            'work1' => 'string|nullable',
            'work2' => 'string|nullable',
            'timeline' => 'string|nullable',
            'cost' => 'string|nullable',
            'tone' => 'string|nullable',
        ]);
        return view('adminContent.Form2.show', compact('data', 'data1', 'data2'));
    }
}
