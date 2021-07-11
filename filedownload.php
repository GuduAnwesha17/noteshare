<?php
include "connection.php";
if(isset($_GET['file_id']))
{
    $fid = $_GET['file_id'];

    $sql = "SELECT * FROM uploads WHERE fid=?;";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql)){
        mysqli_stmt_bind_param($stmt,"i",$fid);
        mysqli_stmt_execute($stmt);

        $result = mysqli_stmt_get_result($stmt);
    }
        $file = mysqli_fetch_assoc($result);

        

        $filepath = 'uploadfiles/' . $file['file_name'];
        $fb = basename($filepath);
   
            if(!file_exists($filepath)){ // file does not exist
                die('file not found');
            } else {
               /* header("Cache-Control: public");
                header("Content-Description: File Transfer");
                header("Content-Disposition: attachment; filename=$fb");
                header("Content-Type: application/zip");
                header("Content-Transfer-Encoding: binary");
            
                // read the file from disk
                readfile($fb);
            }*/
        
            /*header("Content-Type: application/octet-stream");
            header("Content-Description : File Transfer");
            header("Content-Disposition: attachment; filename=$fb");
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Paragma : public');

            header('Content-Length:' .filesize('uploadfiles/' . $file['file_name']));

            readfile($fb);

            exit;
        }*/
             
           /* header('Content-Disposition: attachment; filename=' .urlencode($file));

            $fb = fopen($file,"r");

            while(!feof($fb)){
                echo fread($fb,8192);
            }*/

       
    
    }
?>
