<link rel="stylesheet" type="text/css" href="css/resev/css/style.css" />
<script type="text/javascript" src="css/resev/js/saslideshow.js"></script>
<script type="text/javascript" src="css/resev/js/slideshow.js"></script>
<script src="js/jquery-1.5.min.js" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript">
 // Run function for every second of timer
 setInterval(rgbcolors, 2000);
 function rgbcolors() {
  // rgb string generation
  var col = "rgb("
   + Math.floor(Math.random() * 255) + ","
   + Math.floor(Math.random() * 255) + ","
   + Math.floor(Math.random() * 255) + ")";
  //change the text color with the new random color
  document.getElementById("divstyle").style.color = col;
 }
</script>

<div id="divstyle" style="font:bold 20px arial;">
 <strong style="font-family: all;"> "{{__('link.wct')}}" </strong><i class="icon-heart"></i>
</div>
<div id="wrapper">
 <div id="content">
  <div id="rotator">
   <ul>
    <li><img src="{{url('images/budget1.webp')}}" width="750" height="390" alt="" /></li>
    <li><img src="{{url('images/budget2.jpg')}}" width="750" height="390" alt="" /></li>
    <li><img src="{{url('images/budget3.PNG')}}" width="750" height="390" alt="" /></li>
    <li><img src="{{url('images/Budget.png')}}" width="750" height="390" alt="" /></li>
    <li><img src="{{url('images/budget4.jpg')}}" width="750" height="390" alt="" /></li>
    <li><img src="{{url('images/budget5.jpg')}}" width="750" height="390" alt="" /></li>
    <li><img src="{{url('images/budget6.jpg')}}" width="750" height="390" alt="" /></li>
    <li><img src="{{url('images/budget7.jpg')}}" width="750" height="390" alt="" /></li>
    <li><img src="{{url('images/budget8.jpg')}}" width="750" height="390" alt="" /></li>
    <li><img src="{{url('images/budget10.jpeg')}}" width="750" height="390" alt="" /></li>
    <li><img src="{{url('images/budget11.jpeg')}}" width="750" height="390" alt="" /></li>
    <li><img src="{{url('images/budget12.jpeg')}}" width="750" height="390" alt="" /></li>
    <li><img src="{{url('images/budget13.jpeg')}}" width="750" height="390" alt="" /></li>
    <li><img src="{{url('images/budget14.jpeg')}}" width="750" height="390" alt="" /></li>
    <li><img src="{{url('images/budget9.jpg')}}" width="750" height="390" alt="" /></li>
   </ul>
  </div>
 </div>
</div>