var jumlahKopi = 0;

function tambahkopi() {
    jumlahKopi++;
    updateTampilanKopi();
}

function kurangkopi() {
    if (jumlahKopi > 0) {
        jumlahKopi--;
    }
    updateTampilanKopi();
}

function updateTampilanKopi() {
    document.getElementById("banyak-kopi").innerText = jumlahKopi;
}
