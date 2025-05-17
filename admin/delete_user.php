<?php require_once('../Connections/theweddingmatrimony.php'); ?>
<?php
if ( isset( $_GET[ 'user_id' ] ) ) {

    $deleteSQL = sprintf( "DELETE FROM `user` WHERE  `user_id` = %s",
        GetSQLValueString( $_GET[ 'user_id' ], "int" ) );
    $Result1 = mysqli_query( $theweddingmatrimony, $deleteSQL )or die( mysqli_error( $theweddingmatrimony ) );

    $deleteGoTo = "user.php";
    if ( isset( $_SERVER[ 'QUERY_STRING' ] ) ) {
        $deleteGoTo .= ( strpos( $deleteGoTo, '?' ) ) ? "&" : "?";
        $deleteGoTo .= $_SERVER[ 'QUERY_STRING' ];
    }
    header( sprintf( "Location: %s", $deleteGoTo ) );
}
?>