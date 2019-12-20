/* Variabel Inputan Dari Form */
var rp0 = document.getElementById('rupiah0');
rp0.addEventListener('keyup', function(e) {
  rp0.value = formatRupiah(this.value);
});
      
rp0.addEventListener('keydown', function(event) {
  limitCharacter(event);
});

var rp1 = document.getElementById('rupiah1');
rp1.addEventListener('keyup', function(e) {
  rp1.value = formatRupiah(this.value);
});
      
rp1.addEventListener('keydown', function(event) {
  limitCharacter(event);
});

var rp2 = document.getElementById('rupiah2');
rp2.addEventListener('keyup', function(e) {
  rp2.value = formatRupiah(this.value);
});
      
rp2.addEventListener('keydown', function(event) {
  limitCharacter(event);
});

var rp3 = document.getElementById('rupiah3');
rp3.addEventListener('keyup', function(e) {
  rp3.value = formatRupiah(this.value);
});
      
rp3.addEventListener('keydown', function(event) {
  limitCharacter(event);
});

var rp3 = document.getElementById('rupiah3');
rp3.addEventListener('keyup', function(e) {
  rp3.value = formatRupiah(this.value);
});
      
rp3.addEventListener('keydown', function(event) {
  limitCharacter(event);
});

var rp4 = document.getElementById('rupiah4');
rp4.addEventListener('keyup', function(e) {
  rp4.value = formatRupiah(this.value);
});
      
rp4.addEventListener('keydown', function(event) {
  limitCharacter(event);
});

var rp5 = document.getElementById('rupiah5');
rp5.addEventListener('keyup', function(e) {
  rp5.value = formatRupiah(this.value);
});
      
rp5.addEventListener('keydown', function(event) {
  limitCharacter(event);
});
/* Fungsi */
function formatRupiah(bilangan, prefix) {
  var number_string = bilangan.replace(/[^,\d]/g, '').toString(),
    split   = number_string.split(','),
    sisa    = split[0].length % 3,
    rupiah  = split[0].substr(0, sisa),
    ribuan  = split[0].substr(sisa).match(/\d{1,3}/gi);
          
  if (ribuan) {
    separator = sisa ? '.' : '';
    rupiah += separator + ribuan.join('.');
  }
        
  rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
  return prefix == undefined ? rupiah : (rupiah ? + rupiah : '');
}
      
function limitCharacter(event) {
  key = event.which || event.keyCode;
  if ( key != 188 // Comma
     && key != 8 // Backspace
     && key != 17 && key != 86 & key != 67 // Ctrl c, ctrl v
     && (key < 48 || key > 57) // Non digit
     // Dan masih banyak lagi seperti tombol del, panah kiri dan kanan, tombol tab, dll
    ) 
  {
    event.preventDefault();
    return false;
  }
}