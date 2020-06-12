<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentController extends Controller
{

    private $students;
    private $genders;

    public function __construct() {
        // $this->students = [
        //     [
        //         "id"=> 1,
        //         "img" => "https://www.boolean.careers/images/students/biagini.png",
        //         "nome" => "Alessandro",
        //         "eta" => "25",
        //         "genere" => "m",
        //         "azienda" => "DISC SPA",
        //         "ruolo" => "web developer",
        //         "descrizione" => "Da giocatore professionista di basket a sviluppatore web. 6 mesi di impegno da MVP e un memorabile tap-in targato Boolean hanno garantito ad Alessandro un solido futuro come web developer.",
        //     ],
        //     [
        //         "id"=> 2,
        //         "img" => "https://www.boolean.careers/images/students/biagini.png",
        //         "nome" => "Alessandro",
        //         "eta" => "25",
        //         "genere" => "f",
        //         "azienda" => "DISC SPA",
        //         "ruolo" => "web developer",
        //         "descrizione" => "Da giocatore professionista di basket a sviluppatore web. 6 mesi di impegno da MVP e un memorabile tap-in targato Boolean hanno garantito ad Alessandro un solido futuro come web developer.",
        //     ],...
        // ];

        // import the config->students.php from the "students" key and assign to $this->students
        $this->students = config("students.students");
        // assign genders to config->students.php with key genders
        $this->genders = config("students.genders");

    }

    //index
    public function index(){

        // $data = [
        //     "students" => $this->students,
        //     "teachers" => $this->teachers,
        // ];

        // return view("students.index", $data);

        // assign $students to the $this->students array (from the config file)
        $students = $this->students;
        $genders = $this->genders;

        // not working
        // $data = [
        //     "students" => $this->students,
        //     "genders" => $this->genders,

        // ];

        // dd( config("app.name"));


        // send the array to the view page
        return view("students.index", compact("students", "genders"));
    }

    //single student details show page
    // public function show($id){

    //     // check if the student id exists
    //     $student = $this->searchStudent($id, $this->students);

    //     if (! $student) {
    //         abort("404");
    //     }
    //     return view("students.show", compact("student"));
        
    // }

    // show with slug
    public function show($slug){

        // check if the student id exists
        $student = $this->searchStudent($slug, $this->students);

        if (! $student) {
            abort("404");
        }
        return view("students.show", compact("student"));
        
    }

    /**
     * Utilities
     */

    //  Check if student exists by id and return the array with that id
    // private function searchStudent($id, $array) {
    //     foreach ($array as $student) {
    //         if($student["id"] == $id) {
    //             return $student;
    //         }
    //     }
    //     return false;

    // }

    // check if student exists by slug and return the student
    private function searchStudent($slug, $array) {
        foreach ($array as $student) {
            if($student["slug"] == $slug) {
                return $student;
            }
        }
        return false;

    }
}
