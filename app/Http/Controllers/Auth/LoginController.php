<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use Session;
use Socialite;
use App\User;
use Hash;
class LoginController extends Controller
{
 

    use AuthenticatesUsers;

   
        
    
   
    
    protected $redirectTo = '/';

    public function __construct()
    {
        $this->middleware('guest', ['except' => ['logout', 'userLogout']]);
    }

    // public function userLogout()
    // {
    //     Auth::guard()->logout();
    //     return redirect()->back();
    
    // }
    public function redirectToProviderFacebook()
    {
     
            return Socialite::driver('facebook')->redirect();
 
        
    }
    //facebook
    public function handleProviderCallbackFacebook()
    {
   
            $userSocial = Socialite::driver('facebook')->user();
            $cariUser=User::where('email',$userSocial->email)->first();
            if($cariUser)
            {   
                Auth::login($cariUser);
                if($cariUser->visit_perhari!=NULL ){
                $ex=explode(',',$cariUser->visit_perhari);
                $h1=strtotime(date('Y-m-d'));
                $h2=strtotime(date($ex[1]));
                if($h1>$h2)
                {
                    $ex0=$ex[0]+1;
                    $ex1=date('Y-m-d H:i:s');
                    $cariUser->visit_perhari="$ex0,".$ex1;
                }
                }else{
                    $cariUser->visit_perhari="1,".date('Y-m-d H:i:s');
                }
                if(!file_exists("images/user/$cariUser->id/pesan/foto/$cariUser->id.jpg"))
                {
                    if(!file_exists("images/user/$cariUser->id/pesan/foto"))
                    {
                        mkdir("images/user/$cariUser->id/pesan/foto", 0777, true);
                       
                    }
                    $ch = curl_init($cariUser->foto);
                    $fp = fopen("images/user/$cariUser->id/pesan/foto/$cariUser->id.jpg", 'wb');
                    curl_setopt($ch, CURLOPT_FILE, $fp);
                    curl_setopt($ch, CURLOPT_HEADER, 0);
                    curl_exec($ch);
                    curl_close($ch);
                    fclose($fp);
                }
               $cariUser->login=date('Y-m-d H:i:s');
               $cariUser->save();
                return redirect(session('link'));
    
            }else{
                $user = new User();
                $user->name = $userSocial->getName();
                $user->email =$userSocial->getEmail();
                $user->foto =$userSocial->getAvatar();
                $user->status_login= "facebook";
                $user->password = Hash::make('rahasia');
                $user->visit_perhari="1,".date('Y-m-d H:i:s');
                $user->login=date('Y-m-d H:i:s');
                $user->save();
                Auth::login($user);
                
                return redirect(session('link'));
    
            }
            return redirect(session('link'));
    }
    //google
            public function redirectToProviderGoogle()
            {
                return Socialite::driver('google')->redirect();
            }
            public function handleProviderCallbackGoogle()
            {
                $userSocial = Socialite::driver('google')->user();
                $cariUser=User::where('email',$userSocial->email)->first();
                if($cariUser)
                {   
                    Auth::login($cariUser);
                    if($cariUser->visit_perhari!=NULL ){
                        $ex=explode(',',$cariUser->visit_perhari);
                        $h1=strtotime(date('Y-m-d'));
                        $h2=strtotime(date($ex[1]));
                        if($h1>$h2)
                        {
                            $ex0=$ex[0]+1;
                            $ex1=date('Y-m-d H:i:s');
                            $cariUser->visit_perhari="$ex0,".$ex1;
                        }
                        }else{
                            $cariUser->visit_perhari="1,".date('Y-m-d H:i:s');
                        }
                        if(!file_exists("images/user/$cariUser->id/pesan/foto/$cariUser->id.jpg"))
                        {
                            if(!file_exists("images/user/$cariUser->id/pesan/foto"))
                            {
                                mkdir("images/user/$cariUser->id/pesan/foto", 0777, true);
                               
                            }
                            $ch = curl_init($cariUser->foto);
                            $fp = fopen("images/user/$cariUser->id/pesan/foto/$cariUser->id.jpg", 'wb');
                            curl_setopt($ch, CURLOPT_FILE, $fp);
                            curl_setopt($ch, CURLOPT_HEADER, 0);
                            curl_exec($ch);
                            curl_close($ch);
                            fclose($fp);
                        }
                    $cariUser->login=date('Y-m-d H:i:s');
                    $cariUser->save();
                    return redirect(session('link'));

                }else{
                    $user = new User();
                    $user->name = $userSocial->getName();
                    $user->email =$userSocial->getEmail();
                    $user->foto =$userSocial->getAvatar();
                    $user->password = Hash::make('rahasia');
                    $user->status_login= "google";
                    $user->visit_perhari="1,".date('Y-m-d H:i:s');
                    $user->login=date('Y-m-d H:i:s');
                    $user->save();
                    Auth::login($user);
                    return redirect(session('link'));

                }
                return redirect(session('link'));
            }
        //instagram
            public function redirectToProviderInstagram()
            {
                return Socialite::driver('instagram')->redirect();
            }
            public function handleProviderCallbackInstagram()
            {
                $userSocial = Socialite::driver('instagram')->user();
                $cariUser=User::where('email',$userSocial->id)->first();
                if($cariUser)
                {   
                 
                   
                    Auth::login($cariUser);
                    if($cariUser->visit_perhari!=NULL ){
                        $ex=explode(',',$cariUser->visit_perhari);
                        $h1=strtotime(date('Y-m-d'));
                        $h2=strtotime(date($ex[1]));
                        if($h1>$h2)
                        {
                            $ex0=$ex[0]+1;
                            $ex1=date('Y-m-d H:i:s');
                            $cariUser->visit_perhari="$ex0,".$ex1;
                        }
                        }else{
                            $cariUser->visit_perhari="1,".date('Y-m-d H:i:s');
                        }
                
                    if(!file_exists("images/user/$cariUser->id/pesan/foto/$cariUser->id.jpg"))
                    {
                        if(!file_exists("images/user/$cariUser->id/pesan/foto"))
                        {
                            mkdir("images/user/$cariUser->id/pesan/foto", 0777, true);
                           
                        }
                        $ch = curl_init($cariUser->foto);
                        $fp = fopen("images/user/$cariUser->id/pesan/foto/$cariUser->id.jpg", 'wb');
                        curl_setopt($ch, CURLOPT_FILE, $fp);
                        curl_setopt($ch, CURLOPT_HEADER, 0);
                        curl_exec($ch);
                        curl_close($ch);
                        fclose($fp);
                    }
                    $cariUser->login=date('Y-m-d H:i:s');
                    $cariUser->save();
                    return redirect(session('link'));
                    // return response($ex[1]);
        
                }else{
                    $user = new User();
                    $user->name = $userSocial->getName();
                    $user->email =$userSocial->getId();
                    $user->foto =$userSocial->getAvatar();
                    $user->status_login= "instagram";
                    $user->password = Hash::make('rahasia');
                    $user->visit_perhari="1,".date('Y-m-d H:i:s');
                    $user->login=date('Y-m-d H:i:s');
                    $user->save();
                 
                    Auth::login($user);
                   
                    return redirect(session('link'));
                    
                }
                return redirect(session('link'));
            }
        
        
}
// $user->token;
        // $token = $user->token;
        // $refreshToken = $user->refreshToken; // not always provided
        // $expiresIn = $user->expiresIn;
        
        // OAuth One Providers
        // $token = $user->token;
        // $tokenSecret = $user->tokenSecret;
        
        // All Providers
        // $user->getId();
        // $user->getNickname();
        // $user->getName();
        // $user->getEmail();
        // $user->getAvatar();
        // return response( $user->getAvatar());
  