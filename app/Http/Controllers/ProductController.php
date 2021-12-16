<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Shopify\Clients\Rest;
use App\Models\User;
use App\Models\Products;
use App\Models\variants;
use App\Models\Images;

use Illuminate\Support\Facades\Auth;


class ProductController extends Controller
{



    public function getdata(){

        $shop=auth()->user();
        $products=$shop->api()->rest('get', '/admin/products.json');

$products=$products['body']['container']['products'];

//$products=json_encode(json_decode($products),false);
//dd($products);
  foreach($products as $getproduct){
    $getproduct=json_decode(json_encode($getproduct),false);


    $this->single_product($getproduct, $shop);
  }
}





public function single_product($getproduct, $shop){
  $saveproduct=new Products;
$saveproduct->product_id=$getproduct->id;
$saveproduct->title=$getproduct->title;
$saveproduct->vendor=$getproduct->vendor;
$saveproduct->product_type=$getproduct->product_type;
$saveproduct->handle=$getproduct->handle;
$saveproduct->status=$getproduct->status;
$saveproduct->tags=$getproduct->tags;

// $saveproduct->images=$getproduct->images;
if($getproduct->image != null){
    $saveproduct->image = $getproduct->image->src;
}


$variants=$getproduct->variants;

foreach($variants as $getvariants){

    $variants=new variants;

    $variants->product_id=$getproduct->id;
    $variants->title=$getvariants->title;
    $variants->price=$getvariants->price;
    $variants->sku=$getvariants->sku;
    $variants->position=$getvariants->position;
    $variants->option1=$getvariants->option1;
    $variants->option2=$getvariants->option2;
    $variants->option3=$getvariants->option3;
    $variants->taxable=$getvariants->taxable;
    $variants->barcode=$getvariants->barcode;
    $variants->grams=$getvariants->grams;
    $variants->image_id=$getvariants->image_id;
    $variants->weight=$getvariants->weight;
    $variants->weight_unit=$getvariants->weight_unit;
    $variants->inventory_item_id=$getvariants->inventory_item_id;
    $variants->inventory_quantity=$getvariants->inventory_quantity;
    $variants->old_inventory_quantity=$getvariants->old_inventory_quantity;
    $variants->save();

}

$images=$getproduct->images;

if (!empty($images )){


   foreach($images as $getimages){

    $images=new Images;
    $images->product_id=$getproduct->id;
    $images->images = $getimages->src;
$images->save();
   }
}


$saveproduct->save();


}



public function update_product($getproduct, $shop,$get){

  $databaseproduct=Products::where('product_id',$get)->first();


  $databaseproduct->product_id=$getproduct->id;
  $databaseproduct->title=$getproduct->title;
  $databaseproduct->vendor=$getproduct->vendor;
  $databaseproduct->product_type=$getproduct->product_type;
  $databaseproduct->handle=$getproduct->handle;
  $databaseproduct->status=$getproduct->status;
  $databaseproduct->tags=$getproduct->tags;


  if($getproduct->image != null){
    $databaseproduct->image = $getproduct->image->src;
}
else{

  $databaseproduct->image = '';
}

  $variants=$getproduct->variants;


  if (!empty($variants )){
  $imagesnew=variants::where('product_id',$get)->delete();

foreach($variants as $getvariants){

  $variants=new variants;

    $variants->product_id=$getproduct->id;
    $variants->title=$getvariants->title;
    $variants->price=$getvariants->price;
    $variants->sku=$getvariants->sku;
    $variants->position=$getvariants->position;
    $variants->option1=$getvariants->option1;
    $variants->option2=$getvariants->option2;
    $variants->option3=$getvariants->option3;
    $variants->taxable=$getvariants->taxable;
    $variants->barcode=$getvariants->barcode;
    $variants->grams=$getvariants->grams;
    $variants->image_id=$getvariants->image_id;
    $variants->weight=$getvariants->weight;
    $variants->weight_unit=$getvariants->weight_unit;
    $variants->inventory_item_id=$getvariants->inventory_item_id;
    $variants->inventory_quantity=$getvariants->inventory_quantity;
    $variants->old_inventory_quantity=$getvariants->old_inventory_quantity;
    $variants->save();

}

  }

  else{
    $imagesnew=variants::where('product_id',$get)->delete();

  }

$images=$getproduct->images;




if (!empty($images )){


  $imagesnew=Images::where('product_id',$get)->delete();


   foreach($images as $getimages){

      $imagesnew=new Images;
      $imagesnew->product_id=$getproduct->id;
      $imagesnew->images = $getimages->src;
  $imagesnew->save();


   }
}

else{


  $imagesnew=Images::where('product_id',$get)->delete();

}

$databaseproduct->update();


}




public function getproductmanually(){

  $shop=auth()->user();


  $products=$shop->api()->rest('get', '/admin/products.json');

$products=$products['body']['container']['products'];

//dd($products);
foreach($products as $getproduct){

 $get= $getproduct['id'];
  $databaseproduct=Products::where('product_id',$get)->first();

  $getproduct=json_decode(json_encode($getproduct),false);

    if($databaseproduct==null){

      $this->single_product($getproduct, $shop);

    }
    else{

    $this->update_product($getproduct, $shop,$get);

    }

}
  return redirect('/');
}


public function getalldata(){


  $get=Products::all();
    return view('products',compact('get'));
}








}
