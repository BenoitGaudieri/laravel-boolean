<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentController extends Controller
{

    private $students;

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

        $this->students = config("students");

    }

    //index
    public function index(){

        // $data = [
        //     "students" => $this->students,
        //     "teachers" => $this->teachers,
        // ];

        // return view("students.index", $data);

        $students = $this->students;

        // dd( config("app.name"));


        return view("students.index", compact("students"));
    }

    //show
    public function show($id){

        $student = $this->searchStudent($id, $this->students);

        if (! $student) {
            abort("404");
        }
        return view("students.show", compact("student"));
        
    }

    /**
     * Utilities
     */

    //  Check if student exist by id
    private function searchStudent($id, $array) {
        foreach ($array as $student) {
            if($student["id"] == $id) {
                return $student;
            }
        }
        return false;

    }
}
