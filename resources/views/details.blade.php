@extends('blank')

@section('content')
<section class="panel">
              <header class="panel-heading">
                Détail de la facture : N° {{$facture->nFacture}} | montant : {{$facture->montantFacture}}
              </header>
              <div class="panel-body">
                  <div class="row">
                  <a class="btn btn-success" href="#myModal" data-toggle="modal">
                                  Compléter facture
                              </a>
                </div>
                <div class="row">
                        <table class="table table-striped table-advance table-hover">
                                  <tbody>
                                    <tr>
                                      <th><i class="icon_profile"></i> Produit</th>
                                      <th><i class="icon_mobile"></i> Quantité</th>
                                      <th><i class="icon_mobile"></i> Montant</th>
                                      <th><i class="icon_cogs"></i> Actions</th>
                                    </tr>
                                    @foreach($facture->details as $detail)
                                        <tr>
                                      <td>{{$detail->produit->designation}}</td>
                                      <td>{{$detail->quantiteProduit}}</td>
                                      <td>{{$detail->montantDetail}}</td>
                                      <td>
                                        <div class="btn-group">
                                          <a class="btn btn-success" href="#myModal{{$detail->id}}" data-toggle="modal"><i class="icon_check_alt2"></i></a>
                                          <form style="display:inline;" action="{{route('details.delete', $detail->id)}}" method="post">
                                            {{ method_field('DELETE') }}
                                                              @csrf
                                            <button class="btn btn-danger" type="submit"><i class="icon_close_alt2"></i></button>
                                          </form>
                                        </div>
                                      </td>
                                    </tr>   

                                    <!-- modal de modification debut -->
                                                      <!-- Modal -->
                                                      <div tabindex="-1" class="modal fade" id="myModal{{$detail->id}}" role="dialog" aria-hidden="true" aria-labelledby="myModalLabel">
                                                        <div class="modal-dialog">
                                                          <div class="modal-content form">
                                                            <form class="form-validate form-horizontal" id="feedback_form" action="{{route('details.update')}}" method="post" novalidate="novalidate">
                                                              {{ method_field('PATCH') }}
                                                              @csrf
                                                                <div class="modal-header">
                                                                  <button class="close" aria-hidden="true" type="button" data-dismiss="modal">×</button>
                                                                  <h4 class="modal-title">Modification d'un détail</h4>
                                                                </div>
                                                                <div class="modal-body">
                                         <div class="form-group ">
                                        <label class="control-label col-lg-2" for="produit">Client : <span class="required">*</span></label>
                                        <div class="col-lg-10">
                                          <select name="produit" id="produit" class="form-control input-lg m-bot15">
                                            @foreach($produits as $produit)
                                            @if ($detail->produit_id == $produit->id)
                                            <option value="{{$produit->id}}" selected="true">{{$produit->designation}}</option>
                                            @else
                                            <option value="{{$produit->id}}">{{$produit->designation}}</option>
                                            @endif
                                              @endforeach 
                                              
                                          </select>
                                        </div>
                                      </div>
                                      <div class="form-group ">
                                        <label class="control-label col-lg-2" for="quantiteProduit">Quantité : <span class="required">*</span></label>
                                        <div class="col-lg-10">
                                          <input name="quantiteProduit" class="form-control " id="quantiteProduit" required="" type="number" placeholder="Quantité" value="{{$detail->quantiteProduit}}" / >
                                          <input type="hidden" name="facture_id" value="{{$facture->id}}">
                                          <input type="hidden" name="detail_id" value="{{$detail->id}}">
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
                      <form class="form-validate form-horizontal" id="feedback_form" action="{{route('details.store')}}" method="post" novalidate="novalidate">
                        @csrf
                          <div class="modal-header">
                            <button class="close" aria-hidden="true" type="button" data-dismiss="modal">×</button>
                            <h4 class="modal-title">Enregistrer un encaissement</h4>
                          </div>
                          <div class="modal-body">
                                      <div class="form-group ">
                                        <label class="control-label col-lg-2" for="produit">Client : <span class="required">*</span></label>
                                        <div class="col-lg-10">
                                          <select name="produit" id="produit" class="form-control input-lg m-bot15">
                                            @foreach($produits as $produit)
                                              <option value="{{$produit->id}}" >{{$produit->designation}}</option>
                                              @endforeach
                                          </select>
                                        </div>
                                      </div>
                                      <div class="form-group ">
                                        <label class="control-label col-lg-2" for="montant">Quantité : <span class="required">*</span></label>
                                        <div class="col-lg-10">
                                          <input name="quantiteProduit" class="form-control " id="quantiteProduit" required="" type="number" placeholder="Quantité"/>
                                          <input type="hidden" name="facture_id" value="{{$facture->id}}">
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