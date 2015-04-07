<?php

use Validators\FuncionarioValidator as FuncionarioValidator;
use Illuminate\Support\MessageBag as MessageBag;

class UserController extends Controller
{

	/**
	*	Apply the filter to each request type post
	*/
	public function __construct(UserRepositoryInterface $users) {

        $this->users = $users;
		$this->beforeFilter('csrf', array('on'=>'post'));
	}


	/**
	 * Login Funcionario
	 *
	 * @return view
	 */

	public function login()
	{
        return View::make('login');
	}


 	/**
 	*  Instance FuncionarioValidator
 	*  array $input and validation  index
 	*
 	* return validation error or user not found
 	**/

 	public function logon()
	{

		if (Input::server("REQUEST_METHOD") == "POST")
		{
			$input = Input::all();

			$validator = new FuncionarioValidator;

			if ($validator->validate($input, 'login'))
			{
			  // validação OK
				$credentials = [
						"username" => Input::get("username"),
						"password" => Input::get("password")
						];

				if (Auth::attempt($credentials)) {

					return Redirect::to('index');

				} else {
					// falha na autenticacao
					$errors = ['login' => 'Usuário não encontrado!'];
					return Redirect::to('login')->withErrors($errors)->withInput();
				}
			}
			// falha na validação
			$errors = $validator->errors();
			return Redirect::to('login')->withErrors($errors)->withInput();
		}
		else
		{
			return Redirect::to('login');
		}
	}


	/**
 	*  Logout Funcionario
 	* 
 	* return view index
 	**/
	public function logout()
	{
		Auth::logout(); // log the user out of our application
		return Redirect::to('login'); // redirect the user to the login screen
	}

    public function request()
    {
        $data = [
            "requested"	=>	Input::old("requested")
        ];

        if (Input::server("REQUEST_METHOD") == "POST") {

            $validator = Validator::make(Input::all(),
                [
                    "email" => "required"
                ]);

            if ($validator->passes) {

                Password::remind($credentials, function($message, $user)
                {
                    $message->from("blecalt@gmail.com");
                });

                $data["requested"] = true;

                return Redirect::route("user/request")->withInput($data);
            }
        }
        return View::make("user/request", $data);
    }

    public function resetAction()
    {
        $token = "?$token".Input::get("token");

        $errors = new MessageBag();
        if($old = Input::old("errors"))
        {
            $errors = $old;
        }

        $data = [
            "token"		=> $token,
            "errors"	=>$errors
        ];

        if (Input::server("REQUEST_METHOD") == "POST") {

            $validator = Validator::make(Input::all(),
                [
                    "email" 				=> "required",
                    "password" 				=> "required|min:6",
                    "password_confirmation" => "same:password",
                    "token" 				=> "exists:token,token"
                ]);

            if ($validator->passes) {

                $credentials = [
                    "email"	=>	Input::get("email")
                ];

                Password::reset($credentials, function($user, $password)
                {
                    $user->password = Hash::make($password);
                    $user->save();

                    Auth::login($user);
                    return Redirect::route("/");
                }
                );

                $data["email"] = Input::get("email");
                $data["errors"] = $validator->errors();

                return Redirect::to(URL::route("user/reset").$token)->withInput($data);
            }
        }

        return View::make("user/reset", $data);
    }
}
		