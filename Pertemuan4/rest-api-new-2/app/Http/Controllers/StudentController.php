<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use Illuminate\Support\Facades\Validator;


class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        ## handle jika data tidak ada
        $students = Student::all();

        if ($students->isNotEmpty()) {
            $response = [
                'message' => 'Success showing all data',
                'data' => $students
            ];

            return response()->json($response, 200);
        } else {
            return response()->json([
                'message' => 'Tidak ada data'
            ], 404);
        }

        // $students = Student::all();

        // if ($students->isNotEmpty()) {
        //     $response = [
        //         'message' => 'Success showing all data',
        //         'data' => $students
        //     ];

        //     return response()->json($response, 200);
        // } else {
        //     return response()->json([
        //         'message' => 'Tidak ada data'
        //     ],404);
        // }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //validasi otomatis
        $validateData = $request->validate([
            'name' => 'required|string',
            'nim' => 'required|string|unique:students,nim',
            'email' => 'required|email|unique:students,email',
            'jurusan' => 'required|string',
        ]);


        $student = Student::create($validateData);

        $data = [
            'message' => 'sukseses',
            'data' => $student
        ];

        return response()->json($data, 201);

        //versi manual(bikin variabel dulu, gunakna ORM)

        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'nim' => 'required|string|unique:students,nim',
            'email' => 'required|email|unique:students,email',
            'jurusan' => 'required|string',
        ]);


        if ($validator->fails()) {
            return response()->json([
                'message' => 'Gagal menambahkan data mahasiswa, data tidak lengkap atau format salah',
                'errors' => $validator->errors()
            ], 422);
        }

        $student = Student::create($request->all());

        $data = [
            'message' =>'Student is created successfully',
            'data' => $student,
         ];

         return response()->json($data, 201);

        // Validasi data yang diperlukan
        //  $request->validate([
        // 'name' => 'required|string|max:255',
        // 'nim' => 'required|numeric|unique:students,nim',
        // 'email' => 'required|email|unique:students,email',
        // 'jurusan' => 'required|string|max:255'
        // ]);

        // $input = [
        //     'name' => $request->name,
        //     'nim' => $request->nim,
        //     'email' => $request->email,
        //     'jurusan' => $request->jurusan
        //    ];

        //    $students = Student::create($input);

        //    $response = [
        //     'message' => 'Successfully create new student',
        //     'data' => $students
        //    ];

        //    return response()->json($response, 201);
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
    public function update(Request $request, $id)
{
    $student = Student::find($id);

    // Cek jika resource student tidak ditemukan
    if (!$student) {
        $data = [
            'message' => 'Student not found'
        ];

        return response()->json($data, 404);
    }

    // Validasi data yang diperlukan saat update
    $request->validate([
        'name' => 'nullable|string',
        'nim' => 'nullable|string',
        'email' => 'nullable|email',
        'jurusan' => 'nullable|string'
    ]);

    // Menggunakan data request jika ada, atau mempertahankan data asli jika kosong
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
}



    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $student = Student::find($id);

        // Cek jika resource student tidak ditemukan
        if (!$student) {
            $data = [
                'message' => 'Student not found'
            ];

            return response()->json($data, 404);
        }

        // Hapus data student jika ditemukan
        $student->delete();

        $data = [
            'message' => 'Student is deleted'
        ];

        return response()->json($data, 200);
    }
}
