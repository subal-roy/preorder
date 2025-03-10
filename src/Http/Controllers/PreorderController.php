<?php

namespace SubalRoy\Preorder\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use SubalRoy\Preorder\Events\PreorderSubmitted;
use SubalRoy\Preorder\Http\Requests\PreorderRequest;
use SubalRoy\Preorder\Models\Preorder;

class PreorderController extends Controller
{
    public function create()
    {
        return view('preorderform::create');
    }

    public function index(Request $request)
    {
        $search = $request->input('search', '');

        $preorders = Preorder::query()
            ->where('name', 'ILIKE', "%{$search}%")
            ->orWhere('email', 'ILIKE', "%{$search}%")
            ->orWhere('product', 'ILIKE', "%{$search}%")
            ->paginate(10);

        return view('preorderform::index', compact('preorders', 'search'));
    }

    public function store(PreorderRequest $request)
    {

        $preorder = Preorder::create($request->validated());

        if ($preorder) {

            event(new PreorderSubmitted($preorder));

            return response()->json([
                'success' => true,
                'message' => 'Preorder submitted successfully.',
                'data' => $preorder
            ], 201);
        }


        return response()->json([
            'success' => false,
            'message' => 'There was an error submitting the preorder. Please try again later.'
        ], 500);
    }

    public function destroy($id){

        $preorder = Preorder::findOrFail($id);

        $preorder->delete();

        $preorder->save();

        return redirect()->route('preorders.index')->with('success', 'Pre-order deleted successfully.');
    }
}
