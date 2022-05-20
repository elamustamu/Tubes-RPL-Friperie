<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;
use App\Models\Order;
use App\Models\Slide;

class HomeController extends Controller
{
	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
    //define a constructors
	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * Show the application dashboard.
	 *
	 * @return \Illuminate\Contracts\Support\Renderable
	 */
    //call the class without mentioning the function
	public function index()
	{
		$products = Product::popular()->get();
		$this->data['products'] = $products;

		$slides = Slide::active()->orderBy('position', 'ASC')->get();
		$this->data['slides'] = $slides;

		return $this->loadTheme('home', $this->data);
	}
}
