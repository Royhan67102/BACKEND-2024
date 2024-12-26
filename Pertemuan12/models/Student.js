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

    static create(data) {
        return new Promise((resolve, reject) => {
          const query = "INSERT INTO students SET ?";
          db.query(query, data, (err, results) => {
            if (err) {
              return reject(err);
            }
            const students = {
              id: results.insertId,
              ...data,
            };
            resolve(students);
          });
        });
      }

    // static update(id, data) {
    //     return new Promise((resolve, reject) => {
    //         const query = "UPDATE students SET ? WHERE id = ?";
    //         db.query(query, [data, id], (err, results) => {
    //             if (err) reject(err);
    //             resolve(results);  // Mengembalikan hasil query update
    //         });
    //     });
    // }
    

} 

module.exports = Student;