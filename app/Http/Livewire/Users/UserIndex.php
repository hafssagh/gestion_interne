<?php

namespace App\Http\Livewire\Users;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Hash;

class UserIndex extends Component
{

    public $nom, $cin ,$matricule, $fonction ,$grade ,$echelle, $service, $email, $password;
    public $userId;
    public $editMode =false;

    public $rules = [
        'nom' => 'required',
        'cin' => 'required',
        'matricule' => 'required',
        'fonction' => 'required',
        'grade' => 'required',
        'echelle' => 'required',
        'service' => 'required',
        'email' => 'required|email',
        'password' => 'required',
     
    ];



    public function render()
    {
        return view('livewire.users.user-index',[
            'users' => User::all()
        ])
            ->layout('layouts.app');
    }



    public function storeUser(){
        $this->validate();

        User::create([
            'nom' => $this->nom,
            'cin' => $this->cin,
            'matricule' => $this->matricule,
            'fonction' => $this->fonction,
            'grade' => $this->grade,
            'echelle' => $this->echelle,
            'service' => $this->service,
            'email' => $this->email,
            'password' => Hash::make($this->password),
        ]);
        $this->reset();
        $this->dispatchBrowserEvent('modal', ['modalId' => '#userModal', 'actionModal' => 'hide']);

        $this->dispatchBrowserEvent('swal:modal', [
            'title' => 'success',  
            'text' => 'User Added Successfully!', 
            'icon' => 'success',
            'showConfirmButton'=> false,
            'timer' => 2000
        ]);

        //session()->flash('user-message','User succefully added.');
    }



    public function showEditUser($id){
        $this->reset();
        $this->editMode =true;
        //find user
        $this->userId = $id;
        //load user
        $this->loadUser();
        //show modal
        $this->dispatchBrowserEvent('modal', ['modalId' => '#userModal', 'actionModal' => 'show']);
    }



    public function loadUser(){
        $user = User::find($this->userId);
        $this->nom = $user->nom;
        $this->cin = $user->cin;
        $this->matricule = $user->matricule;
        $this->fonction = $user->fonction;
        $this->grade = $user->grade;
        $this->echelle = $user->echelle;
        $this->service = $user->service;
        $this->email = $user->email;
    }



    public function updateUser(){
        $validate = $this->validate([
            'nom' => 'required',
            'cin' => 'required',
            'matricule' => 'required',
            'fonction' => 'required',
            'grade' => 'required',
            'echelle' => 'required',
            'service' => 'required',
            'email' => 'required|email',
        ]);
        $user = User::find($this->userId);
        $user->update($validate);
        $this->reset();
        $this->dispatchBrowserEvent('modal', ['modalId' => '#userModal', 'actionModal' => 'hide']);

        $this->dispatchBrowserEvent('swal:modal', [
            'title' => 'success',  
            'text' => 'User Updated Successfully!', 
            'icon' => 'success',
            'showConfirmButton'=> false,
            'timer' => 2000
        ]);

        //session()->flash('user-message','User succefully updated.');
    }


    public function deleteUser($id){
        $user = User::find($id);
        $user->delete();

        
        $this->dispatchBrowserEvent('swal:modal', [
            'title' => 'success',  
            'text' => 'User Deeleted Successfully!', 
            'icon' => 'success',
            'showConfirmButton'=> false,
            'timer' => 2000
            
        ]);

        //session()->flash('delete-message','Order deleted successfully!');

    }

    public function closeModal(){
        $this->dispatchBrowserEvent('modal', ['modalId' => '#userModal', 'actionModal' => 'hide']);
        $this->reset();
    }

    public function showModal(){
        $this->reset();
        $this->dispatchBrowserEvent('modal', ['modalId' => '#userModal', 'actionModal' => 'show']);
    }
       
}


