<?php require_once('../Connections/theweddingmatrimony.php'); ?>
<?php
if ( isset( $_GET[ 'uname' ] ) ) {

    $deleteSQL = sprintf( "DELETE FROM `admin` WHERE  `uname` = %s",
        GetSQLValueString( $_GET[ 'uname' ], "text" ) );
    $Result1 = mysqli_query( $theweddingmatrimony, $deleteSQL )or die( mysqli_error( $theweddingmatrimony ) );

    $deleteGoTo = "staff.php";
    if ( isset( $_SERVER[ 'QUERY_STRING' ] ) ) {
        $deleteGoTo .= ( strpos( $deleteGoTo, '?' ) ) ? "&" : "?";
        $deleteGoTo .= $_SERVER[ 'QUERY_STRING' ];
    }
    header( sprintf( "Location: %s", $deleteGoTo ) );
}
?>