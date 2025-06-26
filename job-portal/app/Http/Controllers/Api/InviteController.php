<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\InvitedJob;
use Illuminate\Http\Request;

class InviteController extends Controller
{
    // POST /api/invitations
    public function invite(Request $request) {
        $companyId = $request->input('company_id');
        $jobSeekerId = $request->input('job_seeker_id');

        $exists = InvitedJob::where('company_id', $companyId)
                            ->where('job_seeker_id', $jobSeekerId)
                            ->exists();

        $invite = InvitedJob::create([
            'company_id' => $companyId,
            'job_seeker_id' => $jobSeekerId,
            'approved' => -1,
        ]);

        return response()->json($invite, 201);
    }

    // GET /api/invitations/{job_seeker_id}
    public function getInvitations($jobSeekerId) {
        $invites = InvitedJob::with('company')
                    ->where('job_seeker_id', $jobSeekerId)
                    ->get();

        return response()->json($invites);
    }

    // POST /api/invitations/accept
    public function accept(Request $request) {
        $jobSeekerId = $request->input('job_seeker_id');
        $companyId = $request->input('company_id');

        $invite = InvitedJob::where('job_seeker_id', $jobSeekerId)
                            ->where('company_id', $companyId)
                            ->first();

        if (!$invite) {
            return response()->json(['error' => 'Invitation not found'], 404);
        }

        $invite->approved = 1;
        $invite->save();

        return response()->json(['message' => 'Invitation accepted']);
    }

    // POST /api/invitations/reject
    public function reject(Request $request) {
        $jobSeekerId = $request->input('job_seeker_id');
        $companyId = $request->input('company_id');

        $invite = InvitedJob::where('job_seeker_id', $jobSeekerId)
                            ->where('company_id', $companyId)
                            ->first();

        if (!$invite) {
            return response()->json(['error' => 'Invitation not found'], 404);
        }

        $invite->approved = 0;
        $invite->save();

        return response()->json(['message' => 'Invitation rejected']);
    }
}
