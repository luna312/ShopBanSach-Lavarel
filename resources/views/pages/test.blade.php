<!--  <!DOCTYPE html>
<html lang="en">
<head>

  
    <link href="{{asset('public/fontend/css/bootstrap.min.css')}}" rel="stylesheet">

    <link href="{{asset('public/fontend/css/font-awesome.min.css')}}" rel="stylesheet">
  <script type="text/javascript" src="http://code.jquery.com/jquery-1.11.3.js"  defer></script>
    <link href="{{asset('public/fontend/css/main.css')}}" rel="stylesheet"> 
 <script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip(); 
});
</script>
</head>

<body>


<button type="button"
       data-toggle="tooltip"
       title="Tooltip hiện thị - Trên"
       data-placement="top"
       class="btn btn-primary btn-sm">
    Tooltip
</button>




  
    <script src="{{asset('public/fontend/js/jquery.js')}}"></script>
    <script src="{{asset('public/fontend/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('public/fontend/js/jquery.scrollUp.min.js')}}"></script>
    <script src="{{asset('public/fontend/js/price-range.js')}}"></script>
    <script src="{{asset('public/fontend/js/jquery.prettyPhoto.js')}}"></script>
    <script src="{{asset('public/fontend/js/main.js')}}"></script>


</body> 


</html> -->

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{asset('public/fontend/css/bootstrap.min.css')}}" rel="stylesheet">

    <link href="{{asset('public/fontend/css/font-awesome.min.css')}}" rel="stylesheet">
  
    <script src="{{asset('public/fontend/js/jquery.js')}}"></script>
    <script src="{{asset('public/fontend/js/bootstrap.min.js')}}"></script>
</head>
<body>
<div>
    <ul id="cellvaluelist" style="display: flex;">
        <li>
            <a href="#" class="swim">MAIN 1</a>
        </li>
        <li>
            <a href="#" class="chrono">MAIN 2</a>
        </li>
        <li>
            <a href="#" class="couponcode">MAIN 3 
                <ul class="coupontooltip_ul_list">  
                    <li class="coupontooltip_li_list"> 
                        <img class="coupontooltip_img" src="http://lorempixum.com/100/100/nature/1">  
                        <span class="coupontooltiplistspan">Distance</br>Duration: </br>Laps: </span>
                    </li>
                    </br> 
                    <li class="coupontooltip_li_list"> 
                        <img class="coupontooltip_img" src="http://lorempixum.com/100/100/nature/1">  
                       <span class="coupontooltiplistspan">Distance</br>Duration: </br>Laps: </span>
                    </li></br> 
                    <li class="coupontooltip_li_list"> 
                        <img class="coupontooltip_img" src="http://lorempixum.com/100/100/nature/1">  
                        <span class="coupontooltiplistspan">Distance</br>Duration: </br>Laps: </span>
                    </li> 
                </ul> 
            </a> 
        </li>
    </ul>
</div>

<style>


.couponcode {
    background: #47ED4D;
    font-size: 15px;
    font-weight: normal;
}

.couponcode:hover .coupontooltip_ul_list {
    display: block;
}

.coupontooltip_ul_list {
    display: none;
    background: #FFCC00;
    position: absolute;
    z-index: 1000;
}

.coupontooltip_ul_list, .coupontooltip_li_list {
    background: #FF0000;
    list-style-type: none;
    float: left;
    margin: 0;
    padding: 0;
    width: 100%    
}

 .coupontooltip_li_list {
    background: #D6D6D6;
    border-bottom: 2px solid #F5F5F5;
 }

.coupontooltip_img {
    width: 50px;
    height: 50px;
    float: left;
    padding: 5px;    
}

.coupontooltiplistspan {
   display: inline-block;
}

</style>

</body>
</html>