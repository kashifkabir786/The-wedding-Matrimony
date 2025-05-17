<?php require_once('Connections/theweddingmatrimony.php'); ?>
<?php require_once('session.php'); ?>

<?php
if (isset($_POST['state'])) {
    $state = $_POST['state'];
    
    $query = "SELECT `city` FROM `cities` WHERE `state` = '$state' ORDER BY city";
    $result = mysqli_query($theweddingmatrimony, $query) or die(mysqli_error($theweddingmatrimony));
    
    $options = '<option value="">Select City</option>';
    while ($row = mysqli_fetch_assoc($result)) {
        $options .= '<option value="' . $row['city'] . '">' . $row['city'] . '</option>';
    }
    
    echo $options;
}
?>