@extends('blank')

@section('content')
<section class="panel">
              <header class="panel-heading">
                Produits
              </header>
              <div class="panel-body">
              		<div class="row">
              		<a class="btn btn-success" href="#myModal" data-toggle="modal">
                                  Nouvel Encaissement
                              </a>
              	</div>
              	<div class="row">
              					<table class="table table-striped table-advance table-hover">
              		                <tbody>
              		                  <tr>
              		                    <th><i class="icon_profile"></i> Date</th>
              		                    <th><i class="icon_mobile"></i> Montant</th>
              		                    <th><i class="icon_cogs"></i> Client</th>
              		                    <th><i class="icon_cogs"></i> Actions</th>
              		                  </tr>
                                    @foreach($encaissements as $encaissement)
                                        <tr>
                                      <td>{{$encaissement->dateEncaissement}}</td>
                                      <td>{{$encaissement->montantEncaisse}}</td>
                                      <td>{{$encaissement->client->libelleClient}}</td>
                                      <td>
                                        <div class="btn-group">
                                          <a class="btn btn-primary" href="#"><i class="icon_plus_alt2"></i></a>
                                          <a class="btn btn-success" href="#myModal{{$encaissement->id}}" data-toggle="modal"><i class="icon_check_alt2"></i></a>
                                          <a class="btn btn-danger" href="#"><i class="icon_close_alt2"></i></a>
                                        </div>
                                      </td>
                                    </tr>   

                                    <!-- modal de modification debut -->
                                                      <!-- Modal -->
                                                      <div tabindex="-1" class="modal fade" id="myModal{{$encaissement->id}}" role="dialog" aria-hidden="true" aria-labelledby="myModalLabel">
                                                        <div class="modal-dialog">
                                                          <div class="modal-content form">
                                                            <form class="form-validate form-horizontal" id="feedback_form" action="encaissements.update" method="post" novalidate="novalidate">
                                                              {{ method_field('PATCH') }}
                                                              @csrf
                                                                <div class="modal-header">
                                                                  <button class="close" aria-hidden="true" type="button" data-dismiss="modal">×</button>
                                                                  <h4 class="modal-title">Modification d'un encaissement</h4>
                                                                </div>
                                                                <div class="modal-body">
                                         <div class="form-group ">
	              	                      <label class="control-label col-lg-2" for="designationProduit">Date : <span class="required">*</span></label>
	              	                      <div class="col-lg-10">
	              	                        <input class="form-control" name="dateEncaissement" id="dp1" type="date" size="16" value="{{$encaissement->dateEncaissement}}">
	              	                      </div>
	              	                    </div>
	              	                    <div class="form-group ">
	              	                      <label class="control-label col-lg-2" for="client">Client : <span class="required">*</span></label>
	              	                      <div class="col-lg-10">
	              	                        <select name="client" id="client" class="form-control input-lg m-bot15">
	              	                        	@foreach($clients as $client)
	              	                        	@if ($encaissement->cient_id == $client->id)
	              	                        	<option value="{{$client->id}}" selected="true">{{$client->libelleClient}}</option>
	              	                        	@else
	              	                        	<option value="{{$client->id}}">{{$client->libelleClient}}</option>
	              	                        	@endif
                                              @endforeach 
                                              
                                          </select>
	              	                      </div>
	              	                    </div>
	              	                    <div class="form-group ">
	              	                      <label class="control-label col-lg-2" for="montant">Montant : <span class="required">*</span></label>
	              	                      <div class="col-lg-10">
	              	                        <input name="montant" class="form-control " id="montant" required="" type="number" placeholder="Montant A Encaisser" value="{{$encaissement->montantEncaisse}}" / >
	              	                      </div>
	              	                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                  <button class="btn btn-default" type="button" data-dismiss="modal">Fermer</button>
                                                                  <button class="btn btn-success" type="submit">Enregistrer</button>
                                                                </div>
                                                            </form>
                                                          </div>
                                                        </div>
                                                      </div>
                                                      <!-- modal -->
                                    <!-- modal de modification fin -->   
                                    @endforeach
              		                  
              		                </tbody>
              		            </table>
              	</div>
                
                
                <!-- Modal -->
                <div tabindex="-1" class="modal fade" id="myModal" role="dialog" aria-hidden="true" aria-labelledby="myModalLabel">
                  <div class="modal-dialog">
                    <div class="modal-content form">
                    	<form class="form-validate form-horizontal" id="feedback_form" action="encaissements.store" method="post" novalidate="novalidate">
                        @csrf
		                      <div class="modal-header">
		                        <button class="close" aria-hidden="true" type="button" data-dismiss="modal">×</button>
		                        <h4 class="modal-title">Enregistrer un encaissement</h4>
		                      </div>
		                      <div class="modal-body">
		                      			<div class="form-group ">
	              	                      <label class="control-label col-lg-2" for="designationProduit">Date : <span class="required">*</span></label>
	              	                      <div class="col-lg-10">
	              	                        <input class="form-control" name="dateEncaissement" id="dp1" type="date" size="16">
	              	                      </div>
	              	                    </div>
	              	                    <div class="form-group ">
	              	                      <label class="control-label col-lg-2" for="client">Client : <span class="required">*</span></label>
	              	                      <div class="col-lg-10">
	              	                        <select name="client" id="client" class="form-control input-lg m-bot15">
	              	                        	@foreach($clients as $client)
                                              <option value="{{$client->id}}" >{{$client->libelleClient}}</option>
                                              @endforeach
                                          </select>
	              	                      </div>
	              	                    </div>
	              	                    <div class="form-group ">
	              	                      <label class="control-label col-lg-2" for="montant">Montant : <span class="required">*</span></label>
	              	                      <div class="col-lg-10">
	              	                        <input name="montant" class="form-control " id="montant" required="" type="number" placeholder="Montant A Encaisser" / >
	              	                      </div>
	              	                    </div>
		                   		</div>
		                      <div class="modal-footer">
		                        <button class="btn btn-default" type="button" data-dismiss="modal">Fermer</button>
		                        <button class="btn btn-success" type="submit">Enregistrer</button>
		                      </div>
                  		</form>
                    </div>
                  </div>
                </div>
                <!-- modal -->

              </div>
            </section>
@endsection('content')

@section('script')
<script src="{{ asset('niceadmin/js/moment.js') }}"></script>
<script src="{{ asset('niceadmin/js/bootstrap-colorpicker.js') }}"></script>
<script src="{{ asset('niceadmin/js/daterangepicker.js') }}"></script>
<script src="{{ asset('niceadmin/js/bootstrap-datepicker.js') }}"></script>
@endsection('script')