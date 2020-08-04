@extends('blank')

@section('content')
    <section class="panel">
        <header class="panel-heading">
            Gestion des Als
        </header>
        <div class="panel-body">
            <div class="row">
                <section style="margin-top: 30px" class="panel">
                    <header class="panel-heading tab-bg-primary ">
                        <ul class="nav nav-tabs">
                            <li class="active">
                                <a data-toggle="tab" href="#regroupements">Regroupements</a>
                            </li>
                            <li class="">
                                <a data-toggle="tab" href="#regrouper">Regrouper</a>
                            </li>
                        </ul>
                    </header>
                    <div class="panel-body">
                        <div class="tab-content">
                            <div id="regroupements" class="tab-pane active">
                                <dl>
                                    <dt>Beast of Bodmin</dt>
                                    <dd>A large feline inhabiting Bodmin Moor.</dd>

                                    <dt>Morgawr</dt>
                                    <dd>A sea serpent.</dd>

                                    <dt>Owlman</dt>
                                    <dd>A giant owl-like creature.</dd>
                                </dl>
                            </div>
                            <div id="regrouper" class="tab-pane">
                                <div class="form-group" style="padding-bottom: 30px">
                                    <label class="col-sm-2 control-label">Numero du AL</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control round-input">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-lg-2" for="inputSuccess">Les Factures</label>
                                    <div class="col-lg-10">
                                        <select multiple class="form-control">
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                            <option>5</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>


            <!-- Modal -->

            <!-- modal -->



        </div>
    </section>
@endsection
