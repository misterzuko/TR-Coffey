var jumlahKopi = 1;

function tambahkopi() {
    jumlahKopi++;
    updateTampilanKopi();
}

function kurangkopi() {
    if (jumlahKopi > 1) {
        jumlahKopi--;
    }
    updateTampilanKopi();
}
function updateTampilanKopi() {
    document.getElementById("banyak-kopi").innerText = jumlahKopi;
}