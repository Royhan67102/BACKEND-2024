const db = require("../config/database");

class Student {
    static all() {
        return new Promise((resolve, reject) => {        
            const query = "SELECT * FROM students";
            db.query(query, (err, results) => {
                resolve(results);
            });
        });
    }


    
  static async create(data) {
    //melakukan insert data ke database
    const id = await new Promise((resolve,reject) => {
      const sql = "INSERT INTO students SET ?";
      db.query(sql, data,(err,results) => {
        resolve(results.insertId);
      });
    });

    // Refaktor promise 2: get data by id
    const student = this.find(id);
    return student;
  }


  // mencari data berdasarkan id
  static async find(id) {
    return new Promise((resolve, reject) => {
        const sql = "SELECT * FROM students WHERE id = ?";
        db.query(sql, [id], (err, results) => {
            if (err) reject(err);
            resolve(results[0]);
        });
    });
}


  //mengupdate data student
  static async update(id, data) {
    await new Promise((resolve, reject) => {
        const sql = "UPDATE students SET ? WHERE id = ?";
        db.query(sql, [data, id], (err, results) => {
            if (err) reject(err);
            resolve(results);
        });
    });

    // Mencari data yang baru diupdate
    const student = await this.find(id);
    return student;
}
    

  //menghapus data dari database
  static delete(id) {
    return new Promise((resolve, reject) => {
        const sql = "DELETE FROM students WHERE id = ?";
        db.query(sql, [id], (err, results) => {
            if (err) reject(err);
            resolve(results);
        });
    });
}

} 

module.exports = Student;