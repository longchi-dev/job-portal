<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\JobPost;
use Illuminate\Http\Request;

class JobController extends Controller
{
    // GET /api/jobs/unapplied?user_id=1
    public function getUnappliedJobs(Request $request) {
        $userId = $request->query('user_id');

        if(!$userId) {
            return response()->json(['error' => 'Missing user_id'], 400);
        }

        $jobs = JobPost::whereNotIn('id', function ($query) use ($userId) {
            $query->select('job_post_id')
                  ->from('applications')
                  ->where('job_seeker_id', $userId);
        })
        ->with('company')
        ->get();

        return response()->json($jobs);
    }

    // GET /api/jobs/{id}
    public function getJobDetail($id) {
        $job = JobPost::with('company')->find( $id );

        if(!$job) {
            return response()->json(['error' => 'Job not found'], 404);
        }

        return response()->json($job);
    }

    // GET /api/companies/{companyId}/jobs?user_id=1
    public function getJobsByCompany($companyId, Request $request) {
        $userId = $request->query('user_id');
        if (!$userId) {
            return response()->json(['error' => 'Missing user_id'], 400);
        }

        $jobs = JobPost::where('company_id', $companyId)
            ->whereNotIn('id', function ($query) use ($userId) {
                $query->select('job_post_id')
                      ->from('applications')
                      ->where('job_seeker_id', $userId);
            })
            ->with('company')
            ->get();

        return response()->json($jobs);
    }
}
