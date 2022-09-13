<?php  require('inc/header.php'); ?>

<?php 
if(isset($_GET['slug'])){
	$slug = $_GET['slug'];
	$blog_query = "SELECT * FROM blgs WHERE slug='$slug'";
	$blog_result = mysqli_query($conn, $blog_query);

	$blog_row = $blog_result->fetch_assoc();
	
}
?>
<div class="main-wrapper">

    <article class="blog-post px-3 py-5 p-md-5">
        <div class="container single-col-max-width">
            <header class="blog-post-header">
                <h2 class="title mb-2"><?php echo $blog_row['title'] ?></h2>
                <div class="meta mb-3"><span class="date"><?php echo $blog_row['created_at']?></span>
                    <!--                     <span class="time">
                        5 min read</span>
                    <span class="comment">
                        <a class="text-link" href="#">4 comments</a>
                    </span> -->
                </div>
            </header>

            <div class="blog-post-body">
                <figure class="blog-banner">
                    <a href="https://made4dev.com"><img class="img-fluid" src="uploads/<?php echo $blog_row['img'] ?>"
                            alt="image"></a>
                    <!--                     <figcaption class="mt-2 text-center image-caption">Image Credit: <a class="theme-link"
                            href="https://made4dev.com?ref=devblog" target="_blank">made4dev.com (Premium
                            Programming T-shirts)</a></figcaption> -->
                </figure>


                <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>


                <p> <?php echo $blog_row['content']?></p>
            </div>


            <nav class="blog-nav nav nav-justified my-5">
                <a class="nav-link-prev nav-item nav-link rounded-left" href="#">Previous<i
                        class="arrow-prev fas fa-long-arrow-alt-left"></i></a>
                <a class="nav-link-next nav-item nav-link rounded-right" href="#">Next<i
                        class="arrow-next fas fa-long-arrow-alt-right"></i></a>
            </nav>

            <div class="blog-comments-section">
                <div id="disqus_thread"></div>
                <script>
                /**
                 *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT 
                 *  THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR 
                 *  PLATFORM OR CMS.
                 *  
                 *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: 
                 *  https://disqus.com/admin/universalcode/#configuration-variables
                 */
                /*
                var disqus_config = function () {
                    // Replace PAGE_URL with your page's canonical URL variable
                    this.page.url = PAGE_URL;  
                    
                    // Replace PAGE_IDENTIFIER with your page's unique identifier variable
                    this.page.identifier = PAGE_IDENTIFIER; 
                };
                */

                (function() { // REQUIRED CONFIGURATION VARIABLE: EDIT THE SHORTNAME BELOW
                    var d = document,
                        s = d.createElement('script');

                    // IMPORTANT TODO: Replace 3wmthemes with your forum shortname!
                    s.src = 'https://3wmthemes.disqus.com/embed.js';

                    s.setAttribute('data-timestamp', +new Date());
                    (d.head || d.body).appendChild(s);
                })();
                </script>
                <noscript>
                    Please enable JavaScript to view the
                    <a href="https://disqus.com/?ref_noscript" rel="nofollow">
                        comments powered by Disqus.
                    </a>
                </noscript>
            </div>
            <!--//blog-comments-section-->

        </div>
        <!--//container-->
    </article>

    <?php  require('inc/footer.php'); ?>

    <!--     <footer class="footer text-center py-2 theme-bg-dark">

        <!--/* This template is free as long as you keep the footer attribution link. If you'd like to use the template without the attribution link, you can buy the commercial license via our website: themes.3rdwavemedia.com Thank you for your support. :) */-->
    <small class="copyright">Designed with <span class="sr-only">love</span><i class="fas fa-heart"
            style="color: #fb866a;"></i> by <a href="https://themes.3rdwavemedia.com" target="_blank">Xiaoying
            Riley</a> for developers</small>

    </footer>

</div>
<!--//main-wrapper-->




<!-- Javascript -->
<script src="assets/plugins/popper.min.js"></script>
<script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>

<!-- Page Specific JS -->
<script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/11.5.1/highlight.min.js"></script>

<!-- Custom JS -->
<script src="assets/js/blog.js"></script>


</body>

</html> -->