@extends('blank')

@section('content')
<section class="panel">
              <header class="panel-heading">
                Enregistrement des produits périmés
              </header>
              <div class="panel-body">
              		<div class="row">
              		<a class="btn btn-success" href="#myModal" data-toggle="modal">
                                  Nouvel Enregistrement
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
                                    @foreach($perimes as $perime)
                                        <tr>
                                      <td>{{$perime->quantite}}</td>
                                      <td>{{$perime->indication}}</td>
                                      <td>{{$perime->produit->designation}}</td>
                                      <td>
                                        <div class="btn-group">
                                          <a class="btn btn-success" href="#myModal{{$perime->id}}" data-toggle="modal"><i class="icon_check_alt2"></i></a>
                                          <form style="display:inline;" action="{{route('perimes.delete', $perime->id)}}" method="post">
                                            {{ method_field('DELETE') }}
                                                              @csrf
                                            <button class="btn btn-danger" type="submit"><i class="icon_close_alt2"></i></button>
                                          </form>

                                        </div>
                                      </td>
                                    </tr>

                                    <!-- modal de modification debut -->
                                                      <!-- Modal -->
                                                      <div tabindex="-1" class="modal fade" id="myModal{{$perime->id}}" role="dialog" aria-hidden="true" aria-labelledby="myModalLabel">
                                                        <div class="modal-dialog">
                                                          <div class="modal-content form">
                                                            <form class="form-validate form-horizontal" id="feedback_form" action="perimes.update" method="post" novalidate="novalidate">
                                                              {{ method_field('PATCH') }}
                                                              @csrf
                                                                <div class="modal-header">
                                                                  <button class="close" aria-hidden="true" type="button" data-dismiss="modal">×</button>
                                                                  <h4 class="modal-title">Modification d'une péremption</h4>
                                                                </div>
                                                                <div class="modal-body">
	              	                    <div class="form-group ">
	              	                      <label class="control-label col-lg-2" for="produit">Produit : <span class="required">*</span></label>
	              	                      <div class="col-lg-10">
	              	                        <select name="produit" id="produit" class="form-control input-lg m-bot15">
	              	                        	@foreach($produits as $produit)
	              	                        	@if ($perime->produit_id == $produit->id)
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
	              	                        <input name="quantite" class="form-control " id="quantite" required="" type="number" placeholder="Quantité" value="{{$perime->quantite}}" / >
	              	                      </div>
	              	                    </div>
                                      <div class="form-group ">
                                        <label class="control-label col-lg-2" for="indication">Indication : <span class="required">*</span></label>
                                        <div class="col-lg-10">
                                          <input name="indication" class="form-control " id="indication" required="" type="text" placeholder="Indication relative au produit" value="{{$perime->indication}}" / >
                                        </div>
                                      </div>
                                         <div class="form-group ">
                                            <div class="col-lg-10">
                                              <input name="perime_id" class="form-control " id="perime_id" required="" type="hidden" placeholder="Id de la péremption" value="{{$perime->id}}" / >
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
                    	<form class="form-validate form-horizontal" id="feedback_form" action="perimes.store" method="post" novalidate="novalidate">
                        @csrf
		                      <div class="modal-header">
		                        <button class="close" aria-hidden="true" type="button" data-dismiss="modal">×</button>
		                        <h4 class="modal-title">Enregistrer une péremption</h4>
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
                                                  <input name="quantite" class="form-control " id="quantite" required="" type="number" placeholder="Quantité périmée" / >
                                              </div>
                                          </div>
                                      <div class="form-group ">
                                        <label class="control-label col-lg-2" for="indication">Indication : <span class="required">*</span></label>
                                        <div class="col-lg-10">
                                          <input name="indication" class="form-control " id="indication" required="" type="text" placeholder="Indication relative au produit" / >
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
