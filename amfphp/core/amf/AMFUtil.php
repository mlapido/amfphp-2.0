<?php

/**
 * utils for AMF handling
 *
 * @author Ariel Sommeria-klein
 */
class AMFUtil {
    /**
     * looks if the system is Big Endain or not
     * @return <Boolean>
     */
    static public function isSystemBigEndian(){
        $tmp = pack("d", 1); // determine the multi-byte ordering of this machine temporarily pack 1
        return ($tmp == "\0\0\0\0\0\0\360\77");
    }



    /**
     * there seems to be some confusion in the php doc as to where best to get the raw post data from.
     * try $GLOBALS['HTTP_RAW_POST_DATA'] and php://input
     *
     * @return <String> it's a binary stream, but there seems to be no better type than String for this.
     */
    static public function getRawPostData(){
        if (isset($GLOBALS['HTTP_RAW_POST_DATA'])) {
            return $GLOBALS['HTTP_RAW_POST_DATA'];
        }else{
            return file_get_contents('php://input');
        }

    }
}
?>
