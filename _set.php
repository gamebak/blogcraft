<?php 
/* Article setting interface */
require_once("class/template.php");
require_once("class/o1db.php");
$t = new template;
$db = new o1db;

$db->key('db', 'What-is-SSL-encryption', "<h1>What is SSL encryption</h1>
    <h4>I will try to be brief about what is ssl encryption and how it works.</h4>
    <p><strong>SSL or Secure Sockets Layer</strong></p>
    <p>SSL is the standard security technology for establishing an encrypted link between a web server and a browser (client side). This link ensures that all<br/> 
    data passed between the web server and browsers remain private and integral and that nobody will be capable of breaching it. </p>
    <p>SSL is an industry standard and is used by millions of websites in the protection of their online transactions with their customers, because it's a safe way<br/> 
    to transfer infromation from client side to the server side without any other interference from other networks. Even if a hacker will be able to read your traffic<br/> 
    logs, he won't be able to decrypt your information because SSL certificate ensures that.</p>

    <p>To be able to create an SSL encrpyted and secure connection a web server requires an SSL Certificate. </p>
    
    <p><strong>How SSL encryption works</strong> ( in 6 simple steps ):</p>
    <ol>
        <li>A browser will attempt to connect to a website secured with SSL.</li>
        <li>Browser will request that the web server identify itself.</li>
        <li>Server will sent to the browser a copy of its SSL Certificate.</li>
        <li>Browser checks whether it trusts the SSL Certificate based on the information received. If so, it sends a message to the server.</li>
        <li>The server sends back a digitally signed acknowledgement to start an SSL encrypted session.</li>
        <li>SSL Encrypted data is shared between the client side ( browser ) and the server side. That's when https appears in your browser.</li>
    </ol>

    <p><strong>Note for webmasters:</strong></p>
    <p>To enable strong encryption for your website visitors, I would suggest you choose an SSL Certificate that enables at least 128-bit minimum encryption.</p>

    <p><strong>Privacy:</strong></p>
    <p>We take user's privacy very seriously, that's why we wanted to discuss about SSL encryption and how it works.</p>");
?>