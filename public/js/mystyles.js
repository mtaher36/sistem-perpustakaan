// Ambil referensi elemen select dan input
const idMemberSelect = document.querySelector('#id_member');
const namaMemberInput = document.querySelector('#nama_member');
const memberList = document.querySelector('#id_member');

// Tambahkan event listener ketika nilai pada select field berubah
idMemberSelect.addEventListener('change', function () {
  // Ambil nilai ID Member yang dipilih
  const selectedIdMember = this.value;

  // Ambil nama member berdasarkan ID Member yang dipilih dengan AJAX
  fetch(`/get-member-name/${selectedIdMember}`)
    .then((response) => response.text())
    .then((namaMember) => {
      namaMemberInput.value = namaMember;
    });
});

// Tambahkan event listener ketika pengguna memasukkan nilai pada input field ID Member
idMemberSelect.addEventListener('input', function () {
  // Cek apakah nilai yang dimasukkan ada di daftar ID Member
  const enteredIdMember = this.value;
  const optionExists = Array.from(memberList.options).some((option) => option.value === enteredIdMember);

  if (!optionExists) {
    namaMemberInput.value = '';
  }
});
