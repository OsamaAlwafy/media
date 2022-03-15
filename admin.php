<?php

if(isset($_POST["upload-video"]))  
 {  
      //$output = '';  
      if($_FILES['file_zip']['name'] != '')  
        {  
           $file_name = $_FILES['file_zip']['name'];  
           $array = explode(".", $file_name);  
           $name = $array[0];  
           $ext = $array[1];  
           if($ext == 'zip')  
           {   $path = 'media/upload/';  
            $location = $path.$file_name;  
            if(move_uploaded_file($_FILES['file_zip']['tmp_name'], $location))  
            {  
                 $zip = new ZipArchive;  
                 if($zip->open($location))  
                 {  
                     
                      $zip->extractTo("media/".$_POST["type"]."/");  
                      $zip->close();  
                 }  
                
                  unlink($location);  
              
            }  
       }  
  }  
 }  
 

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>


<div class=" mt-2 card container shadow p-3 mb-5 bg-body rounded">
  <h5 class="card-header">Upload Video</h5>
  <div class="card-body">
    <!-- <h5 class="card-title">Uload File Zip </h5> -->

    <form action="#" method="POST" enctype="multipart/form-data">
        <input type="file" name="file_zip">
        <input type="hidden" name="type" value="video">
        <input type="submit" value="upload" name="upload-video">
    </form>
    
  </div>
</div>

<div class=" mt-2 card container shadow p-3 mb-5 bg-body rounded">
  <h5 class="card-header">Upload audio</h5>
  <div class="card-body">
    <!-- <h5 class="card-title">Uload File Zip </h5> -->

    <form action="#" method="POST" enctype="multipart/form-data">
        <input type="file" name="file_zip">
        <input type="hidden" name="type" value="audio">
        <input type="submit" value="upload" name="upload-video">
    </form>
    
  </div>
</div>


<div class=" mt-2 card container shadow p-3 mb-5 bg-body rounded">
  <h5 class="card-header">Upload images</h5>
  <div class="card-body">
    <!-- <h5 class="card-title">Uload File Zip </h5> -->

    <form action="#" method="POST" enctype="multipart/form-data">
        <input type="file" name="file_zip">
        <input type="hidden" name="type" value="img">
        <input type="submit" value="upload" name="upload-video">
    </form>
    
  </div>
</div>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>    
</body>
</html>