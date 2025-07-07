document.getElementById("bookingForm").addEventListener("submit", function(event) {
  event.preventDefault();

  const nama = document.getElementById("nama").value;
  const film = document.getElementById("film").value;
  const jadwal = document.getElementById("jadwal").value;
  const jumlah = parseInt(document.getElementById("jumlah").value);
  const hargaTiket = 40000;
  const total = jumlah * hargaTiket;

  const hasil = `
    <h3>Pesanan Berhasil!</h3>
    <p><strong>Nama:</strong> ${nama}</p>
    <p><strong>Film:</strong> ${film}</p>
    <p><strong>Jadwal:</strong> ${jadwal}</p>
    <p><strong>Jumlah Tiket:</strong> ${jumlah}</p>
    <p><strong>Total Bayar:</strong> Rp ${total.toLocaleString('id-ID')}</p>
  `;

  const hasilDiv = document.getElementById("hasilPemesanan");
  hasilDiv.innerHTML = hasil;
  hasilDiv.style.display = "block";
});
