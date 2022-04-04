<?php
	$con = mysqli_connect('localhost', 'root', '');
	mysqli_select_db($con, 'myshop');
	function get_product(){
		global $con;
		$ret = array();
		$sql = "SELECT * FROM products where C_id=3";
		$res = mysqli_query($con, $sql);
		while ($ar = mysqli_fetch_assoc($res)) {
			$ret[] = $ar;
		}
		return $ret;
	}
?>
<html>

<head>
	<link rel="stylesheet" type="text/css" href="Style.css">

</head>

<body>
	<div class="all">
	<nav>
			<div class="label">
				<p>JSHOP</p>
				<label>The world class online shoping Platform</label>
			</div>
			<ul>
				<li><a href="Home.php">Recomended for you</a></li>
				<li><a href="Electronics.php">Electronics</a></li>
				<li><a href="Health.php">Health and beauty</a></li>
				<div class="cart">
					<a href="cart.php">&#128722;
						<ion-icon name="basket"></ion-icon>cart<span>0</span>
					</a>
				</div>
				<div class="out"><a href="login.html">Sign out</a></div>
			</ul>
		</nav>
		<div class="head">
			<p>Recomended for you</p>
		</div>
		<?php
			$items = get_product();
			foreach ($items as $ap) {
				$name = $ap['P_name'];
				$image = $ap['image'];
				$price = $ap['P_price'];
				$offer = $ap['Offer'];
			?>
			<div class="images">
				<img src="items/<?php echo $image ?>" alt="">
				<?php
					if($offer == true){
				?>
				
				<div class="it">
                	<p>On Offer</p>
            	</div><?php
					}
				?>
				<h4><?php echo $name ?></h4>
				<span>&#9733;</span><span>&#9733;</span><span>&#9733;</span><span>&#9733;</span><span>&#9734;</span><br>
				<h4>Ksh. <?php echo $price ?></h4>
				<button><a class="add-cart cart1" href="#">Add Cart</a></button>
			</div>
			<?php
			}
		?>
		
	</div>
	<script type="text/javascript">
		var obj = <?php echo json_encode($items); ?>;
		var products={};
		for (let i = 0; i < obj.length; i++) {
			products[i] = obj[i];
			//console.log(products);
		}
		for (let i = 0; i < products.length; i++) {
			products[i].P_price = parseInt(products[i].P_price, 10);
			products[i].incart = parseInt(products[i].incart, 10);

		}
		console.log(products);
	</script>
	<script src="main.js" type="text/javascript"></script>
</body>
<footer>
	<div class="contain">
		<div class="one">
			<P><u>&#9742; Call Us:</u><br><br>0796878802<br>0717150549<br>0797836014<br>0796111220</p>
		</div>
		<div class="two">
			<p>Email: nikeworldclass@gmail.com</p>
			<p>Facebook: nikeworldclass</p>
			<p>Twiter: nike_worldclass</p>
			<p>Instagram: Nike_World_Class</p>
		</div>
		<div class="three">
			<p>&#169; Copyright@2021</p>
			<p>&#174; All Rights Reserved </p>
		</div>
	</div>
</footer>

</html>