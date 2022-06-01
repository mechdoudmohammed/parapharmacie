<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use Illuminate\Support\Str;

class ClientController extends Controller
{
    public function index()
    {
        $client=Client::orderBy('id','DESC')->paginate();
        return view('backend.client.index')->with('clients',$client);
    }
    public function show()
    {
        
    }

    public function edit($id){
        $client=Client::find($id);
        if(!$client){
            request()->session()->flash('error','Client introuvable');
        }
        return view('backend.client.edit')->with('client',$client);
    }
    public function update(Request $request, $id)
    {
        $client=Client::find($id);
        $this->validate($request,[
            'nom'=>'string|required|max:30',
            'prenom'=>'string|required|max:30',
            'type'=>'string|required|max:20',
            'adresse'=>'string|required|max:55',
            'tele'=>'string|required',
            'email'=>'string|required|max:55',
        ]);
        if ($request->ice == null){
            $request['ice'] = "";
        } if ($request->iff == null){
            $request['iff'] = "";
        }
        if ($request->rc == null){
            $request['rc'] = "";
        }


        $data=$request->all();
       
      
        //return $data;
       //return $data;
        $status=$client->fill($data)->save();
      
        if($status){
            request()->session()->flash('Succès','client modifié avec Succès');
        }
        else{
            request()->session()->flash('Erreur, veuillez réessayer ultérieurement');
        }
        return redirect()->route('client.index');
    }


    public function create()
    {
        return view('backend.client.create');
    }


    public function store(Request $request)
    {
        $this->validate($request,
        [
            'nom'=>'string|required|max:30',
            'prenom'=>'string|required|max:30',
            'type'=>'string|required|max:20',
            'adresse'=>'string|required|max:55',
            'tele'=>'string|required',
            'email'=>'string|required|max:55',
        ]);

        $data=$request->all();
        //return $data;
        $status=Client::create($data);  

        if($status){
            request()->session()->flash('Succès','Client ajouté avec succès');
        }
        else{
            request()->session()->flash('erreur','Erreur, veuillez réessayer ultérieurement');
        }
        return redirect()->route('client.create');

    }
    public function destroy($id)
    {
        $client=Client::find($id);
        if($client){
            $status=$client->delete();
            if($status){
                request()->session()->flash('Succès','client supprimé avec Succès');
            }
            else{
                request()->session()->flash('Erreur, veuillez réessayer ultérieurement');
            }
            return redirect()->route('client.index');
        }
        else{
            request()->session()->flash('erreur','client introuvable');
            return redirect()->back();
        }
    }
}
