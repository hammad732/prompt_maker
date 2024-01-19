<?php



namespace App\Http\Controllers;

use App\Models\User;
use App\Traits\BaseQuery;
use App\Models\PromptMaker;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class AdminController extends Controller
{

    use BaseQuery;
    private $_request = null;
    private $_modal = null;
    public function __construct(Request $request,  User $modal)
    {
        $this->_request = $request;
        $this->_modal = $modal;
    }

      public function index()
    {
        $user = $this->_modal->all();
        return view('adminContent.users.show', compact('user'));
    }
    public function create()
    {
        // $data = $this->_modal->all();
        
        return view('adminContent.users.create' );
    }
   

    /**
     * Store a newly created resource in storage.
     */
    public function store()
    {
        $userData = $this->_request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'password' => 'required|string|min:6',
        ]);
    
        $user = User::create([
            'name' => $userData['name'],
            'email' => $userData['email'],
            'password' => Hash::make($userData['password']),
        ]);
    
        $user->assignRole('user');
    
        return redirect()->route('users')->with('success','User Created Successfully');
    }
    
    


    public function edit($id)
    {
        $user = $this->get_by_id($this->_modal, $id);
        return view('adminContent.users.edit', compact('user'));
    }
    public function update($id)
    {
        $this->validate($this->_request, [
            'name' => 'string',
            'email' => 'email|required',
        ]);

        $data = $this->_request->except('_token', '_method');

        // Check if a password is provided

        // Use the update method to update the record
        $this->get_by_id($this->_modal, $id)->update($data);

        return redirect('users')->with('success', 'User updated successfully!');
    }
    public function destroy($id)
    {

       $this->get_by_id($this->_modal, $id)->delete();
           
            return redirect('users')->with('success', 'User deleted successfully!');
        }
        
    

        
    

    public function dashboard()
    {
        return view("admin.dashboard");
    }


    public function logout()
    {
        Auth::logout();
        return view("auth.login");
    }

    public function show()
    {
        $data = PromptMaker::all();
        return view("adminContent.show", compact("data"));
    }
}
