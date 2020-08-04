@extends('blank')

@section('content')
<div class="row">
          <div class="col-lg-6">
            <section class="panel">
              <header class="panel-heading">
                Chiffres
              </header>
              <ul class="list-group">
                <li class="list-group-item">Nombres de produits : {{$produits}}</li>
                <li class="list-group-item">Nombres de clients : {{$clients->count()}}</li>
              </ul>
            </section>
          </div>
          <div class="col-lg-6">
            <section class="panel">
              <header class="panel-heading">
                Mouvements
              </header>
              <ul class="list-group">
                <li class="list-group-item">Total Montant Encaissé : {{$montantEncaisse}}  || Ce mois-ci : </li>
                <li class="list-group-item">Total Montant Facturé : {{$montantFacture}} || Ce mois-ci : {{$montantThisMonth}} || Aujourd'hui : {{$montantToday}}</li>
                <li class="list-group-item">Total fonds a percevoir : {{$resteAPayer}} des clients suivants : <br> @foreach($clients as $client)
                	@if($client->montant()!=0)
                	<p>{{$client->libelleClient}} : {{$client->montant()}}</p>
                	@endif
                @endforeach</li>
              </ul>
            </section>
          </div>
        </div>
@endsection('content')