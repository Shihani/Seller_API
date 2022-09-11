<?php

namespace App\Http\Controllers\API;
use App\Http\Controllers\API\BaseController as BaseController;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Validator;
use App\common\ResponseCodes;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RegisterController extends BaseController
{

    public function register(Request $request)
    {
        try {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'c_password' => 'required|same:password',
        ]);
   
        if($validator->fails()){
            return $this->sendResponse(false, $validator->messages(), ResponseCodes::ERROR_VALIDATION_FAILED);

        }
   
        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);
        $success['token'] =  $user->createToken('MyApp')->plainTextToken;
        $success['name'] =  $user->name;
        return $this->sendResponse(true, [], ResponseCodes::HTTP_OK);
        } catch (\Exception $e) {
            return $this->sendResponse(false, $e->getMessage(), ResponseCodes::SOMETHING_WENT_WRONG);
        }
    }


    public function login(Request $request)
    {
        try{
        $validator = validator::make($request->all(), [
            "email" => 'required|email',
            "password" => 'required',
        ]);
        if ($validator->fails()) {
            return $this->sendResponse(false, $validator->messages(), ResponseCodes::ERROR_VALIDATION_FAILED);
        } else {
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){ 
            $user = Auth::user(); 
            $success['token'] =  $user->createToken('MyApp')->plainTextToken; 
            $success['name'] =  $user->name;
            return $this->sendResponse(true, $success, ResponseCodes::HTTP_OK);

        } 
        else{ 
            return $this->sendResponse(false, [], ResponseCodes::AUTH_FAILED);

        } 
        } 
        }catch (\Exception $e) {
            return $this->sendResponse(false, $e->getMessage(), ResponseCodes::SOMETHING_WENT_WRONG);
        }
    
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
