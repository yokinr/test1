
var session = "<?= strtolower(str_replace(' ', '_', $this->session->userdata('peran_id_str'))) ?>";
$('table').addClass("table table-striped");
$('table td,th').addClass('align-middle');
var qualifyURL = function(pathOrURL) {
	if (!(new RegExp('^(http(s)?[:]//)','i')).test(pathOrURL)) {
		return $(document.body).data('base') + pathOrURL;
	}
	return pathOrURL;
};

var dataLoad = $('#content').attr('data-id');

if(dataLoad!=''){
	$.ajax({
		url:qualifyURL('pages'),
		data:{data:dataLoad},
		type:'post',
		beforeSend:function(){
			$('#content').html("<h1 class='text-center mt-4'>Memproses Data,<br>harap Tunggu!</h1>");
		},
		error:function(status){
			$('#content').html("<h1 class='text-center mt-4'>Gagal memuat data!</h1>");
		},
		success:function(result){
			$('#content').html(result);
		}
	});
}

$('#pencarian').change(function(){
	var url = location.href;
	var cari = $(this).val();
	$.post(qualifyURL('pages'),{data:dataLoad,cari:cari}, function(result){
		$('#content').html(result);
	});
});

$(".tombol-1").on("click", function() {
	$('.modal-dialog').removeClass('modal-lg modal-xl modal-fullscreen');
	var id = $(this).attr('id');
	var dataId = $(this).attr('data-id');
	var md_v = $(this).attr('md-v');
	$.post(qualifyURL('form/tombol_1'),{halaman:id, data:dataId}, function(result){
		$('.modal-dialog').addClass(md_v);
		$('.modal-body').html(result);
		$('.modal').modal('show');
	});
});

$(".tombol-2").on("click", function() {
	$('.modal-dialog').removeClass('modal-lg modal-xl modal-fullscreen');
	var md_v = $(this).attr('md-v');
	var idTombol = $(this).attr('id');
	var checkedIds = $(".form-check-input:checked").map(function() {
		var idData = $(this).attr('id');
		var dataId = $(this).attr('data-id');
		return idData+','+dataId;
	}).toArray();
	$.post(qualifyURL('form/tombol_2'),{halaman:idTombol,data:checkedIds}, function(result){
		$('.modal-dialog').addClass(md_v);
		$('.modal-body').html(result);
		$('.modal').modal('show');
	});
});

$("#content").on("click", ".tombol-1", function() {
	$('.modal-dialog').removeClass('modal-lg modal-xl modal-fullscreen');
	var id = $(this).attr('id');
	var dataId = $(this).attr('data-id');
	var md_v = $(this).attr('md-v');
	$.post(qualifyURL('form/tombol_1'),{halaman:id, data:dataId}, function(result){
		$('.modal-dialog').addClass(md_v);
		$('.modal-body').html(result);
		$('.modal').modal('show');
	});
});

// $('.modal').on('submit', 'form', function(e){
//   e.preventDefault();
//   var id = event.target.id;
//   console.log(id);
//   var xhr = new XMLHttpRequest();
//   xhr.open("POST", qualifyURL('form/post1'), true);
//   xhr.onreadystatechange = function() {
//     if(xhr.readyState == XMLHttpRequest.DONE && xhr.status == 200) {
//       toastr.success(xhr.responseText);
//       $.post(qualifyURL('pages'),{data:dataLoad}, function(result){
//         $('#content').html(result);
//       });
//     }else{
//       toastr.error(result);
//     }
//   }
//   var formData = new FormData(this);
//   xhr.send(formData);
// });

$('.modal').on('submit', 'form', function(e){
	e.preventDefault();
	var xhr = new XMLHttpRequest();
	var txt = xhr.responseText;
	xhr.upload.onloadstart = (event) => {
		window.clearTimeout()
		$('.progress').removeClass('d-none');
	}

	xhr.upload.onerror = () => {
		toastr.error("Gagal mengirim data, silahkan coba lagi !");
	}

	xhr.upload.onabort = () => {
		toastr.warning("Pengiriman data dibatalkan");
	}

	xhr.upload.onprogress = (event) => {
		var terUpload = Math.round(event.loaded / 1024);
		var size = Math.round(event.total / 1024);
		$('.progress').text('Diproses: '+terUpload+' dari '+size+' KB');
    // $('.progress').text(`Uploaded ${event.loaded} of ${event.total} bytes`);
}

xhr.upload.onloadend = () => {
	xhr.onreadystatechange = function() {
		if(xhr.readyState == XMLHttpRequest.DONE && xhr.status == 200) {
			toastr.success(xhr.responseText);
			$.post(qualifyURL('pages'),{data:dataLoad}, function(result){
				$('#content').html(result);
				setTimeout(function(){ $('.progress').addClass('d-none'); }, 3000);
			});
		}
	}
}
xhr.open("POST", qualifyURL('form/post'), true);
  // const files = document.querySelector('[name=fileToUpload]').files;
  const formData = new FormData(this);
  xhr.send(formData);
});

$('#content').on('click', '.getData', function(){
	var dataid = $(this).attr('data-id');
	$('.m-dialog').css('display','flex');
	$.ajax({
		url : qualifyURL('form/post'),
		data : {page:'update_dapodik',data:dataid},
		type : 'post',
		cache: false,
		beforeSend:function(){
			$('#content').html("<h1 class='text-center mt-4'>Memproses Data,<br>harap Tunggu!</h1>");
		},
		error:function(){
			$('#content').html("<h1 class='text-center mt-4'>Gagal memuat data!</h1>");
		},
		success: function(result){
			toastr.success(result);
			$.post(qualifyURL('pages'),{data:dataLoad}, function(result){
				$('#content').html(result);
			});
		}
	});
});

$(document.body).on('change',"#data_pilih_akun",function (e){
	var optVal= $("#data_pilih_akun option:selected").val();
	$.post(qualifyURL('auth/pilih_akun'), {data_pilih_akun:optVal}, function(result){
		if(result=='Berhasil mengambil data'){
			location.reload();
		}else{
			toastr.error(result);
		}
	})
});

$('#content').on('click', '.tombol-3', function(){
	var id = $(this).attr('id');
	var dataID = $(this).attr('data-id');
	$.post(qualifyURL('pages'), {data:id,dataID:dataID}, function(result){
		$('#content').html(result);
	})
});

