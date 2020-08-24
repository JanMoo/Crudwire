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
    public $fillables, $routeToOverview;

    /**
     * __construct
     *
     * @return void
     */
    public function __construct()
    {
        $user = User::first();
        $this->fillables = $user->getFillable();
        $this->routeToOverview = 'crudwire.user.index';

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
     *
     * @return void
     */
    public function index()
    {
        return view('crudwire::crudwire');
    }


    /**
     * create
     *
     * @return void
     */
    public function create()
    {
        $route='crudwire.user.store';
        return view('crudwire::create', ['fillables' => $this->fillables, 'route' => $route ]);
    }


    /**
     * store
     *
     * @param  mixed $request
     * @return void
     */
    public function store(Request $request)
    {
        $this->validateCreateUsers($request);

        $user = User::create($request->all());

        session()->flash('crudwire', 'new user created succesfully');
        return redirect()->route($this->routeToOverview);
    }


    /**
     * edit
     *
     * @param  mixed $id
     * @return void
     */
    public function edit($id)
    {
        $parameters = ['user' => $id];
        $route = 'crudwire.user.update';
        $user = User::find($id);
        return view('crudwire::create', ['user' => $user, 'fillables' => $this->fillables, 'route' => $route, 'parameters' => $parameters ]);
    }


    /**
     * update
     *
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
        return redirect()->route($this->routeToOverview);
    }

}
