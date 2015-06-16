<?php
require_once './include/MainConfig.php';
//session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <?php require_once './include/systemHeader.php'; ?>        
    </head>
    <body>
        <div id="wrap">
            <?php require_once './include/navBar.php'; ?> 
            <div class="container">               
                <div class="row">                                
                <?php             
                  require_once './include/sideBar.php';                
                ?>
                    <div class="col-md-9 bs-old-docs" align="center">
                       <img src="" alt="welcome" style="width: 700px; height: 300px;"/>
<!--                        <section>-->
<!--                            <div class='live-tile blue ' data-mode='flip' data-direction="horizonal" data-initdelay='50'>-->
<!--                              <div>-->
<!--                                 <p><a class='metroLarger' href='#' id="" style="font-size: 45px;">Users</a></p>-->
<!--                                 <span class='tile-title'>453 Users</span>-->
<!--                              </div>-->
<!--                              <div>-->
<!--                                 <p><a class='metroLarger' href='#' id="">Employees 200+</a></p> -->
<!--                                 <span class='tile-title'>Emp</span>-->
<!--                              </div>-->
<!--                            </div>-->
<!--                            <div class='live-tile red two-wide ' data-mode='flip' data-direction="vertical" data-initdelay='50'>-->
<!--                              <div>-->
<!--                                 <p><a class='metroLarger' href='#' id="" style="font-size: 45px;">Institutes</a></p>-->
<!--                                 <span class='tile-title'>Institutes</span>-->
<!--                              </div>-->
<!--                              <div>-->
<!--                                 <p><a class='metroLarger' href='#' id="">reginal Institutes</a></p> -->
<!--                                 <span class='tile-title'></span>-->
<!--                              </div>-->
<!--                            </div>-->
<!--                            <div class='live-tile yellow ' data-mode='flip' data-direction="vertical" data-initdelay='50'>-->
<!--                              <div>-->
<!--                                 <p><a class='metroLarger' href='#' id="" style="font-size: 45px;">Admins</a></p>-->
<!--                                 <span class='tile-title'>for each Institute</span>-->
<!--                              </div>-->
<!--                              <div>-->
<!--                                 <p><a class='metroLarger' href='#' id="">Local Admins</a></p> -->
<!--                                 <span class='tile-title'></span>-->
<!--                              </div>-->
<!--                            </div>-->
<!--                            <div class='live-tile green ' data-mode='flip' data-direction="horizonal" data-initdelay='50'>-->
<!--                              <div>-->
<!--                                 <p><a class='metroLarger' href='#' id="" style="font-size: 45px;">Records</a></p>-->
<!--                                 <span class='tile-title'>50,000+</span>-->
<!--                              </div>-->
<!--                              <div>-->
<!--                                 <p><a class='metroLarger' href='#' id="">Health Records</a></p> -->
<!--                                 <span class='tile-title'></span>-->
<!--                              </div>-->
<!--                            </div>-->
<!--                            <div class='live-tile green two-tall two-wide' data-mode='flip' data-direction="horizonal" data-initdelay='50'>-->
<!--                              <div>-->
<!--                                 <p><a class='metroLarger' href='#' id="" style="font-size: 45px;"><img src="img/chart.png "/></a></p>-->
<!--                                 <span class='tile-title'></span>-->
<!--                              </div>-->
<!--                              <div>-->
<!--                                 <p><a class='metroLarger' href='#' id=""></a></p> -->
<!--                                 <span class='tile-title'></span>-->
<!--                              </div>-->
<!--                            </div>-->
<!--                            <div class='live-tile blue two-tall two-wide' data-mode='flip' data-direction="horizonal" data-initdelay='50'>-->
<!--                              <div>-->
<!--                                 <p><a class='metroLarger' href='#' id="" style="font-size: 45px;"><img src="img/chart.png "/></a></p>-->
<!--                                 <span class='tile-title'></span>-->
<!--                              </div>-->
<!--                              <div>-->
<!--                                 <p><a class='metroLarger' href='#' id=""></a></p> -->
<!--                                 <span class='tile-title'></span>-->
<!--                              </div>-->
<!--                            </div>-->
<!--                            <div class='live-tile red two-tall' data-mode='flip' data-direction="vertical" data-initdelay='50'>-->
<!--                              <div>-->
<!--                                 <p><a class='metroLarger' href='#' id="" style="font-size: 45px;"><img src="img/chart.png "/></a></p>-->
<!--                                 <span class='tile-title'></span>-->
<!--                              </div>-->
<!--                              <div>-->
<!--                                 <p><a class='metroLarger' href='#' id=""></a></p> -->
<!--                                 <span class='tile-title'></span>-->
<!--                              </div>-->
<!--                            </div>-->
<!--                        </section>-->
                        
                    </div>
                </div>
            </div>
        </div>
        <?php require_once './include/footerBar.php'; ?>
        <?php require_once './include/systemFooter.php'; ?>
    </body>
    <script type="text/javascript">
        $(function() {
            //////////////// COMMEN EVENT DO NOT REMOVE //////////////
            $('#logout').click(function() {
                logout();
            });

            $(window).load(function() {
                ////// PAGE LOAD EVENT//////
            });

            $('select').chosen({width: "100%"});
            $('.datepicker').datepicker({
                format: 'yyyy-mm-dd'
            });
            //////////////// END OF COMMEN EVENT DO NOT REMOVE //////////////

        });
    </script>
    <script type="text/javascript">
            // apply regular slide universally unless .exclude class is applied 
            // NOTE: The default options for each liveTile are being pulled from the 'data-' attributes
            $(".live-tile, .flip-list").not(".exclude").liveTile();
            $(".live-tile").liveTile("play", 0);
            $( ".tiles" ).sortable();
            //$( ".tiles" ).disableSelection();

            function getRandomOptions(){
            // this could obviously be a lot more random
            var doIt = Math.floor(Math.random() * 1001) % 2 == 0;
            // set random options supported by the goto method
            // http://www.drewgreenwell.com/projects/metrojs#liveTileMethods
            return {
                    index: "next",
                    delay: 3000,
                    animationDirection: doIt ? 'forward' : 'backward',
                    direction: doIt ? 'vertical' : 'horizontal'
                };
        }
        // setup the tile and then call goto on it the first time
        $("#tile1").liveTile({
            animationComplete: function(tileData){        
                $(this).liveTile("goto", getRandomOptions());
            }
        }).liveTile("goto", getRandomOptions());
        </script>
</html>

