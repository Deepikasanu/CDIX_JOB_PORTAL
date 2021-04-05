<?php

session_start();

require_once("db.php");

$limit = 16;

if(isset($_GET["page"])) {
	$page = $_GET['page'];
} else {
	$page = 16;
}

$start_from = ($page-1) * $limit;

$sql = "SELECT * FROM users LIMIT $start_from, $limit";
$result = $conn->query($sql);
if($result->num_rows > 0) {
	while($row = $result->fetch_assoc()) {
		$sql1 = "SELECT * FROM users WHERE id_user='$row[id_user]'";
              $result1 = $conn->query($sql1);
              if($result1->num_rows > 0) {
                while($row1 = $result1->fetch_assoc()) 
                {
             ?>

		   <div class="attachment-block clearfix">
		      
                    
              
              <div class="attachment-pushed">
                <h4 class="attachment-heading"><a href="view-candidate-post.php?id=<?php echo $row['id_user']; ?>"><?php echo $row['firstname']; ?></a> <span class="attachment-heading pull-right"></h4>
                <div class="attachment-text">
                    
                    
                     <?php 
            if(isset($_SESSION["id_user"]) && empty($_SESSION['companyLogged'])) { ?>
            <div>
                    <div><strong><?php echo $row1['firstname']; ?> |
                    
                    </div>
            <?php } ?>
                    
                    
                    
                    <?php echo $row1['city']; ?> |  <?php echo $row['stream']; ?></strong></div>
                
                
                
                </div>
              </div>
            </div>

		<?php
			}
		}
	}
}

$conn->close();