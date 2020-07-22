<?php get_header(); ?>

 <div class="jumbotron jumbotron-fluid height100p banner" id="home">
            <div class="container h100">
               <div class="contentBox h100">
                    <div>
                        <h1 data-aos="fade-up" data-aos-delay="0" data-aos-duration='1000'>Undiscovered Beauty</h1>
                        <p data-aos="fade-up" data-aos-duration='1000' data-aos-delay="1000">Need to get away from normal life and have an adventure? Come to us and let us help you discover the beautiful side of the world</p>
                    </div>
               </div>
            </div>
        </div>

        <section class="sec1" id="explore">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="headerText text-center">
                            <h2 data-aos="fade-up" data-aos-duration="1000" data-aos-delay="0">Explore The World</h2>
                            <p data-aos="fade-up" data-aos-duration="1000" data-aos-delay="0">We have no set menu for our locations. Everything is completely tailored to what you want, from peaceful hikes to monasteries, to treks across Norway, to a simple beach getaway. Everything made just for you, in whatever way you want it.  </p>
                        </div>
                    </div>
                </div>

                <div class="row">

                <?php $landmarkList = new WP_Query(array(
                    'post_type' => 'landmarks',
                    'posts_per_page' => '3',
                    'orderby' => 'meta_value_num',
                    'order' => 'ASC'
                ));
                
                //Counter to configure the AOS delay
                $counter = 0;

                while($landmarkList -> have_posts()) {
                    $landmarkList -> the_post(); ?>

                    <div class="col-sm-4" >
                        <div class="placeBox" data-aos= "fade-up" data-aos-duration="1000" data-aos-delay="<?php echo $counter * 250 ?>">
                            <div class="imgBx">
                                <img class="img-fluid" src=<?php echo get_the_post_thumbnail_url()?> >
                            </div>

                            <div class="content">
                                <h3><?php the_field('landmark_name') ?> </br> <span><?php the_field('landmark_country') ?></span> </h3>
                               
                            </div>
                        </div>
                    </div>

                    <?php $counter++ ?>

                <?php };
                wp_reset_postdata(); ?>
                
                
                </div>
            </div>
        </section>



        <section class="sec2" id="adventure">
            <div class="container h100">
                <div class="contentBox h100">
                    <div>
                        <h1 data-aos="fade-up" data-aos-duration="1000" data-aos-delay="0">Adventure is Everywhere</h1>
                        <p data-aos="fade-up" data-aos-duration="1000" data-aos-delay="0">
                          &ldquo;I hope you see things that startle you. I hope you feel things you never felt before. I hope you meet people with a different point of view. I hope you live a life you're proud of. If you find that you're not, I hope you have the strength to start all over again.&rdquo; - Eric Roth
                        </p>
                        <!-- <a href="#" class="btn btnD1" data-aos="fade-up" data-aos-duration="1000"
                            data-aos-delay="0">Read More</a> -->
                    </div>
                </div>
            </div>
        </section>


        <section class="blog" id="blog">
            <div class="container">
                <div class="row">
                    <div class="offset-sm-2 col-sm-8">
                        <div class="headerText text-center">
                            <h2>Make Memories, Make Friends</h2>
                            <p>You can select whether you want to have adventures with your own group, or let us group you with other people from all over the world. Meet as strangers, and leave as friends</p>
                        </div>
                    </div>
                </div>



                <?php 
                    $testimonialSearch = new WP_Query(array(
                        'posts_per_page' => '-1',
                        'post_type' => 'testimonials',
                        'order' => 'ASC'
                    ));

                    $counter = 0;
                ?>

                <div class="row">

                    <?php while($testimonialSearch -> have_posts()) {
                        $testimonialSearch -> the_post(); ?>
                   
                        <div class="col-sm-6">
                            <div class="blogpost" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="0">
                                <div class="imgBx">
                                    <img src="<?php the_post_thumbnail_url()?>" class="img-fluid" alt="Testimonial Image">
                                </div>
                                <div class="content">
                                    <h1>&#8220;<?php the_title() ?>&#8221;</h1>
                                    <p><?php the_content() ?></p>
                                    <!-- <a href="#" class="btn btnD2">Read More</a> -->
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div> 
                        <?php $counter++; ?>
                    <?php };
                    wp_reset_postdata() ?>

                </div>
            </div>
        </section>



        <!-- Form -->
        <section class="contact" id="contact">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="headerText text-center">
                            <h2 data-aos="fade-up" data-aos-duration="1000" data-aos-delay="0">Contact Us </h2>
                            <p data-aos="fade-up" data-aos-duration="1000" data-aos-delay="0">Did we spark your thirst for adventure?</br> Send us a message and let's have a chat about quenching that thirst. Fill in the form and we'll contact you about your next adventure</p>
                        </div>
                    </div>
                </div>
                <div class="row clearfix">
                    <div class="offset-sm-2 col-sm-8">
                       <form action="/">
                            <div class="form-group">
                                <label for="">Name</label>
                                <input type="text" name="" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="">Email</label>
                                <input type="email" name="" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="">Phone</label>
                                <input type="text" name="" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="">Message</label>
                                <textarea name="" class="form-control textarea"></textarea>
                            </div>

                            <div class="form-group text-center">
                                <button class="btn btnD1">Send</button>
                            </div>
                       </form>
                    </div>
                </div>
            </div>
        </section>

        




<?php
get_footer();
?>
