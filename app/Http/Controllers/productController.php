<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\product;

class productController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $product = product::where('id',$id)->get();
        return view('singlepage',compact('product'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $imageName = $request->img->getClientOriginalName();
        $product = new product;
        $product->name = $request->name;
        $product->category = $request->category;
        $product->price = $request->price;
        $product->brand = $request->brand;
        $product->description = $request->des;
        $product->img = $request->img->move(('images'), $imageName);
        $product->save();
        return redirect('/add')->with('status','Product added successfully!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function brand(){
    //         $brand = product::get('brand');
    //         return view('',compact('brand'));
    // }

    public function brand(Request $request){
        $brand = $request->input('filter');
        $data = [];
        foreach($brand as $value){
            $filter = product::where('brand',$value)->get();
            array_push($data,$filter);
        }
        dd($data);
    }
    
    public function Mobile(Request $request)
    {   

        $brand = product::select('brand')->where('category','Mobile')->distinct()->get();
        $mobile = product::where('category','Mobile')->get();
        return view('mobile',compact('mobile','brand'));
    }

    public function laptop()
    {   
        $brand = product::select('brand')->where('category','Laptop')->distinct()->get();
        $laptop = product::where('category','Laptop')->get();
        return view('laptop',compact('laptop','brand'));
    }

    public function tv()
    {   
        $brand = product::select('brand')->where('category','Television & Audio')->distinct()->get();
        $tv = product::where('category','Television & Audio')->get();
        return view('tv',compact('tv','brand'));
    }

    public function cc()
    {   
        $brand = product::select('brand')->where('category','Case & Cover')->distinct()->get();
        $cc = product::where('category','Case & Cover')->get();
        return view('cover',compact('cc','brand'));
    }

    public function tablet()
    {   
        $brand = product::select('brand')->where('category','Tablet')->distinct()->get();
        $tab = product::where('category','Tablet')->get();
        return view('tablet',compact('tab','brand'));
    }

    public function computer()
    {   
        $brand = product::select('brand')->where('category','Computer Accessories')->distinct()->get();
        $ca = product::where('category','Computer Accessories')->get();
        return view('computer',compact('ca','brand'));
    }
    
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    public function filterByBrand(Request $request)
    {
        $selectedBrands = $request->input('filter');
        $selectedPrices = $request->input('price');
    
        // Fetch products based on selected brands and prices
        $query = Product::query();
    
        if (!empty($selectedBrands)) {
            $query->whereIn('brand', $selectedBrands);
        }
    
        if (!empty($selectedPrices)) {
            foreach ($selectedPrices as $priceRange) {
                $range = explode('-', $priceRange);
                $query->orWhereBetween('price', [(int)$range[0], (int)$range[1]]);
            }
        }
    
        $filteredProducts = $query->get();
    
        return view('your_view_name', ['mobile' => $filteredProducts]);
    }
    

}
