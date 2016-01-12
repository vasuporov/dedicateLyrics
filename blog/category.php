
	<!-- content-section-starts-here -->
	<div class="main-body">
		<div class="wrap">
		<ol class="breadcrumb">
			  <li><a href="<?php echo $mainUrl;?>">HOME</a></li>
			  <li class="active"><?php echo strtoupper(str_replace("-"," ",$category)); ?></li>
			</ol>
			<div class="col-md-8 content-left">
			<div class="col-md-12">
                        <div class="articles sports">
					<header>
						<h3 class="title-head"><?php echo strtoupper(str_replace("-"," ",$category)); ?></h3>
					</header>
					<div class="technology">
					
					
					    <?php
                                              global $posts;
                                              $count = 1;
                                              $flag = 0;
                                              while($post = $posts->fetch_assoc())
                                               {
                                                 if(($count-1)%3 == 0)
                                                   {
                                                     $flag = 1;
                                                     echo '<div class="tech-main wow bounceIn" data-wow-delay="0.3s">';
                                                   }
                                                   
                                                   
                                                   
                                                   echo '<div class="tech">
									<a href="'.$mainUrl.$post['url'].'"><img src="'.$mainUrl.$post['profile_image'].'" alt="'.$post['url'].'" height="180px"  /></a>
									<a class="power" href="'.$mainUrl.$post['url'].'">'.$post['title'].'</a>
								</div>';

                                                 if($count%3==0)
                                                 {
                                                   $flag=2;
                                                   echo '</div>';
                                                 }
                                                 $count++;
                                               }
                                               

                                               if($flag == 1)
                                                {
                                                  echo '</div>';
                                                }


					    ?>

                                    </div>
				</div>
   	
			</div>
			
			<div class="col-md-12 ">

				<div class="latest-articles">
							<div class="main-title-head">
								<header>
									<h3 class="title-head">What's Hot</h3>
								</header>
							</div>
							<div class="world-news-grids">
							
							       <?php
							         $latestPopularPosts =  getLatestPopularMiniPost(3);
                                                                 while($latestPopularPost = $latestPopularPosts->fetch_assoc())
                                                                  {
                                                                    echo '
                                                                           <div class="world-news-grid">
          									<img src="'.$mainUrl.$latestPopularPost['profile_image'].'" alt="" />
          									<a href="'.$mainUrl.$latestPopularPost['url'].'" class="title">'.$latestPopularPost['title'].' </a>
          									<p>'.$latestPopularPost['one_liner'].'.</p>
          									<a class="reu" href="'.$mainUrl.$latestPopularPost['url'].'"><img src="images/more.png" alt="" /></a>
								        </div>
                                                                          ';
                                                                  }
							       ?>

							
								<div class="clearfix"></div>
							</div>
						</div>

			</div>

          </div> <!-- col-md-8 content-left-->