<?php

//Bắt đầu player chạy phim

?>

<!-- đoạn này chèn lên trên trong thẻ <head> (không cần trên head cũng k sao)-->

​<script src="assets/jwplayer.js" ></script>

<script>jwplayer.key="YgtWotBOi+JsQi+stgRlQ3SK21W2vbKi/K2V86kVbwU=";</script>

<!-- end header - start body (đoạn này chèn ỡ chỗ muốn show player ra)-->

<div id="myElement">Loading the player...</div>

<script type="text/javascript">

var playerInstance = jwplayer("myElement");

playerInstance.setup({

    file: "<?php echo 'http://pphim.org:81/hls/sv999/sv.999/2011_voice_3_full/2011_voice_3_1/2011_voice_3_1_.m3u8'; ?>",

    width: 640,

    height: 360

});

</script>