function validateSelectBox(obj){
    var options = obj.children;
    var html = '';
    for (var i = 0; i < options.length; i++){
        if (options[i].selected){
            html += options[i].value;
        }
    }
      if(html == "Điện Biên" || html == "Hòa Bình" || html == "Lào Cai"
      || html == "Lai Châu" || html == "Sơn La" || html == "Yên Bái"
      || html == "Bắc Giang" || html == "Bắc Kạn" || html == "Cao Bằng"
      || html == "Hà Giang" || html == "Lạng Sơn" || html == "Phú Thọ"
      || html == "Quảng Ninh" || html == "Thái Nguyên" || html == "Tuyên Quang"
      || html == "Bắc Ninh" || html == "Hà Nam" || html == "Hà Nội"
      || html == "Hải Dương" || html == "Hải Phòng" || html == "Nam Định"
      || html == "Hưng Yên" || html == "Ninh Bình" || html == "Vĩnh Phúc" || html == "Thái Bình")
      {
        var a = 1;
      }else if( html == "Hà Tĩnh" || html == "Nghệ An"
      || html == "Quảng Bình" || html == "Quảng Trị" || html == "Thanh Hóa"
      || html == "Thừa Thiên Huế" || html == "Bình Định" || html == "Bình Thuận"
      || html == "Đà Nẵng" || html == "Khánh Hòa" || html == "Ninh Thuận"
      || html == "Phú Yên" || html == "Quảng Nam" || html == "Quảng Ngãi"
      || html == "Đắk Lắk" || html == "Đắk Nông" || html == "Gia Lai"
      || html == "Kon Tum" || html == "Lâm Đồng")
      {
        var a = 2;
      }else{
        var a = 3;
      }
      $('#shipping').text(a);
}
		!function ($) {
		    $(document).on("click","ul.nav li.parent > a > span.icon", function(){          
		        $(this).find('em:first').toggleClass("glyphicon-minus");      
		    }); 
		    $(".sidebar span.icon").find('em:first').addClass("glyphicon-plus");
		}(window.jQuery);

		$(window).on('resize', function () {
		  if ($(window).width() > 768) $('#sidebar-collapse').collapse('show')
		})
		$(window).on('resize', function () {
		  if ($(window).width() <= 767) $('#sidebar-collapse').collapse('hide')
		});
		function changeImg(input){
		    //Nếu như tồn thuộc tính file, đồng nghĩa người dùng đã chọn file mới
		    if(input.files && input.files[0]){
		        var reader = new FileReader();
		        //Sự kiện file đã được load vào website
		        reader.onload = function(e){
		            //Thay đổi đường dẫn ảnh
		            $('#avatar').attr('src',e.target.result);
		        }
		        reader.readAsDataURL(input.files[0]);
		    }
		}
		$(document).ready(function() {
		    $('#avatar').click(function(){
		        $('#img').click();
		    });
		});