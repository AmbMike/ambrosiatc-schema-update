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
            <ul>
                <li><a><?php echo stripslashes($row["question"]); ?></a>
                    <ul>
                        <li><?php echo stripslashes($row["answer"]) ?></li>
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
