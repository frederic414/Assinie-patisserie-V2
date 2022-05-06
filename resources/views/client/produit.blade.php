@extends('layouts.app1')
<style>
    .container-total{
        display: flex;
        flex-direction: column;
    }
.productandaddcart{
        justify-content: space-between;
    }
 .cmxform{
    /* background-color: white; */
    /* background-color: #dfce32d8; */
     display: flex;
     flex-direction: column;
     width: 70%;
     height: 69%;
     padding-left: 20px;
     /*align-items: center; */
     padding-right: 20px;
     padding-bottom: 30px;
     padding-top: 20px;
     padding-left: auto;
     border-radius: 5px;
     box-shadow: 3px 3px 10px #dfce32d8;
     border-color: #dfce32d8;
     margin: auto;
     margin-bottom: 70px;
 }
 input {
     width: 70%;
     justify-content: center;
     display: flex;
     /* border-color: #dfce32d8; */

 }
 .cmxform h6 {
     text-align: center;
     /*color:rgb(212, 17, 17); */
     color: #dfce32d8;
     font-weight: bold;
     font-family: "Poppins", Arial, sans-serif;
 }

 textarea{
     margin-bottom: 0px;
     height: 100px;
     margin-left: 0px;
     width: 70%;
    /* border-color: #dfce32d8; */
 }
 label{
     display: flex;
     margin:0px;
 }
 span{
     display: flex;
     flex-wrap: nowrap;
     justify-content: space-between;
     margin-top: 10px;
 }
 button{
     text-align: center;
 }
 .submitbtn{
     margin-top: 10px;
     display: flex;
     text-align: center;
     align-items: center;
 }
 .boutton1{
     width: 30%;
     border-radius: 5px;
     margin-left: 280px;
     background-color: #dc3545;
     border-color: #dc3545;
     color: white;

 }
 #com_title{
    text-align: center;
    /* color:rgb(212, 17, 17); */
     color: #dfce32d8;
     font-weight: bold;
     font-family: "Poppins", Arial, sans-serif;
     margin-bottom: 20px;
 }
</style>
@section('contenu')

    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

<div class="container-total">
    <div class="productandaddcart">
    <div class="container">
        <div class="row my-3">
            <!-- Image -->
            <div class="col-12 col-lg-6">
                <div class="card  mb-1">
                    <div class="card-body">
                            <img class="img-fluid img-thumbnail img-rounded" src="/storage/product_images/{{$produit->product_image}}" />
                            <h4 class="card-title text-center">{{$produit['product_name']}}</h4>
                    </div>
                </div>
            </div>

            <!-- Add to cart -->
            <div class="col-12 col-lg-6 add_to_cart_block my-5">
                <div class="card bg-light mb-3">
                    <div class="card-body">
                        <p class="price text-center">
                            <td class="total"><span class="badge badge-secondary btn-lg">{{$produit['product_price']}} Fcfa</span></td>
                        </p>
                            <a href="/ajouter-au-panier/{{$produit->id}}" class="btn btn-danger btn-lg btn-block text-uppercase">
                                <i class="fa fa-shopping-cart"></i> Ajouter au panier
                            </a>
                        <div class="product_rassurance my-3 text-center">
                            <ul class="list-inline">
                                <li class="list-inline-item"><i class="fa fa-truck fa-2x"></i><br/>Livraison rapide</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@if (count($produit->recommandations) > 0)
    <div class="container">
        <hr>
        <h2 class="text-center"> <li class="fa fa-eye"></li> Voir aussi</h2>       
            <div class="row">
                @foreach ($produit->recommandations as $produit_recommande)
                    @if ($produit_recommande->status ==1)
                        <div class="col-md-4 col-6">
                            <div class="card mb-4 box-shadow">
                                <div class="card-body">
                                    <a href="/catalogue/produit/{{$produit_recommande->id}}">
                                        <img class="card-img-top" src="/storage/product_images/{{$produit_recommande->product_image}}" alt="Card image cap">
                                        <h4 class="card-title">{{$produit_recommande->product_name}} </h4>
                                    </a>
                                </div>
                            </div>
                        </div> 
                    @endif
                @endforeach 
            </div>     
    </div>
@endif 

@endsection

