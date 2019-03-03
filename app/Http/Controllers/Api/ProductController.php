<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;

class ProductController extends Controller
{
    public function index() {

      //prendo tutti i prodotti
      $prodotti = Product::all();

      return response()->json($prodotti);
    }

    public function create(Request $request){
      //prendo i dati dal api
      $datiApi = $request->all();

    //  dd($datiApi);

    //controllo i dati
    $validateDatiApi = $request->validate([
      'nome' => 'required',
      'descrizioneProdotto' => 'required',
      'prezzo' => 'required'
    ]);

    //  dd($validateDatiApi);

    //salvo il prodotto
    $newProduct = new Product();
    $newProduct->fill($validateDatiApi);
    $newProduct->save();

    return response()->json($newProduct);

    }

    public function show($id){
      //controllo quello che arriva da id
      //dd($id);
      //query accorciata di laravel che non fa scrivere il where
      $prodottoTrovato = Product::find($id);

      //in caso di id inesistente e quindi null fai un json che stampi errore
      if(empty($prodottoTrovato)){

        return response()->json([
          'errore' => 'Id passato inesistente'
        ]);

      }
      //dd($prodottoTrovato);
      return response()->json($prodottoTrovato);
    }

    public function update(Request $request, $id) {

      //prendo i dati dal api
      $datiApi = $request->all();
      //dd($datiApi);

      $prodottoDaAggiornare = Product::find($id);

      //in caso di id inesistente e quindi null fai un json che stampi errore
      if(empty($prodottoDaAggiornare)){

        return response()->json([
          'errore' => 'Id passato inesistente'
        ]);

      }

      $prodottoDaAggiornare->update($datiApi);

      return response()->json($prodottoDaAggiornare);



    }
}
