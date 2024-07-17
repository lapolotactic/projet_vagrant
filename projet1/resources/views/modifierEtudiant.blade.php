
@extends("layouts.master")

@section("contenu")
<div class="my-3 p-3 bg-body rounded shadow-sm">
    <h3 class="border-bottom pb-2 mb-4">Modifier un étudiant</h3>
   <div>
       <div class="mb-4">
       
       <!-- pour la session alert modifier avec success-->
    @if (session()->has("success"))   
         <div class="alert alert-success">
             <p> {{ session()->get('success')}}</p>
         </div>
    @endif

       <!-- pour la session erreur facultatif-->
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>   
            @foreach($errors->all() as $error)
            <li>{{$error}}</li>
            @endforeach
        </ul>
      </div>
    @endif

       <form style="width: 35%" method="post" action="{{ route('etudiant.modifier', ['etudiant'=>$etudiant->id]) }}">
       @csrf

       <!-- le input pour mapper la modification-->
       <input type="hidden" name="_method" value="put">

  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Nom</label>
    <input type="text" class="form-control" name="nom" value="{{$etudiant->nom}}" required>
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Prénom</label>
    <input type="text" class="form-control"name="prenom" value="{{$etudiant->prenom}}" required>
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Classe</label>
        <select class="form-control" name="classe_id"required>
            <option value=""></option>
            @foreach($classes as $classe)

                @if($classe->id == $etudiant->classe_id)
                  <option value=" {{$classe->id}}" selected> {{$classe->libelle}}</option>
                @else 
                  <option value=" {{$classe->id}}"> {{$classe->libelle}}</option>
                @endif

            @endforeach
        </select>
  </div>
  <button type="submit" class="btn btn-primary">Enregistrer</button>
  <a href="{{route('etudiant')}}" class="btn btn-danger">Annuler</a>
</form>
           
       </div>
  
   </div>
  </div>
@endsection