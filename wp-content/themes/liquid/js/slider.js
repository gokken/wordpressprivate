jQuery(function ($) {
 var slideWidth = $('.slide').outerWidth(); // .slideの幅を取得して代入
 var slideNum = $('.slide').length;  // .slideの数を取得して代入
 var slideSetWidth = (slideWidth * slideNum); // .slideの幅×数で求めた値を代入
 var slideCurrent = 0; //現在のslideの位置
 $('.slideSet').css('width', slideSetWidth); // .slideSetのスタイルシートにwidth: slideSetWidthを指定

 var sliding = function(){
  // silideCurrentが0以下の場合
  if( slideCurrent < 0 ){
   slideCurrent = slideNum - 1;
  }
  // slideCurrentがslideNumを超えたら
  else if( slideCurrent > slideNum - 1 ){
   slideCurrent = 0;
  }

  $('.slideSet').stop().animate({
   left: slideCurrent*(-slideWidth)
  });
 }
 // 次へボタンが押されたとき
 $('.slider-next').click(function(){
  slideCurrent++;
  sliding();
 });
 // 前へボタンが押されたとき
 $('.slider-prev').click(function(){
  slideCurrent--;
  sliding();
 });
});
