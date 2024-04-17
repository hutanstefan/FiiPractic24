<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        $request->validate ([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'location' => 'required',
            'type' => 'required',
            'telephone' => 'required|numeric',
            'image' => 'required|image'
        ]);

        $user = Auth::user();

        $product = new Product();

        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->location = $request->location;
        $product-> type = $request->type;
        $product-> telephone = $request->telephone;
        $product-> verified = false;
        $product->user_id = $user->id;

        if ($request->hasFile('image')) {
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $product->image = $imageName;
        }

        $product->save();

        return redirect()->route('products.create')->with('success', 'Product added successfully.');
    }


    public function myproducts()
    {
        $user = Auth::user();

        if ($user) {
            $products = $user->products()->get();

            return view('products.myproducts', compact('products'));
        } else {
            return redirect()->route('login');
        }
    }

    public function allproducts(Request $request)
    {
        $search = $request->get('search');
        $query = Product::query();

        if ($search) {
            $query->where('name', 'like', '%' . $search . '%');
        }

        if ($request->has('type') && $request->type != '') {

            if ($request->type == 'asc') {
                $query->orderBy('price');
            } elseif ($request->type == 'desc') {
                $query->orderBy('price', 'desc');
            }else
            $query->where('type', $request->type);
        }

        $products = $query->where('verified', true)
            ->where('hidden', false)
            ->paginate(16);

        return view('products.dashboard', compact('products'));

    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        if ($product->user_id !== Auth::id()) {
            return redirect()->back()->with('error', 'Unauthorized');
        }

        $product->delete();
        return redirect()->back()->with('success', 'Product deleted successfully');
    }

    public function pendingProducts()
    {
        $pendingProducts = Product::where('verified', false)->get();
        return view('products.pending-products', compact('pendingProducts'));
    }

    public function accept($id)
    {
        $product = Product::findOrFail($id);
        $product->verified = true;
        $product->save();

        return redirect()->back()->with('success', 'Product accepted successfully.');
    }

    public function reject($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->back()->with('success', 'Product rejected successfully.');
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);

        $averageRating = DB::table('reviews')
            ->where('product_id', $id)
            ->avg('score');
        return view('products.product', compact('product','averageRating'));
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('products.update', compact('product'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'location' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'telephone' => 'required|string|max:255',
            'image' => 'image'
        ]);

        $product = Product::findOrFail($id);

        $product->name = $validatedData['name'];
        $product->description = $validatedData['description'];
        $product->price = $validatedData['price'];
        $product->location = $validatedData['location'];
        $product->type = $validatedData['type'];
        $product->telephone = $validatedData['telephone'];
        $product->verified = false;

        if ($request->hasFile('image')) {
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $product->image = $imageName;
        }

        $product->save();

        return redirect()->route('products.product', ['id' => $product->id])->with('success', 'Product updated successfully!');
    }

    public function addToFavorites(Product $product)
    {
        if (Auth::check()) {
            Auth::user()->favorites()->attach($product->id);
            return redirect()->back()->with('success', 'Product add to favorite.');
        } else {
            return redirect()->back()->with('error', 'You are not logged in.');
        }
    }
    public function removeFromFavorites(Product $product)
    {
        if (Auth::check()) {
            Auth::user()->favorites()->detach($product->id);
            return redirect()->back()->with('success', 'Product removed from favorite.');
        } else {
            return redirect()->back()->with('error', 'You are not logged in.');
        }
    }

    public function viewFavorites()
    {
        $user = Auth::user();
        $favorites = $user->favorites()
            ->where('verified', true)
            ->where('hidden', false)
            ->paginate(16);


        return view('products.view_favorites', compact('favorites'));
    }

    public function hide($id)
    {
        $product = Product::findOrFail($id);

        $product->update(['hidden' => !$product->hidden]);

        return redirect()->back()->with('success', 'Product visibility updated successfully.');
    }
}
