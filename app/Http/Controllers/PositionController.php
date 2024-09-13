<?php

namespace App\Http\Controllers;

use App\Models\Position;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PositionController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->get('search');

        // Fetching the position, filtering by both 'name' and 'reports_to'
        $positions = Position::where(function ($query) use ($search) {
            $query->where('name', 'LIKE', "%$search%")
                ->orWhere('reports_to', 'LIKE', "%$search%");
        })->get();

        return view('positions.index', compact('positions'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255|unique:positions',
            'reports_to' => 'required|nullable|string|max:255',
        ]);

        Position::create($data);

        return redirect(route('position.index'))->with('success', 'Position created successfully!');
    }


    public function edit(Position $position){
        return view('positions.edit', ['position' => $position]);
    }

    public function update(Position $position, Request $request)
    {
        $data = $request->validate([
            'name' => [
                'required',
                'string',
                'max:255',
                Rule::unique('positions')->ignore($position->id)
            ],
            'reports_to' => 'required|nullable|string|max:255',
        ]);

        $position->update($data);

        return redirect(route('position.index'))->with('success', 'Position updated successfully!');
    }

    
    public function destroy(Position $position){
        $position->delete();
        return redirect(route('position.index'))->with('success', 'position deleted successfully!');
    }
}
