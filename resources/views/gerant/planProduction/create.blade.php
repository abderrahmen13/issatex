@include('gerant.header')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Ajouter un plan de production</h1>
        <a href="#" download class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-download fa-sm text-white-50"></i> télécharger cette page</a>
    </div>

    <div class="row">
        <div class="col-lg-12 col-xlg-9 col-md-7">
            <div class="card">
                <div class="card-body">
                    <form class="form-horizontal form-material" action="/gerant/planProduction" method="POST">
                        {{ csrf_field() }}                       
                        <div class="form-group">
                            <label class="col-md-12">Ref:</label>
                            <div class="col-md-12">
                                <input type="text" id="ref" name="ref" value="{{old('ref')}}"
                                    class="form-control{{ $errors->has('ref') ? ' is-invalid' : '' }} form-control-line" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-12">Ilot</label>
                            <div class="col-sm-12">
                                <select name="ilotId" class="form-control{{ $errors->has('ilotId') ? ' is-invalid' : '' }} form-control-line" required>
                                    <option value="" selected>Choisir l'ilot</option>
                                    @foreach($ilots as $ilot)
                                    <option value="{{$ilot->id}}">{{$ilot->name}}</option>
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
                                    <option value="{{$orderFabrication->id}}">{{$orderFabrication->ref}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">Qte planifiée:</label>
                            <div class="col-md-12">
                                <input type="number" id="qtePlanned" name="qtePlanned" value="{{old('qtePlanned')}}"
                                    class="form-control{{ $errors->has('qtePlanned') ? ' is-invalid' : '' }} form-control-line" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">Qte fabriquée 1er choix:</label>
                            <div class="col-md-12">
                                <input type="number" id="qteFabricated1" name="qteFabricated1" value="{{old('qteFabricated1')}}"
                                    class="form-control{{ $errors->has('qteFabricated1') ? ' is-invalid' : '' }} form-control-line" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">Qte fabriquée 2ème choix:</label>
                            <div class="col-md-12">
                                <input type="number" id="qteFabricated2" name="qteFabricated2" value="{{old('qteFabricated2')}}"
                                    class="form-control{{ $errors->has('qteFabricated2') ? ' is-invalid' : '' }} form-control-line" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">Observation:</label>
                            <div class="col-md-12">
                                <input type="text" id="observation" name="observation" value="{{old('observation')}}"
                                    class="form-control{{ $errors->has('observation') ? ' is-invalid' : '' }} form-control-line" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">Date:</label>
                            <div class="col-md-12">
                                <input type="date" id="date" name="date" value="{{old('date')}}"
                                    class="form-control{{ $errors->has('date') ? ' is-invalid' : '' }} form-control-line" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-12">Status</label>
                            <div class="col-sm-12">
                                <select name="status" class="form-control{{ $errors->has('status') ? ' is-invalid' : '' }} form-control-line" required>
                                    <option value="" selected>Choisir la status</option>
                                    <option value="Confirmé">Confirmé</option>
                                    <option value="Non confirmé">Non confirmé</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <button type="submit" id="submit" class="btn btn-success">Ajouter le plan de production</button>
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
