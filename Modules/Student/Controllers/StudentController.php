<?php

namespace Modules\Student\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use Modules\Student\Models\StudentModel;

class StudentController extends BaseController
{
    // public function index()
    // {
    //     // echo "<h1>This is the Student Module!</h1>";
    //     $data = [
    //     	"model" => "Represents the data and business logic of the application.",
    //     	"view" => "Represents the presentation layer of the application.",
    //     	"controller" => "Acts as an intermediary between the Model and View components."
    //     ];
    //     return view("\Modules\Student\Views\index", $data);
    // }

    // public function call1()
    // {
    // 	echo "<h1>Call1</h1>";
    // }

    // public function call2()
    // {
    // 	echo "<h1>Call2</h1>";
    // }

    // public function call3()
    // {
    // 	echo "<h1>Call3</h1>";
    // }

    public function listStudent() // list student data
    {   
        $student_obj = new StudentModel();

        $students = $student_obj->findAll();

        return view("\Modules\Student\Views\student_index", [
            "students" => $students
        ]);
    }

    public function addStudent() // add student data
    {
        if($this->request->getMethod() == "POST") {
            $rules = [
                "name" => "required",
                "email" => "required",
                "mobile" => "required"
            ];

            $message = [
                "name" => [
                    "required" => "Name field is needed!"
                ],
                "email" => [
                    "required" => "Email field is needed!"
                ],
                "mobile" => [
                    "required" => "Mobile field is needed!"
                ]
            ];

            if(!$this->validate($rules, $message)) {
                return view("\Modules\Student\Views\student_add", [
                    "validation" => $this->validator
                ]);
            }

            // print_r($this->request->getVar());

            $name = $this->request->getVar('name');
            $email = $this->request->getVar('email');
            $mobile = $this->request->getVar('mobile');
            $image = $this->request->getFile('image');

            $profile_image = "";
            if(isset($image) && !empty($image->getPath())) {
                $file_name = $image->getName();

                if($image->move("images", $file_name)){
                    $profile_image = "/images/" . $file_name;
                }
            }

            $data=[
                "name" => $name,
                "email" => $email,
                "mobile" => $mobile,
                "image" => $profile_image
            ];

            // object of StudentModel
            $student_obj = new StudentModel();

            $session = session();

            if($student_obj->insert($data))
                $session->setFlashdata("success", "Student has been added successfully!");
            else
                $session->setFlashdata("error", "Student creation failed!");

            return redirect("student");
        }
        return view("\Modules\Student\Views\student_add");
    }

    public function editStudent($student_id) // edit student data
    {
        $student_obj = new StudentModel();
        $student = $student_obj->where("id", $student_id)->first();
        // print_r($student);

        if($this->request->getMethod() == "PUT"){
            $name = $this->request->getVar('name');
            $email = $this->request->getVar('email');
            $mobile = $this->request->getVar('mobile');
            $image = $this->request->getFile('image');

            $profile_image = $student['image'];
            if(isset($image) && !empty($image->getPath())) {
                $file_name = $image->getName();

                if($image->move("images", $file_name)){
                    $profile_image = "/images/" . $file_name;
                }
            }

            $data=[
                "name" => $name,
                "email" => $email,
                "mobile" => $mobile,
                "image" => $profile_image
            ];

            // object of StudentModel
            $student_obj = new StudentModel();

            $session = session();

            if($student_obj->update($student_id, $data))
                $session->setFlashdata("success", "Student has been updated successfully!");
            else
                $session->setFlashdata("error", "Student updation failed!");

            return redirect("student");
        }

        return view("\Modules\Student\Views\student_edit", [
            "student" => $student
        ]);
    }

    public function deleteStudent($student_id) // delete student data
    {
        $student_obj = new StudentModel();
        $student_obj->delete($student_id);

        $session= session();  
        $session->setFlashdata("success", "Student has been deleted successfully!"); 
        
        return redirect("student");
    }
}
