@extends('layouts.etudiant')

@section('content')
<section class="about text-center">
    <div class="container">
    <h1>Espace <span>Etudiants</span> </h1>
    <p class="lead">Bienvenue dans votre espace ,vous pouvez utiliser cette application <strong> Gestion des absences </strong> pour consulter consulter l'historique des absences
    </p>
   </div>
  </section>

  <section class="features text-center">
   <div class="container">
     <h1>Services</h1>
     <div class="row"><!-- featues1 -->
       <div class=" col-md-4  col-xs-12 ">
         <div class="feat"> <!--my div -->
           <i class="fa fa-newspaper-o" style="font-size:48px;" aria-hidden="true"></i>
          <h4>Consulter l'historique </h4>
          <p class="lead"> Consulter l'historique des absenses des etudiants dans votre matière</p>
          <a href="{{ route('etudiant.historique.absence')}}" class="btn btn-primary">Start</a>
         </div>
       </div>
     </div>
   </div>
 </section>
@endsection
