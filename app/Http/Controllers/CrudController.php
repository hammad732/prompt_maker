<?php

namespace App\Http\Controllers;

use App\Models\PromptForm;
use App\Models\PromptMaker;
use App\Models\User;
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
    private $_model = null;
    public function __construct(Request $request,  PromptMaker $modal, User $model)
    {
        $this->_request = $request;
        $this->_modal = $modal;
        $this->_model = $model;
    }



    public function index()
    {
        $role = $this->_model->all();
     $data = $this->_modal->paginate(10);  // Display 10 items per page
        return view('adminContent.show', compact('data','role'));
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // $data = $this->_modal->all();
        
        return view('adminContent.create' );
    }
   

    /**
     * Store a newly created resource in storage.
     */
 public function store()
{
    $this->validate($this->_request, [
        'name' => 'string|nullable|required',
        'type' => 'string|nullable|required',
        'description' => 'string|nullable|required',
        'url' => 'url|nullable',
    ]);

    $data = $this->_request->except('_token');

    $var = $this->add($this->_modal, $data);

    if ($this->_request->expectsJson()) {
        return response()->json(['success' => true, 'data' => $var, 'message' => 'Data created successfully!']);
    } else {
        return back()->with('success', 'Data created successfully!');
    }
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
        return view('adminContent.edit', compact('data'));
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
            'url'=> 'url|required',
        ]);

        $data = $this->_request->except('_token', '_method');

        // Check if a password is provided
      
        // Use the update method to update the record
        $this->get_by_id($this->_modal, $id)->update($data);

        return redirect('work')->with('success', 'Data updated successfully!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {

        $data = $this->get_by_id($this->_modal, $id);
        $data->delete();
        return redirect('work')->with('error', 'Data deleted successfully!');
    }

    /////////////////////////////PromptForm//////////////////////////////////
   
  
}


