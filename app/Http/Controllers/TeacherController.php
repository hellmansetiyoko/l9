<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Actions\Roleable\GiveUserRole;
use Illuminate\Support\Facades\Validator;

class TeacherController extends Controller
{

    public function index()
    {
        return view();
    }

    public function create(Request $request, GiveUserRole $setRole)
    {
        Validator::make($request->all(),[
            'nip' => 'required|unique:teachers,nip',
        ])->validate();
        //create new teacher model
        // $teacher = Teacher::create($request->all());
        //relation
        $user = User::where('email', $request->email)->firstOrFail();
        $setRole->setAsTeacher(user : $user, inputs : $request->all());
    }

    public function update(Request $request, Teacher $teacher)
    {
        Validator::make($request->all(), [
            'nip' => ['required',
                    Rule::unique('teachers')->ignore($teacher->id)]
        ]);

        $teacher->update($request->all());
    }

}
