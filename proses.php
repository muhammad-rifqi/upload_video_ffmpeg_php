<?php
//    Resize = shell_exec('ffmpeg -i path/survey.mp4 -s 320x240 -c:a copy path/result.mp4');
//    thumbnail = shell_exec('ffmpeg -i path/survey.mp4 -ss 01:00 -frames:v 1 path/output.png');


include "config.php";

$random = rand(0000,9999);
$new_name = "vid_".$random;
$lokasi_file = $_FILES['file_vid']['tmp_name'];
if (!empty($lokasi_file)) {
    shell_exec('ffmpeg -i '.$lokasi_file.' -s 320x240 -c:a copy path/'.$new_name.'.mp4');

    if (file_exists('path/'.$new_name.'.mp4')) {
            mysqli_query($koneksi,"insert into tbl_ffmpeg(url)values('path/".$new_name.".mp4')");
    }else{
        echo "File Tidak Anda";
    }
}else{
    echo "Gagal Upload";
}    
?>