﻿<?
include('common.php');
$garments_item=array(
1=>"T-Shirt-Long Sleeve",
2=>"T-Shirt-Short Sleeve",
3=>"Polo Shirt-Long Sleeve",
4=>"Polo Shirt-Short Sleeve",
5=>"Tank Top",
6=>"T-Shirt 3/4 ARM",
7=>"Hoodies",
8=>"Henley",
9=>"T-Shirt-Sleeveless",
10=>"Raglans",
11=>"High Neck/Turtle Neck",
12=>"Scarf",
14=>"Blazer",
15=>"Jacket",
16=>"Night Wear",
17=>"Marry Dress",
18=>"Ladies Long Dress",
19=>"Girls Dress",
20=>"Full Pant",
21=>"Short Pant",
22=>"Trouser",
23=>"Payjama",
24=>"Romper Short Sleeve",
25=>"Romper Long Sleeve",
26=>"Romper Sleeveless",
27=>"Romper",
28=>"Legging",
29=>"Three Quater",
30=>"Skirts",
31=>"Jump Suit",
32=>"Cap",
33=>"Tanktop Pyjama",
34=>"Short Sleeve Pyjama",
35=>"Jogging Pant",
36=>"Bag",
37=>"Bra",
38=>"Underwear Bottom",
39=>"Sweat Shirt",
40=>"Singlet",
41=>"Teens Singlet",
42=>"Boxer",
43=>"Stripe Boxer",
44=>"Teens Boxer",
45=>"Jersy Boxer",
46=>"Panty",
47=>"Slip Brief",
48=>"Classic Brief",
49=>"Short Brief",
50=>"Mini Brief",
51=>"Bikini",
52=>"Lingerie",
53=>"Bikers",
54=>"Underwear",
60=>"Plain Socks",
61=>"Rib Socks",
62=>"Jacuard/Patern Socks",
63=>"Heavy Gauge Socks",
64=>"Sports Socks",
65=>"Terry Socks",
66=>"Tight Socks",
67=>"Sweat Pant",
68=>"Sports Ware",
69=>"Jogging Top",
70=>"Long Pant",
71=>"Pirates Pant",
72=>"Bolero",
73=>"Strap Top",
74=>"Ladies Gypsy",
75=>"Long Sleeve Body",
76=>"Tank Top Body",
77=>"Underwear Top",
78=>"Whiper",
79=>"Sleeping Bag",
80=>"Romper Long Sleeve Boys",
81=>"Romper Long Sleeve Girls",
82=>"Romper Long Sleeve Unisex",
83=>"Baby Bodies",
84=>"TQ Pintuck Tee",
85=>"LS Pintuck Tee",
86=>"Twist Neck Pintuck",
87=>"Maxi dress",
88=>"Lace Gupsy",
89=>"Gypsy Tie Neck Tee",
90=>"V-neck Tunic",
91=>"Roll Top Jogger",
92=>"Soft Touch Jogger",
93=>"Plaited Jogger",
94=>"Loopback Jogger",
95=>"Jegging",
96=>"Mens Night Wear",
97=>"Spots Shirt",
98=>"Romper B",
99=>"Inner Top",
100=>"Outer Top",
101=>"Mock Long Sleeve T- Shirt",
102=>"Round Neck Long Sleeve T- Shirt",
103=>"V Neck Long Sleeve T-Shirt",
104=>"BLANKET",
105=>"Playsuit",
106=>"Sweater",
107=>"Jumper",
108=>"Cardigan",
109=>"Nightware-Top",
110=>"Nightware-Bottom",
111=>"V Neck Short Sleeve T-Shirt ",
112=>"R Neck Short Sleeve T-Shirt",
113=>"Mens Trunk",
114=>"Mens Brief",
115=>"Mens Boxer",
116=>"Boys Boxer",
117=>"Boys Brief",
118=>"Girls Brief",
119=>"Ladies Hipster",
120=>"Ladies Thong",
121=>"Mens Pattern Trunk",
122=>"Mens Pattern Brief",
123=>"Mens Pattern Boxer",
124=>"T-Shirt-Long Sleeve-1",
125=>"T-Shirt-Long Sleeve-2"
);
$field_array='id,item_name,status_active,is_deleted,is_default';
foreach($garments_item as $id=>$name){
	$data_array ="(".$id.",'".$name."',1,0,1)";
	$con = connect();
	$rID=sql_insert("lib_garment_item",$field_array,$data_array,1);
	if($rID ){
		oci_commit($con);   
		echo $id."==Inserted".$rID."<br/>";
	}
	else{
		oci_rollback($con);
		echo $id."== Not Inserted".$rID;
	}
    disconnect($con);
}
die("ok");
?>
