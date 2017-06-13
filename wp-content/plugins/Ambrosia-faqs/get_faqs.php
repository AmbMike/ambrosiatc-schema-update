<?php
	include_once(dirname(__FILE__).'/init.php');

	$sql = "SELECT * FROM amb_faqs WHERE tags LIKE '%".$atts['tags']."%' LIMIT ".$atts['limit'];
	$result = $con->query($sql);

	?>
	<?php
	if ($result->num_rows > 0) {
		// output data of each row
		while($row = $result->fetch_assoc()) { ?>
		<div class="amb-faq-box off">
			<ul itemscope itemtype="http://schema.org/Question">
                <li><a><span itemprop="text"><?php echo stripslashes($row["question"]); ?></span></a>
					<ul>
                        <li itemprop="suggestedAnswer" itemscope itemtype="http://schema.org/Answer"><span  itemprop="text"><?php echo stripslashes($row["answer"]) ?></span></li>
					</ul>
				</li>
			</ul>
		</div>
<?php }
	} else {
		echo "0 results";
	}
	$con->close();


?>
