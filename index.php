<?php
require_once("config.php");

$id = ''; // Empty by default

if( isset($_GET['id']) )  $id = $t->filterId( $_GET['id'] );

// replace space to -
$filterKey = $t->filterUrl($id);

if( $id == 'index.php' || $id == '' )
{
    $id = $default['title'];
    $t->description = $default['description'];
}
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
      else if( $filterKey == '' || $filterKey == "/index.php" )
      {
      ?>
      <h1>Best Coffee Tables Reviews</h1>
      <h3>It's not easy to purchase one, that's why I have created this website.</h3>
      <p>This is one of the must-have types of furniture in the living room, the coffee table.</p>
      <p>Invented by the British people in the late Victorian era, they are also known as cocktail tables. Mostly used to hold beverages (hence the name), books, different kind of decorative objects etc. Because of all these attributes they are usually situated near or in front of the sofa. There are different kinds of coffee tables on the market. You can choose them according to the material, size, shape etc. All in favor to suit you well in the room where you plan to put the table. Modern coffee tables not just perform the task they are intended to do, but also can be seen as beautiful addition to the room. The coffee table you choose should match the furniture and wall hangings that exist in terms of features and colors. Because of its position it is the first thing that comes to the eye when you first enter the room. That’s why it should give a good impression. In other words “Make other furniture jealous”. </p>
      
      <p><strong>Wooden tables</strong> have the biggest number of sold entities among the other types of coffee tables.  Hardwoods like oak, walnut, cherry or maple dent less easily than soft woods like pine and cedar. A “solid wood” table means it’s made of solid boards. “All wood” tables are produced from engineered plywood or particleboard.. They are mostly chosen because the wood itself gives the room space some sense of warmth. Modern wooden coffee tables suit well in different types of living rooms, whether you have a colorful room or not, the table will be an excellent companion to the furniture itself.  Modern coffee tables can include drawers in them for keeping the things out of the sight yet close to you.  These types of coffee tables are ideal for smaller homes because they offer more space. This wooden coffee table for example has an open center storage for maintaining the organization of your living area. This table combines function with a contemporary flair.  Whether you're curling up with a cup of tea and the crossword or entertaining friends for game night, you can table's keep supplies close at hand with the drawers and shelves. </p>
      <p>
      Let us do the research, we'll provide an easy to understand comparrison table so that you don't have to waste time with any other websites.
      </p>

      <?php }
      else echo "<h1>No article was found</h1>";
    ?>
  </div>
</div>
</div>

<?php 
  // tracking google code
    $t->footer( $default['footer'] );
  echo $t->blogFooter();
?>