<?php
	function notice($c)
	{
		?>
			<script type="text/javascript">
				alert("<?php echo $c; ?>");
			</script>
		<?php
	}
	function previousPage()
	{
		?>
			<script type="text/javascript">
				window.history.back();
			</script>	
		<?php
		exit();
	}
	function redirect($link)
	{
		?>
			<script type="text/javascript">
				window.location="<?php echo $link; ?>";
			</script>
		<?php
		exit();
	}
	$limit=16;
	if($_GET['page']=="")
	{
		$vtbd=0;
	}
	else 
	{
		$vtbd=($_GET['page']-1)*$GLOBALS['limit'];
	}
	function pageDivider($sql)
	{
		?>
			<style>
				.page
				{
					text-align: center;
					padding: 10px;
					border-top: 1px solid #ccc;
					background: #fff;		
				}
				.page .pt3{
					margin: 0 5px;
				}
			</style>
		<?php
		$r_tv_1=mysql_query($sql);
		$r_tv_2=mysql_fetch_row($r_tv_1);
		$so=$r_tv_2[0];
		$st=ceil($so/$GLOBALS['sogioihan']);

		echo "<div class='page'>";
		if($_GET['page']!="")
		{
			if(ereg("&page=",$_SERVER['REQUEST_URI']))
			{
				$_SERVER['REQUEST_URI']=str_replace("&page=","",$_SERVER['REQUEST_URI']);
				$_SERVER['REQUEST_URI']=substr($_SERVER['REQUEST_URI'],0,-strlen($_GET['page']));
				$lpt=$_SERVER['REQUEST_URI']."&page=";
			}
			else
			{
				$lpt=$_SERVER['REQUEST_URI']."&page=";
			}
		}
		else
		{
			$_SERVER['REQUEST_URI']=str_replace("&page=","",$_SERVER['REQUEST_URI']);
			$lpt=$_SERVER['REQUEST_URI']."&page=";
		}
		if($_GET['page']!="" and $_GET['page']!="1")
		{
			if($_GET['page']=="" or $_GET['page']==1)
			{
				$k=1;
			}
			else
			{
				$k=$_GET['page']-1;
			}
			$link_t=$lpt.$k;
			$link_d=$lpt."1";
			echo '<a href="'.$link_d.'" style="margin-right:10px" class="pt3">Đầu</a>';
			echo '<a href="'.$link_t.'" style="margin-right:10px" class="pt3">Trước</a>';
		}
		if($_GET['page']==""){$a=1;}else{$a=$_GET['page'];}
		$b_1=$_GET['page']-5;$n_1=$b_1;
		if($b_1<1){$b_1=1;}
		$b_2=$_GET['page']+5;
		if($b_2>=$st){$n_2=$b_2;$b_2=$st;}
		if($n_1<0){$v=(-1)*$n_1;$b_2=$b_2+$v;}
		if($n_2>=$st){$v_2=$n_2-$st;$b_1=$b_1-$v_2;}
		if($b_1>1){echo ' ... ';}
		for($i=$b_1;$i<=$b_2;$i++)
		{
			$lpt_1=$lpt.$i;
			if($i>0 && $i<=$st)
			{
				if($i!=$a)
				{
					?>
						<a href="<?php echo $lpt_1; ?>" class="pt3"><?php echo $i;?> </a>
					<?php
				}
				else
				{
					echo "<b style=\"color:red\">$i</b>";
				}
			}
		}
		if($b_2<$st){echo ' ... ';}
		if($_GET['page']!=$st && $st!=1)
		{
			if($_GET['page']==$st)
			{
				$k=$st;
			}
			else
			{
				$k=$_GET['page']+1;
				if($_GET['page']==""){$k=2;}
			}
			$link_n=$lpt.$k;
			$link_last=$lpt.$st;
			echo '<a href="'.$link_n.'" style="margin-left:10px" class="pt3">Next</a>';
			echo '<a href="'.$link_last.'" style="margin-left:10px" class="pt3">Cuối</a>';
		}
		echo "</div>";
	}
?>
<script>
function checkDel()
{
	var agree=confirm("Do you want to delete this item?");
	if (agree)
	    return true ;
	else
	    return false ;
}
</script>