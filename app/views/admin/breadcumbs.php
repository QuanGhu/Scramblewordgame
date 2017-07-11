<?php
function breadcrumbs($sep = '', $home = 'Home') {
$bc     =   '<ol class="breadcrumb">';
//Get the server http address
$site   =   'http://'.$_SERVER['HTTP_HOST'];
//Get all vars en skip the empty ones
$crumbs =   array_filter( explode("/",$_SERVER["REQUEST_URI"]) );
//Create the homepage breadcrumb
$bc    .=   '<li><a href="'.$site.'">'.$home.'</a>'.$sep.'</li>';
//Count all not empty breadcrumbs
$nm     =   count($crumbs);
$i      =   1;
//Loop through the crumbs
foreach($crumbs as $crumb){
//grab the last crumb
$last_piece = end($crumbs);

    //Make the link look nice
    $link    =  ucfirst( str_replace( array(".php","-","_"), array(""," "," ") ,$crumb) );

    //Loose the last seperator
    $sep     =  $i==$nm?'':$sep;
    //Add crumbs to the root
    $site   .=  '/'.$crumb;
    //Check if last crumb
    if ($last_piece!==$crumb){
    //Make the next crumb
    $bc     .= '<li><a href="'.$site.'">'.$link.'</a>'.$sep.'</li>';
    } else {
    //Last crumb, do not make it a link
    $bc     .= '<li class="end">'.ucfirst( str_replace( array(".php","-","_"), array(""," "," ") ,$last_piece)).'</li>';
    }
    $i++;
}
$bc .=  '</ol>';
//Return the result
return $bc;
}

?>

  <?php echo breadcrumbs();?>
