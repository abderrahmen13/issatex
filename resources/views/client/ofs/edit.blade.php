@include('client.header')

<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Order de fabrication: {{$ordreFabrication->ref}}</h1>
        <a href="#" download class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-download fa-sm text-white-50"></i> télécharger cette page</a>
    </div>
    <div class="row">
        <div class="col-lg-12 col-xlg-9 col-md-7">
            <div class="card">
                <div class="card-body">
                    <form class="form-horizontal form-material" action="/client/orderFabrications/{{$ordreFabrication->id}}" method="POST">
                        {{ csrf_field() }}
                        @method('PUT')
                        <input type="hidden" name="status" value="Non confirmé">
                        <div class="form-group">
                            <label class="col-md-12">Type: <b>{{$ordreFabrication->type}}</b></label>
                            <label class="col-md-12">Status: <b>{{$ordreFabrication->status}}</b></label>
                            @if($ordreFabrication->type == "Urgent")
                            <label class="col-md-12">Coût additionnel: <b>{{$ordreFabrication->additionalCost}}</b></label>
                            @endif
                        </div>
                        @if(Auth::user()->role == "clientPrivilege")
                        <div class="form-group">
                            <label class="col-md-12">Type:</label>
                            <div class="col-md-12">
                                <select name="type" class="form-control{{ $errors->has('type') ? ' is-invalid' : '' }} form-control-line" required>
                                    <option value="{{$ordreFabrication->type}}" selected>{{$ordreFabrication->type}}</option>
                                    <option value="Ordinaire">Ordinaire</option>
                                    <option value="Urgent">Urgent</option>
                                </select>
                            </div>
                        </div>
                        @endif
                        <div class="form-group">
                            <label class="col-md-12">Ref:</label>
                            <div class="col-md-12">
                                <input type="text" id="ref" name="ref" value="{{old('ref', $ordreFabrication->ref)}}"
                                    class="form-control{{ $errors->has('ref') ? ' is-invalid' : '' }} form-control-line" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">Description:</label>
                            <div class="col-md-12">
                                <textarea id="description" name="description"
                                    class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }} form-control-line" required>{{old('description', $ordreFabrication->description)}}</textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">Date:</label>
                            <div class="col-md-12">
                                <input type="date" id="date" name="date" value="{{old('date', $ordreFabrication->date)}}"
                                    class="form-control{{ $errors->has('date') ? ' is-invalid' : '' }} form-control-line" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">Temps estimé:</label>
                            <div class="col-md-12">
                                <input type="number" id="estimatedTime" name="estimatedTime" value="{{old('estimatedTime', $ordreFabrication->estimatedTime)}}"
                                    class="form-control{{ $errors->has('estimatedTime') ? ' is-invalid' : '' }} form-control-line" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">Prix unitaire:</label>
                            <div class="col-md-12">
                                <input type="number" id="unitPrice" name="unitPrice" value="{{old('unitPrice', $ordreFabrication->unitPrice)}}"
                                    class="form-control{{ $errors->has('unitPrice') ? ' is-invalid' : '' }} form-control-line" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-12">Article:</label>
                            <div class="col-sm-12">
                                <select name="articleId" class="form-control{{ $errors->has('articleId') ? ' is-invalid' : '' }} form-control-line" required>
                                @foreach($articles as $article)
                                    @if($article->id == $ordreFabrication->articleId)
                                    <option value="{{$article->id}}" selected>{{$article->ref}} | Designation: {{$article->designation}}</option>
                                    @else
                                    <option value="{{$article->id}}">{{$article->ref}} | Designation: {{$article->designation}}</option>
                                    @endif
                                @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <button type="submit" id="submit" class="btn btn-success">Modifier l'order de fabrications</button>
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
