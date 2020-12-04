@extends('blank')

@section('content')
<section class="panel">
              <header class="panel-heading">
                Produits
              </header>
              <div class="panel-body">
              		<div class="row">
              		<a class="btn btn-success" href="#myModal" data-toggle="modal">
                                  Nouveau Produit
                              </a>
              	</div>
              	<div class="row">
              					<table class="table table-striped table-advance table-hover">
              		                <tbody>
              		                  <tr>
              		                    <th><i class="icon_profile"></i>Type</th>
              		                    <th><i class="icon_profile"></i> Designation</th>
              		                    <th><i class="icon_mobile"></i> Prix</th>
              		                    <th><i class="icon_cogs"></i> Actions</th>
              		                  </tr>
                                    @foreach($produits as $produit)
                                        <tr>
                                      <td>{{$produit->typeProduit->libelleTypeProduit}}</td>
                                      <td>{{$produit->designation}}</td>
                                      <td>{{$produit->prixUnitaire}}</td>
                                      <td>
                                        <div class="btn-group">
                                          <a class="btn btn-success" href="#myModal{{$produit->id}}" data-toggle="modal"><i class="icon_check_alt2"></i></a>
                                          <form style="display:inline;" action="{{route('produits.delete', $produit->id)}}" method="post">
                                            {{ method_field('DELETE') }}
                                                              @csrf
                                            <button class="btn btn-danger" type="submit"><i class="icon_close_alt2"></i></button>
                                          </form>
                                        </div>
                                      </td>
                                    </tr>

                                    <!-- modal de modification debut -->
                                                      <!-- Modal -->
                                                      <div tabindex="-1" class="modal fade" id="myModal{{$produit->id}}" role="dialog" aria-hidden="true" aria-labelledby="myModalLabel">
                                                        <div class="modal-dialog">
                                                          <div class="modal-content form">
                                                            <form class="form-validate form-horizontal" id="feedback_form" action="produits.update" method="post" novalidate="novalidate">
                                                              {{ method_field('PATCH') }}
                                                              @csrf
                                                                <div class="modal-header">
                                                                  <button class="close" aria-hidden="true" type="button" data-dismiss="modal">×</button>
                                                                  <h4 class="modal-title">Modification du produit</h4>
                                                                </div>
                                                                <div class="modal-body">
                                                                <div class="form-group ">
                                                                  <label class="control-label col-lg-2" for="type_id">Type : <span class="required">*</span></label>
                                                                  <div class="col-lg-10">
                                                                    <select name="type_id" id="type_id" class="form-control input-lg m-bot15">
                                                                      @foreach($typeProduits as $type)
                                                                      @if ($produit->type_id == $type->id)
                                                                      <option value="{{$type->id}}" selected="true">{{$type->libelleTypeProduit}}</option>
                                                                      @else
                                                                      <option value="{{$type->id}}">{{$type->libelleTypeProduit}}</option>
                                                                      @endif
                                                                        @endforeach

                                                                    </select>
                                                                  </div>
                                                                </div>
                                                                  <div class="form-group ">
                                                                              <label class="control-label col-lg-2" for="designationProduit">Désignation : <span class="required">*</span></label>
                                                                              <div class="col-lg-10">
                                                                                <input name="designationProduit" class="form-control" id="designationProduit" required="" type="text" minlength="5" value="{{$produit->designation}}">
                                                                              </div>
                                                                            </div>
                                                                            <div class="form-group ">
                                                                              <label class="control-label col-lg-2" for="prix">Prix :</label>
                                                                              <div class="col-lg-10">
                                                                                <input name="prix" class="form-control " id="prix" required="" type="number" value="{{$produit->prixUnitaire}}" / >
                                                                                <input type="hidden" name="id" value="{{$produit->id}}">
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
                    	<form class="form-validate form-horizontal" id="feedback_form" action="produits.store" method="post" novalidate="novalidate">
                        @csrf
		                      <div class="modal-header">
		                        <button class="close" aria-hidden="true" type="button" data-dismiss="modal">×</button>
		                        <h4 class="modal-title">Enregistrer un produit</h4>
		                      </div>
		                      <div class="modal-body">
		                      	<div class="form-group ">
	              	                      <label class="control-label col-lg-2" for="designationProduit">Désignation : <span class="required">*</span></label>
	              	                      <div class="col-lg-10">
	              	                        <input name="designationProduit" class="form-control" id="designationProduit" required="" type="text" minlength="5" placeholder="Nom du produit">
	              	                      </div>
	              	                    </div>
	              	                    <div class="form-group ">
	              	                      <label class="control-label col-lg-2" for="prix">Prix :</label>
	              	                      <div class="col-lg-10">
	              	                        <input name="prix" class="form-control " id="prix" required="" type="number" / >
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

     @endsection(script)
