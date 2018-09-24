<?php
// ######### some predefined class are used here and no changes should be made here ######//

UrlMapper::mapper("/about",function(){
	echo "hello about"; 
});

UrlMapper::mapper("/fruit",function() use($db){
header("Content-Type:Application/Json");
$result=$db->qry("select * from fruits");
echo json_encode($result);
});

UrlMapper::mapper("/student",function() use($db){
	header("Content-Type:Application/Json");
	header("Access-Control-Allow-Origin:*");
	$request=Request::inputs();
	$result=$db->qry("insert into student values(\"$request->first\",\"$request->last\",\"$request->class\")");
	echo json_encode($result);
});






UrlMapper::mapper("/news",function() use($db){
	header("Content-Type:Application/Json");
	$result=$db->qry("select * from news");
	echo json_encode($result);
});
// get the prodcts
UrlMapper::mapper("/getProducts",function() use($db){
	header("Content-Type:Application/Json");
	$result=$db->qry("select * from news");
	echo json_encode($result);
});

// add to cart
UrlMapper::mapper("/addToCart",function() use($db){
	header("Content-Type:Application/Json");
	header("Access-Control-Allow-Origin:*");
	$request=Request::inputs();
	$result=$db->qry("insert into cart values (\"$request->id\",\"$request->img\",\"$request->price\",\"$request->title\")");
	echo json_encode($result);
});

// get the cart
UrlMapper::mapper("/getCart",function() use($db){
	header("Content-Type:Application/Json");
	header("Access-Control-Allow-Origin: *");
	$result=$db->qry("select * from cart");
	echo json_encode($result);
});


// #########  use full for debuging ########//
 // urlMapper::routes();   /** This method is use to view all register path **/
	




	
?>