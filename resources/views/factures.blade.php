@extends('blank')

@section('content')
<section class="panel">
              <header class="panel-heading">
                Produits
              </header>
              <div class="panel-body">
              		<div class="row">
              		<a class="btn btn-success" href="#myModal" data-toggle="modal">
                                  Nouvelle Facture
                              </a>
              	</div>
              	<div class="row">
              					<table class="table table-striped table-advance table-hover">
              		                <tbody>
              		                  <tr>
              		                    <th><i class="icon_profile"></i> Date</th>
                                      <th><i class="icon_cogs"></i> Numéros</th>
                                      <th><i class="icon_cogs"></i> Remise</th>
                                      <th><i class="icon_mobile"></i> Montant</th>
                                      <th><i class="icon_cogs"></i> Client</th>
                                      <th><i class="icon_cogs"></i> Actions</th>
              		                  </tr>
                                    @foreach($factures as $facture)
                                        <tr>
                                      <td>{{date('d-m-Y', strtotime($facture->dateFacture))}}</td>
                                      <td><a href="{{route('details', $facture->id)}}">{{$facture->nFacture}}</a></td>
                                      <td>{{$facture->remise}}</td>
                                      <td>{{$facture->montantFacture}}</td>
                                      <td>{{$facture->client->libelleClient}}</td>
                                      <td>
                                        <div class="btn-group">
                                          <a class="btn btn-success" href="#myModal{{$facture->id}}" data-toggle="modal"><i class="icon_check_alt2"></i></a>
                                          <form style="display:inline;" action="{{route('factures.delete', $facture->id)}}" method="post">
                                            {{ method_field('DELETE') }}
                                                              @csrf
                                            <button class="btn btn-danger" type="submit"><i class="icon_close_alt2"></i></button>
                                          </form>

                                        </div>
                                      </td>
                                    </tr>

                                    <!-- modal de modification debut -->
                                                      <!-- Modal -->
                                                      <div tabindex="-1" class="modal fade" id="myModal{{$facture->id}}" role="dialog" aria-hidden="true" aria-labelledby="myModalLabel">
                                                        <div class="modal-dialog">
                                                          <div class="modal-content form">
                                                            <form class="form-validate form-horizontal" id="feedback_form" action="factures.update" method="post" novalidate="novalidate">
                                                              {{ method_field('PATCH') }}
                                                              @csrf
                                                                <div class="modal-header">
                                                                  <button class="close" aria-hidden="true" type="button" data-dismiss="modal">×</button>
                                                                  <h4 class="modal-title">Modification d'un encaissement</h4>
                                                                </div>
                                                                <div class="modal-body">
                                         <div class="form-group ">
	              	                      <label class="control-label col-lg-2" for="dateFacture">Date : <span class="required">*</span></label>
	              	                      <div class="col-lg-10">
	              	                        <input class="form-control" name="dateFacture" id="dateFacture" type="date" size="16" value="{{date('Y-m-d', strtotime($facture->dateFacture))}}">
	              	                      </div>
	              	                    </div>
                                      <div class="form-group ">
                                        <label class="control-label col-lg-2" for="nFacture">Numéro : <span class="required">*</span></label>
                                        <div class="col-lg-10">
                                          <input name="nFacture" class="form-control " id="nFacture" required="" type="text" placeholder="Numéro Facture" value="{{$facture->nFacture}}" / >
                                        </div>
                                      </div>
	              	                    <div class="form-group ">
	              	                      <label class="control-label col-lg-2" for="client">Client : <span class="required">*</span></label>
	              	                      <div class="col-lg-10">
	              	                        <select name="client" id="client" class="form-control input-lg m-bot15">
	              	                        	@foreach($clients as $client)
	              	                        	@if ($facture->cient_id == $client->id)
	              	                        	<option value="{{$client->id}}" selected="true">{{$client->libelleClient}}</option>
	              	                        	@else
	              	                        	<option value="{{$client->id}}">{{$client->libelleClient}}</option>
	              	                        	@endif
                                              @endforeach

                                          </select>
	              	                      </div>
	              	                    </div>
	              	                    <div class="form-group ">
	              	                      <label class="control-label col-lg-2" for="remise">Remise : <span class="required">*</span></label>
	              	                      <div class="col-lg-10">
	              	                        <input name="remise" class="form-control " id="remise" required="" type="number" placeholder="Montant A Encaisser" value="{{$facture->remise}}" / >
	              	                      </div>
	              	                    </div>
                                         <div class="form-group ">
                                            <div class="col-lg-10">
                                              <input name="facture_id" class="form-control " id="facture_id" required="" type="hidden" placeholder="Montant A Encaisser" value="{{$facture->id}}" / >
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
                    	<form class="form-validate form-horizontal" id="feedback_form" action="factures.store" method="post" novalidate="novalidate">
                        @csrf
		                      <div class="modal-header">
		                        <button class="close" aria-hidden="true" type="button" data-dismiss="modal">×</button>
		                        <h4 class="modal-title">Enregistrer une facture</h4>
		                      </div>
		                      <div class="modal-body">
		                      			<div class="form-group ">
	              	                      <label class="control-label col-lg-2" for="dateFacture">Date : <span class="required">*</span></label>
	              	                      <div class="col-lg-10">
	              	                        <input class="form-control" name="dateFacture" id="dp1" type="date" size="16">
	              	                      </div>
	              	                    </div>
                                      <div class="form-group ">
                                        <label class="control-label col-lg-2" for="nFacture">Numéro : <span class="required">*</span></label>
                                        <div class="col-lg-10">
                                          <input name="nFacture" class="form-control " id="nFacture" required="" type="text" placeholder="Numéro Facture" / >
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
                                              <label class="control-label col-lg-2" for="remise">Numéro : <span class="required">*</span></label>
                                              <div class="col-lg-10">
                                                  <input name="remise" class="form-control " id="remise" required="" type="number" placeholder="Remise" / >
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
