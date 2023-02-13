<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
class CrinaController extends Controller
{
    public function index()
    {
        return view('crina.index');
    }
}
