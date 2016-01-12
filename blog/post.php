
	<!-- content-section-starts-here -->
	<div class="main-body">
		<div class="wrap">

			<div class="single-page">

                            <div class="col-md-1"></div>

			<div class="col-md-7 content-left single-post">

				<div class="blog-posts">


                                <div class="cover-image">
                                  <div class="carousel slide" data-ride="carousel" class="cover-image">
                                    <div class="carousel-inner">
                                     <div class="item active">
                                       <img src="<?php echo $post['cover_image'];?>" class="cover-image"/>
                                       <div class="caption-post">
                                         <h1><?php echo $post['title']?> </h1>
                                       </div>
                                     </div>
                                    </div>
                                  </div>
                                </div>

                               <ol class="breadcrumb">
			           <li><a href="<?php echo $mainUrl;?>">HOME</a></li>
                                   <li><a href="<?php echo $mainUrl.'/'.$post['category'];?>"><?php echo strtoupper(str_replace("-"," ",$post['category'])); ?></a></li>
			            <li class="active"><?php echo strtoupper($post['title']); ?></li>
		             	</ol>
				<div class="last-article">

					<p class="artext">
					   <?php echo $post['description'];?>
                                        </p>
                                        

                                             <ul class="categories">
                                               <?php
                                               
                                                 $tags = explode(";",$post['tags']);
                                                 foreach($tags as $tag)
                                                  {
                                                     echo '<li><a href="#" >'.$tag.'</a></li>';
                                                  }

                                               ?>
					     </ul>
					     

					<div class="clearfix"></div>
					<!--related-posts-->
				<div class="row related-posts">
					<h4>Articles You May Like</h4>
					
					<?php
					  global $post;
					 $similarPosts = getLatestPostByCategory($post['category'],5);
					 $count=0;
                                          while( ($similarPost = $similarPosts->fetch_assoc()) & $count<4)
                                           {
                                             if($post['url'] != $similarPost['url'])
                                              {
                                                echo '
                                                     <div class="col-xs-6 col-md-3 related-grids">
                						<a href="'.$mainUrl.$similarPost['url'].'" class="thumbnail">
                							<img src="'.$mainUrl.$similarPost['profile_image'].'" alt=""/>
                						</a>
                						<h5><a href="'.$mainUrl.$similarPost['url'].'">'.$similarPost['title'].'</a></h5>
                					</div>
                                                    ';
                                                $count++;
                                              }
                                           }
					?>



				</div>
				<!--//related-posts-->

			</div>
			<div class="fb-comments" data-href="<?php echo $mainUrl.$post['url'];?>" data-numposts="5" data-width="100%" ></div>

		</div>

	</div>
    </div>
