<div>

<x-slot name="header">
    <h2 class="text-center">Ressource humaine</h2>
</x-slot>
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">

            <div class="msg">
                @if (session()->has('user-message')) 
                   <div id="successMessage" class="alert alert-success"> 
                   <button type="button" class="close" data-dismiss="alert">×</button> 
                       <i class="fa fa-times mr-1"></i> 
                       {{ session('user-message') }} 
                   </div> 
                @endif 
              </div>


              <div class="msg">
                @if (session()->has('deleteUser-message')) 
                   <div id="dangerMessage" class="alert alert-danger"> 
                   <button type="button" class="close" data-dismiss="alert">×</button> 
                       <i class="fa fa-times mr-1"></i> 
                       {{ session('deleteUser-message') }} 
                   </div> 
                @endif 
              </div>

            <!-- Button trigger modal -->
            <div>
                <button wire:click="showModal" class="btn btn-outline-primary">
                    Ajouté un employé
                </button>
            </div>
            <br>
            
<div>
<table class="table-fixed w-full">
    <thead>
        <tr class="bg-gray-100">
            <th class="px-4 py-2 w-20">#</th>
            <th class="px-4 py-2">Nom</th>
            <th class="px-4 py-2">CIN</th>
            <th class="px-4 py-2">Matricule</th>
            <th class="px-4 py-2">Fonction</th>
            <th class="px-4 py-2">Grade</th>
            <th class="px-4 py-2">Echelle</th>
            <th class="px-4 py-2">Service</th>
            <th class="px-4 py-2">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($users as $user)
        <tr>
            <td class="border px-4 py-2">{{ $user->id }}</td>
            <td class="border px-4 py-2">{{ $user->nom }}</td>
            <td class="border px-4 py-2">{{ $user->cin }}</td>
            <td class="border px-4 py-2">{{ $user->matricule }}</td>
            <td class="border px-4 py-2">{{ $user->fonction }}</td>
            <td class="border px-4 py-2">{{ $user->grade }}</td>
            <td class="border px-4 py-2">{{ $user->echelle }}</td>
            <td class="border px-4 py-2">{{ $user->service }}</td>
            <td class="border px-4 py-2">
                <button wire:click="showEditUser({{ $user->id }})" class="btn btn-success">Edit</button>
                <button  class="btn btn-danger" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal">Delete</button>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
</div>

  
  <!-- ADD UPDATE Modal -->
  <div class="modal fade" id="userModal" tabindex="-1" aria-labelledby="userModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="userModalLabel">Modal title</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" ></button>
        </div>
        <div class="modal-body">
            <form>
                <div class="form-group row">
                    <label for="nom"
                        class="col-md-4 col-form-label text-md-right">{{ __('Nom') }}</label>

                    <div class="col-md-6">
                        <input id="nom" type="text"
                            class="form-control @error('nom') is-invalid @enderror"
                            wire:model.defer="nom">

                        @error('nom')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="cin"
                        class="col-md-4 col-form-label text-md-right">{{ __('CIN') }}</label>

                    <div class="col-md-6">
                        <input id="cin" type="text"
                            class="form-control @error('cin') is-invalid @enderror"
                            wire:model.defer="cin">

                        @error('cin')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="matricule"
                        class="col-md-4 col-form-label text-md-right">{{ __('Matricule') }}</label>

                    <div class="col-md-6">
                        <input id="matricule" type="text"
                            class="form-control @error('matricule') is-invalid @enderror"
                            wire:model.defer="matricule">

                        @error('matricule')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="fonction"
                        class="col-md-4 col-form-label text-md-right">{{ __('Fonction') }}</label>

                    <div class="col-md-6">
                        <input id="fonction" type="text"
                            class="form-control @error('fonction') is-invalid @enderror"
                            wire:model.defer="fonction">

                        @error('fonction')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="grade"
                        class="col-md-4 col-form-label text-md-right">{{ __('Grade') }}</label>

                    <div class="col-md-6">
                        <input id="grade" type="text"
                            class="form-control @error('grade') is-invalid @enderror"
                            wire:model.defer="grade">

                        @error('grade')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="echelle"
                        class="col-md-4 col-form-label text-md-right">{{ __('Echelle') }}</label>

                    <div class="col-md-6">
                        <input id="echelle" type="text"
                            class="form-control @error('echelle') is-invalid @enderror"
                            wire:model.defer="echelle">

                        @error('echelle')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="service"
                        class="col-md-4 col-form-label text-md-right">{{ __('Service') }}</label>

                    <div class="col-md-6">
                        <input id="service" type="text"
                            class="form-control @error('service') is-invalid @enderror"
                            wire:model.defer="service">

                        @error('service')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="email"
                        class="col-md-4 col-form-label text-md-right">{{ __('E-Mail') }}</label>

                    <div class="col-md-6">
                        <input id="email" type="email"
                            class="form-control @error('email') is-invalid @enderror"
                            wire:model.defer="email">

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                
                @if(!$editMode)
                    <div class="form-group row">
                        <label for="password"
                            class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                        <div class="col-md-6">
                            <input id="password" type="password"
                                class="form-control @error('password') is-invalid @enderror"
                                wire:model.defer="password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                @endif

            </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-outline-secondary" wire:click="closeModal">Close</button>
          @if ($editMode)
                <button type="button" class="btn btn-outline-primary" wire:click="updateUser">Update user</button>
          @else
                <button type="button" class="btn btn-outline-primary" wire:click="storeUser">Store user</button>
          @endif
        </div>
      </div>
    </div>
  </div>

 
            <!--DELETE Modal -->
            <div wire:ignore.self class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="deleteModalLabel">Delete Confirm</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                 <span aria-hidden="true close-btn">×</span>
                            </button>
                        </div>
                       <div class="modal-body">
                            <p>Are you sure want to delete?</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button"class="btn btn-outline-secondary close-btn" data-dismiss="modal">Close</button>
                            <button type="button" wire:click="deleteUser({{ $user->id }})" class="btn btn-outline-danger close-modal" data-dismiss="modal">Yes, Delete</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>  

</div>


