<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PHPUnit\TextUI\CliArguments\Builder;

class DataController extends Controller
{
    function Data(){
    $rejult= DB::table('Invoices')->get();
    $rejult= DB::table('Invoices')->first();
    $rejult= DB::table('Invoices')->where('id',2)-> first();
    $rejult= DB::table('Invoices')->limit(3)->get();
    // $rejult= DB::table('Invoices')->where('user_id',11)->where('paid',1)->get();
    $rejult = DB::table('invoices') ->where('user_id', 921) ->where('paid', 1) ->get();

$result= DB::table('invoices')->where('paid',1)->count();
$result= DB::table('invoices')->max('total_price');
$result= DB::table('invoices')->min('total_price');
$result= DB::table('invoices')->sum('total_price');
$result= DB::table('invoices')->sum('paid',1);
$result= DB::table('invoices')->pluck('total_price');
$result= DB::table('users')->pluck('firstName','email');
$result= DB::table('users')->pluck('lastName','email');
$result= DB::table('invoices')->limit(3)->offset(3)->get();
$result= DB::table('invoices')->select('paid','discount','vat','payable')
 ->where('total_price', '>', 500)->where('vat', '<', 10)->get();

$result= DB::table('invoices')->where('total_price','>', 500)->get();


//   $result = DB::table('invoices')
//         ->join('invoice_products', 'invoices.id', '=', 'invoice_products.invoice_id') 
//         ->select('invoices.id', 'invoices.qty', 'invoices.sale_price')
//         ->get();
    // Return the result

    $result= DB::table('products')->pluck('name','price');
    $result= DB::table('products')->count();
    $result= DB::table('products')->select('name','price')->distinct()->get();

    //join,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,

    $results = DB::table('invoice_products')
    ->join('invoices', 'invoices.id', '=', 'invoice_products.invoice_id')
    
    ->get();
    $results = DB::table('invoice_products')
    ->join('invoices', 'invoices.id', '=', 'invoice_products.invoice_id')
    ->select('invoice_products.*', 'invoices.*')
    ->get();


    $result = DB::table('users')
    ->skip(3)
    ->take(3)
    ->get();
    
    $results = DB::table('products')
    ->join('categories', 'products.id', '=', 'products.category_id')
    
    ->get();

    $results = DB::table('products')
    ->join('categories', 'products.category_id', '=', 'categories.id')
    // ->select('products.*', 'categories.name as category_name')
    ->get();
    $results = DB::table('products')
    ->join('categories', 'products.category_id', '=', 'categories.id')
    ->join('users', 'products.user_id', '=', 'users.id')
   
    ->get();

    // leftjoin
    $results = DB::table('products')
    ->leftJoin('categories', 'products.category_id', '=', 'categories.id')
    ->leftJoin('users', 'products.user_id', '=', 'users.id')
   
    ->get();
    // rightjoin
    $results = DB::table('products')
    ->leftJoin('categories', 'products.category_id', '=', 'categories.id')
    ->leftJoin('users', 'products.user_id', '=', 'users.id')
   
    ->get();
    // cross join
    // $results = DB::table('products')
    // ->crossJoin('users')
   
    // ->get();
    
// union,,,,,,,,,,,,,,,,,,,,,,,,,
/*
    $union = DB:: table('products')->where('price', '>', 2000);
    $result =DB ::table('users')->where('firstName', 'Emmanuel')->union($union)->get();
    
    return $result;
*/
//pagination

// return DB::table('users')->paginate();


// latest,,,,,,,,,,,,,,,,,,,,,
return DB::table('users')
 ->latest()
 ->get();

 //oldtest,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,
  return DB::table('users')
  ->oldest()
  ->get();

  return DB::table('users')
  ->orderByDesc('email') 
  ->get();
return DB::table('users')
  ->orderByRaw('email') 
  ->get();


    }
}
