<?php

namespace App\Http\Controllers;

use App\Models\Admin\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request, Product $product)
    {
        // dd($request->body);
        $product->comments()->create([
            'body' => $request->body,
            'commented_by' => Auth::id(),

        ]);
        return redirect()->back();
    }
}
