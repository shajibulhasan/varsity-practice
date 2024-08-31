<?php

namespace App\Http\Controllers;

use App\Models\newuser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use File;

class NewuserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = DB::table('newusers')->paginate(10);
        return view('newuser',['data'=>$users]);   
    }
    public function addUser(Request $req)
    {
        $req->validate([
            'name' => 'required',
            'email' => 'required|email',
            'age' => 'required|integer',
            'city' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:20048',
        ],[
            'name.required' => 'Name is required',
            'email.required' => 'Email is required',
            'age.required' => 'Email is required',
            'city.required' => 'City is required',
            'image.required' => 'Image is required',
        ]);
    
        $imageName = time().'.'.$req->image->extension();  
      
        $req->image->move(public_path('images'), $imageName);
        $user = DB::table('newusers')->insert([
                    'name' => $req->name,
                    'email' => $req->email,
                    'age' => $req->age,
                    'city' => $req->city,
                    'image_path' => $imageName,
        ]);

        if($user)
        {
            echo '<h1>Data Added successfully!</h1>';
            return redirect()->route('view.user');
        }
        else
        {
            echo '<h1>Error!</h1>';
        }
    }
    public function getUser(string $id)
    {
        $users = DB::table('newusers')->where('id',$id)->get();
        return view('newuser',['data'=>$users]);
    }
    // public function updateUser(Request $req, string $id)
    // {
    //     $userImage=DB::table('newusers')->where('id',$id)->value('image_path');
    //     $user = DB::table('newusers')->where('id',$id)
    //         ->update([
    //         'name' => $req->name,
    //         'email' => $req->email,
    //         'age' => $req->age,
    //         'city' => $req->city,
    //     ]);

    //     if($user)
    //     { 
    //         if($req->image != "")
    //         {                
    //             File::delete(public_path('images/'.$userImage));
    //             $image = $req->image;
    //             $est = $image->getClientOriginalExtension();
    //             $imageName = time().'.'.$ext;       
    //             $image->move(public_path('images'), $imageName);
    //             DB::table('newusers')->where('id',$id)
    //             ->update([
    //             'image_path' => $imageName,
    //             ]);
    //             return redirect()->route('view.user');
    //         }
    //         else{
    //             return redirect()->route('view.user');
    //         }
    //     }
    //     else
    //     {
    //         echo '<h1>Error!</h1>';
    //     }
    // }



    public function updateUser(Request $req, string $id)
    {
              
        $imageOldName=DB::table('newusers')->where('id',$id)->value('image_path');
        if ($req->image != "") {
            $imageName = time().'.'.$req->image->extension(); 
            $req->image->move(public_path('images'), $imageName);
            $user_update = DB::table('newusers')->where('id',$id)->update([
                'name' => $req->name,
                'email' => $req->email,
                'age' => $req->age,
                'city' => $req->city,
                'image_path' => $imageName,
            ]);
            if($user_update){
                if(File::exists(public_path('images/'.$imageOldName))){
                    File::delete(public_path('images/'.$imageOldName));                
                    return redirect()->route('view.user')->withSuccess('Successfully update');
                }
                else{
                    return redirect()->route('view.user')->withSuccess('Successfully update');
                }
            }
            else{
                echo "Error!";
            }
        }
        else {
            $user_update = DB::table('newusers')->where('id',$id)->update([
                'name' => $req->name,
                'email' => $req->email,
                'age' => $req->age,
                'city' => $req->city,
            ]);
            if($user_update){                           
                return redirect()->route('view.user')->withSuccess('Successfully update');
            }
            else{
                echo "Error!";
            }
        }

    }


    public function fetchData(string $id)
    {
        $users = DB::table('newusers')->find($id);
        return view('updateuser',['data'=>$users]);
    }

    public function deleteUser(string $id)
    {
        $userImage=DB::table('newusers')->where('id',$id)->value('image_path');
        
        if(File::exists(public_path('images/'.$userImage))){
            File::delete(public_path('images/'.$userImage));
            $user = DB::table('newusers')->where('id',$id)->delete();
            return redirect()->route('view.user');
 
        }
        else
        {
            echo '<h1>Error!</h1>';
        }
    }
    public function imageUpload()
    {
        return view('imageUpload');
    }
    public function imageUploadPost(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    
        $imageName = time().'.'.$request->image->extension();  
     
        $request->image->move(public_path('images'), $imageName);
  
        /* Store $imageName name in DATABASE from HERE */
        $image = DB::table('blog_images')->insert([
            'image_path' => $imageName,
        ]);
    
        return back()
            ->with('success','You have successfully upload image.')
            ->with('image',$imageName); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(newuser $newuser)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(newuser $newuser)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, newuser $newuser)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(newuser $newuser)
    {
        //
    }
}
