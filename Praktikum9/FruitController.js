/**
 * TODO 3:
 * - import fruits dari data/fruits.js
 * - refactor variabel ke ES6 variable
 */
const fruits = require ("./fruits.js");

/**
 * TODO 4:
 * - Buat method index.
 * - Refactor function ke ES6 Arrow Function
 * - Tampilkan data fruits.
 *
 * hint - Gunakan looping for of
 */
const index = () => {
    console.log("Method index - Menampilkan Buah");
    for (const fruit of fruits){
        console.log(fruit);
    }
};

/**
 * TODO 5:
 * - Buat method store.
 * - Refactor function ke ES6 Arrow Function
 * - Menambahkan data baru ke array fruits.
 *
 * param {string} name - Nama buah.
 *
 * hint - Gunakan method push
 */
const store = (name) => {
    fruits.push(name);
    index();
};

/**
 * TODO 6:
 * - Buat method update.
 * - Refactor function ke ES6 Arrow Function
 * - Memperbarui data fruits.
 *
 * param {number} position - Posisi atau index yang ingin diupdate.
 * param {string} name - Nama buah yang baru.
 */
const update = (position, name) => {
    if (position >= 0 && position < fruits.length) {
        fruits[position] = name;
    } else {
        console.log("\nError: Invalid position");
    }
    index();
};

/**
 * TODO 7:
 * - Buat method destroy.
 * - Refactor function ke ES6 Arrow Function
 * - Menghapus data fruits.
 *
 * param {number} position - Posisi atau index yang ingin dihapus
 *
 * hint - Gunakan method splice
 */
const destroy = (position) => {
    if (position >= 0 && position < fruits.length) {
        fruits.splice(position, 1);
    } else {
        console.log("\nError: Invalid position");
    }
    index();
};

/**
 * TODO 8: export method index, store, update, dan destroy
 */
module.exports = {index,store,update,destroy};