<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AnimalController extends Controller
{

    public $animals = ['kucing', 'ayam', 'ikan'];

    public function index()
    {
        echo "Menampilkan data animals📺:";
        foreach ($this->animals as $animal) {
            echo "\n";
            echo "- " . $animal;
        }
        echo "\n";
    }

    public function store(Request $request)
    {
        array_push($this->animals, $request->nama);
        echo "Menambahkan hewan baru➕: $request->nama \n Menampilkan data animals";
        foreach ($this->animals as $animal){
            echo "\n";
            echo "- " . $animal;
        }

    }

    public function update(Request $request, $id)
    {
        if (isset($this->animals[$id])) {
            $this->animals[$id] = $request->nama;
            echo "Mengupdate data hewan🆕: $request->nama (id: $id)";
        } else {
            echo "Hewan dengan id $id tidak ditemukan🔍❓";
        }
        echo "Menampilkan data animals📺";
        foreach ($this->animals as $animal){
            echo "\n";
            echo "- " . $animal;
        }
    }

    public function destroy($id)
    {
        if (isset($this->animals[$id])) {
            unset($this->animals[$id]);
            echo "Menghapus data hewan (id: $id)❌🗑️";
            echo "\n";
        } else {
            echo "Hewan dengan id $id tidak ditemukan🔍❓";
        }
        echo "\n";
        echo "Menampilkan data animals📺";
        foreach ($this->animals as $animal){
            echo "\n";
            echo "- " . $animal;
        }
    }
}
