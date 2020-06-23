$(document).ready(function() {
	$('#datatables').DataTable();
});

function previewImage() {
const gambarBerita = document.querySelector('.gambar_berita');
const imgPreview = document.querySelector('.img-preview');

const oFReader = new FileReader();
	oFReader.readAsDataURL(gambarBerita.files[0]);

	oFReader.onload = function(oFREvent) {
		imgPreview.src = oFREvent.target.result;
	}

}