

	<!-- content-section-starts-here -->
	<div class="main-body">
		<div class="wrap">
			<div class="col-md-8 content-left">
				<div class="slider">
					<div class="callbacks_wrap">
						<ul class="rslides" id="slider">
						
						        <?php
						          $alreadyOnPagePosts = array();
                                                          $postsForCarousel = getCarouselMiniPost();
                                                          while($postForCarousel = $postsForCarousel->fetch_assoc())
                                                           {
                                                             array_push($alreadyOnPagePosts,$postForCarousel['url']);
                                                             echo '  <li>
                                                                        <img src="'.$mainUrl.$postForCarousel['cover_image'].'" alt="'.$postForCarousel['url'].'">
        								<div class="caption">
        									<a href="'.$mainUrl.$postForCarousel['url'].'">'.$postForCarousel['title'].'</a>
        								</div>
        						            </li>
                                                                  ';
                                                           }
                                                        ?>
						</ul>
					</div>
				</div>

				<div class="life-style col-md-12">
					<header>
						<h3 class="title-head">What's hot!</h3>
					</header>

					<?php
					  global $alreadyOnPagePosts;
					  $hotPosts = getLatestPopularMiniPost(7);
					  $count = 0;
					  while( ($hotpost = $hotPosts->fetch_assoc())  && $count < 4)
					    {
                                              if(!in_array($hotpost['url'],$alreadyOnPagePosts))
                                               {
                                                 array_push($alreadyOnPagePosts,$hotpost['url']);
                                                  if($count%2==0)
                                                    {
                                                      echo '<div class="life-style-grids">
                                                              <div class="life-style-left-grid">';
                                                    }
                                                 else
                                                    {
                                                      echo '
                                                              <div class="life-style-right-grid">';
                                                    }
    
                                                    echo '
    							<a href="'.$mainUrl.$hotpost['url'].'"><img src="'.$mainUrl.$hotpost['cover_image'].'" alt="" /></a>
    							<a class="title" href="'.$mainUrl.$hotpost['url'].'">'.$hotpost['title'].'</a>
    						     ';
    
    
                                                     echo '</div>';
                                                     
                                                     if($count%2!=0)
                                                    {
                                                      echo '</div>';
                                                    }
    
                                                   
                                                   $count++;
                                               }
                                            }
					?>
                                      </div>

					<div class="life-style col-md-12">
      					<header>
      						<h3 class="title-head">Recent Posts</h3>
      					</header>


                                                                               <?php
                                                                                  global $alreadyOnPagePosts;
                                                                                  $recentPosts = getLatestMiniPost(13);
                                                                                  $count = 0;
                                                                                  //print_r($alreadyOnPagePosts);
                                                                                  while(($recentPost = $recentPosts->fetch_assoc()) && $count < 6)
                                                                                  {
                                                                                  if(!in_array($recentPost['url'],$alreadyOnPagePosts))
                                                                                     {
                                                                                       array_push($alreadyOnPagePosts,$recentPost['url']);
                                                                                       if($count==0)
                                                                                        {
                                                                                           echo '<div class="s-grid-left">
							                                  	<div class="cricket"> ';

                                                                                        }
                                                                                        
                                                                                        if($count==3)
                                                                                        {
                                                                                           echo '<div class="s-grid-right">
							                                  	<div class="cricket"> ';

                                                                                        }

                                                                                       echo '<div class="s-grid-small">
                											<div class="sc-image">
                												<a href="'.$mainUrl.$recentPost['url'].'"><img src="'.$mainUrl.$recentPost['profile_image'].'" alt="'.$recentPost['url'].'" /></a>
                											</div>
                										<div class="sc-text">
                											<a class="power" href="'.$mainUrl.$recentPost['url'].'">'.$recentPost['title'].'</a>
                											<p class="date">On '.$recentPost['date_added'].' </p>
                												<div class="clearfix"></div>
                										</div>
                										<div class="clearfix"></div>
                                                                                           </div>';

                                                                                       $count++;
                                                                                       
                                                                                       if($count == 3 || $count == 6)
                                                                                        {
                                                                                           echo '</div>
                                                                                                 </div>';
                                                                                        }

                                                                                     }

                                                                                  }

                                                                               ?>


				</div>  <!--life-style-->
				


  </div> <!--col-md-8-->
