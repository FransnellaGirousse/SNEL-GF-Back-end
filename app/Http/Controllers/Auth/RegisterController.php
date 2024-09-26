<?php  

namespace App\Http\Controllers\Auth;  

use App\Http\Controllers\Controller;  
use App\Models\User;  
use Illuminate\Http\Request;  
use Illuminate\Support\Facades\Hash; 
use Illuminate\Support\Facades\Validator;
 

class RegisterController extends Controller  
{  
    /**  
     * Handle an incoming registration request.  
     *  
     * @param  \Illuminate\Http\Request  $request  
     * @return \Illuminate\Http\JsonResponse  
     */  

     public function register(Request $request)
{
    // Data validation
    $validator = Validator::make($request->all(), [
        'firstname' => 'required|string|max:255',
        'lastname' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:8|confirmed|regex:/[a-z]/|regex:/[A-Z]/|regex:/[0-9]/|regex:/[@$!%*?&]/',
        'tel' => 'nullable|string|max:15|regex:/^\d+$/',
    ]);

    if ($validator->fails()) {
        return response()->json([
            'errors' => $validator->errors()
        ], 422);
    }

    // Created users with the 'name' field combined
    $user = User::create([
        'name' => $request->firstname . ' ' . $request->lastname, 
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'tel' => $request->tel,
    ]);

    return response()->json([
        'message' => 'Utilisateur créé avec succès',
        'user' => $user
    ], 201);
}
     
}