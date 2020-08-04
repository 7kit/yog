@extends('blank')

@section('content')
<section class="panel">
              <header class="panel-heading">
                Types dépenses
              </header>
              <div class="panel-body">
              		<div class="row">
              		<a class="btn btn-success" href="#myModal" data-toggle="modal">
                                  Nouveau type
                              </a>
              	</div>
              	<div class="row">
              					<table class="table table-striped table-advance table-hover">
              		                <tbody>
              		                  <tr>

                                      <th><i class="icon_cogs"></i> Type Depenses</th>
                                      <th><i class="icon_cogs"></i> Actions</th>
              		                  </tr>
                                    @foreach($types as $type)
                                        <tr>
                                      <td><a href="{{route('depenses', $type->id)}}">{{$type->libelleType}}</a></td>
                                      <td>
                                        <div class="btn-group">
                                          <a class="btn btn-success" href="#myModal{{$type->id}}" data-toggle="modal"><i class="icon_check_alt2"></i></a>
                                          <form style="display:inline;" action="{{route('types.delete', $type->id)}}" method="post">
                                            {{ method_field('DELETE') }}
                                                              @csrf
                                            <button class="btn btn-danger" type="submit"><i class="icon_close_alt2"></i></button>
                                          </form>

                                        </div>
                                      </td>
                                    </tr>

                                    <!-- modal de modification debut -->
                                                      <!-- Modal -->
                                                      <div tabindex="-1" class="modal fade" id="myModal{{$type->id}}" role="dialog" aria-hidden="true" aria-labelledby="myModalLabel">
                                                        <div class="modal-dialog">
                                                          <div class="modal-content form">
                                                            <form class="form-validate form-horizontal" id="feedback_form" action="types.update" method="post" novalidate="novalidate">
                                                              {{ method_field('PATCH') }}
                                                              @csrf
                                                                <div class="modal-header">
                                                                  <button class="close" aria-hidden="true" type="button" data-dismiss="modal">×</button>
                                                                  <h4 class="modal-title">Modification d'un type</h4>
                                                                </div>
                                                                <div class="modal-body">
	              	                    <div class="form-group ">
	              	                      <label class="control-label col-lg-2" for="libelleType">Libelle : <span class="required">*</span></label>
	              	                      <div class="col-lg-10">
	              	                        <input name="libelleType" class="form-control " id="libelleType" required="" type="text" placeholder="Type de depenses" value="{{$type->libelleType}}" / >
	              	                      </div>
	              	                    </div>
                                         <div class="form-group ">
                                            <div class="col-lg-10">
                                              <input name="id" class="form-control " id="id" required="" type="hidden" placeholder="Montant A Encaisser" value="{{$type->id}}" / >
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
                    	<form class="form-validate form-horizontal" id="feedback_form" action="types.store" method="post" novalidate="novalidate">
                        @csrf
		                      <div class="modal-header">
		                        <button class="close" aria-hidden="true" type="button" data-dismiss="modal">×</button>
		                        <h4 class="modal-title">Enregistrer un type</h4>
		                      </div>
		                      <div class="modal-body">
                                  <div class="form-group ">
                                      <label class="control-label col-lg-2" for="libelleType">Libelle : <span class="required">*</span></label>
                                      <div class="col-lg-10">
                                          <input name="libelleType" class="form-control " id="libelleType" required="" type="text" placeholder="Libelle du type" value="" / >
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
