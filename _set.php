<?php 
/* Article setting interface */
require_once("class/template.php");
require_once("class/o1db.php");
require_once("class/dbExtension.php");


$t = new template;
$dbExtension = new dbExtension;

// Extension database connector
$dbExtension->db = 'db';
$dbExtension->->create_table('db');

$output = $dbExtension->addArticle('Coffee table history', '<h3>Nowadays the coffee table is present in almost every living room all around the globe.</h3>
        <p><strong>Coffee table history</strong></p>
        <p>The first coffee tables were actually ottoman tables that were brought to Europe from the Ottoman Empire in the late 18th century.
        According to other sources, the word "ottomane" referring to furniture appeared as early as 1729 in French.</p>
        <p>In the Ottoman Empire the ottoman was used as the central piece of family seating and it was piled with plenty of cushions. Another important aspect is that they used small tables in tea gardens.</p>
        <div class="thumbnail clearfix">
        <img src="img/teadrinking.jpg" alt="Popular quote from Turkish folk, conversations without tea are like a night sky without the moon." class="imgspacer pull-left" />
        <div class="caption">
          <blockquote><p>"Caysiz sohbet, aysiz gok yuzu gibidir"</p> <p>Conversations without tea are like a night sky without the moon</p> <p><small>Folk saying in the Ottoman Empire</small></p></blockquote>
        </div>
        </div>
        <p>The low coffee tables may also have origins from countries such as India or Japan, because they had the tradition of eating and drinking at low level and therefore used low tables.</p>
        <p><strong>Coffee drinking history</strong></p>
        <p>To learn about the origins of the coffee table you need to first know about how coffee drinking was spread in Britain.
        The popularity of coffee drinking is said to have spread to the rest of Europe from the Ottoman Empire after the Battle of Vienna in 1683, but other sources are indicating that the first coffee houses in Britain appeared a little more early, back in 1650.</p>
        <p><strong>First coffe houses in Europe</strong></p>
        <p>The first coffee house that was opened in Britain was in Oxford by a Jew called Jacob in 1650, and two years later, in 1652, the first coffee house was opened in London by Pasqua Rosee, a Turkish former servant of a merchant.</p>
        <p>First establishments also became popular pretty fast, because the trend of coffee houses was imitated widely and they were found everywhere in London. </p>
        <p>Mostly used to hold beverages (hence the name), books, different kind of decorative objects etc. Because of all these attributes they are usually situated near or in front of the sofa.</p>
        <p>The British people in the late Victorian era converted the concept of ottoman tables into coffee tables which are also known as cocktail tables.</p>
        <p>Sadly there aren\'t any known examples of coffee tables made before the mid to late 19th century.</p>
        <p>Even if the British had coffee houses, the first wooden table specifically designed as a coffee table appeared after many more years in 1868 by E.W. Godwin and made in large numbers by William Watt and Collinson and Lock which is listed as a coffee table in "Victorian Furniture" by R. W. Symonds &amp; B. B. Whineray and also in "The Country Life book of English Furniture" by Edward T. Joy</p>
        <p>Let us do the research, we\'ll provide an easy to understand comparrison table so that you don\'t have to waste time with any other websites.</p>');

var_dump($output);