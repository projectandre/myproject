// event pada link di klik

// $('.page-scroll').on('click', function(e){

// // 	//ambil isi href
// // 	// var tujuan = $(this).attr('href');
// // 	// //tangkap elemen bersangkutan
// // 	// var elemenTujuan = $(tujuan);

	


// // 	// console.log($('body').scrollTop());

	
// // 	// e.preventDefault();


// 	var href = $(this).attr('href');
// 	var elemenHref = $(href);

// 	$('html','body').animate({
// 		scrollTop: elemenHref.offset().top
// 	},1250,'swing');


	
// });

// $(window).scroll(function() {
//   if($(window).scrollTop() + $(window).height() > $(document).height() - 100) {
//     $('#page-scroll').hide('slow');
//   }
//   else {
//     $('#page-scroll').show('slow');
//   }
// });


$(document).ready(function(){
	$("a").on('click', function(event) {

		if (this.hash !== "a") {
      // Mencegah perilaku klik tautan default
      event.preventDefault();

      // Store hash
      var hash = this.hash;

      // Menggunakan metode animate() jQuery untuk menambahkan scroll halaman yang smooth
       // Bilangan opsional (800) menentukan jumlah milidetik yang diperlukan untuk melakukan scrolling ke area yang ditentukan
      $('html, body').animate({
        scrollTop: $(hash).offset().top - 50
      }, 1250);
    } // End if
  });
});

