@extends('layouts.appadmin')

@section('title')
    Editer Catégorie
@endsection

@section('contenu')
            <div class="row grid-margin">
                <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                    <h4 class="card-title">Editer categorie</h4>

                        @if (Session::has('status'))
                         <div class="alert alert-success">
                             {{Session::get('status')}}
                         </div>
                        @endif

                        @if (count($errors)>0)
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>
                                        {{$error}}
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                            
                        @endif
                        {!!Form::open(['action' => 'App\Http\Controllers\CategorieController@modifiercategorie', 'method' => 'POST', 'class' => 'cmxform', 'id' => 'commentForm'])!!}
                        {{ csrf_field() }}
                        <div class="form-group">
                            {!!Form::hidden('id',$categorie->id )!!}
                            {!!Form::label('', 'Nom de la catégorie', ['for' =>'cname'])!!}
                            {!!Form::text('Category_name', $categorie->category_name, ['id' => 'cname', 'class' => 'form-control'])!!}
                        </div>
                        {!!Form::submit('Modfier',['class' => 'btn btn-primary'])!!}
                        {!!Form::close()!!}
                    </div>
                </div>
                </div>
            </div>
@endsection

@section('scripts')
    <script src="js/form-validation.js"></script>
    <script src="js/bt-maxLength.js"></script>
@endsection
