<?php

namespace Radi\Http\Controllers;

use Radi\User;
use Radi\Dog;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Hash;

class AuthController extends Controller{
	public function crearCuenta(Request $request){
		  $request->validate([
            'name'     => 'required|string',
            'email'    => 'required|string|email|unique:users',
            'password' => 'required|string|confirmed',
        	]);
          $user = new User([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => bcrypt($request->password),
        	]);
          $user->save();
          return response()->json([
            'message' => 'Successfully created user!'], 201);
	}

    public function ingresarCuenta(Request $request)
    {
        $request->validate([
            'email'       => 'required|string|email',
            'password'    => 'required|string',
            'remember_me' => 'boolean',
        ]);
        $credentials = request(['email', 'password']);
        if (!Auth::attempt($credentials)) {
            return response()->json([
                'message' => 'Unauthorized'], 401);
        }
        $user = $request->user();
        $tokenResult = $user->createToken('Personal Access Token');
        $token = $tokenResult->token;
        if ($request->remember_me) {
            $token->expires_at = Carbon::now()->addWeeks(1);
        }
        $token->save();
        return response()->json([
            'access_token' => $tokenResult->accessToken,
            'token_type'   => 'Bearer',
            'user' => $user,
            'expires_at'   => Carbon::parse(
                $tokenResult->token->expires_at)
                    ->toDateTimeString(),
        ]);
       
    }

    public function logout(Request $request)
    {
        $request->user()->token()->revoke();
        return response()->json(['message' => 
            'Successfully logged out']);
    }
    public function profile(Request $request){
    	$user = User::findOrfail($request->id);
    	return $user;
    }

    public function user(Request $request)
    {	
        return User::find($request->get("user"));
    }


    #funcion para radi rcp
    public function getDogs(Request $request){
        return Dog::select('nombre','qr_code')->where('user_id',$request->get("user_id"))->get();
    }


    public function deletesession(Request $request){
        $re = \DB::table('oauth_access_tokens')->where('user_id',$request->get("user_id"))->delete();
        return $re;
    }
    public  function generateRandomString($length = 10) {
            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $charactersLength = strlen($characters);
            $randomString = '';
            for ($i = 0; $i < $length; $i++) {
                $randomString .= $characters[rand(0, $charactersLength - 1)];
            }
            return $randomString;
    }
     public function createDogProfile(Request $request)
    {   
       $image_64 = $request->get("image");
       $img = $this->getB64Image($image_64);
       $img_name = 'chikavi'. time() . '.' . 'png';
       \Storage::disk('public')->put($img_name, $img);

       $ubicacion_img = 'storage/'.'chikavi'. time() . '.' . 'png';

       $qr_code = $this->generateRandomString();
       $perro = new Dog([
            'nombre' => $request->get("nombre"),
            'especie' => $request->get("especie"),
            'raza' => $request->get("raza"),
            'color' => $request->get("color"),
            'imagen' => $ubicacion_img,
            'sexo' => $request->get("sexo"),
            'senas' => $request->get("senas"),
            'notas' => $request->get("notas"),
            'status' => $request->get("status"),
            'qr_code' => 'RD10'.$qr_code ,
            'place' => $request->get("place"),
            'user_id' => $request->get("user_id"),
            'owner' => $request->get("owner"),
            'history' => $request->get("history")
        ]);
        $perro->save();

        return response()->json(['message' => 'creado satisfactoriamente.']);

    }

    public function deleteDog(Request $request){
    	$dog = Dog::findOrFail($request->id);
    	if($dog->user_id == $request->user_id){
    		unlink(public_path().'/'.$dog->imagen);
	        $dog->delete();
	        return response()->json("Se elimino satisfactoriamente"); 
    	}else{
    		return response()->json("Error"); 
    	}

        

    }

    public function changepassword(Request $request){
        $userSearch = User::where('id',$request->id)->first();

        if(Hash::check($request->password,$userSearch->password)){
             $user = new User;
              $user->where('id','=',$userSearch->id)
                    ->update(['password' => bcrypt($request->newpassword)]);
                return response()->json("Se actualizo satisfactoriamente"); 
            }else{
                return response()->json("la contraseña no es la actual");
            }
    }

    public function getB64Image($base64_image){  

     // Obtener el String base-64 de los datos         
     $image_service_str = substr($base64_image, strpos($base64_image, ",")+1);
     // Decodificar ese string y devolver los datos de la imagen        
     $image = base64_decode($image_service_str);   
     // Retornamos el string decodificado
     return $image; 
}


  
}
