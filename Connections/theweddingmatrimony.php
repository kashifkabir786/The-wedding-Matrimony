<?php
$hostname_theweddingmatrimony = "localhost";
$database_theweddingmatrimony = "theweddingmatrimony";
$username_theweddingmatrimony = "theweddingmatrimony";
$password_theweddingmatrimony = "123456";
$theweddingmatrimony = mysqli_connect( $hostname_theweddingmatrimony, $username_theweddingmatrimony, $password_theweddingmatrimony, $database_theweddingmatrimony )or trigger_error( mysqli_connect_error(), E_USER_ERROR );

global $theweddingmatrimony;
if ( !function_exists( "GetSQLValueString" ) ) {
    function GetSQLValueString( $theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "" ) {
        //  if (PHP_VERSION < 6) {
        //    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
        //  }
        global $theweddingmatrimony;
        $theValue = function_exists( "mysqli_real_escape_string" ) ? mysqli_real_escape_string( $theweddingmatrimony, $theValue ) : mysqli_escape_string( $theValue );
        switch ( $theType ) {
            case "text":
                $theValue = ( $theValue != "" ) ? "'" . $theValue . "'": "NULL";
                break;
            case "long":
            case "int":
                $theValue = ( $theValue != "" ) ? intval( $theValue ) : "NULL";
                break;
            case "double":
                $theValue = ( $theValue != "" ) ? doubleval( $theValue ) : "NULL";
                break;
            case "date":
                $theValue = ( $theValue != "" ) ? "'" . $theValue . "'": "NULL";
                break;
            case "defined":
                $theValue = ( $theValue != "" ) ? $theDefinedValue : $theNotDefinedValue;
                break;
        }
        return $theValue;
    }
}
?>