<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Barang;
use App\Sewa;
use File;
use storage;
use Auth;
use Session;
class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $user=User::find(Auth::User()->id);
        $q=Barang::query();
        foreach(explode(',',$user->dilihat) as $ex)
        {
            $q->orWhere('id', 'LIKE', '%' . $ex . '%');   
        }
        $barang=$q->paginate();
        $sewa = Sewa::where('id_user',Auth::User()->id)
        ->where('status','verified')->paginate();
        return view('auth.profile.index',[
            'info'=>'profile',
            'user'=>$user,
            'b'=>$barang,
            's'=>$sewa
        ]);
        // return response($data);
    }

  public function waktuOnline(Request $request)
    {
        
        $data=User::where('id',Auth::User()->id)
        
            ->first();
          
  
        

        $waktu=date("y-m-d H:i:s");
        $waktu_skrg=strtotime($waktu);
        $login=strtotime($data->login);
        $selisih=$waktu_skrg-$login;
        $gas=gmdate("H:i:s",$selisih);
        return response($gas);
        

     
        
    }
    public function create()
    {
        //
    }

  
    public function store(Request $request)
    {
        //
    }

    
    public function show($id)
    {
        //
    }

  
    public function edit($id)
    {
        $user=User::find($id);
        return view('auth.profile.edit',[
            'info'=>'edit profile',
            'user'=>$user
        ]);
    }

  
    public function update(Request $request, $id)
    {
        $u=User::find($id);
        if($request->hasFile('gambar')){
            if(!file_exists("images/user/".Auth::User()->id."/foto"))
            {
                mkdir("images/user/".Auth::User()->id."/foto", 0777, true);
            }
            $gambar = $request->file('gambar');
            $filename = "avatar".$u->id.'.' .$gambar->getClientOriginalExtension();
            $location = public_path("images/user/".Auth::User()->id."/foto/",$filename);
            $gambar->move($location,$filename);
            $u->foto = $filename;
        }
        $u->alamat=$request->alamat;
        $u->phone=$request->phone;
        $u->save();
        if($u->save()){
            Session::flash('berhasil','Profil Berhasil Di Rubah');
            return redirect()->back();
        }else{
            Session::flash('gagal','Gagal Merubah Profil');
            return redirect()->back();
        }
            
       

    }

 
    public function destroy($id)
    {
        //
    }
}
