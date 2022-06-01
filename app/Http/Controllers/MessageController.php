<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use Illuminate\Support\Str;
use Illuminate\Http\RedirectResponse;

class MessageController extends Controller
{
    public function index()
    {
        $message=Message::orderBy('id','DESC')->paginate();
        return view('backend.message.index')->with('messages',$message);
    }
    public function update(Request $request, $id)
    {
      
        $message=Message::find($id);

        $data=$request->all();
        $data['lire_le']='0';
        //return $data;
       //return $data;
        $message->fill($data)->save();
      
       
        return redirect()->route('message.index');
    }

    public function store(Request $request)

    {

            $this->validate($request,
            [
                'nom'=>'required|string|max:30',
                'sujet'=>'required|string|max:100',
                'message'=>'required|string|max:2500',
                'telephone'=>'required',
                
            ]);
 

        // dd($request->all());
        $data=$request->all();
        $data['lire_le']='1';
        //return $data;
        // dd($data);
        $status=Message::create($data);
        // dd($status);
        if($status){
            request()->session()->flash('Succès','Message envoyer avec succès');
        }
        else{
            request()->session()->flash('erreur','Erreur, veuillez réessayer ultérieurement');
        }
 

        return redirect('/#plus');


    }

    public function destroy($id)
    {
        $message=Message::find($id);
        if($message){
            $status=$message->delete();
            if($status){
                request()->session()->flash('Succès','Message supprimé avec Succès');
            }
            else{
                request()->session()->flash('Erreur, veuillez réessayer ultérieurement');
            }
            return redirect()->route('message.index');
        }
        else{
            request()->session()->flash('erreur','Message introuvable');
            return redirect()->back();
        }
    }
    
}
