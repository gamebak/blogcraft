<?php
require_once("class/template.php");
require_once("class/o1db.php");
$t = new template;
$db = new o1db;

$id = ''; // Empty by default

if( isset($_GET['id']) )
  $id = $_GET['id'];

// replace space to -
$filterKey = $t->filterUrl($id);

$t->description = "Description";
$t->title = "Pick Tables";

echo $t->blogHead( $id );
echo $t->nav();



/*
Unblock facebook proxy

$arr = array( time() => 'Websites blocked in Pakistan' );
$db->key('db','recent', serialize($arr) );
$db->key('db','total', serialize($arr) );

$db->remove_key('db','Websites blocked in Pakistan');
$db->remove_key('db','test-123');
 tbl, key, article set
$db->key('db', $filterKey, "<h1>Websites blocked in Pakistan</h1>
    <p>Pakistan Telecommunication Authority (PTA) is part of the Pakistan government and it is responsible for controlling and maintaining all the communication technologies in the country including Internet.
    PTA blocks URLs, domain names, and IP addresses of websites.</p>
    <p>List of websites blocked in Pakistan:</p>
    <table class='table'>
    <tr><th>Site Name</th><th>Url</th><th>Reason</th> </tr>
    <tr><td>Youtube</td><td><a href='http://unblocktube.pk/index.php?q=aHR0cDovL3d3dy55b3V0dWJlLmNvbS8' title='Unblock youtube'>http://youtube.com</a></td><td>Blasphemous material</td></tr>
    <tr><td>Facebook</td><td><a href='http://unblocktube.pk/index.php?q=aHR0cHM6Ly93d3cuZmFjZWJvb2suY29tLw'  title='Unblock facebook'>http://facebook.com</a></td><td>Blasphemous material</td></tr>
    <tr><td>Wikipedia</td><td><a href='http://unblocktube.pk/index.php?q=aHR0cDovL2VuLndpa2lwZWRpYS5vcmcvd2lraS9NYWluX1BhZ2U'  title='Unblock wikipedia'>http://wikipedia.org</a></td><td>Blasphemous material</td></tr>
    </table>
    <h3>Internet access to the websites can be unblocked with unblocktube.</h3>");
*/
?>
<div class="container">
<div class="row">
    <div class="col-lg-8">
    <?php
      if( $db->key_exists('db', $filterKey) ) echo $db->key('db', $filterKey);
      else if( $filterKey == 'preview' )
      {
      ?>
    
    
      <?php }
      else echo "<h1>No article was found</h1>";
    ?>
  </div>
</div>
</div>

<?php 
  echo $t->blogFooter();
?>