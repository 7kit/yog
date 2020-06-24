@extends('blank')

@section('content')
<div class="row">
          <div class="col-lg-12">
            <section class="panel">
              <header class="panel-heading">
                Recherche
              </header>
              <div class="panel-body">
                <form class="form-inline " method="post" role="form" action="{{route('filtresEncaissement.process')}}">
                	@csrf
                  {{ method_field('POST') }}

                                          <div class="form-group"><select name="client" id="client" class="form-control input-lg m-bot15">
                                          	<option value="0">Tous confondus</option>
                                            @foreach($clients as $client)
                                              <option value="{{$client->id}}" >{{$client->libelleClient}}</option>
                                              @endforeach
                                          </select>
                  </div>
                  <div class="form-group"><input class="form-control input-lg m-bot15" name="debut" id="dateFacture" type="date" size="16" placeholder="Date de début" value="2000-01-01"></div>

                  <div class="form-group"><input class="form-control input-lg m-bot15" name="fin" id="dateFacture" type="date" size="16" placeholder="Date de fin" value="2030-10-10"></div>
                  <button class="btn btn-primary" type="submit">Rechercher</button>
                </form>
              </div>
            </section>
            
            <section class="panel">
              <header class="panel-heading">
                Nombre d'enregistrements : {{$total}} | Montant total : {{$montantEncaisse}}
              </header>
              <div class="panel-body">
                <table class="table table-striped table-advance table-hover">
                            <tbody>
                              <tr>
                                <th><i class="icon_profile"></i> Date</th>
                                <th><i class="icon_mobile"></i> Montant</th>
                                <th><i class="icon_mobile"></i> Client</th>
                              </tr>
                              @foreach($encaissements as $encaissement)
                                  <tr>

                                      <td>{{$encaissement->dateEncaissement}}</td>
                                      <td>{{$encaissement->montantEncaisse}}</td>
                                      <td>{{$encaissement->client->libelleClient}}</td>
                                  </tr>
                              @endforeach
                            </tbody>
                        </table>
              </div>
            </section>
            
          </div>
        </div>
@endsection('content')

@section('sccript')
<script src="{{ asset('niceadmin/js/moment.js') }}"></script>
<script src="{{ asset('niceadmin/js/bootstrap-colorpicker.js') }}"></script>
<script src="{{ asset('niceadmin/js/daterangepicker.js') }}"></script>
<script src="{{ asset('niceadmin/js/bootstrap-datepicker.js') }}"></script>
@endsection('script')