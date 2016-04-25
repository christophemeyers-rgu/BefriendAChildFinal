<?php


    //THIS PAGE PRESENTS ADMIN WITH A FORM TO CHANGE DATA ABOUT VOLUNTEERS, IT IS LINKED TO/FROM DELETE-USER

    //important functions are here
    include 'functions.php';

    //without login session, the admin is sent back to index.php
    session_start();
    if(!isset($_SESSION['ad_email'])){
        header("Location: index.php");
    }


    //I DON'T WANNA TOUCH THIS NEXT BIT...
    if(isset($_POST['update']))
    {

        updateUser();
        header("location: delete-user.php");
    }
    if(isset($_GET['vol_email']))
    {
        $user_login=$_GET['vol_email'];
        $result = getUser($user_login);
        $row = mysqli_fetch_array($result);
    }else{
        header("location: adminhome.php");
    }
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>Internet Dreams</title>
        <link rel="stylesheet" href="cssadminpage/screen.css" type="text/css" media="screen" title="default" />

        <link rel="stylesheet" media="all" type="text/css" href="cssadminpage/pro_dropline_ie.css" />

        <!--  jquery core -->
        <script src="jsadminpage/jquery/jquery-1.4.1.min.js" type="text/javascript"></script>

        <!--  styled select box script version 2 -->
        <script src="jsadminpage/jquery/jquery.selectbox-0.5_style_2.js" type="text/javascript"></script>
        <script type="text/javascript">
            $(document).ready(function () {
                $('.styledselect_form_1').selectbox({inputClass: "styledselect_form_1"});
                $('.styledselect_form_2').selectbox({inputClass: "styledselect_form_2"});
            });
        </script>

        <!--  styled select box script version 3 -->
        <script src="jsadminpage/jquery/jquery.selectbox-0.5_style_2.js" type="text/javascript"></script>
        <script type="text/javascript">
            $(document).ready(function () {
                $('.styledselect_pages').selectbox({inputClass: "styledselect_pages"});
            });
        </script>

        <!--  styled file upload script -->
        <script src="jsadminpage/jquery/jquery.filestyle.js" type="text/javascript"></script>
        <script type="text/javascript" charset="utf-8">
            $(function () {
                $("input.file_1").filestyle({
                    image: "images/forms/upload_file.gif",
                    imageheight: 29,
                    imagewidth: 78,
                    width: 300
                });
            });
        </script>

        <!--  date picker script -->
        <link rel="stylesheet" href="cssadminpage/datePicker.css" type="text/css" />
        <script src="jsadminpage/jquery/date.js" type="text/javascript"></script>
        <script src="jsadminpage/jquery/jquery.datePicker.js" type="text/javascript"></script>
        <script type="text/javascript" charset="utf-8">
            $(function ()
            {

                // initialise the "Select date" link
                $('#date-pick')
                        .datePicker(
                                // associate the link with a date picker
                                        {
                                            createButton: false,
                                            startDate: '01/01/2005',
                                            endDate: '31/12/2020'
                                        }
                                ).bind(
                                        // when the link is clicked display the date picker
                                        'click',
                                        function ()
                                        {
                                            updateSelects($(this).dpGetSelected()[0]);
                                            $(this).dpDisplay();
                                            return false;
                                        }
                                ).bind(
                                        // when a date is selected update the SELECTs
                                        'dateSelected',
                                        function (e, selectedDate, $td, state)
                                        {
                                            updateSelects(selectedDate);
                                        }
                                ).bind(
                                        'dpClosed',
                                        function (e, selected)
                                        {
                                            updateSelects(selected[0]);
                                        }
                                );

                                var updateSelects = function (selectedDate)
                                {
                                    var selectedDate = new Date(selectedDate);
                                    $('#d option[value=' + selectedDate.getDate() + ']').attr('selected', 'selected');
                                    $('#m option[value=' + (selectedDate.getMonth() + 1) + ']').attr('selected', 'selected');
                                    $('#y option[value=' + (selectedDate.getFullYear()) + ']').attr('selected', 'selected');
                                }
                                // listen for when the selects are changed and update the picker
                                $('#d, #m, #y')
                                        .bind(
                                                'change',
                                                function ()
                                                {
                                                    var d = new Date(
                                                            $('#y').val(),
                                                            $('#m').val() - 1,
                                                            $('#d').val()
                                                            );
                                                    $('#date-pick').dpSetSelected(d.asString());
                                                }
                                        );

                                // default the position of the selects to today
                                var today = new Date();
                                updateSelects(today.getTime());

                                // and update the datePicker to reflect it...
                                $('#d').trigger('change');
                            });
        </script>

        <style>
            
            .table-style{
                border:#000 solid;
            }
            
        </style>
        
    </head>
    <body>
       <?php include './header.php'; ?>
        <div class="clear"></div>

        <!-- start content-outer -->
        <div id="content-outer">
            <!-- start content -->
            <div id="content">


                <div id="page-heading"><h1>Edit User</h1></div>

                <form method="post" action="edit-user.php" enctype="multipart/form-data">
                    <table border="0" width="100%" cellpadding="0" cellspacing="0" id="content-table">
                        <tr>
                            <th rowspan="3" class="sized"><img src="imagesadminpage/shared/side_shadowleft.jpg" width="20" height="300" alt="" /></th>
                            <th class="topleft"></th>
                            <td id="tbl-border-top">&nbsp;</td>
                            <th class="topright"></th>
                            <th rowspan="3" class="sized"><img src="imagesadminpage/shared/side_shadowright.jpg" width="20" height="300" alt="" /></th>
                        </tr>
                        <tr>
                            <td id="tbl-border-left"></td>
                            <td>
                                <!--  start content-table-inner -->
                                <div id="content-table-inner">

                                    <table border="0" width="100%" cellpadding="0" cellspacing="0">
                                        <tr valign="top">
                                            <td>


                                                <!--  start step-holder -->
                                                <div id="step-holder">

                                                    <div class="step-dark-left">Edit User details</div>


                                                    <div class="clear"></div>
                                                </div>
                                                <!--  end step-holder -->

                                                <!-- start id-form -->
                                                <table border="0" cellpadding="0" cellspacing="0"  id="id-form">
                                                    <tr>
                                                        <th valign="top">Firstname:</th>
                                                        <td><input name="firstName" type="text" class="inp-form" value="<?php echo $row['vol_firstname']; ?>" /></td>
                                                        <td></td>

                                                    </tr>
                                                    <tr>
                                                        <th valign="top">Surname:</th>
                                                        <td><input name="surName" type="text" class="inp-form" value="<?php echo $row['vol_surname']; ?>" /></td>
                                                        <td></td>

                                                    </tr>
                                                    <tr>
                                                        <th valign="top">Login Name:</th>
                                                        <td>
                                                            <input name="user_login_prev" type="hidden" value="<?php echo $row['vol_email'] ?>" />
                                                            <input name="loginName" type="text" class="inp-form" value="<?php echo $row['vol_email']; ?>" /></td>
                                                        <td></td>

                                                    </tr>
                                                    <tr>
                                                        <th valign="top">Password:</th>
                                                        <td><input name="password" type="text" class="inp-form" value="<?php echo $row['vol_password']; ?>" /></td>
                                                        <td></td>

                                                    </tr>

                                                    <tr>
                                                        <th valign="top">Currently matched with a child?</th>
                                                        <td>

                                                            <!--This if-clause should maybe be javascript... I think-->
                                                            <?php
                                                                if ($row['vol_child_matched']==true){
                                                                    ?>
                                                                    <input type="radio" name="child_matched" value=true checked >Yes
                                                                    <input type="radio" name="child_matched" value=false>No
                                                                    <?php
                                                                }
                                                                else if ($row['vol_child_matched']==false){
                                                                    ?>

                                                                    <input type="radio" name="child_matched" value=true>Yes
                                                                    <input type="radio" name="child_matched" value=false checked >No
                                                            <?php
                                                                }
                                                            ?>

                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <th>&nbsp;</th>
                                                        <td valign="top">
                                                            <input type="submit" name="update" value="Update" class="form-submit" />
                                                            <input type="reset" value="" class="form-reset"  />
                                                        </td>
                                                        <td>

                                                        </td>
                                                    </tr>
                                                </table>
                                                <!-- end id-form  -->

                                            </td>

                                            <td>



                                                <tr>
                                                    <td><img src="imagesadminpage/shared/blank.gif" width="695" height="1" alt="blank" /></td>
                                                    <td></td>
                                                </tr>
                                                </table>

                                                <div class="clear"></div>


                                                </div>
                                                <!--  end content-table-inner  -->
                                            </td>
                                            <td id="tbl-border-right"></td>
                                        </tr>
                                        <tr>
                                            <th class="sized bottomleft"></th>
                                            <td id="tbl-border-bottom">&nbsp;</td>
                                            <th class="sized bottomright"></th>
                                        </tr>
                                    </table>

                                    </form>


                                    <div class="clear">&nbsp;</div>
                                    

                                </div>
                                <!--  end content -->
                                <div class="clear">&nbsp;</div>
                                </div>
                                <!--  end content-outer -->



                                <div class="clear">&nbsp;</div>

                                <!-- start footer -->
                                <div id="footer">
                                    <!-- <div id="footer-pad">&nbsp;</div> -->
                                    <!--  start footer-left -->
                                    <div id="footer-left">
                                        Copyright 2016 Befriend A Child <a href="">http://www.befriendachild.org.uk/</a>. All rights reserved.</div>
                                    <!--  end footer-left -->
                                    <div class="clear">&nbsp;</div>
                                </div>
                                <!-- end footer -->

                                </body>
                                </html>