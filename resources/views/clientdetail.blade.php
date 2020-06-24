@extends('blank')

@section('content')
<div class="row">
          <div class="col-lg-12">
            <section class="panel">
              <header class="panel-heading">
                Recherche
              </header>
              <div class="panel-body">
                <form class="form-inline " method="post" role="form" action="{{route('filtres.process')}}">
                	@csrf
                  <div class="form-group">
                      <select class="form-control input-lg m-bot15" name="type">
                                              <option>Encaissements</option>
                                              <option>Factures</option>
                                          </select></div>

                                          <div class="form-group"><select name="client" id="client" class="form-control input-lg m-bot15">
                                          	<option value="0">Tous confondus</option>
                                            @foreach($clients as $client)
                                              <option value="{{$client->id}}" >{{$client->libelleClient}}</option>
                                              @endforeach
                                          </select>
                  </div>
                  <div class="form-group"><input class="form-control input-lg m-bot15" name="debut" id="dateFacture" type="date" size="16" placeholder="Date de début"></div>

                  <div class="form-group"><input class="form-control input-lg m-bot15" name="fin" id="dateFacture" type="date" size="16" placeholder="Date de fin"></div>
                  <button class="btn btn-primary" type="submit">Enregistrer</button>
                </form>
              </div>
            </section>
            
            <section class="panel">
              <div class="panel-body">
                
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