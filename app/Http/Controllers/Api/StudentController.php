<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Student filtered by gender endpoint
     */
    public function gender(Request $request){

        $students = config("students.students");
        $genders = config("students.genders");

        // this returns an array
        // $data = $request->all();

        // this only returns the specified input

        // dd($gender);
        $gender = $request->input("filter");

        $result = [
            "error" => "",
            "response" => [],
        ];

        // check if the gender exists in the array
        if (in_array($gender, $genders)) {
            // if it's all the whole array is assigned to the response
            if ($gender == "all") {
                $result["response"] = $students;
            // not all
            } else {
                foreach ($students as $student) {
                    // check if "genere" is equal to the selected gender
                    if ($student["genere"] == $gender) {
                        // gender in an array
                        $result["response"][] = $student;
                    }
                }
            }
        } else {
            $result["error"] = "filter not allowed";
        }

        return response()->json($result);
    }
}
