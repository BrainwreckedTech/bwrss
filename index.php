<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <title>Brainwrecked RSS</title>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
</head>

<body style="font-family:sans-serif;">

<img style="float:left;margin-right:8px;" src="notebook_64.png" alt="">

<h1>Brainwrecked RSS</h1>

<h2>What Does It Do?</h2>

<p>BWRSS creates
<a href="http://validator.w3.org/feed/check.cgi?url=http%3A%2F%2Frss.bw-tech.net%2Ffeed.php%3Ff%3Djfsmon">
completely-valid RSS feeds</a> from a MySQL-compatible database backend.</p>

<h2>How Does It Do It?</h2>

<p><code>create_feed.php</code> creates a feed.  For now, this only works on the command line.</p>
<p><code>create_article.php</code> creates and article.  For now, this only works on the command line.</p>
<p><code>feed.php</code> renders the RSS feed.
Example: <a href="http://rss.bw-tech.net/feed.php?f=jfsmon">http://rss.bw-tech.net/feed.php?f=jfsmon</a></p>

<h2>What's this command line crap?</h2>

<p>Due to security concerns, I've started with command line scripting
first.  PHP can detect the presence of STDIN, which is available when
the script is executed on the command line but not when executed
through a web server. By forcing the script to run on the command line,
random visitors won't be able to populate your feeds for you.  You can
execute the PHP script using SSH.  If you have SSH Keys set up, you can
even script the running of the script.</p>

<p>Not everyone can create and use an SSL cert.  Rest assured that I
want to get the scripts working as you would expect a PHP web app to work.</p>

<h2>What is the scope of this project?</h2>

<p>BWRSS is meant for a single entity to operate. For now, there's a hard-set limit of 255 feeds total and 86,400 articles per day.</p>

<h2>How Do I Install BWRSS?</h2>

<ol>
  <li>Make sure you have git installed on your server.</li>
  <li>Change into the directory you'd like to install BWRSS.</li>
  <li><code>git clone https://github.com/BrainwreckedTech/bwrss.git . </code> THAT TRAILING DOT IS IMPORTANT!</li>
  <li>Edit the <code>settings.php</code> file.</li>
  <li>You will need access to the mysql cli and credentials that can
      create databases, tables, users, and grant privileges.</li>
   <li><code>php initialize.php | mysql -u [user] -p</code></li>
</ol>

<h2>How Do I Create A Feed?</h2>

<code>php [path]/create_feed.php [shortname] [title] [description]</code>

<h2>How Do I Create An Article?</h2>

<code>php [path]/create_article.php [shortname] [title] [author] [text] [time]</code>
<p>NOTE: <code>[time]</code> must either be formatted
<code>YYYY-MM-DD HH:MM:SS</code> or the string <code>NULL</code></p>

</body>
</html>
