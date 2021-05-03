<section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-3">
                            <form action="salon_profile.php" method="post">
                                <!-- Profile Image -->
                                <div class="card card-primary card-outline">
                                    <div class="card-body box-profile">
                                        <div class="text-center">
                                            <img class="profile-user-img img-fluid img-circle" src="img/avatar.png" alt="User profile picture">
                                        </div>
                                        <br>
                                        <input class="form-control form-control-sm" type="text" placeholder="Unesite ime salona">
                                        <p class="font-weight-bold text-center">Ime salona</p>
                                        <input class="form-control form-control-sm" type="text" placeholder="Unesite telefon">
                                        <p class="font-weight-bold text-center">Telefon</p>
                                        <input class="form-control form-control-sm" type="text" placeholder="Unesite adresu salona">
                                        <p class="font-weight-bold text-center">Adresa</p>
                                        <button id="mySubmit" name="btn" value="1" type="submit" class="btn btn-primary btn-block">Sačuvaj</button>
                            </form>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-header p-2">
                            <ul class="nav nav-pills">
                                <li class="nav-item"><a class="nav-link active" href="#salon_info" data-toggle="tab">Info</a></li>
                                <li class="nav-item"><a class="nav-link" href="#r_vreme" data-toggle="tab">Radno Vreme</a></li>
                                <li class="nav-item"><a class="nav-link" href="#info" data-toggle="tab">Dodatne informacije</a></li>
                            </ul>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="active tab-pane" id="salon_info">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <!-- text input -->
                                            <div class="form-group">
                                                <label>Text</label>
                                                <input type="text" class="form-control" placeholder="Enter ...">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">

                                            <div class="form-group">
                                                <label>Text</label>
                                                <input type="text" class="form-control" placeholder="Enter ...">
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.card-body -->
                                <a href="#" class="btn btn-success float-right">Sačuvaj</a>

                            </div>
                        <!-- /.tab-pane -->
                        <div class="tab-pane" id="r_vreme">
                            <div class="row">
                                <table style="text-align:center" id="calendar" class="table table-condensed table-sm table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Pon</th>
                                            <th>Uto</th>
                                            <th>Sre</th>
                                            <th>Čet</th>
                                            <th>Pet</th>
                                            <th>Sub</th>
                                            <th>Ned</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>07:00 <input type="checkbox" name="pon07" value="1"> </td>
                                            <td>07:00 <input type="checkbox" name="uto07" value="1"> </td>
                                            <td>07:00 <input type="checkbox" name="sre07" value="1"> </td>
                                            <td>07:00 <input type="checkbox" name="cet07" value="1"> </td>
                                            <td>07:00 <input type="checkbox" name="pet07" value="1"> </td>
                                            <td>07:00 <input type="checkbox" name="sub07" value="1"> </td>
                                            <td>07:00 <input type="checkbox" name="ned07" value="1"> </td>
                                        </tr>
                                        <tr>
                                            <td>08:00 <input type="checkbox" name="pon08" value="1"> </td>
                                            <td>08:00 <input type="checkbox" name="uto08" value="1"> </td>
                                            <td>08:00 <input type="checkbox" name="sre08" value="1"> </td>
                                            <td>08:00 <input type="checkbox" name="cet08" value="1"> </td>
                                            <td>08:00 <input type="checkbox" name="pet08" value="1"> </td>
                                            <td>08:00 <input type="checkbox" name="sub08" value="1"> </td>
                                            <td>08:00 <input type="checkbox" name="ned08" value="1"> </td>
                                        </tr>
                                        <tr>
                                            <td>09:00 <input type="checkbox" name="pon09" value="1" checked> </td>
                                            <td>09:00 <input type="checkbox" name="uto09" value="1" checked> </td>
                                            <td>09:00 <input type="checkbox" name="sre09" value="1" checked> </td>
                                            <td>09:00 <input type="checkbox" name="cet09" value="1" checked> </td>
                                            <td>09:00 <input type="checkbox" name="pet09" value="1" checked> </td>
                                            <td>09:00 <input type="checkbox" name="sub09" value="1" checked> </td>
                                            <td>09:00 <input type="checkbox" name="ned09" value="1"> </td>
                                        </tr>
                                        <tr>
                                            <td>10:00 <input type="checkbox" name="pon10" value="1" checked> </td>
                                            <td>10:00 <input type="checkbox" name="uto10" value="1" checked> </td>
                                            <td>10:00 <input type="checkbox" name="sre10" value="1" checked> </td>
                                            <td>10:00 <input type="checkbox" name="cet10" value="1" checked> </td>
                                            <td>10:00 <input type="checkbox" name="pet10" value="1" checked> </td>
                                            <td>10:00 <input type="checkbox" name="sub10" value="1" checked> </td>
                                            <td>10:00 <input type="checkbox" name="ned10" value="1"> </td>
                                        </tr>
                                        <tr>
                                            <td>11:00 <input type="checkbox" name="pon11" value="1" checked> </td>
                                            <td>11:00 <input type="checkbox" name="uto11" value="1" checked> </td>
                                            <td>11:00 <input type="checkbox" name="sre11" value="1" checked> </td>
                                            <td>11:00 <input type="checkbox" name="cet11" value="1" checked> </td>
                                            <td>11:00 <input type="checkbox" name="pet11" value="1" checked> </td>
                                            <td>11:00 <input type="checkbox" name="sub11" value="1" checked> </td>
                                            <td>11:00 <input type="checkbox" name="ned11" value="1"> </td>
                                        </tr>
                                        <tr>
                                            <td>12:00 <input type="checkbox" name="pon12" value="1" checked> </td>
                                            <td>12:00 <input type="checkbox" name="uto12" value="1" checked> </td>
                                            <td>12:00 <input type="checkbox" name="sre12" value="1" checked> </td>
                                            <td>12:00 <input type="checkbox" name="cet12" value="1" checked> </td>
                                            <td>12:00 <input type="checkbox" name="pet12" value="1" checked> </td>
                                            <td>12:00 <input type="checkbox" name="sub12" value="1" checked> </td>
                                            <td>12:00 <input type="checkbox" name="ned12" value="1"> </td>
                                        </tr>
                                        <tr>
                                            <td>13:00 <input type="checkbox" name="pon13" value="1" checked> </td>
                                            <td>13:00 <input type="checkbox" name="uto13" value="1" checked> </td>
                                            <td>13:00 <input type="checkbox" name="sre13" value="1" checked> </td>
                                            <td>13:00 <input type="checkbox" name="cet13" value="1" checked> </td>
                                            <td>13:00 <input type="checkbox" name="pet13" value="1" checked> </td>
                                            <td>13:00 <input type="checkbox" name="sub13" value="1" checked> </td>
                                            <td>13:00 <input type="checkbox" name="ned13" value="1"> </td>
                                        </tr>
                                        <tr>
                                            <td>14:00 <input type="checkbox" name="pon14" value="1" checked> </td>
                                            <td>14:00 <input type="checkbox" name="uto14" value="1" checked> </td>
                                            <td>14:00 <input type="checkbox" name="sre14" value="1" checked> </td>
                                            <td>14:00 <input type="checkbox" name="cet14" value="1" checked> </td>
                                            <td>14:00 <input type="checkbox" name="pet14" value="1" checked> </td>
                                            <td>14:00 <input type="checkbox" name="sub14" value="1" checked> </td>
                                            <td>14:00 <input type="checkbox" name="ned14" value="1"> </td>
                                        </tr>
                                        <tr>
                                            <td>15:00 <input type="checkbox" name="pon15" value="1" checked> </td>
                                            <td>15:00 <input type="checkbox" name="uto15" value="1" checked> </td>
                                            <td>15:00 <input type="checkbox" name="sre15" value="1" checked> </td>
                                            <td>15:00 <input type="checkbox" name="cet15" value="1" checked> </td>
                                            <td>15:00 <input type="checkbox" name="pet15" value="1" checked> </td>
                                            <td>15:00 <input type="checkbox" name="sub15" value="1"> </td>
                                            <td>15:00 <input type="checkbox" name="ned15" value="1"> </td>
                                        </tr>
                                        <tr>
                                            <td>16:00 <input type="checkbox" name="pon16" value="1" checked> </td>
                                            <td>16:00 <input type="checkbox" name="uto16" value="1" checked> </td>
                                            <td>16:00 <input type="checkbox" name="sre16" value="1" checked> </td>
                                            <td>16:00 <input type="checkbox" name="cet16" value="1" checked> </td>
                                            <td>16:00 <input type="checkbox" name="pet16" value="1" checked> </td>
                                            <td>16:00 <input type="checkbox" name="sub16" value="1"> </td>
                                            <td>16:00 <input type="checkbox" name="ned16" value="1"> </td>
                                        </tr>
                                        <tr>
                                            <td>17:00 <input type="checkbox" name="pon17" value="1" checked> </td>
                                            <td>17:00 <input type="checkbox" name="uto17" value="1" checked> </td>
                                            <td>17:00 <input type="checkbox" name="sre17" value="1" checked> </td>
                                            <td>17:00 <input type="checkbox" name="cet17" value="1" checked> </td>
                                            <td>17:00 <input type="checkbox" name="pet17" value="1" checked> </td>
                                            <td>17:00 <input type="checkbox" name="sub17" value="1"> </td>
                                            <td>17:00 <input type="checkbox" name="ned17" value="1"> </td>
                                        </tr>
                                        <tr>
                                            <td>18:00 <input type="checkbox" name="pon18" value="1" checked> </td>
                                            <td>18:00 <input type="checkbox" name="uto18" value="1" checked> </td>
                                            <td>18:00 <input type="checkbox" name="sre18" value="1" checked> </td>
                                            <td>18:00 <input type="checkbox" name="cet18" value="1" checked> </td>
                                            <td>18:00 <input type="checkbox" name="pet18" value="1" checked> </td>
                                            <td>18:00 <input type="checkbox" name="sub18" value="1"> </td>
                                            <td>18:00 <input type="checkbox" name="ned18" value="1"> </td>
                                        </tr>
                                        <tr>
                                            <td>19:00 <input type="checkbox" name="pon19" value="1" checked> </td>
                                            <td>19:00 <input type="checkbox" name="uto19" value="1" checked> </td>
                                            <td>19:00 <input type="checkbox" name="sre19" value="1" checked> </td>
                                            <td>19:00 <input type="checkbox" name="cet19" value="1" checked> </td>
                                            <td>19:00 <input type="checkbox" name="pet19" value="1" checked> </td>
                                            <td>19:00 <input type="checkbox" name="sub19" value="1"> </td>
                                            <td>19:00 <input type="checkbox" name="ned19" value="1"> </td>
                                        </tr>
                                        <tr>
                                            <td>20:00 <input type="checkbox" name="pon20" value="1"> </td>
                                            <td>20:00 <input type="checkbox" name="uto20" value="1"> </td>
                                            <td>20:00 <input type="checkbox" name="sre20" value="1"> </td>
                                            <td>20:00 <input type="checkbox" name="cet20" value="1"> </td>
                                            <td>20:00 <input type="checkbox" name="pet20" value="1"> </td>
                                            <td>20:00 <input type="checkbox" name="sub20" value="1"> </td>
                                            <td>20:00 <input type="checkbox" name="ned20" value="1"> </td>
                                        </tr>
                                        <tr>
                                            <td>21:00 <input type="checkbox" name="pon21" value="1"> </td>
                                            <td>21:00 <input type="checkbox" name="uto21" value="1"> </td>
                                            <td>21:00 <input type="checkbox" name="sre21" value="1"> </td>
                                            <td>21:00 <input type="checkbox" name="cet21" value="1"> </td>
                                            <td>21:00 <input type="checkbox" name="pet21" value="1"> </td>
                                            <td>21:00 <input type="checkbox" name="sub21" value="1"> </td>
                                            <td>21:00 <input type="checkbox" name="ned21" value="1"> </td>
                                        </tr>
                                    </tbody>

                                </table>

                            </div>



                            <!-- /.card-body -->
                            <div class="card-footer">
                                <a href="add_service.php" class="btn btn-success float-right">Prihvati radno vreme</a>
                            </div>




                        </div>
                        <!-- /.tab-pane -->
                        <div class="tab-pane" id="info">
                            <!-- The timeline -->
                            <div class="timeline timeline-inverse">
                                <!-- timeline time label -->
                                <div class="time-label">
                                    <span class="bg-danger">
                                        10 Feb. 2014
                                    </span>
                                </div>
                                <!-- /.timeline-label -->
                                <!-- timeline item -->
                                <div>
                                    <i class="fas fa-envelope bg-primary"></i>

                                    <div class="timeline-item">
                                        <span class="time"><i class="far fa-clock"></i> 12:05</span>

                                        <h3 class="timeline-header"><a href="#">Support Team</a> sent you an email</h3>

                                        <div class="timeline-body">
                                            Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles,
                                            weebly ning heekya handango imeem plugg dopplr jibjab, movity
                                            jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo kaboodle
                                            quora plaxo ideeli hulu weebly balihoo...
                                        </div>
                                        <div class="timeline-footer">
                                            <a href="#" class="btn btn-primary btn-sm">Read more</a>
                                            <a href="#" class="btn btn-danger btn-sm">Delete</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- END timeline item -->
                                <!-- timeline item -->
                                <div>
                                    <i class="fas fa-user bg-info"></i>

                                    <div class="timeline-item">
                                        <span class="time"><i class="far fa-clock"></i> 5 mins ago</span>

                                        <h3 class="timeline-header border-0"><a href="#">Sarah Young</a> accepted your friend request
                                        </h3>
                                    </div>
                                </div>
                                <!-- END timeline item -->
                                <!-- timeline item -->
                                <div>
                                    <i class="fas fa-comments bg-warning"></i>

                                    <div class="timeline-item">
                                        <span class="time"><i class="far fa-clock"></i> 27 mins ago</span>

                                        <h3 class="timeline-header"><a href="#">Jay White</a> commented on your post</h3>

                                        <div class="timeline-body">
                                            Take me to your leader!
                                            Switzerland is small and neutral!
                                            We are more like Germany, ambitious and misunderstood!
                                        </div>
                                        <div class="timeline-footer">
                                            <a href="#" class="btn btn-warning btn-flat btn-sm">View comment</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- END timeline item -->
                                <!-- timeline time label -->
                                <div class="time-label">
                                    <span class="bg-success">
                                        3 Jan. 2014
                                    </span>
                                </div>
                                <!-- /.timeline-label -->
                                <!-- timeline item -->
                                <div>
                                    <i class="fas fa-camera bg-purple"></i>

                                    <div class="timeline-item">
                                        <span class="time"><i class="far fa-clock"></i> 2 days ago</span>

                                        <h3 class="timeline-header"><a href="#">Mina Lee</a> uploaded new photos</h3>

                                        <div class="timeline-body">
                                            <img src="http://placehold.it/150x100" alt="...">
                                            <img src="http://placehold.it/150x100" alt="...">
                                            <img src="http://placehold.it/150x100" alt="...">
                                            <img src="http://placehold.it/150x100" alt="...">
                                        </div>
                                    </div>
                                </div>
                                <!-- END timeline item -->
                                <div>
                                    <i class="far fa-clock bg-gray"></i>
                                </div>
                            </div>
                        </div>
                        <!-- /.tab-pane -->

                        <div class="tab-pane" id="settings">
                            <form class="form-horizontal">
                                <div class="form-group row">
                                    <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                                    <div class="col-sm-10">
                                        <input type="email" class="form-control" id="inputName" placeholder="Name">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                                    <div class="col-sm-10">
                                        <input type="email" class="form-control" id="inputEmail" placeholder="Email">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputName2" class="col-sm-2 col-form-label">Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputName2" placeholder="Name">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputExperience" class="col-sm-2 col-form-label">Experience</label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control" id="inputExperience" placeholder="Experience"></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputSkills" class="col-sm-2 col-form-label">Skills</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputSkills" placeholder="Skills">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="offset-sm-2 col-sm-10">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox"> I agree to the <a href="#">terms and conditions</a>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="offset-sm-2 col-sm-10">
                                        <button type="submit" class="btn btn-danger">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- /.tab-pane -->
                    </div>
                    <!-- /.tab-content -->
                </div><!-- /.card-body -->
                <!-- /.col -->
        </div>
        <!-- /.row -->

    </div><!-- /.container-fluid -->
    </section>

