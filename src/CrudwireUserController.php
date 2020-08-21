<?php
namespace Janmoo\Crudwire;


use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;


class CrudwireUserController extends Controller
{
    public $fillables;

    public function __construct()
    {
        $user = User::first();
        $this->fillables = $user->getFillable();
    }

    public function validateUsers(Request $request, $update)
    {
        $validatedData = array();

        foreach ($this->fillables as $key => $fillable) {
            switch ($fillable) {
                case 'name':
                     $request->validate([
                        'name' => 'required|string|max:255',]);
                    $validatedData[$fillable] = $request[$fillable];
                    break;

                case 'email':
                    if($update)
                    {
                         $request->validate([
                            'email' => 'required|string|email|max:255',]);
                        $validatedData[$fillable] = $request[$fillable];
                        break;
                    }
                    $request->validate([
                        'email' => 'required|string|email|max:255|unique:users',]);
                    $validatedData[$fillable] = $request[$fillable];
                    break;

                case 'password':
                    if($update){
                        if(!$request['password']){
                        break;
                        }
                        $request->validate([
                            'password' => 'string|min:8|cobfirmed',]);
                        $validatedData[$fillable] = $request[$fillable];
                        break;
                    }
                    $request->validate([
                        'password' => 'required|string|min:8|confirmed',]);
                    $validatedData[$fillable] = $request[$fillable];
                    break;

                default:
                    if($update)
                    {
                        if(!$request[$fillable]){
                        break;
                        }
                    }
                    $request->validate([$fillable => 'required',]);
                    $validatedData[$fillable] = $request[$fillable];
                    break;
            }
        }

        return $validatedData;
    }

    public function index()
    {
        return view('crudwire::create', ['fillables' => $this->fillables]);
    }

    public function create(Request $request)
    {
        $this->validateUsers($request, false);

        $user = User::create($request->all());

        //$user->sendEmailVerificationNotification();

        session()->flash('crudwire', 'new user created succesfully');
        return redirect()->route('crudwire');
    }

    public function show($id)
    {
        $user = User::find($id);
        return view('crudwire::create', ['user' => $user, 'fillables' => $this->fillables ]);
    }

    public function update(Request $request, $id)
    {
        $input = $this->validateUsers($request, true);

        $user = User::find($id);
        $result = $user->fill($input);

        $user->save();
        session()->flash('crudwire', 'user info edited succesfully');
        return redirect()->route('crudwire');
    }

}
