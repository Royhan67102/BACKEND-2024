<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       // Mengambil semua data student
       $students = Student::all();

    // Cek apakah data kosong
       if ($students->isEmpty()) {
        // Jika kosong, tampilkan pesan khusus
        $response = [
            'message' => 'Belum ada data student yang tersedia',
            'data' => []
        ];

        return response()->json($response, 200);
    }

    // Jika ada data, tampilkan data student
        $response = [
        'data' => $students,
        'message' => 'Berhasil menampilkan semua data students'
        ];

        return response()->json($response, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $input = [
            'name' => $request->name,
            'nim' => $request->nim,
            'email' => $request->email,
            'jurusan' => $request->jurusan
           ];

           $students = Student::create($input);

           $response = [
            'message' => 'Successfully create new student',
            'data' => $students
           ];

           return response()->json($response, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $student = Student::find($id);

        if (!$student) {

            $data = [
                'message' => 'Get detail student',
                'data' => $student,
            ];

            return response()->json($data, 200);
        } else {
            $data = [
                'message' => 'Student not found',
            ];

            return response()->json($data, 404);
        }


    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id) {

        $student = Student::find($id);

        if ($student) {

            $input = [
                'name' => $request->name ?? $student->name,
                'nim' => $request->nim ?? $student->nim,
                'email' => $request->email ?? $student->email,
                'jurusan' => $request->jurusan ?? $student->jurusan
            ];


            $student->update($input);

            $data = [
                'message' => 'Student is updated',
                'data' => $student
            ];


            return response()->json($data, 200);
        } else {
            $data = [
                'message' => 'Student not found'
            ];

            return response()->json($data, 404);
        }
    }


    /**
     * Remove the specified resource from storage.
     */
   public function destroy( $id)
    {
        $student = Student::find($id);

        if ($student) {

            $student->delete();

            $data = [
                'message' => 'Student is deleted'
            ];
            return response()->json($data, 200);
        }

        else {
            $data = [
                'message' => 'Student not found'
            ];

            return response()->json($data, 404);
  }

}
}
