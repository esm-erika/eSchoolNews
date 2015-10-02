<<<<<<< HEAD

<style type="text/css">

.wp_syntax {
  color: #100;
  background-color: #f9f9f9;
  border: 1px solid silver;
  margin: 0 0 1.5em 0;
  overflow: auto;
}

/* IE FIX */
.wp_syntax {
  overflow-x: auto;
  overflow-y: hidden;
  padding-bottom: expression(this.scrollWidth > this.offsetWidth ? 15 : 0);
  width: 100%;
}

.wp_syntax table {
  border-collapse: collapse;
}

.wp_syntax div, .wp_syntax td {
  vertical-align: top;
  padding: 2px 4px;
}

.wp_syntax .line_numbers {
  text-align: right;
  background-color: #def;
  color: gray;
  overflow: visible;
}

/* potential overrides for other styles */
.wp_syntax pre {
  margin: 0;
  width: auto;
  float: none;
  clear: none;
  overflow: visible;
  font-size: 12px;
  line-height: 1.333;
  white-space: pre;
}


.style1 {color: rgb(0, 0, 127)}
</style>


  <h2>AdRotate</h2>
  <table style="border-bottom: 1px solid rgb(204, 204, 204); margin: 0pt 0pt 10px; background: rgb(255, 235, 205) none repeat scroll 0% 0%; width: 100%; -moz-background-clip: border; -moz-background-origin: padding; -moz-background-inline-policy: continuous;">
    <tbody>
      <tr>
        <th style="width: 40%;">Name</th>
        <td>eSN AdRotate</td>
      </tr>
      <tr>
        <th>Based on </th>
        <td>AdRotate 2.4.4 &ndash; Stable</td>
      </tr>
      <tr>
        <th valign="top">Requires</th>
        <td>WordPress 2.7, PHP5</td>
      </tr>
      <tr>
        <th valign="top">Compatible with</th>
        <td>WordPress 2.7 and newer</td>
      </tr>
      <tr>
        <th>License</th>
        <td>GPL</td>
      </tr>
      
    </tbody>
  </table>
  <p><strong>Summary</strong><br />
    A really simple way of putting ads on your website. Add and manage the
    code from the dashboard and show a random banner, or multiple, on your
    site. The plugin supports groups for banners allowing the different
    sizes to show up where they fit and not a vertical banner in the
    content or header and so on. Easy management from the dashboard allows
    you to quickly oversee, add and edit banner code.</p>
  <p><strong>Features</strong></p>
  <ul>
    <li>Show random banners</li>
    <li>Track how many clicks, shown, CTR</li>
    <li>Timed banners, start and stop dates</li>
    <li>Activate or de-activate banners at will</li>
    <li>Edit/update banners</li>
    <li>Widget included for sidebar</li>
    <li>Insert banners into pages or posts with shortcodes</li>
    <li>Preview banners on edit</li>
    <li>Per banner/function to set a specific banner or keep it random</li>
    <li>Multiple groups per banner location</li>
    <li>Works with Google Ads</li>
    <li>Easy in use</li>
    <li>Integrates with WordPress dashboard, yet allows you to completely style to your own need</li>
    <li>And more&hellip;. much more.</li>
  </ul>
  
  <p><strong>Information:</strong><br />
    In your dashboard navigation you&rsquo;ll find a new menu.<br />
    <img src="/wp-content/plugins/adrotate/images/dashboard-menu.jpg" alt="dashboard-menu" title="dashboard-menu" class="alignnone size-full wp-image-689" height="261" width="165" /></p>
  <p><strong>Create your first banner</strong><br />
    Since banners are required to be in groups you need to make a group first. You can do so in the &lsquo;Manage Banners&rsquo; page.<br />
    <img src="/wp-content/plugins/adrotate/images/add-group.jpg" alt="add-group" title="add-group" class="alignnone size-full wp-image-672" height="300" width="440" /></p>
  <p>Once you&rsquo;ve done that. Go to &lsquo;Add|Edit Banner&rsquo; and fill in the appropriate fields.<br />
      <img src="/wp-content/plugins/adrotate/images/using-adsense-450x290.jpg" alt="using-adsense" title="using-adsense" class="alignnone size-medium wp-image-690" height="290" width="450" /><br />
      <em>(adsense example, click to enlarge)</em></p>
  <p>If you leave the start and end time empty, AdRotate will generate
    today (now) as a start date and show the banner for exactly one year.
    This can be changed at any time.</p>
  <p>If you&rsquo;ve created your own banner and want to see how many clicks
    you have. Use %link% where you would put the URL and fill in the URL in
    the URL field in the advanced options. Also make sure to tick the
    checkbox.</p>
  <p>To show an image. Upload the image to the wp-content/banners/ folder
    and select the image in the dropdown. In the banner use %image% where
    the image should show.</p>
  <p>Once you&rsquo;re done, simply click save.</p>
  <p><strong>Add banners to pages or posts</strong><br />
    Insert the following PHP code in index.php, page.php or single.php of
    your theme. Anywhere where you want the banner to show, as many as you
    like.</p>
  <p><em>Per banner code you show a group and a spot, add this to show group 1:</em></p>
  <div class="wp_syntax">
    <div class="code">
      <pre class="php" style="font-family: monospace;"><span style="color: rgb(0, 0, 0); font-weight: bold;">&lt;?php</span> <span style="color: rgb(177, 177, 0);">echo</span> adrotate_banner<span style="color: rgb(0, 153, 0);">(</span><span style="color: rgb(0, 0, 255);">'1','1'</span><span style="color: rgb(0, 153, 0);">)</span><span style="color: rgb(51, 153, 51);">;</span> <span style="color: rgb(0, 0, 0); font-weight: bold;">?&gt;</span></pre>
    </div>
  </div>
  <p><em>And for showing a specific banner use this (where 12 is the banner ID):</em></p>
  <div class="wp_syntax">
    <div class="code">
      <pre class="php" style="font-family: monospace;"><span style="color: rgb(0, 0, 0); font-weight: bold;">&lt;?php</span> <span style="color: rgb(177, 177, 0);">echo</span> adrotate_banner<span style="color: rgb(0, 153, 0);">(</span><span style="color: rgb(0, 0, 255);">'1','3'</span><span style="color: rgb(51, 153, 51);">,</span> <span style="color: rgb(0, 0, 255);">'12'</span><span style="color: rgb(0, 153, 0);">)</span><span style="color: rgb(51, 153, 51);">;</span> <span style="color: rgb(0, 0, 0); font-weight: bold;">?&gt;</span></pre>
    </div>
  </div>
  <p><em>Single Group and Multiple spots and a random banner from either spot:</em></p>
  <div class="wp_syntax">
    <div class="code">
      <pre class="php" style="font-family: monospace;"><span style="color: rgb(0, 0, 0); font-weight: bold;">&lt;?php</span> <span style="color: rgb(177, 177, 0);">echo</span> adrotate_banner<span style="color: rgb(0, 153, 0);">(</span><span style="color: rgb(0, 0, 255);">'1','3,2,6'</span><span style="color: rgb(0, 153, 0);">)</span><span style="color: rgb(51, 153, 51);">;</span> <span style="color: rgb(0, 0, 0); font-weight: bold;">?&gt;</span></pre>
    </div>
  </div>
  <p>Using shortcode you can insert banners into posts and pages from the dashboard as well.</p>
  <p><em>A random banner:</em></p>
  <div class="wp_syntax">
    <div class="code">
      <pre class="apache" style="font-family: monospace;">[adrotate <span style="color: rgb(0, 0, 127);">group</span>=<span style="color: rgb(127, 0, 127);">&quot;2&quot; <span class="apache" style="font-family: monospace;"><span class="style1">spot</span>=&quot;2&quot;</span></span>]</pre>
    </div>
  </div>
  <p><em>A specific banner (where 12 is the banner ID and 4 the group ID):</em></p>
  <div class="wp_syntax">
    <div class="code">
      <pre class="apache" style="font-family: monospace;">[adrotate <span style="color: rgb(0, 0, 127);">group</span>=<span style="color: rgb(127, 0, 127);">&quot;4&quot;</span> spot=<span style="color: rgb(127, 0, 127);">&quot;2&quot;</span> banner=<span style="color: rgb(127, 0, 127);">&quot;12&quot;</span>]</pre>
    </div>
  </div>
  <p><em>Multiple groups and a random banner from either group:</em></p>
  <div class="wp_syntax">
    <div class="code">
      <pre class="apache" style="font-family: monospace;">[adrotate <span style="color: rgb(0, 0, 127);">group</span>=<span style="color: rgb(127, 0, 127);">&quot;12&quot; and <span class="apache" style="font-family: monospace;"><span class="style1">spot</span>=</span>&quot;4,12,5,2&quot;</span>]</pre>
    </div>
  </div>
  <p><strong>Blocks of ads!</strong><br />
    AdRotate now allows you to create blocks of ads. This can be any amount of ads and rotate any amount of ads in one block.</p>
  <p>It&rsquo;s easiest to create a group and put a bunch of ads on there. Say you want a block of 4 ads from group 2. Use the following:</p>
  <div class="wp_syntax">
    <div class="code">
      <pre class="apache" style="font-family: monospace;">[adrotate <span style="color: rgb(0, 0, 127);">group</span>=<span style="color: rgb(127, 0, 127);">&quot;2&quot; <span class="apache" style="font-family: monospace;"><span style="color: rgb(0, 0, 127);">spot</span>=&quot;2&quot;</span></span> block=<span style="color: rgb(127, 0, 127);">&quot;4&quot;</span> column=<span style="color: rgb(127, 0, 127);">&quot;2&quot;</span>]</pre>
    </div>
  </div>
  <p>Group 2 can have more than 4 banners, but just 4 at a time will
    show. In random order randomly picked. The column option tells AdRotate
    to divide the banners in that many columns. This is optional.</p>
  <p>To insert this feature in your php use something like:</p>
  <div class="wp_syntax">
    <div class="code">
      <pre class="php" style="font-family: monospace;"><span style="color: rgb(0, 0, 0); font-weight: bold;">&lt;?php</span> <span style="color: rgb(177, 177, 0);">echo</span> adrotate_banner<span style="color: rgb(0, 153, 0);">(</span><span style="color: rgb(204, 102, 204);">1</span><span style="color: rgb(51, 153, 51);">,</span><span style="color: rgb(204, 102, 204);">0</span><span style="color: rgb(51, 153, 51);">,</span><span style="color: rgb(204, 102, 204);">4</span><span style="color: rgb(51, 153, 51);">,</span><span style="color: rgb(204, 102, 204);">3</span><span style="color: rgb(0, 153, 0);">)</span><span style="color: rgb(51, 153, 51);">;</span> <span style="color: rgb(0, 0, 0); font-weight: bold;">?&gt;</span></pre>
    </div>
  </div>
  <p><em>Group 1, no specific banner (which is not possible with a block), show 4 ads at a time in 3 columns.</em></p>
  <p><strong>Banners in the sidebar?</strong><br />
    Well yes, you can use the above PHP codes or use the widget.<br />
    The widget can be found in the Appearance &gt; Widgets menu.</p>
  <p>&nbsp;</p>

=======

<style type="text/css">

.wp_syntax {
  color: #100;
  background-color: #f9f9f9;
  border: 1px solid silver;
  margin: 0 0 1.5em 0;
  overflow: auto;
}

/* IE FIX */
.wp_syntax {
  overflow-x: auto;
  overflow-y: hidden;
  padding-bottom: expression(this.scrollWidth > this.offsetWidth ? 15 : 0);
  width: 100%;
}

.wp_syntax table {
  border-collapse: collapse;
}

.wp_syntax div, .wp_syntax td {
  vertical-align: top;
  padding: 2px 4px;
}

.wp_syntax .line_numbers {
  text-align: right;
  background-color: #def;
  color: gray;
  overflow: visible;
}

/* potential overrides for other styles */
.wp_syntax pre {
  margin: 0;
  width: auto;
  float: none;
  clear: none;
  overflow: visible;
  font-size: 12px;
  line-height: 1.333;
  white-space: pre;
}


.style1 {color: rgb(0, 0, 127)}
</style>


  <h2>AdRotate</h2>
  <table style="border-bottom: 1px solid rgb(204, 204, 204); margin: 0pt 0pt 10px; background: rgb(255, 235, 205) none repeat scroll 0% 0%; width: 100%; -moz-background-clip: border; -moz-background-origin: padding; -moz-background-inline-policy: continuous;">
    <tbody>
      <tr>
        <th style="width: 40%;">Name</th>
        <td>eSN AdRotate</td>
      </tr>
      <tr>
        <th>Based on </th>
        <td>AdRotate 2.4.4 &ndash; Stable</td>
      </tr>
      <tr>
        <th valign="top">Requires</th>
        <td>WordPress 2.7, PHP5</td>
      </tr>
      <tr>
        <th valign="top">Compatible with</th>
        <td>WordPress 2.7 and newer</td>
      </tr>
      <tr>
        <th>License</th>
        <td>GPL</td>
      </tr>
      
    </tbody>
  </table>
  <p><strong>Summary</strong><br />
    A really simple way of putting ads on your website. Add and manage the
    code from the dashboard and show a random banner, or multiple, on your
    site. The plugin supports groups for banners allowing the different
    sizes to show up where they fit and not a vertical banner in the
    content or header and so on. Easy management from the dashboard allows
    you to quickly oversee, add and edit banner code.</p>
  <p><strong>Features</strong></p>
  <ul>
    <li>Show random banners</li>
    <li>Track how many clicks, shown, CTR</li>
    <li>Timed banners, start and stop dates</li>
    <li>Activate or de-activate banners at will</li>
    <li>Edit/update banners</li>
    <li>Widget included for sidebar</li>
    <li>Insert banners into pages or posts with shortcodes</li>
    <li>Preview banners on edit</li>
    <li>Per banner/function to set a specific banner or keep it random</li>
    <li>Multiple groups per banner location</li>
    <li>Works with Google Ads</li>
    <li>Easy in use</li>
    <li>Integrates with WordPress dashboard, yet allows you to completely style to your own need</li>
    <li>And more&hellip;. much more.</li>
  </ul>
  
  <p><strong>Information:</strong><br />
    In your dashboard navigation you&rsquo;ll find a new menu.<br />
    <img src="/wp-content/plugins/adrotate/images/dashboard-menu.jpg" alt="dashboard-menu" title="dashboard-menu" class="alignnone size-full wp-image-689" height="261" width="165" /></p>
  <p><strong>Create your first banner</strong><br />
    Since banners are required to be in groups you need to make a group first. You can do so in the &lsquo;Manage Banners&rsquo; page.<br />
    <img src="/wp-content/plugins/adrotate/images/add-group.jpg" alt="add-group" title="add-group" class="alignnone size-full wp-image-672" height="300" width="440" /></p>
  <p>Once you&rsquo;ve done that. Go to &lsquo;Add|Edit Banner&rsquo; and fill in the appropriate fields.<br />
      <img src="/wp-content/plugins/adrotate/images/using-adsense-450x290.jpg" alt="using-adsense" title="using-adsense" class="alignnone size-medium wp-image-690" height="290" width="450" /><br />
      <em>(adsense example, click to enlarge)</em></p>
  <p>If you leave the start and end time empty, AdRotate will generate
    today (now) as a start date and show the banner for exactly one year.
    This can be changed at any time.</p>
  <p>If you&rsquo;ve created your own banner and want to see how many clicks
    you have. Use %link% where you would put the URL and fill in the URL in
    the URL field in the advanced options. Also make sure to tick the
    checkbox.</p>
  <p>To show an image. Upload the image to the wp-content/banners/ folder
    and select the image in the dropdown. In the banner use %image% where
    the image should show.</p>
  <p>Once you&rsquo;re done, simply click save.</p>
  <p><strong>Add banners to pages or posts</strong><br />
    Insert the following PHP code in index.php, page.php or single.php of
    your theme. Anywhere where you want the banner to show, as many as you
    like.</p>
  <p><em>Per banner code you show a group and a spot, add this to show group 1:</em></p>
  <div class="wp_syntax">
    <div class="code">
      <pre class="php" style="font-family: monospace;"><span style="color: rgb(0, 0, 0); font-weight: bold;">&lt;?php</span> <span style="color: rgb(177, 177, 0);">echo</span> adrotate_banner<span style="color: rgb(0, 153, 0);">(</span><span style="color: rgb(0, 0, 255);">'1','1'</span><span style="color: rgb(0, 153, 0);">)</span><span style="color: rgb(51, 153, 51);">;</span> <span style="color: rgb(0, 0, 0); font-weight: bold;">?&gt;</span></pre>
    </div>
  </div>
  <p><em>And for showing a specific banner use this (where 12 is the banner ID):</em></p>
  <div class="wp_syntax">
    <div class="code">
      <pre class="php" style="font-family: monospace;"><span style="color: rgb(0, 0, 0); font-weight: bold;">&lt;?php</span> <span style="color: rgb(177, 177, 0);">echo</span> adrotate_banner<span style="color: rgb(0, 153, 0);">(</span><span style="color: rgb(0, 0, 255);">'1','3'</span><span style="color: rgb(51, 153, 51);">,</span> <span style="color: rgb(0, 0, 255);">'12'</span><span style="color: rgb(0, 153, 0);">)</span><span style="color: rgb(51, 153, 51);">;</span> <span style="color: rgb(0, 0, 0); font-weight: bold;">?&gt;</span></pre>
    </div>
  </div>
  <p><em>Single Group and Multiple spots and a random banner from either spot:</em></p>
  <div class="wp_syntax">
    <div class="code">
      <pre class="php" style="font-family: monospace;"><span style="color: rgb(0, 0, 0); font-weight: bold;">&lt;?php</span> <span style="color: rgb(177, 177, 0);">echo</span> adrotate_banner<span style="color: rgb(0, 153, 0);">(</span><span style="color: rgb(0, 0, 255);">'1','3,2,6'</span><span style="color: rgb(0, 153, 0);">)</span><span style="color: rgb(51, 153, 51);">;</span> <span style="color: rgb(0, 0, 0); font-weight: bold;">?&gt;</span></pre>
    </div>
  </div>
  <p>Using shortcode you can insert banners into posts and pages from the dashboard as well.</p>
  <p><em>A random banner:</em></p>
  <div class="wp_syntax">
    <div class="code">
      <pre class="apache" style="font-family: monospace;">[adrotate <span style="color: rgb(0, 0, 127);">group</span>=<span style="color: rgb(127, 0, 127);">&quot;2&quot; <span class="apache" style="font-family: monospace;"><span class="style1">spot</span>=&quot;2&quot;</span></span>]</pre>
    </div>
  </div>
  <p><em>A specific banner (where 12 is the banner ID and 4 the group ID):</em></p>
  <div class="wp_syntax">
    <div class="code">
      <pre class="apache" style="font-family: monospace;">[adrotate <span style="color: rgb(0, 0, 127);">group</span>=<span style="color: rgb(127, 0, 127);">&quot;4&quot;</span> spot=<span style="color: rgb(127, 0, 127);">&quot;2&quot;</span> banner=<span style="color: rgb(127, 0, 127);">&quot;12&quot;</span>]</pre>
    </div>
  </div>
  <p><em>Multiple groups and a random banner from either group:</em></p>
  <div class="wp_syntax">
    <div class="code">
      <pre class="apache" style="font-family: monospace;">[adrotate <span style="color: rgb(0, 0, 127);">group</span>=<span style="color: rgb(127, 0, 127);">&quot;12&quot; and <span class="apache" style="font-family: monospace;"><span class="style1">spot</span>=</span>&quot;4,12,5,2&quot;</span>]</pre>
    </div>
  </div>
  <p><strong>Blocks of ads!</strong><br />
    AdRotate now allows you to create blocks of ads. This can be any amount of ads and rotate any amount of ads in one block.</p>
  <p>It&rsquo;s easiest to create a group and put a bunch of ads on there. Say you want a block of 4 ads from group 2. Use the following:</p>
  <div class="wp_syntax">
    <div class="code">
      <pre class="apache" style="font-family: monospace;">[adrotate <span style="color: rgb(0, 0, 127);">group</span>=<span style="color: rgb(127, 0, 127);">&quot;2&quot; <span class="apache" style="font-family: monospace;"><span style="color: rgb(0, 0, 127);">spot</span>=&quot;2&quot;</span></span> block=<span style="color: rgb(127, 0, 127);">&quot;4&quot;</span> column=<span style="color: rgb(127, 0, 127);">&quot;2&quot;</span>]</pre>
    </div>
  </div>
  <p>Group 2 can have more than 4 banners, but just 4 at a time will
    show. In random order randomly picked. The column option tells AdRotate
    to divide the banners in that many columns. This is optional.</p>
  <p>To insert this feature in your php use something like:</p>
  <div class="wp_syntax">
    <div class="code">
      <pre class="php" style="font-family: monospace;"><span style="color: rgb(0, 0, 0); font-weight: bold;">&lt;?php</span> <span style="color: rgb(177, 177, 0);">echo</span> adrotate_banner<span style="color: rgb(0, 153, 0);">(</span><span style="color: rgb(204, 102, 204);">1</span><span style="color: rgb(51, 153, 51);">,</span><span style="color: rgb(204, 102, 204);">0</span><span style="color: rgb(51, 153, 51);">,</span><span style="color: rgb(204, 102, 204);">4</span><span style="color: rgb(51, 153, 51);">,</span><span style="color: rgb(204, 102, 204);">3</span><span style="color: rgb(0, 153, 0);">)</span><span style="color: rgb(51, 153, 51);">;</span> <span style="color: rgb(0, 0, 0); font-weight: bold;">?&gt;</span></pre>
    </div>
  </div>
  <p><em>Group 1, no specific banner (which is not possible with a block), show 4 ads at a time in 3 columns.</em></p>
  <p><strong>Banners in the sidebar?</strong><br />
    Well yes, you can use the above PHP codes or use the widget.<br />
    The widget can be found in the Appearance &gt; Widgets menu.</p>
  <p>&nbsp;</p>

>>>>>>> origin/master
