                                <div class="col-md-4 side-bar">
			<div class="first_half">
			     <!--
                                <div class="newsletter">
					<h1 class="side-title-head">Newsletter</h1>
					<p class="sign">Sign up to receive our free newsletters!</p>
					<form>
						<input type="text" class="text" value="Email Address" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email Address';}">
						<input type="submit" value="submit">
					</form>
				</div>
				-->
				<div class="list_vertical">
		         	 	<section class="accordation_menu">
						  <div>
						    <input id="label-1" name="lida" type="radio" checked/>
						   <label for="label-1" id="item1"><i class="ferme"> </i>Recent Posts<i class="icon-plus-sign i-right1"></i><i class="icon-minus-sign i-right2"></i></label>
						    <div class="content" id="a1">
						    	<div class="scrollbar" id="style-2">
								 <div class="force-overflow">
								     <div class="popular-post-grids">
								          <?php
									              
									                $recentPosts = getLatestMiniPost(4);
									                while($recentPost = $recentPosts->fetch_assoc())
									                 {
                                                                                           echo '<div class="popular-post-grid">
												<div class="post-img">
													<a href="'.$mainUrl.$recentPost['url'].'"><img src="'.$mainUrl.$recentPost['profile_image'].'" alt="" /></a>
												</div>
												<div class="post-text">
													<a class="pp-title" href="'.$mainUrl.$recentPost['url'].'">'.$recentPost['title'].'</a>
													<p>'.$recentPost['date_added'].'</p>
												</div>
												<div class="clearfix"></div>
											      </div>';
                                                                                         }

									              ?>
									              


									</div>   <!--popular-post-grids-->
									</div>
                                </div> <!--scrollbar-->
                              </div>    <!--content-->
						  </div>
						  <div>
						    <input id="label-2" name="lida" type="radio"/>
						    <label for="label-2" id="item2"><i class="icon-leaf" id="i2"></i>Popular Posts<i class="icon-plus-sign i-right1"></i><i class="icon-minus-sign i-right2"></i></label>
						    <div class="content" id="a2">
						       <div class="scrollbar" id="style-2">
								   <div class="force-overflow">
									<div class="popular-post-grids">
									
									              <?php
									              
									                $alltTimePopularPosts = getAllTimePopularMiniPost(4);
									                while($alltTimePopularPost = $alltTimePopularPosts->fetch_assoc())
									                 {
                                                                                           echo '<div class="popular-post-grid">
												<div class="post-img">
													<a href="'.$mainUrl.$alltTimePopularPost['url'].'"><img src="'.$mainUrl.$alltTimePopularPost['profile_image'].'" alt="" /></a>
												</div>
												<div class="post-text">
													<a class="pp-title" href="'.$mainUrl.$alltTimePopularPost['url'].'">'.$alltTimePopularPost['title'].'</a>
													<p>'.$alltTimePopularPost['date_added'].'</p>
												</div>
												<div class="clearfix"></div>
											      </div>';
                                                                                         }

									              ?>

										</div> <!--popular-post-grids-->
									</div>
								</div> <!--scrollbar-->
						    </div><!--content-->
						  </div>
						  
						  <div>
						    <input id="label-3" name="lida" type="radio"/>
						    <label for="label-3" id="item3"><i class="icon-trophy" id="i3"></i>Latest Lyrics<i class="icon-plus-sign i-right1"></i><i class="icon-minus-sign i-right2"></i></label>
						    <div class="content" id="a3">
						       <div class="scrollbar" id="style-2">
								   <div class="force-overflow">
									<div class="popular-post-grids">
									
									              <?php
									              
									                $lyrics = getLatestLyrics();
									                while($lyric = $lyrics->fetch_assoc())
									                 {
                                                                                           echo '<div class="popular-post-grid">
												<div class="post-img">
													<a href="'.$mainUrl2.str_replace(' ','-',@$lyric['AlbumName']).'/'.@$lyric['SongId'].'/hindi-lyrics-of/'.str_replace(' ','-',@$lyric['SongName'].' '.str_replace(',','',@$lyric['SongSinger']) ).'.htm"><img src="'.$mainUrl2.$lyric['AlbumImage'].'" alt="" /></a>
												</div>
												<div class="post-text">
													<a class="pp-title" href="'.$mainUrl2.str_replace(' ','-',@$lyric['AlbumName']).'/'.@$lyric['SongId'].'/hindi-lyrics-of/'.str_replace(' ','-',@$lyric['SongName'].' '.str_replace(',','',@$lyric['SongSinger']) ).'.htm">'.$lyric['SongName'].'</a>
													<p>Movie : '.$lyric['AlbumName'].' <br/>Singer : '.$lyric['SongSinger'].'</p>
												</div>
												<div class="clearfix"></div>
											      </div>';
                                                                                         }

									              ?>

										</div> <!--popular-post-grids-->
									</div>
								</div> <!--scrollbar-->
						    </div><!--content-->
						  </div>

						</section>
					 </div>
              </div>   <!-- first half-->
              
              

					 <div class="secound_half">
					 
					   <div class="fb-page" data-href="https://www.facebook.com/DedicateLyricscom-1693081050904972/" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true" data-show-posts="false"></div>

                                           <!--

					 <div class="tags">
						<header>
							<h3 class="title-head">Tags</h3>
						</header>
						<p>
						<a class="tag1" href="single.html">At vero eos</a>
						<a class="tag2" href="single.html">doloremque</a>
						<a class="tag3" href="single.html">On the other</a>
						<a class="tag4" href="single.html">pain was</a>
						<a class="tag5" href="single.html">rationally encounter</a>
						<a class="tag6" href="single.html">praesentium voluptatum</a>
						<a class="tag7" href="single.html">est, omnis</a>
						<a class="tag8" href="single.html">who are so beguiled</a>
						<a class="tag9" href="single.html">when nothing</a>
						<a class="tag10" href="single.html">owing to the</a>
						<a class="tag11" href="single.html">pains to avoid</a>
						<a class="tag12" href="single.html">tempora incidunt</a>
						<a class="tag13" href="single.html">pursues or desires</a>
						<a class="tag14" href="single.html">Bonorum et</a>
						<a class="tag15" href="single.html">written by Cicero</a>
						<a class="tag16" href="single.html">Ipsum passage</a>
						<a class="tag17" href="single.html">exercitationem ullam</a>
						<a class="tag18" href="single.html">mistaken idea</a>
						<a class="tag19" href="single.html">ducimus qui</a>
						<a class="tag20" href="single.html">holds in these</a>
						</p>
					 </div>					 
                                                 -->
					</div>
					<div class="clearfix"></div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	<!-- content-section-ends-here -->