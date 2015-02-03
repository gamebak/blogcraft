<?php
require_once("config.php");

$id = ''; // Empty by default

if( isset($_GET['id']) )  $id = $t->filterId( $_GET['id'] );

// replace space to -
$filterKey = $t->filterUrl($id);

if( $id == 'index.php' || $id == '' || !$db->key_exists('db', $filterKey) )
{
    $t->title = $default['title'];
    $t->description = $default['description'];
}
echo $t->blogHead();
echo $t->nav();



/*
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
<div class="col-lg-12 text-center">
  <?php 
  if( $filterKey == '' || $filterKey == "/index.php" )
  {
      echo "<h1>Best Coffee Tables Reviews</h1>";
  }
  elseif( $db->key_exists('db', $filterKey) )
  {
      echo "<h1>".$dbExtension->decodeArticleKey($filterKey)."</h1>";
  }
  else
  {
    echo "<h1>Page not available</h1>";
  }
  ?>
  <hr class="star-primary">
</div>
</div>
<div class="row">
    <div class="col-lg-10">
    <?php
      if( $db->key_exists('db', $filterKey) ) echo $db->key('db', $filterKey);
      else if( $filterKey == '' || $filterKey == "/index.php" )
      {
      ?>
      

      <h3>The coffee table is one of the must-have types of furniture in the living room.</h3>
      <p>It's not easy to buy a modern coffee table, that's why I have researched the market and created this website.</p>

      <p>There are different kinds of coffee tables on the market. You can choose them according to the material, size, shape etc. All in favor to suit you well in the room where you plan to put the table. Modern coffee tables not just perform the task they are intended to do, but also can be seen as beautiful addition to the room. The coffee table you choose should match the furniture and wall hangings that exist in terms of features and colors. Because of its position it is the first thing that comes to the eye when you first enter the room. That’s why it should give a good impression. In other words "Make other furniture jealous". </p>
        
      <div class="thumbnail clearfix">
        <img src="img/woodenCoffeeTable1.jpg" alt="Wooden coffee table" class="imgspacer pull-left" />
        <div class="caption">
          <p><strong>Wooden coffee tables</strong> have the biggest number of sold entities among the other types of coffee tables.  Hardwoods like oak, walnut, cherry or maple dent less easily than soft woods like pine and cedar. A "solid wood" table means it’s made of solid boards. "All wood" tables are produced from engineered plywood or particleboard.. They are mostly chosen because the wood itself gives the room space some sense of warmth. Modern wooden coffee tables suit well in different types of living rooms, whether you have a colorful room or not, the table will be an excellent companion to the furniture itself.  Modern coffee tables can include drawers in them for keeping the things out of the sight yet close to you.  These types of coffee tables are ideal for smaller homes because they offer more space. This wooden coffee table for example has an open center storage for maintaining the organization of your living area. This table combines function with a contemporary flair.  Whether you're curling up with a cup of tea and the crossword or entertaining friends for game night, you can table's keep supplies close at hand with the drawers and shelves. </p>
          <p>This modern wooden coffee table is another example of well designed and unique piece of furniture. It combines a solid oak base with a high pressure laminate top that offers protection and stunning look.</p>
          <p>Many of the modern wooden tables also require assembly. This can be a great advantage because it offers mobility and you can always make some extra room when you need it.</p>

        </div>
      </div>
      
      <div class="thumbnail clearfix">
      <img src="img/OttomanCoffeeTable.jpg" alt="Ottoman coffee table" class="imgspacer pull-left"/>
      <div class="caption">
        <h3><strong>Ottoman coffee table</strong> is ideal for smaller homes because it offers a variety of functionalities.</h3>
        <p>Ottoman coffee table is another type of wooden coffee table, usually made out of soft planks of wood. The ottoman coffee table is generally used as a stool or bench seat, but other objects can be used as a coffee table. It is usually made out of smooth wood, all into one table that can be used by you into your living room. This is a very good choice for the home that is not that typical or for homes with small children and it can be used with modern designed interiors.</p>
        <p>Using this kind of coffee table serves many purposes. In an emergency, it can also be used as a stool or chair. At some point, everyone needs an extra seat. This modern coffee table is a great alternative to a folding chair. A folding chair is generally not as attractive as the ottoman and may not be as soft as well. Another way is to use as a bench ottoman. If the furniture in the room was not built in footrest, the stool can be used as a bench.</p>
        <p>These coffee tables offer extra storage too. Large or small, every home could use the extra storage room. Items such as games, pillows or blankets can be stored on the coffee table. This is a great place for things that can be used when entertaining guests. Thus, the host does not need to go to another room to get a regular game or open the cabinet to release the game, just open the table and they were there. </p>
      </div>
      </div>

      <div class="thumbnail clearfix">
      <img src="img/glasscoffeetable.jpg" alt="Glass coffee table" class="imgspacer pull-left" />
      <div class="caption">
        <p>A modern  glass coffee table is usually built with modern materials and elegant, aluminum or non-wood materials. Initial goal is to use materials that are not made of wood. This table will be easy to clean. If you are not impressed by modern uses of aluminum, you can also use wood and then cover it with the other materials. If you go for a classic look, choose glass coffee table with brass finishing and carefully detailed with sloping foot glass tray. For a more casual look, choose a glass table with marble finish which usually falls in the range of three hundred to five hundred dollars price. There is also a glass table sets available to a larger home. These sets usually consist of three large rooms – coffee table and two end tables that can accommodate exhibitions and perform other functions. Most games are framed by high quality wood. After staining with a cappuccino or mahogany, these pieces can instantly add panache to even the empty space. And for the main contemporary look, there is a glass coffee table with glass tops swivel and unique chrome legs, among other projects.</p>
      </div>
      </div>


      <p>Size and the shape have to be taken into account when purchasing a coffee table. Do you know which shape suits you the most? There is no problem in choosing one because there are bunch of coffee table shapes that you can decide on. Round tables offer neat, but often small space on the table itself. They look good with some decorative objects or flowers. These types of coffee tables usually go with two or four chairs but it doesn’t need to be true. Rectangular coffee tables on the other hand offer more space on the table itself because of their shape.</p>

      <p>Let us do the research, we'll provide an easy to understand comparrison table so that you don't have to waste time with any other websites.</p>
      <p><h3>Soon i'll introduce a comparrison table with multiple coffee tables based on user ratings and reviews.</h3></p>
      <?php
      }else if ( $filterKey == 'preview')
      {?>
        <p><h3>Discover more about someone by entering their door</h3></p>
        <div class="thumbnail clearfix">
        <img src="img/glass_coffee_tables.jpg" alt="A modern glass coffee table in the drawing room." class="imgspacer pull-left" />
        <div class="caption">
        <p>It would be quite embarrassing to say that there are any house where you would not find the coffee table. Actually with the modernity of life, everyone has got the sense of style and everyone wants that his home would be perfect so he tries his best to décor it in the world’s luxurious styling things such as a perfect coffee table…</p>
        <p>The best method to analyze the personality of a person is by judging his taste, and the best way to judge someone’s taste is through his home because that is the only place which reflects the owner’s personality. That is the reason everyone is curious about the furnishing and interior of his home. Usually it is seen that the people mostly decorate their living room, drawing room and the guest room.</p>
        <p>So it just the furnishings and furniture that change the whole ambiance of your room. For this purpose, people buy a lot of things to create the stylish ambiance glass coffee table is one of such elegant things which you can use to style your home.</p>

        </div>
        </div>

        
        <p><strong>Glass Coffee Tables</strong></p>
        <p>After purchasing the glass tables, another question knock at the mind that what is the perfect place that you can style with your glass table. That is a very important question which I usually discussed with the interior designers because a usual housewife doesn’t have enough knowledge about the styling and décor of the home. Now let me share some brilliant ideas with you that how you can enhance the whole ambiance of your home and can impress your guests who are coming to see you next week.</p>
        <p><strong>Perfect place of glass coffee tables:</strong></p>
        <p>The perfect place of the coffee tables is the drawing room where you serve your guests. Moreover you can use them in your living room for the regular use where you can have your meal there with your children.</p>
        <p><strong>Why people reluctant to use it with kids?</strong></p>
        <p>Some people are reluctant to use the top glass coffee tables with their children. To all of such people, I have a piece of advice who doesn’t find it inconvenient to use such tables with your kids because the material of the glass used in the manufacturing of such tables is very strong. Similarly some parents don’t use it with the kids because of the cleaning issues. Now just kick out all of such thoughts because such glass tables are very easy to clean you can easily clean it with the wet cloth within seconds. So all such parents who are suffering from such problems and don’t share the most valued glass coffee tables with their children, now after reading this blog, you would  become able to enjoy each and every happiest moment in your living room with your children around the glass coffee table.</p>
        

        
        
        <?php
      }
      else echo "<h1>No article was found</h1>";
    ?>
  </div>
  <div class="col-lg-2">
  <?php /**
        * Grab recent list
        */
        $recent = $dbExtension->getRecentParsedList();
        /**
        * Recent list render in html
        */
        echo $t->recentListRender($recent);
  ?>
  </div>
</div>
<div class="row">
  <p class="text-center share"></p>
</div>
</div>

<?php 
  // tracking google code
    $t->footer = $default['footer'];
    echo $t->blogFooter();
