<?php

namespace App\Http\Controllers;

use App\Models\StaticBlock;
use Illuminate\Http\Request;

class StaticBlockController extends Controller
{
    public function create()
    {
        $staticBlocks = StaticBlock::all();
        return view('admin.static-blocks.create', compact('staticBlocks'));
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'title' => 'required|string|max:255',
                'slug' => 'required|string|max:255|unique:static_blocks,slug',
                'content' => 'required'
            ]);

            StaticBlock::create([
                'title' => $request->title,
                'slug' => $request->slug,
                'content' => $request->content
            ]);

            return redirect()->back()->with('message', 'Static Block Created Successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to create static block: ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            $block = StaticBlock::findOrFail($id);
            $block->delete();
            return redirect()->back()->with('message', 'Static Block Deleted Successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to delete static block');
        }
    }
}