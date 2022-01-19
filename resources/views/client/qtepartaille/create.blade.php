@include('client.header')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Ajouter des quantité</h1>
        <a href="#" download class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-download fa-sm text-white-50"></i> télécharger cette page</a>
    </div>

    <div class="row">
        <div class="col-lg-12 col-xlg-9 col-md-7">
            <div class="card">
                <div class="card-body">
                    <form class="form-horizontal form-material" action="/client/quantity" method="POST">
                        {{ csrf_field() }}
                        <input type="hidden" name="ofId" value="{{$orderFabrication->id}}">
                        <div class="form-group">
                            <label class="col-md-12">Order de fabrication:</label>
                            <div class="col-md-12">
                                <input type="text" id="orderFabrication" name="orderFabrication" value="{{$orderFabrication->ref}}"
                                    class="form-control{{ $errors->has('orderFabrication') ? ' is-invalid' : '' }} form-control-line" disabled required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">Tailles:</label>
                            <div class="col-md-12">
                                <select name="tailleId" class="form-control{{ $errors->has('tailleId') ? ' is-invalid' : '' }} form-control-line" required>
                                    <option value="" selected>Choisir la taille</option>
                                    @foreach($tailles as $taille)
                                    <option value="{{$taille->id}}">{{$taille->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">Quantité:</label>
                            <div class="col-md-12">
                                <input type="number" id="qte" name="qte" value="{{old('qte')}}"
                                    class="form-control{{ $errors->has('qte') ? ' is-invalid' : '' }} form-control-line" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <button type="submit" id="submit" class="btn btn-success">Ajouter la quantité</button>
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

@include('client.footer')
