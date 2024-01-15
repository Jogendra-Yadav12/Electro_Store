<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\product;
use App\Models\wishlist;
use App\Models\image;

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
        try{
            $product = product::where('id',$id)->get();
            return view('singlepage',compact('product'));
        } catch (QueryException $e) {
            return redirect()->back()->with('status', 'Database error: ' . $e->getMessage());
        } catch (\Exception $e) {
            return redirect('/')->with('status', 'An error occurred: ' . $e->getMessage());
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    
    public function store(Request $request)
    {
        try{
            $request->validate([
                'img' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);
            $imageName = $request->img->getClientOriginalName();
            $product = new product;
            $product->name = $request->name;
            $product->category = $request->category;
            $product->price = $request->price;
            $product->brand = $request->brand;
            $product->description = $request->des;
            
            if ($request->hasFile('img')) {
                $product->img = $request->img->move(('images'), $imageName);
            } else {
                return redirect()->back()->with('status', 'Your image must be in this format: jpeg, png, jpg, gif and not exceed 2MB');
            }
            
            foreach ($request->file('images') as $imagefile) {
                $photo = new image;
                $Name = $imagefile->getClientOriginalName();
                $photo->name = $request->name;
                $photo->img = $imagefile->move(('images'),$Name);
                $photo->save();
            }

            $product->save();

            return redirect('/add')->with('status','Product added successfully!!');
        } catch (QueryException $e) {
            return redirect()->back()->with('status', 'Database error: ' . $e->getMessage());
        } catch (\Exception $e) {
            return redirect()->back()->with('status', $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function brand(Request $request){
        try{
            $brand = $request->input('filter');
            $data = [];
            foreach($brand as $value){
                $filter = product::where('brand',$value)->get();
                array_push($data,$filter);
            }
            dd($data);
        } catch (QueryException $e) {
            return redirect()->back()->with('status', 'Database error: ' . $e->getMessage());
        } catch (\Exception $e) {
            return redirect('/')->with('status', 'An error occurred: ' . $e->getMessage());
        }
    }
    
    public function Mobile(Request $request)
    {   
        try{
            $user_id = session()->get('id');
            $brand = product::select('brand')->where('category','Mobile')->distinct()->get();
            $mobile = product::where('category','Mobile')->paginate(9);
            $wish = wishlist::where('user_id',$user_id)->get();
            $count = wishlist::where('user_id',$user_id)->count();

            return view('mobile',compact('mobile','brand','wish','count'));

        } catch (QueryException $e) {
            return redirect()->back()->with('status', 'Database error: ' . $e->getMessage());
        } catch (\Exception $e) {
            return redirect('/')->with('status', 'An error occurred: ' . $e->getMessage());
        }
    }

    public function laptop()
    {   
        try{
            $user_id = session()->get('id');
            $brand = product::select('brand')->where('category','Laptop')->distinct()->get();
            $laptop = product::where('category','Laptop')->paginate(9);
            $wish = wishlist::where('user_id',$user_id)->get();
            $count = wishlist::where('user_id',$user_id)->count();
            return view('laptop',compact('laptop','brand','wish','count'));
        } catch (QueryException $e) {
            return redirect()->back()->with('status', 'Database error: ' . $e->getMessage());
        } catch (\Exception $e) {
            return redirect('/')->with('status', 'An error occurred: ' . $e->getMessage());
        }
    }

    public function tv()
    {   
        try{
            $user_id = session()->get('id');
            $brand = product::select('brand')->where('category','Television & Audio')->distinct()->get();
            $tv = product::where('category','Television & Audio')->paginate(9);
            $wish = wishlist::where('user_id',$user_id)->get();
            $count = wishlist::where('user_id',$user_id)->count();
            return view('tv',compact('tv','brand','wish','count'));
        } catch (QueryException $e) {
            return redirect()->back()->with('status', 'Database error: ' . $e->getMessage());
        } catch (\Exception $e) {
            return redirect('/')->with('status', 'An error occurred: ' . $e->getMessage());
        }
    }

    public function cc()
    {   
        try{
            $user_id = session()->get('id');
            $brand = product::select('brand')->where('category','Case & Cover')->distinct()->get();
            $cc = product::where('category','Case & Cover')->paginate(9);
            $wish = wishlist::where('user_id',$user_id)->get();
            $count = wishlist::where('user_id',$user_id)->count();
            return view('cover',compact('cc','brand','wish','count'));
        } catch (QueryException $e) {
            return redirect()->back()->with('status', 'Database error: ' . $e->getMessage());
        } catch (\Exception $e) {
            return redirect('/')->with('status', 'An error occurred: ' . $e->getMessage());
        }
    }

    public function tablet()
    {   
        try{
            $user_id = session()->get('id');
            $brand = product::select('brand')->where('category','Tablet')->distinct()->get();
            $tab = product::where('category','Tablet')->paginate(9);
            $wish = wishlist::where('user_id',$user_id)->get();
            $count = wishlist::where('user_id',$user_id)->count();
            return view('tablet',compact('tab','brand','wish','count'));
        } catch (QueryException $e) {
            return redirect()->back()->with('status', 'Database error: ' . $e->getMessage());
        } catch (\Exception $e) {
            return redirect('/')->with('status', 'An error occurred: ' . $e->getMessage());
        }
    }

    public function computer()
    {   
        try{
            $user_id = session()->get('id');
            $brand = product::select('brand')->where('category','Computer Accessories')->distinct()->get();
            $ca = product::where('category','Computer Accessories')->paginate(9);
            $wish = wishlist::where('user_id',$user_id)->get();
            $count = wishlist::where('user_id',$user_id)->count();
            
            return view('computer',compact('ca','brand','wish','count'));
        } catch (QueryException $e) {
            return redirect()->back()->with('status', 'Database error: ' . $e->getMessage());
        } catch (\Exception $e) {
            return redirect('/')->with('status', 'An error occurred: ' . $e->getMessage());
        }
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
        try{
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
        } catch (QueryException $e) {
            return redirect()->back()->with('status', 'Database error: ' . $e->getMessage());
        } catch (\Exception $e) {
            return redirect('/')->with('status', 'An error occurred: ' . $e->getMessage());
        }
    }
    

}
