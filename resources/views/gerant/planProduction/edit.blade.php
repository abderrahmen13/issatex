@include('gerant.header')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Plan de production: {{$planProduction->ref}}</h1>
        <a href="#" download class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-download fa-sm text-white-50"></i> télécharger cette page</a>
    </div>

    <div class="row">
        <div class="col-lg-12 col-xlg-9 col-md-7">
            <div class="card">
                <div class="card-body">
                    <form class="form-horizontal form-material" action="/gerant/planProduction/{{$planProduction->id}}" method="POST">
                        {{ csrf_field() }}
                        @method('PUT')
                        <div class="form-group">
                            <label class="col-md-12">Ref:</label>
                            <div class="col-md-12">
                                <input type="text" id="ref" name="ref" value="{{old('ref', $planProduction->ref)}}"
                                    class="form-control{{ $errors->has('ref') ? ' is-invalid' : '' }} form-control-line" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">Ref:</label>
                            <div class="col-md-12">
                                <input type="text" id="ref" name="ref" value="{{old('ref', $planProduction->ref)}}"
                                    class="form-control{{ $errors->has('ref') ? ' is-invalid' : '' }} form-control-line" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-12">Ilot</label>
                            <div class="col-sm-12">
                                <select name="ilotId" class="form-control{{ $errors->has('ilotId') ? ' is-invalid' : '' }} form-control-line" required>
                                    <option value="" selected>Choisir l'ilot</option>
                                    @foreach($ilots as $ilot)
                                    @if($ilot->id == $planProduction->ilotId)
                                    <option value="{{$ilot->id}}" selected>{{$ilot->name}}</option>
                                    @else
                                    <option value="{{$ilot->id}}">{{$ilot->name}}</option>
                                    @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-12">Ordre de fabrication</label>
                            <div class="col-sm-12">
                                <select name="ofId" class="form-control{{ $errors->has('ofId') ? ' is-invalid' : '' }} form-control-line" required>
                                    <option value="" selected>Choisir l'ordre de fabrication</option>
                                    @foreach($orderFabrications as $orderFabrication)
                                    @if($orderFabrication->id == $planProduction->ofId)
                                    <option value="{{$orderFabrication->id}}" selected>{{$orderFabrication->ref}}</option>
                                    @else
                                    <option value="{{$orderFabrication->id}}">{{$orderFabrication->ref}}</option>
                                    @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">Qte planifiée:</label>
                            <div class="col-md-12">
                                <input type="number" id="qtePlanned" name="qtePlanned" value="{{old('qtePlanned', $planProduction->qtePlanned)}}"
                                    class="form-control{{ $errors->has('qtePlanned') ? ' is-invalid' : '' }} form-control-line" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">Qte fabriquée 1er choix:</label>
                            <div class="col-md-12">
                                <input type="number" id="qteFabricated1" name="qteFabricated1" value="{{old('qteFabricated1', $planProduction->qteFabricated1)}}"
                                    class="form-control{{ $errors->has('qteFabricated1') ? ' is-invalid' : '' }} form-control-line" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">Qte fabriquée 2ème choix:</label>
                            <div class="col-md-12">
                                <input type="number" id="qteFabricated2" name="qteFabricated2" value="{{old('qteFabricated2', $planProduction->qteFabricated2)}}"
                                    class="form-control{{ $errors->has('qteFabricated2') ? ' is-invalid' : '' }} form-control-line" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">Observation:</label>
                            <div class="col-md-12">
                                <input type="text" id="observation" name="observation" value="{{old('observation', $planProduction->observation)}}"
                                    class="form-control{{ $errors->has('observation') ? ' is-invalid' : '' }} form-control-line" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">Date:</label>
                            <div class="col-md-12">
                                <input type="date" id="date" name="date" value="{{old('date', $planProduction->date)}}"
                                    class="form-control{{ $errors->has('date') ? ' is-invalid' : '' }} form-control-line" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-12">Status</label>
                            <div class="col-sm-12">
                                <select name="status" class="form-control{{ $errors->has('status') ? ' is-invalid' : '' }} form-control-line" required>
                                    @if($planProduction->status == "Confirmé")
                                    <option value="Confirmé" selected>Confirmé</option>
                                    <option value="Non confirmé">Non confirmé</option>
                                    @else
                                    <option value="Non confirmé" selected>Non confirmé</option>
                                    <option value="Confirmé">Confirmé</option>
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <button type="submit" id="submit" class="btn btn-success">Modifier le plan de production</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
        <!-- Column -->
    </div>
</div>
<!-- /.container-fluid -->

@include('gerant.footer')
