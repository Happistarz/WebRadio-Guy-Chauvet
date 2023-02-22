<?php
// function to list the files
function listfile(){
  // repertory for the files
  $dir = "/var/www/html/files";

  //
  $files = scandir($dir);

  //loop for each files
  foreach ($files as $file)
  {
    //ignore all the repertories which content . and ..
    if ($file == '.' || $file == '..')
    {
      continue;
    }
    //if it's a subfolder, get the files inside
    if (is_dir("$dir/$file"))
    {
      $nfiles = scandir("$dir/$file");

      //loop for each files
      foreach ($nfiles as $nfile)
      {
        //ignore all the repertories which content . and ..
        if ($nfile == '.' || $nfile == '..')
        {
          continue;
        }
        //obtain file informations with the base name without the extensions 
        $file_info = pathinfo("$dir/$file/$nfile");
        $file_name = $file_info['filename'];

	//display a link to the file with the base name without the extensions 
        echo "<a href='/files/$file/$nfile'>$file_name</a>" . "<br>";
      }
    }
    //if it’s a normal file, display a link to the file with the base name without the extensions
    else
    {
    //obtain informations of the file with the base name without the extensions
      $file_info = pathinfo("$dir/$file");
      $file_name = $file_info['filename'];

     // display a link to the file with the base name without the extensions
      echo "<a href='/files/$file'>$file_name</a>" . "<br>";
    }
  }
}

//call the function
listfile();
?>
