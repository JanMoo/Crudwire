<?php
namespace Janmoo\Crudwire;


use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;


class CrudwireUserController extends Controller
{
    /**
     * fillables
     *
     * @var mixed
     */
    public $fillables;

    /**
     * __construct
     *
     * @return void
     */
    public function __construct()
    {
        $user = User::first();
        $this->fillables = $user->getFillable();
    }

    /**
     * validateUsers
     *
     * @param  mixed $request
     * @param  mixed $update
     * @return void
     */
    public function validateCreateUsers(Request $request)
    {
        $validatedData=[];

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);


        return $validatedData;
    }

    /**
     * validateUpdateusers
     *
     * @param  mixed $request
     * @return void
     */
    public function validateUpdateUsers(Request $request)
    {
        $validatedData=[];

        if ($request->password)
        {

            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255',
                'password' => 'required|string|min:8|confirmed',
            ]);
        }
        else
        {

            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255',
            ]);
        }

        return $validatedData;
    }

    /**
     * index
     * returns form to create new user
     * @return void
     */
    public function index()
    {
        $route='createuser';
        return view('crudwire::create', ['fillables' => $this->fillables, 'route' => $route ]);
    }

    /**
     * create
     * creates a new users
     * @param  mixed $request
     * @return void
     */
    public function create(Request $request)
    {
        $this->validateCreateUsers($request);

        $user = User::create($request->all());

        session()->flash('crudwire', 'new user created succesfully');
        return redirect()->route('crudwire');
    }

    /**
     * show
     * shows form to edit user info
     * @param  mixed $id
     * @return void
     */
    public function show($id)
    {
        $parameters = ['id' => $id];
        $route = 'updateuser';
        $user = User::find($id);
        return view('crudwire::create', ['user' => $user, 'fillables' => $this->fillables, 'route' => $route, 'parameters' => $parameters ]);
    }

    /**
     * update
     * updates users info
     * @param  mixed $request
     * @param  mixed $id
     * @return void
     */
    public function update(Request $request, $id)
    {
        $input = $this->validateUpdateUsers($request);

        $user = User::find($id);
        $result = $user->fill($input);

        $user->save();
        session()->flash('crudwire', 'user info edited succesfully');
        return redirect()->route('crudwire');
    }

}
