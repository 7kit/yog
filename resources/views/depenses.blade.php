@extends('blank')

@section('content')
<section class="panel">
              <header class="panel-heading">
                Type dont montant | montant : {{$montant}}
              </header>
              <div class="panel-body">
                  <div class="row">
                  <a class="btn btn-success" href="#myModal" data-toggle="modal">
                                  Enregistrer dépense
                              </a>
                </div>
                <div class="row">
                        <table class="table table-striped table-advance table-hover">
                                  <tbody>
                                    <tr>
                                      <th><i class="icon_profile"></i> Date</th>
                                      <th><i class="icon_mobile"></i> Libelle</th>
                                      <th><i class="icon_mobile"></i> Montant</th>
                                      <th><i class="icon_cogs"></i> Actions</th>
                                    </tr>
                                    @foreach($depenses as $depense)
                                        <tr>
                                      <td>{{date('Y-m-d', strtotime($depense->dateDepense))}}</td>
                                      <td>{{$depense->type->libelleType}}</td>
                                      <td>{{$depense->montantDepense}}</td>
                                      <td>
                                        <div class="btn-group">
                                          <a class="btn btn-success" href="#myModal{{$depense->id}}" data-toggle="modal"><i class="icon_check_alt2"></i></a>
                                          <form style="display:inline;" action="{{route('depenses.delete', $depense->id)}}" method="post">
                                            {{ method_field('DELETE') }}
                                                              @csrf
                                            <button class="btn btn-danger" type="submit"><i class="icon_close_alt2"></i></button>
                                          </form>
                                        </div>
                                      </td>
                                    </tr>

                                    <!-- modal de modification debut -->
                                                      <!-- Modal -->
                                                      <div tabindex="-1" class="modal fade" id="myModal{{$depense->id}}" role="dialog" aria-hidden="true" aria-labelledby="myModalLabel">
                                                        <div class="modal-dialog">
                                                          <div class="modal-content form">
                                                            <form class="form-validate form-horizontal" id="feedback_form" action="{{route('depenses.update')}}" method="post" novalidate="novalidate">
                                                              {{ method_field('PATCH') }}
                                                              @csrf
                                                                <div class="modal-header">
                                                                  <button class="close" aria-hidden="true" type="button" data-dismiss="modal">×</button>
                                                                  <h4 class="modal-title">Modification d'une dépense</h4>
                                                                </div>
                                                                <div class="modal-body">
                                           <div class="form-group ">
                                             <label class="control-label col-lg-2" for="dateDepense">Date : <span class="required">*</span></label>
                                             <div class="col-lg-10">
                                               <input class="form-control" name="dateDepense" id="dateDepense" type="date" size="16" value="{{date('Y-m-d', strtotime($depense->dateDepense))}}">
                                             </div>
                                            </div>
                                         <div class="form-group ">
                                        <label class="control-label col-lg-2" for="type_id">Type : <span class="required">*</span></label>
                                        <div class="col-lg-10">
                                          <select name="type_id" id="type_id" class="form-control input-lg m-bot15">
                                            @foreach($typeDepenses as $type)
                                            @if ($depense->type_id == $type->id)
                                            <option value="{{$type->id}}" selected="true">{{$type->libelleType}}</option>
                                            @else
                                            <option value="{{$type->id}}">{{$type->libelleType}}</option>
                                            @endif
                                              @endforeach

                                          </select>
                                        </div>
                                      </div>
                                      <div class="form-group ">
                                        <label class="control-label col-lg-2" for="libelleDepense">Libelle : <span class="required">*</span></label>
                                        <div class="col-lg-10">
                                          <input name="libelleDepense" class="form-control " id="libelleDepense" required="" type="text" placeholder="Libelle" value="{{$depense->libelleDepense}}" / >
                                         </div>
                                       </div>
                                      <div class="form-group ">
                                        <label class="control-label col-lg-2" for="montantDepense">Montant : <span class="required">*</span></label>
                                        <div class="col-lg-10">
                                          <input name="montantDepense" class="form-control " id="montantDepense" required="" type="number" placeholder="Montant" value="{{$depense->montantDepense}}" / >
                                          <input type="hidden" name="id" value="{{$depense->id}}">
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
                      <form class="form-validate form-horizontal" id="feedback_form" action="{{route('depenses.store')}}" method="post" novalidate="novalidate">
                        @csrf
                          <div class="modal-header">
                            <button class="close" aria-hidden="true" type="button" data-dismiss="modal">×</button>
                            <h4 class="modal-title">Enregistrer une dépense</h4>
                          </div>
                          <div class="modal-body">
                              <div class="form-group ">
                                  <label class="control-label col-lg-2" for="dateDepense">Date : <span class="required">*</span></label>
                                  <div class="col-lg-10">
                                      <input class="form-control" name="dateDepense" id="dateDepense" type="date" size="16" value="">
                                  </div>
                              </div>
                              <div class="form-group ">
                                  <label class="control-label col-lg-2" for="type_id">Type : <span class="required">*</span></label>
                                  <div class="col-lg-10">
                                      <select name="type_id" id="type_id" class="form-control input-lg m-bot15">
                                          @foreach($typeDepenses as $type)
                                                  <option value="{{$type->id}}">{{$type->libelleType}}</option>
                                          @endforeach
                                      </select>
                                  </div>
                              </div>
                              <div class="form-group ">
                                  <label class="control-label col-lg-2" for="libelleDepense">Libelle : <span class="required">*</span></label>
                                  <div class="col-lg-10">
                                      <input name="libelleDepense" class="form-control " id="libelleDepense" required="" type="text" placeholder="Libelle" value="" / >
                                  </div>
                              </div>
                              <div class="form-group ">
                                  <label class="control-label col-lg-2" for="montantDepense">Montant : <span class="required">*</span></label>
                                  <div class="col-lg-10">
                                      <input name="montantDepense" class="form-control " id="montantDepense" required="" type="number" placeholder="Montant" value="" / >
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
