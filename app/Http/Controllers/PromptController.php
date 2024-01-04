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

    public function prompt_index()
    {
        
        $data = $this->_prompt->all();
        return view('Form2.show', compact('data'));
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function prompt_create()
    {
        $data = $this->_modal->all();
        
        return view('Form2.create' , compact('data'));
    }
    public function prompt_store()
    {
        // dd($this->_request->all());
        $this->validate($this->_request, [
            'post' => 'string|nullable',
            'c_name' => 'string|nullable',
            'work1' => 'string|nullable',
    
            'work2' => 'string|nullable',
     
            'timeline'=> 'string|nullable',
            'cost'=> 'string|nullable',
            'tone'=> 'string|nullable',
        ]);

        $data = $this->_request->except('_token');
        // dd($data);
        $var = $this->add($this->_prompt, $data);

        // return view('Form2.show' , compact('data'));
        // return redirect('Form2.show',compact('data') )->with('success', 'Data created successfully!');
        // return view('Form2.show', compact('data'))->with('success', 'Data created successfully!');
        return redirect()->route('prompt.show')->with('success', 'Data created successfully!');

    }
}
