<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display the specified resource.
     */
    public function show($userId)
    {
        $user = User::with(['skills', 'skills.skillType', 'experiences', 'experiences.skills', 'experiences.skills.skillType'])->findOrFail($userId);
        $user['skills_by_type'] = $user->skillsByType();

        return $user;
    }

    /**
     * Get skills for a specific user.
     */
    public function getSkills($userId)
    {
        $user = User::findOrFail($userId);

        return $user->skills;
    }
}
