<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Family;
use Illuminate\Support\Facades\Auth;

class FamilyController extends Controller
{

    public function index()
    {
        $user = Auth::user();
        $families = $user->getFamilies()->wherePivot('approved', false)->get();
        $approvedFamilies = $user->getFamilies()->wherePivot('approved', true)->get();
        return view('families.index', compact('families', 'approvedFamilies'));
    }

    public function create()
    {
        return view('families.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:families',
        ]);

        $family = Family::create([
            'name' => $request->name,
            'head_id' => Auth::id(),
        ]);

        $family->members()->attach(Auth::id(), ['approved' => true]);

        return redirect()->route('recipes.index')->with('success', 'Family created successfully.');
    }

    public function showJoinForm()
    {
        $user = Auth::user();
        $families = $user->getFamilies()->wherePivot('approved', true)->get();

        return view('families.join', compact('families'));
    }

    public function join(Request $request)
    {
        $request->validate([
            'family_id' => 'required|exists:families,id',
        ]);

        $family = Family::find($request->family_id);
        $existingRequest = $family->members()->where('user_id', Auth::id())->exists();

        if ($existingRequest) {
            return redirect()->route('recipes.index')->with('error', 'You have already requested to join this family.');
        }

        $family->members()->attach(Auth::id());

        return redirect()->route('recipes.index')->with('success', 'Request to join family sent.');
    }

    public function editFamily(Request $request)
    {
        $familyId = $request->input('id');
        $family = Family::with(['members' => function ($query) {
            $query->orderBy('pivot_approved');
        }])->findOrFail($familyId);

        if ($family->head_id != Auth::id()) {
            return redirect()->route('home')->with('error', 'You are not authorized to manage this family.');
        }

        $pendingMembers = $family->members->where('pivot.approved', false);
        $approvedMembers = $family->members->where('pivot.approved', true);

        return view('families.edit', compact('family', 'pendingMembers', 'approvedMembers'));
    }


    public function approveMember(Request $request, $familyId, $userId)
    {
        $family = Family::findOrFail($familyId);

        if ($family->head_id != Auth::id()) {
            return redirect()->route('home')->with('error', 'You are not authorized to manage this family.');
        }

        $family->members()->updateExistingPivot($userId, ['approved' => true]);

        return redirect()->route('families.manage', $familyId)->with('success', 'Member approved successfully.');
    }

    public function removeMember(Request $request, $familyId, $userId)
    {
        $family = Family::findOrFail($familyId);

        if ($family->head_id != Auth::id()) {
            return redirect()->route('home')->with('error', 'You are not authorized to manage this family.');
        }

        if ($family->head_id == $userId) {
            return redirect()->route('families.manage', $familyId)->with('error', 'You cannot remove yourself as the head of the household.');
        }

        $family->members()->detach($userId);

        return redirect()->route('families.manage', $familyId)->with('success', 'Member removed successfully.');
    }

    public function destroy($familyId)
    {
        $family = Family::findOrFail($familyId);

        if ($family->head_id != Auth::id()) {
            return redirect()->route('home')->with('error', 'You are not authorized to delete this family.');
        }
        $family->recipes()->delete();

        $family->members()->detach();

        $family->delete();

        return redirect()->route('recipes.index')->with('success', 'Family and associated recipes deleted successfully.');
    }
}
