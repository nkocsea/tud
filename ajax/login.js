$(document).ready(function()
   { 
    
    // url file xử lý data
    var urll= '/ajax/xulydatalogin.php'; //file xử lý data form video
    $('#femail').keyup(function(e){ 
      var username = $("input[name='femail']").serialize();
      $.ajax({
        type: 'POST',
        url: urll,
        data:username,
        success : function(data){
          data = $.trim(String(data));
          $('#status').html(data);
        }
      });
      return false;
    });
    $('#formlogin').submit(function(){ 
      var email = $.trim($("input[name='femail']").val());
      
      var pass = $.trim($("input[name='fpass']").val());
      
      
       if (email!= '' && pass !='') { 
         var data = $('form#formlogin').serialize();
        $.ajax({
          type: 'POST',
          url: urll,
          data: data,
          success : function(data){ 
            data = $.trim(String(data));
            if (data == '1') { 
              window.location.href='/';
              // $('.status').html('Thanh cong');
            } else if (data=='2') {
              $('.status').html('Tên đăng nhập hoặc mật khẩu trống');
            } else {
              $('.status').html('Đăng nhập không thành công');
            }           
          }
        });
        return false;       
       }else{
         $('.status').html('Tên đăng nhập hoặc mật khẩu trống');
         return false;
       }
    });
});