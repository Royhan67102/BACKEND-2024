// TODO 3: Import data student dari folder data/student.js
const student = require('../data/student');  // Pastikan jalur file benar

// Membuat Class StudentController
class StudentController {
    index(req, res) {
        const data = {
            message: "Menampilkan semua student",
            data: student, // Pastikan student hanya berisi objek yang konsisten
        };
        res.json(data);
    }    

    store(req, res) {
        const { nama } = req.body;
        // Menambahkan objek student baru
        student.push({ id: student.length + 1, nama });
        const data = {
            message: `Menambahkan data student: ${nama}`,
            data: student,
        };
        res.json(data);
    }    

    update(req, res) {
        // TODO 6: Update data student
        const { id } = req.params;
        const { nama } = req.body;

        // Mencari student berdasarkan id
        const stud = student.find(s => s.id === parseInt(id));
        if (stud) {
            stud.nama = nama;  // Update nama student
            const data = {
                message: `Mengedit student id ${id}, nama ${nama}`,
                data: student,
            };
            res.json(data);
        } else {
            res.status(404).json({ message: `Student dengan id ${id} tidak ditemukan` });
        }
    }

    destroy(req, res) {
        // TODO 7: Hapus data student
        const { id } = req.params;

        // Mencari index student berdasarkan id
        const index = student.findIndex(s => s.id === parseInt(id));
        if (index !== -1) {
            student.splice(index, 1);  // Hapus student berdasarkan index
            const data = {
                message: `Menghapus student id ${id}`,
                data: student,
            };
            res.json(data);
        } else {
            res.status(404).json({ message: `Student dengan id ${id} tidak ditemukan` });
        }
    }
}

// Membuat object StudentController
const object = new StudentController();

// Export object StudentController
module.exports = object;
