<?php

    //THIS IS THE PAGE THAT SHOWS THE TABLE OF USERS WITH LINK TO EDIT-USER AND OPTION TO DELETE USERS


    include 'functions.php';    //Some functions from here are used


    session_start();
    if(!isset($_SESSION['ad_email'])){
        header("Location: index.php");
    }

    //I DON'T UNDERSTAND WHAT THIS DOES...
    if(isset($_GET['vol_email']))
    {
        $login_name=$_GET['vol_email'];

       $result = getUser($login_name);
       $row = mysqli_fetch_array($result);
       $imageurl = $row['imageurl'];
       if(file_exists($imageurl))
       {

           unlink($imageurl);

       }
       deleteUser($login_name);
      // header("location: delete-user.php");
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


                <div id="page-heading"><h1>Delete Users</h1></div>



                                    <div class="clear">&nbsp;</div>
                                    
                                    <div style="display: block;">
                                        <table style="margin-left: auto; margin-right: auto;">
                                            <tr>
                                                <th class="table-style">Sr. #</th><th class="table-style">Login Name</th><th class="table-style">First Name</th><th class="table-style">Surname</th>
                                            <?php
                                                
                                                $result = getAllRegisteredUsers();
                                                
                                                if(mysqli_num_rows($result)>0)                                                {
                                                    
                                                    $counter = 0;
                                                    while ($row=  mysqli_fetch_array($result))
                                                    {
                                                        $counter++;
                                            ?>
                                            <tr>
                                                <td><?php echo $counter; ?></td>
                                                <td><?php echo $row['vol_email']; ?></td>
                                                <td><?php echo $row['vol_firstname']; ?></td>
                                                <td><?php echo $row['vol_surname']; ?></td>
                                                <td>
                                                    <a href="edit-user.php?vol_email=<?php echo $row['vol_email']; ?>" style="color:green;">Edit</a>
                                                    &nbsp;&nbsp;&nbsp;<a href="?vol_email=<?php echo $row['vol_email']; ?>" style="color:red;">Delete</a></td>
                                                
                                            </tr>
                                                <?php
                                                
                                                    }//end of for loop
                                                }//end if statement 
												?>
                                            
                                        </table>
                                        
                                    </div>

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