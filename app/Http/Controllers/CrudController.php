<?php

namespace App\Http\Controllers;

use App\Models\PromptForm;
use App\Models\PromptMaker;
// use App\Models\User;
use Illuminate\Http\Request;
use App\Traits\BaseQuery;

class CrudController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    use BaseQuery;
    private $_request = null;
    private $_modal = null;
    public function __construct(Request $request,  PromptMaker $modal)
    {
        $this->_request = $request;
        $this->_modal = $modal;
    }



    public function index()
    {
        $data = $this->_modal->all();
        return view('show', compact('data'));
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // $data = $this->_modal->all();
        
        return view('create' );
    }
   

    /**
     * Store a newly created resource in storage.
     */
    public function store()
    {
        // dd($this->_request->all());
        $this->validate($this->_request, [
            'name' => 'string|nullable',
            'type' => 'string|nullable',
            'description' => 'string|nullable',
            'url'=> 'url',
        ]);

        $data = $this->_request->except('_token');
        // dd($data);
        $var = $this->add($this->_modal, $data);

        return back()->with('success', 'Data created successfully!');
    }



    /**
     * Display the specified resource.
     */
    public function show()
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data = $this->get_by_id($this->_modal, $id);
        return view('edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($id)
    {
        $this->validate($this->_request, [
            'name' => 'string',
            'type' => 'string',
            'description' => 'string',
            'url'=> 'url',
        ]);

        $data = $this->_request->except('_token', '_method');

        // Check if a password is provided
      
        // Use the update method to update the record
        $this->get_by_id($this->_modal, $id)->update($data);

        return redirect('crud')->with('success', 'Data updated successfully!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {

        $data = $this->get_by_id($this->_modal, $id);
        $data->delete();
        return redirect('crud')->with('error', 'Data deleted successfully!');
    }

    /////////////////////////////PromptForm//////////////////////////////////
   
  
}


