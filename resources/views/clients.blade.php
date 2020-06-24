@extends('blank')

@section('content')
<section class="panel">
              <header class="panel-heading">
                Clients
              </header>
              <div class="panel-body">
              		<div class="row">
              		<a class="btn btn-success" href="#myModal" data-toggle="modal">
                                  Nouveau Client
                              </a>
              	</div>
              	<div class="row">
              					<table class="table table-striped table-advance table-hover">
              		                <tbody>
              		                  <tr>
              		                    <th><i class="icon_profile"></i> Libelle Client</th>
              		                    <th><i class="icon_mobile"></i> Adresse</th>
              		                    <th><i class="icon_mobile"></i> Numero Telephonique</th>
                                      <th><i class="icon_mobile"></i> Reste à payer</th>
              		                    <th><i class="icon_cogs"></i> Actions</th>
              		                  </tr>
                                    @foreach($clients as $client)
              		                  <tr>
              		                    <td>{{$client->libelleClient}}</td>
                                      <td>{{$client->adresse}}</td>
              		                    <td>{{$client->telephone}}</td>
                                      <td>{{$client->montant()}}</td>
              		                    <td>
              		                      <div class="btn-group">
              		                        <a class="btn btn-primary" href="#"><i class="icon_plus_alt2"></i></a>
              		                        <a class="btn btn-success" href="#myModal{{$client->id}}" data-toggle="modal"><i class="icon_check_alt2"></i></a>
              		                        <a class="btn btn-danger" href="#"><i class="icon_close_alt2"></i></a>
              		                      </div>
              		                    </td>
              		                  </tr>

                                                    <!-- modal de modification debut -->
                                                                      <!-- Modal -->
                                                                      <div tabindex="-1" class="modal fade" id="myModal{{$client->id}}" role="dialog" aria-hidden="true" aria-labelledby="myModalLabel">
                                                      <div class="modal-dialog">
                                                        <div class="modal-content form">
                                                          <form class="form-validate form-horizontal" id="feedback_form" action="clients.update" method="post" novalidate="novalidate">
                                                              {{ method_field('PATCH') }}
                                                              @csrf
                                                              <div class="modal-header">
                                                                <button class="close" aria-hidden="true" type="button" data-dismiss="modal">×</button>
                                                                <h4 class="modal-title">Modification du client</h4>
                                                              </div>
                                                              <div class="modal-body">
                                                                <div class="form-group ">
                                                                            <label class="control-label col-lg-2" for="libelleClient">Libelle : <span class="required">*</span></label>
                                                                            <div class="col-lg-10">
                                                                              <input name="libelleClient" class="form-control" id="libelleClient" required="" type="text" minlength="5" placeholder="Libelle du client" value="{{$client->libelleClient}}">
                                                                              <input type="hidden" name="id" value="{{$client->id}}">
                                                                            </div>
                                                                          </div>
                                                                          <div class="form-group ">
                                                                            <label class="control-label col-lg-2" for="adresse">Adresse :</label>
                                                                            <div class="col-lg-10">
                                                                              <input name="adresse" class="form-control " id="adresse" required="" type="text" value="{{$client->adresse}}" / >
                                                                            </div>
                                                                          </div>
                                                                          <div class="form-group ">
                                                                            <label class="control-label col-lg-2" for="numtel">Num Tel :</label>
                                                                            <div class="col-lg-10">
                                                                              <input name="numtel" class="form-control " id="numtel" required="" type="text" value="{{$client->telephone}}" / >
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
                    	<form class="form-validate form-horizontal" id="feedback_form" action="clients.store" method="post" novalidate="novalidate">
		                      <div class="modal-header">
                            @csrf
		                        <button class="close" aria-hidden="true" type="button" data-dismiss="modal">×</button>
		                        <h4 class="modal-title">Enregistrer un client</h4>
		                      </div>
		                      <div class="modal-body">
		                      	<div class="form-group ">
	              	                      <label class="control-label col-lg-2" for="libelleClient">Libelle : <span class="required">*</span></label>
	              	                      <div class="col-lg-10">
	              	                        <input name="libelleClient" class="form-control" id="libelleClient" required="" type="text" minlength="5" placeholder="Libelle du client">
	              	                      </div>
	              	                    </div>
	              	                    <div class="form-group ">
	              	                      <label class="control-label col-lg-2" for="adresse">Adresse :</label>
	              	                      <div class="col-lg-10">
	              	                        <input name="adresse" class="form-control " id="adresse" required="" type="text" / >
	              	                      </div>
	              	                    </div>
	              	                    <div class="form-group ">
	              	                      <label class="control-label col-lg-2" for="numtel">Num Tel :</label>
	              	                      <div class="col-lg-10">
	              	                        <input name="numtel" class="form-control " id="numtel" required="" type="text" / >
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