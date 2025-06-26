<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Application;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    // POST /api/applications
    public function apply(Request $request) {
        $jobSeekerId = $request->input('job_seeker_id');
        $jobPostId = $request->input('job_post_id');

        $exists = Application::where('job_seeker_id', $jobSeekerId)
                             ->where('job_post_id', $jobPostId)
                             ->exists();

        if ($exists) {
            return response()->json(['error' => 'Already applied'], 409);
        }

        $application = Application::create([
            'job_seeker_id' => $jobSeekerId,
            'job_post_id' => $jobPostId,
            'approved' => -1,
        ]);

        return response()->json($application, 201);
    }

    // GET /api/applications/{job_id}
    public function getApplicants($jobId) {
        $applications = Application::with('jobSeeker')
                        ->where('job_post_id', $jobId)
                        ->get();

        return response()->json($applications);
    }

    // POST /api/applications/accept
    public function accept(Request $request) {
        $jobSeekerId = $request->input('job_seeker_id');
        $jobPostId = $request->input('job_post_id');

        $application = Application::where('job_seeker_id', $jobSeekerId)
                                ->where('job_post_id', $jobPostId)
                                ->first();

        if (!$application) {
            return response()->json(['error' => 'Application not found'], 404);
        }

        $application->approved = 1;
        $application->save();

        return response()->json(['message' => 'Application approved']);
    }

    // POST /api/applications/reject
    public function reject(Request $request) {
        $jobSeekerId = $request->input('job_seeker_id');
        $jobPostId = $request->input('job_post_id');

        $application = Application::where('job_seeker_id', $jobSeekerId)
                                ->where('job_post_id', $jobPostId)
                                ->first();

        if (!$application) {
            return response()->json(['error' => 'Application not found'], 404);
        }

        $application->approved = 0;
        $application->save();

        return response()->json(['message' => 'Application rejected']);
    }


}
