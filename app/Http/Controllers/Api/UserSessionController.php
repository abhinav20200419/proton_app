<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\UserSession;
use Illuminate\Http\Request;

class UserSessionController extends Controller
{
    public function index()
    {
        return response()->json(UserSession::latest()->get());
    }

    public function store(Request $request)
    {
        $this->authorizeAdmin($request);

        $data = $request->validate([
            'name' => 'required|string|max:50|unique:user_sessions,name',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'is_active' => 'boolean'
        ]);

        $session = UserSession::create($data);

        return response()->json([
            'message' => 'Session created',
            'data' => $session
        ], 201);
    }

    public function show(UserSession $session)
    {
        return response()->json($session);
    }

    public function update(Request $request, UserSession $session)
    {
        $this->authorizeAdmin($request);

        $data = $request->validate([
            'name' => 'sometimes|string|max:50|unique:user_sessions,name',
            'start_date' => 'sometimes|date',
            'end_date' => 'sometimes|date|after:start_date',
            'is_active' => 'boolean'
        ]);

        $session->update($data);

        return response()->json([
            'message' => 'Session updated',
            'data' => $session
        ]);
    }

    public function destroy(Request $request, UserSession $session)
    {
        $this->authorizeAdmin($request);

        $session->delete();

        return response()->json([
            'message' => 'Session deleted'
        ]);
    }

    private function authorizeAdmin(Request $request)
    {
        if (!$request->user()->isAdmin()) {
            abort(403, 'Only admin allowed');
        }
    }
}