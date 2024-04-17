<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Review;

class ReviewController extends Controller
{

    public function store(Request $request, Product $product)
    {
        $request->validate([
            'content' => 'required|string',
            'score' => 'required|integer|min:1|max:5'
        ]);

        $review = new Review();
        $review->content = $request->input('content');
        $review->score = $request->input('score');
        $review->user_id = auth()->id();
        $review->product_id = $product->id;
        $review->save();

        return redirect()->back()->with('success', 'Review added successfully!');
    }

}
