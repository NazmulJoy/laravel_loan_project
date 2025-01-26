<?php

namespace App\Http\Controllers;
use App\Models\LoanType;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
{
   
    $loanTypes = LoanType::all();

  
    return view('frontend.home', compact('loanTypes'));
}
public function loanTypes()
{
    
    $loanTypes = LoanType::all();

    return view('frontend.loan-types', compact('loanTypes'));
}
public function aboutUs()
{
    return view('frontend.about-us');
}
public function contactUs()
{
    return view('frontend.contact-us');
}
public function blogdetails()
{
    return view('frontend.blog-details');
}
public function blog()
{
    return view('frontend.blog');
}

}
