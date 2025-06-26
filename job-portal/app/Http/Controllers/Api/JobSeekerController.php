<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\JobSeeker;
use Illuminate\Http\Request;

class JobSeekerController extends Controller
{
    // GET /api/job-sekker
    public function index()
    {
        return response()->json(JobSeeker::with('account')->get());
    }

    // GET /api/job-seekers/{id}
    public function show($id) {
        $jobSeeker = JobSeeker::with('account')->find($id);
        return $jobSeeker ? response()->json($jobSeeker) : response()->json(['error' => 'Not found'], 404);
    }

    // POST /api/job-seekers
    public function store(Request $request)
    {
        $jobSeeker = JobSeeker::create( $request->all() );
        return response()->json( $jobSeeker, 201 );
    }

    // PUT /api/job-seekers/{id}
    public function update(Request $request, string $id)
    {
        $jobSeeker = JobSeeker::findOrFail( $id );
        $jobSeeker->update($request->all() );
        return response()->json( $jobSeeker,200);
    }

    // DELETE /api/job-seekers/{id}
    public function destroy(string $id)
    {
        JobSeeker::destroy($id);
        return response()->json(null, 204);
    }
}
