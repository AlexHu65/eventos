<?php

namespace App\Http\Controllers;

// Modelos
use App\Models\Comentario;
use App\Models\Banner;
use App\Models\Ciudad;
use App\Models\Estado;
use App\Models\Evento;
use App\Models\Conferencia;


// request
use App\Http\Requests\ComentarioRequest;
use App\Mail\MensajeMail;
use Illuminate\Http\Request;

// paquetes
use Automattic\WooCommerce\Client;
use Automattic\WooCommerce\HttpClient\HttpClientException;
use PhpParser\Node\Stmt\Echo_;


class HomeController extends Controller
{

  // public function index(Request $request)
  // {    

  //   if(isset($_GET['pd']) &&
  //     isset($_GET['od']) &&
  //     isset($_GET['u'])){

  //   $wooParameters = [
  //     'pd' => $_GET['pd'],
  //     'od' => $_GET['od'],
  //     'u' => $_GET['u']
  //   ];
    

  //   // recorrer
  //   foreach($wooParameters as $woo){
  //     if(empty($woo)){
  //       return redirect(config('app.main'));
  //     }
  //   }

  //   $woocommerce = new Client(
  //     'https://difraxion.com/sitios/eventos/', 
  //     'ck_e1896a6c44051a1ce17e832770252f9cb0bbf4f3', 
  //     'cs_15b2ec4272e87498beddaa60bb3a8675c75f5535',
  //     [
  //       'wp_api' => true, // Enable the WP REST API integration
  //       'version' => 'wc/v3' // WooCommerce WP REST API version
          
  //     ]
  //   );  

  //   $productoWoo = $woocommerce->get('products/' . $wooParameters['pd']);  
  //   $userWoo = $woocommerce->get('products/' . $wooParameters['pd']);  
  //   $productoWoo = $woocommerce->get('products/' . $wooParameters['pd']);  
    
  //   print_r($productoWoo);
    
  //   $estados = Estado::all();
  //   $evento =  Evento::where(['activo' => '1'])->first();

  //   $banners =  Banner::where(['activo' => '1'])->orderBy('orden' , 'desc')->get();
  //   // enviamos parametros a la vista
  //   $parametros = [
  //     'estados' => $estados,
  //     'banners' => $banners,
  //     'evento' => $evento,
  //   ];
  //   // regresamos la vista compilada
  //   return view('home.index' , $parametros);

  //   }else{
  //     return redirect(config('app.app_main'));
  //   }
  // }

  // panel
  public function conferencia(Request $request){

    $productoWoo = null;
    $orderWoo = null;
    $userWoo = null;

    if(isset($_GET['pd']) &&
    isset($_GET['od']) &&
    isset($_GET['u'])){

  $wooParameters = [
    'pd' => $_GET['pd'],
    'od' => $_GET['od'],
    'u' => $_GET['u']
  ];  

  // recorrer
  foreach($wooParameters as $woo){
    if(empty($woo)){
      return redirect(config('app.main'));
    }
  }
  
  
  try{

    $woocommerce = new Client(
      'https://difraxion.com/sitios/eventos/', 
      'ck_e1896a6c44051a1ce17e832770252f9cb0bbf4f3', 
      'cs_15b2ec4272e87498beddaa60bb3a8675c75f5535',
      [
        'wp_api' => true, // Enable the WP REST API integration
        'version' => 'wc/v3' // WooCommerce WP REST API version
          
      ]
    );

  }catch(HttpClientException $e){
    print_r($e->getMessage());
  }

  if(!$woocommerce){
    return redirect(config('app.app_main'));
  }

  $productoWoo = $woocommerce->get('products/' . $wooParameters['pd']);  
  $userWoo = $woocommerce->get('customers/' . $wooParameters['u']);  
  $orderWoo = $woocommerce->get('orders/' . $wooParameters['od']);  
  
  // validamos los id de woocommerce
  if(!$productoWoo ||
    !$userWoo || 
    !$orderWoo
  ){
    return redirect(config('app.app_main'));
  }  

  }else{
    return redirect(config('app.app_main'));
  }

  // aqui renderizamos la vista y enviamos los parametros

  // echo '<pre>';
  // echo 'Productos:';
  // print_r($productoWoo);
  // echo 'Usuarios:';
  // print_r($userWoo);
  // echo 'Orden:';
  // print_r($orderWoo);

  // echo '</pre>';

  

    $conferencia = Conferencia::where(['activo' => '1' , 'slug' => $productoWoo->slug])->first();
    // print_r($conferencia);
    if($conferencia){
      return view('streaming.panel' , ['conferencia' => $conferencia , 'tituloConferencia' => $conferencia->nombre]);

    }
    return redirect(config('app.app_main'));

  }
}
