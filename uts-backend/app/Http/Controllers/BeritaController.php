<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;

class BeritaController extends Controller
{

    public function index()
    {
        $beritas = Berita::all();

        if ($beritas->isNotEmpty()) {
            $response = [
                'message' => 'Get All Resource',
                'data' => $beritas,
                'kode status' => 200
            ];

            return response()->json($response, 200);
        } else {
            return response()->json([
                'message' => 'Data is empty',
                'kode status' => 200
            ], 200);
        }
    }

    public function getByCategory($category)
    {
    // Mengambil data berdasarkan kategori
    $beritas = Berita::where('category', $category)->get();

    // Cek apakah data ada
    if ($beritas->isNotEmpty()) {
        $response = [
            'message' => "Get {$category} Resource",
            'data' => $beritas,
            'kode status' => 200
        ];

        return response()->json($response, 200);
        } else {
        return response()->json([
            'message' => 'Data is empty',
            'kode status' => 200
        ], 200);
        }
    }







    public function store(Request $request)
    {
        // Validasi otomatis
        $validateData = $request->validate([
            'title' => 'required|string',
            'author' => 'required|string',
            'description' => 'required|string',
            'content' => 'required|string',
            'url' => 'required|url',
            'url_image' => 'required|url',
            'published_at' => 'required|date',
            'category' => 'required|string',
        ]);

        $beritas = Berita::create($validateData);

        $data = [
            'message' => 'Resource is added successfully',
            'data' => $beritas
        ];

        return response()->json($data, 201);
    }

    public function show($id)
    {
        $beritas = Berita::find($id);

        if ($beritas) {
            $data = [
                'message' => 'Get Detail Resource',
                'data' => $beritas,
            ];
            return response()->json($data, 200);
        } else {
            return response()->json([
                'message' => 'Resource not found'
            ], 404);
        }
    }


     // Mengupdate data berita berdasarkan ID
     public function update(Request $request, $id)
     {
         $beritas = Berita::find($id);

         if ($beritas) {
             $input = [
                 'title' => $request->title ?? $beritas->title,
                 'author' => $request->author ?? $beritas->author,
                 'description' => $request->description ?? $beritas->description,
                 'content' => $request->content ?? $beritas->content,
                 'url' => $request->url ?? $beritas->url,
                 'url_image' => $request->url_image ?? $beritas->url_image,
                 'published_at' => $request->published_at ?? $beritas->published_at,
                 'category' => $request->category ?? $beritas->category,
             ];

             $beritas->update($input);

             $data = [
                 'message' => 'Resource is updated successfully',
                 'data' => $beritas
             ];

             return response()->json($data, 200);
         } else {
             return response()->json([
                 'message' => 'Resource not found'
             ], 404);
         }
     }


     public function destroy($id)
    {
        $beritas = Berita::find($id);

        if ($beritas) {
            $beritas->delete();

            return response()->json([
                'message' => 'Resource is deleted successfully'
            ], 200);
        } else {
            return response()->json([
                'message' => 'Resource not found'
            ], 404);
        }
    }


    public function getSport()
    {
        $sports = Berita::where('category', 'sport')->get();

        if ($sports->isNotEmpty()) {
        return response()->json([
            'message' => 'Get Sport Resource',
            'data' => $sports,
            'kode status' => 200
        ], 200);
        } else {
        return response()->json([
            'message' => 'Data is empty',
            'kode status' => 200
        ], 200);
        }
    }

    public function getFinance()
    {
        $finances = Berita::where('category', 'finance')->get();

        if ($finances->isNotEmpty()) {
        return response()->json([
            'message' => 'Get Finance Resource',
            'data' => $finances,
            'kode status' => 200
        ], 200);
        } else {
        return response()->json([
            'message' => 'Data is empty',
            'kode status' => 200
        ], 200);
        }
    }

    public function getAutomotive()
    {
        $automotives = Berita::where('category', 'automotive')->get();

        if ($automotives->isNotEmpty()) {
        return response()->json([
            'message' => 'Get Automotive Resource',
            'data' => $automotives,
            'kode status' => 200
        ], 200);
        } else {
        return response()->json([
            'message' => 'Data is empty',
            'kode status' => 200
        ], 200);
        }
    }

}
