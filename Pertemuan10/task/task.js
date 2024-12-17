/**
 * Fungsi untuk menampilkan hasil download
 * param {string} result - Nama file yang didownload
 */
const showDownload = (result) => {
  console.log("Download Selesai");
  console.log(`Hasil Download: ${result}`);
};

/**
 * Fungsi untuk download file
 * param {function} callback - Function callback show
 *////
const download = () => {
  return new Promise((resolve) => {
      setTimeout(() => {
          const file = 'windows-10.exe';
          resolve(file);
      }, 3000);
  });
};

// Memanggil fungsi download dengan async/await
const initiateDownload = async () => {
  try {
      const result = await download(); // Menunggu file selesai di-download
      showDownload(result); // Menampilkan hasil download
  } catch (error) {
      console.error('Error during download:', error);
  }
};


initiateDownload();

/**
 * TODO:
 * - Refactor callback ke Promise atau Async Await
 * - Refactor function ke ES6 Arrow Function
 * - Refactor string ke ES6 Template Literals
 */
