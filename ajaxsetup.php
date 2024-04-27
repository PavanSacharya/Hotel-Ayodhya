<?php
include("sqlcon.php");
error_reporting(0);
session_start();

if(isset($_GET["method"]) && $_GET["method"] == "cart")
{
	$qty = $_GET['qty'];
	$prodid = $_GET['prodid'];
	$userid= $_SESSION["uid"];
	$boffer = $_GET['boffer'];
	
	
		$i = "select * from cart where prodid=$prodid and userid=$userid and billid=0";
		$q = mysqli_query($con, $i);
		
		if(mysqli_num_rows($q) > 0)
		{
			$d = mysqli_fetch_array($q);
			$old_qty = $d['qty'];
			if($_GET["ref"] == "cart")
			{
				$new_qty=$qty;
			}
			else
			{
				$new_qty = $old_qty + $qty;
			}
			
			$r = "update cart set qty=$new_qty where prodid=$prodid and userid=$userid and billid=0";
			$r = mysqli_query($con, $r);
		}
		else
		{
			$r = mysqli_query($con, "insert into cart(prodid,qty,userid,billid,brand_offer) values($prodid,$qty,$userid,0,$boffer)");
		}
		if($r)
		{
			echo "success";
		}
		else
		{
			echo "error";
		}
	}

if(isset($_GET["method"]) && $_GET["method"] == "wishlist")
{
	$qty = $_GET['qty'];
	$prodid = $_GET['prodid'];
	$userid= $_SESSION["uid"];
	$boffer = $_GET['boffer'];
	
	
		$i = "select * from wishlist where prodid=$prodid and userid=$userid";
		$q = mysqli_query($con, $i);
		
		if(mysqli_num_rows($q) > 0)
		{
			$d = mysqli_fetch_array($q);
			$old_qty = $d['qty'];
			$new_qty = $old_qty + $qty;
			$r = "update wishlist set qty=$new_qty where prodid=$prodid and userid=$userid";
			$r = mysqli_query($con, $r);
		}
		else
		{
			$r = mysqli_query($con, "insert into wishlist(prodid,qty,userid,brand_offer) values($prodid,$qty,$userid,$boffer)");
		}
		if($r)
		{
			echo "success";
		}
		else
		{
			echo "error";
		}
	}



if(isset($_GET["method"]) && $_GET["method"] == "wish")
{
	$qty = $_GET['qty'];
	$prodid = $_GET['prodid'];
	$userid= $_SESSION["uid"];
	$boffer = $_GET['offer'];
	$cartid = $_GET['cartid'];
	
	
		$i = "select * from wishlist where prodid=$prodid and userid=$userid";
		$q = mysqli_query($con, $i);
		
		if(mysqli_num_rows($q) > 0)
		{
			$d = mysqli_fetch_array($q);
			$old_qty = $d['qty'];
			$new_qty = $old_qty + $qty;
			$r = "update wishlist set qty=$new_qty where prodid=$prodid and userid=$userid";
			$r = mysqli_query($con, $r);
		}
		else
		{
			$r = mysqli_query($con, "insert into wishlist(prodid,qty,userid,brand_offer) values($prodid,$qty,$userid,$boffer)");
		}
		if($r)
		{
			$dd = mysqli_query($con, "Delete from cart where cartid=$cartid");
			echo "success";
		}
		else
		{
			echo "error";
		}
	}


if(isset($_GET["method"]) && $_GET["method"] == "wishtocart")
{
	$qty = $_GET['qty'];
	$prodid = $_GET['prodid'];
	$userid= $_SESSION["uid"];
	$boffer = $_GET['offer'];
	$wid = $_GET['cartid'];
	

		$i = "select * from cart where prodid=$prodid and userid=$userid and billid=0";
		$q = mysqli_query($con, $i);
		
		if(mysqli_num_rows($q) > 0)
		{
			$d = mysqli_fetch_array($q);
			$old_qty = $d['qty'];
			if($_GET["ref"] == "cart")
			{
				$new_qty=$qty;
			}
			else
			{
				$new_qty = $old_qty + $qty;
			}
			
			$r = "update cart set qty=$new_qty where prodid=$prodid and userid=$userid and billid=0";
			$r = mysqli_query($con, $r);
		}
		else
		{
			$r = mysqli_query($con, "insert into cart(prodid,qty,userid,billid,brand_offer) values($prodid,$qty,$userid,0,$boffer)");
		}
		if($r)
		{
			$dd = mysqli_query($con, "Delete from wishlist where wid=$wid");
			echo "success";
		}
		else
		{
			echo "error";
		}
	}


if(isset($_GET["method"]) && $_GET["method"] == "del")
{
	 
	$prodid = $_GET['prodid'];
	$userid= $_SESSION["uid"];
	$rst = mysqli_query($con ,"delete from cart where prodid=$prodid and userid=$userid and billid=0");
	if($rst)
	{
		echo "success";
	}
	else
	{
		echo "error";
	}
	 
}

if(isset($_GET["method"]) && $_GET["method"] == "wishlistdel")
{
	 
	$wid = $_GET['wid'];
	$userid= $_SESSION["uid"];
	$rst = mysqli_query($con ,"delete from wishlist where wid=$wid");
	if($rst)
	{
		echo "success";
	}
	else
	{
		echo "error";
	}
	 
}

if(isset($_GET["method"]) && $_GET["method"] == "add")
{
	 
	$qty = $_GET['qty'];
	$prodid = $_GET['prodid'];
	
	
		echo "success";
	
	 
}

if(isset($_GET["type"]) && $_GET["type"] == "rate")
{
	$postdate = date("Y/m/d H:i:s");
	
	$qry = "insert into review(prod_id,user_id,preview,posted_date,subject) values('".$_GET['prodid']."','".$_SESSION['uid']."',
	'".$_GET['review']."','".$postdate."','".$_GET['subj']."')";
	
	if(mysqli_query($con,$qry))
	{
	//echo "<script>alert('Record Inserted');window.location='prod_detail.php?id=".$_GET['prodid']."';</script>";	
		echo "success";	
	}
}

if(isset($_GET['productid']))
{
	 
	$prodid = $_GET['productid']; 
	$q = "update product set status='Inactive' where product_id=$prodid";
	$rst = mysqli_query($con ,$q);
	if($rst)
	{
		echo "success";
	}
	else
	{
		echo "error";
	}
	 
}
if(isset($_GET['email']))
{
	$q = "select * from seller where seller_email='".$_GET['email']."'";
	$rst = mysqli_query($con ,$q);
	if(mysqli_num_rows($rst) > 0)
	{
		echo "success";
	}
	else
	{
		echo "error";
	}
}
if(isset($_GET['month']))
{
	$daysinmonth = cal_days_in_month(CAL_GREGORIAN, $_GET['month'], $_GET['syear']);
	echo $daysinmonth;
}
if(isset($_GET['smonth']))
{
	$daysinmonth = cal_days_in_month(CAL_GREGORIAN, $_GET['smonth'], $_GET['year']);
	$st_date = $_GET['year']."-".$_GET['smonth']."-01";
	$end_date = $_GET['year']."-".$_GET['smonth']."-".$daysinmonth;
	
	$q = "SELECT COUNT(`attendance_type`) as tcount,(SELECT COUNT(`attendance_type`) FROM `attendance` WHERE `empid`='".$_GET['empid']."' and attendance_type = 'Half Day' and date between '$st_date' and '$end_date') as halfday FROM `attendance` WHERE `empid`= '".$_GET['empid']."' and attendance_type = 'Present' and date between '$st_date' and '$end_date'";
	
	$res = mysqli_query($con, $q);
	$row = mysqli_fetch_array($res);
	
	$presentdays = $row['tcount'] + ($row['halfday']/2);
	
	echo $presentdays;
}

if(isset($_REQUEST['query']))
{
	 $query = $_REQUEST['query'];
    $sql = mysql_query ("SELECT product_name,subcat_name,cat_name FROM `product` inner join beautysubcat on product.subcat_id=beautysubcat.subcat_id inner join beautycategory on product.cat_id=beautycategory.cat_id WHERE product_name LIKE '%{$query}%' OR subcat_name LIKE '%{$query}%' OR cat_name LIKE '%{$query}%'");
	$array = array();
    while ($row = mysql_fetch_array($sql)) {
        $array[] = array (
            'label' => $row['product_name'].', '.$row['subcat_name'].', '.$row['cat_name'],
            'value' => $row['product_name'],
        );
    }
    //RETURN JSON ARRAY
    echo json_encode ($array);
}

if(isset($_GET['cartid']) && isset($_GET['status']))
{
	$cartid = $_GET['cartid']; 
	$status = $_GET['status']; 
	$q = "update cart set ostatus=$status where cartid=$cartid";
	$rst = mysqli_query($con ,$q);
	if($rst)
	{
		
		if($status == "7")
		{
			$qry = "SELECT * FROM `cart` where cartid=$cartid";
			$res = mysqli_query($con, $qry);
			$result = mysqli_fetch_array($res);
			
			$qty = $result["qty"];
			
			  $date = date('Y-m-d');
			mysqli_query($con,"insert into tblstock(prodid,stock,type,pdate) values('".$row['prodid']."',$qty,'STK','".$date."')");
		}
		echo "success";
	}
	else
	{
		echo "error";
	}
	 
}

?>