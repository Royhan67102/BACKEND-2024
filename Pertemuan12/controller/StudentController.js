// TODO 3: Import data students dari folder data/students.js
// code here
const Student = require("../models/Student");
 
// Membuat Class StudentController
class StudentController {
    async index(req, res) {
        const students = await Student.all();

        const data = {
            message: "Menampilkan semua student",
            data: students, // Pastikan student hanya berisi objek yang konsisten
        };
        res.json(data);
    }

    async store(req, res) {
        // Mengambil nama dari body request
        const { nama } = req.body;
        // Menyimpan student baru ke database
        const student = await Student.create({
            nama,
            created_at: new Date(),
            updated_at: new Date(),
        });
        // Menyusun respons data
        const data = {
            message: `Menambahkan data student: ${nama}`,
            data: student,  // Mengembalikan data student yang baru disimpan
        };
        // Mengirim response ke client
        res.json(data);
    }
    

    // async update(req, res) {
    //     // TODO 6: Update data students
    //     // code here
    //     const { id } = req.params; // Mendapatkan id dari params
    //     const { nama } = req.body; // Mendapatkan nama dari body request
    //     // Mencari student berdasarkan id
    //     const students = await Student.find(id);
    //     // Update data student (langsung mengganti data sesuai id yang ditemukan)
    //     students.nama = nama;  // Mengupdate nama student berdasarkan id
    //     students.updated_at = new Date();  // Mengupdate updated_at
    //     // Melakukan update data di database
    //     await Student.update(id, students);
    //     const data = {
    //         message: `Mengedit student id ${id}, nama ${nama}`, // Menggunakan backtick
    //         data: students,  // Mengembalikan data yang sudah diupdate
    //     };
    
    //     res.json(data);  // Mengirim response
    // }

    // async destroy(req, res) {
    //     // TODO 7: Hapus data students
    //     // code here
    //     const { id } = req.params; // Mendapatkan id dari params
    
    //     // Mencari student berdasarkan id
    //     const students = await Student.find(id);
    
    //     // Melakukan penghapusan data student
    //     await Student.delete(id);
    
    //     const data = {
    //         message: `Menghapus student id ${id}`,  // Menggunakan backtick
    //         data: students,  // Mengembalikan data student yang dihapus
    //     };
    
    //     res.json(data);  // Mengirim response
    // }
}

// Membuat object StudentController
const object = new StudentController();

// Export object StudentController
module.exports = object;
