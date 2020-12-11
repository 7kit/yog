@extends('blank')

@section('content')
<section class="panel">
              <header class="panel-heading">
                Productions
              </header>
              <div class="panel-body">
              		<div class="row">
              		<a class="btn btn-success" href="#myModal" data-toggle="modal">
                                  Nouvelle Production
                              </a>
              	</div>
              	<div class="row">
              					<table class="table table-striped table-advance table-hover">
              		                <tbody>
              		                  <tr>
                                      <th><i class="icon_cogs"></i> Quantité</th>
                                      <th><i class="icon_mobile"></i>Indication</th>
                                      <th><i class="icon_cogs"></i> Produit</th>
                                      <th><i class="icon_cogs"></i> Actions</th>
              		                  </tr>
                                    @foreach($productions as $production)
                                        <tr>
                                      <td>{{$production->quantite}}</td>
                                      <td>{{$production->indication}}</td>
                                      <td>{{$production->produit->designation}}</td>
                                      <td>
                                        <div class="btn-group">
                                          <a class="btn btn-success" href="#myModal{{$production->id}}" data-toggle="modal"><i class="icon_check_alt2"></i></a>
                                          <form style="display:inline;" action="{{route('productions.delete', $production->id)}}" method="post">
                                            {{ method_field('DELETE') }}
                                                              @csrf
                                            <button class="btn btn-danger" type="submit"><i class="icon_close_alt2"></i></button>
                                          </form>

                                        </div>
                                      </td>
                                    </tr>

                                    <!-- modal de modification debut -->
                                                      <!-- Modal -->
                                                      <div tabindex="-1" class="modal fade" id="myModal{{$production->id}}" role="dialog" aria-hidden="true" aria-labelledby="myModalLabel">
                                                        <div class="modal-dialog">
                                                          <div class="modal-content form">
                                                            <form class="form-validate form-horizontal" id="feedback_form" action="productions.update" method="post" novalidate="novalidate">
                                                              {{ method_field('PATCH') }}
                                                              @csrf
                                                                <div class="modal-header">
                                                                  <button class="close" aria-hidden="true" type="button" data-dismiss="modal">×</button>
                                                                  <h4 class="modal-title">Modification d'une production</h4>
                                                                </div>
                                                                <div class="modal-body">
	              	                    <div class="form-group ">
	              	                      <label class="control-label col-lg-2" for="produit">Produit : <span class="required">*</span></label>
	              	                      <div class="col-lg-10">
	              	                        <select name="produit" id="produit" class="form-control input-lg m-bot15">
	              	                        	@foreach($produits as $produit)
	              	                        	@if ($production->produit_id == $produit->id)
	              	                        	<option value="{{$produit->id}}" selected="true">{{$produit->designation}}</option>
	              	                        	@else
	              	                        	<option value="{{$produit->id}}">{{$produit->designation}}</option>
	              	                        	@endif
                                              @endforeach

                                          </select>
	              	                      </div>
	              	                    </div>
	              	                    <div class="form-group ">
	              	                      <label class="control-label col-lg-2" for="quantite">Quantité : <span class="required">*</span></label>
	              	                      <div class="col-lg-10">
	              	                        <input name="quantite" class="form-control " id="quantite" required="" type="number" placeholder="Quantité" value="{{$production->quantite}}" / >
	              	                      </div>
	              	                    </div>
                                      <div class="form-group ">
                                        <label class="control-label col-lg-2" for="indication">Indication : <span class="required">*</span></label>
                                        <div class="col-lg-10">
                                          <input name="indication" class="form-control " id="indication" required="" type="text" placeholder="Indication relative a la production" value="{{$production->indication}}" / >
                                        </div>
                                      </div>
                                         <div class="form-group ">
                                            <div class="col-lg-10">
                                              <input name="production_id" class="form-control " id="production_id" required="" type="hidden" placeholder="Id de la production" value="{{$production->id}}" / >
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
                    	<form class="form-validate form-horizontal" id="feedback_form" action="productions.store" method="post" novalidate="novalidate">
                        @csrf
		                      <div class="modal-header">
		                        <button class="close" aria-hidden="true" type="button" data-dismiss="modal">×</button>
		                        <h4 class="modal-title">Enregistrer une production</h4>
		                      </div>
		                      <div class="modal-body">
	              	                    <div class="form-group ">
	              	                      <label class="control-label col-lg-2" for="produit">Produit : <span class="required">*</span></label>
	              	                      <div class="col-lg-10">
	              	                        <select name="produit" id="produit" class="form-control input-lg m-bot15">
	              	                        	@foreach($produits as $produit)
                                              <option value="{{$produit->id}}" >{{$produit->designation}}</option>
                                            @endforeach
                                          </select>
	              	                      </div>
	              	                    </div>
                                          <div class="form-group ">
                                              <label class="control-label col-lg-2" for="quantite">Quantité : <span class="required">*</span></label>
                                              <div class="col-lg-10">
                                                  <input name="quantite" class="form-control " id="quantite" required="" type="number" placeholder="Quantité produite" / >
                                              </div>
                                          </div>
                                      <div class="form-group ">
                                        <label class="control-label col-lg-2" for="indication">Indication : <span class="required">*</span></label>
                                        <div class="col-lg-10">
                                          <input name="indication" class="form-control " id="indication" required="" type="text" placeholder="Indication relative a la production" / >
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
