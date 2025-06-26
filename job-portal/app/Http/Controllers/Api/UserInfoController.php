<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\JobSeeker;
use Illuminate\Http\Request;

class UserInfoController extends Controller
{
    // GET /api/users/{id}/basic-info?type=client|company
    public function getBasicInfo($id, Request $request) {
        $type = strtolower($request->input("type"));

        if($type === 'client') {
            $seeker = JobSeeker::select('full_name', 'avatar_url')->find( $id );
            return $seeker ? response()->json($seeker) : response()->json(['error' => 'Not found'], 404);
        } elseif ($type === 'company') {
            $company = Company::select('name', 'avatar_url')->find($id);
            return $company ? response()->json($company) : response()->json(['error' => 'Not found'], 404);
        }

        return response()->json(['error' => 'Invalid type'], 400);
    }

    // GET /api/users/{id}/full-info
    public function getUserFullInfo($id) {
        $user = JobSeeker::with('account')->find($id);
        return $user ? response()->json($user) : response()->json(['error' => 'Not found'], 404);
    }

    // GET /api/users
    public function getAllUsers()
    {
        return response()->json(JobSeeker::with('account')->get());
    }
}
