<?php
session_start();
include './functions.php';
if(!is_admin())
{
    header("location: login.php");
}
if(isset($_POST['submit']))
{
    save_user();
}
if(isset($_GET['user_login']))
{
    $login_name=$_GET['user_login'];
    
   $result = getUser($login_name);
   $row = mysqli_fetch_array($result);
   $imageurl = $row['imageurl'];
   if(file_exists($imageurl))
   {

       unlink($imageurl);
       
   }
   deleteUser($login_name);  
   header("location: createlogin.php");
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


                <div id="page-heading"><h1>Create User Login</h1></div>

                <form method="post" enctype="multipart/form-data">
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

                                                    <div class="step-dark-left">Add User details</div>


                                                    <div class="clear"></div>
                                                </div>
                                                <!--  end step-holder -->

                                                <!-- start id-form -->
                                                <table border="0" cellpadding="0" cellspacing="0"  id="id-form">
                                                    <tr>
                                                        <th valign="top">Login Name:</th>
                                                        <td><input name="loginName" type="text" class="inp-form" /></td>
                                                        <td></td>

                                                    </tr>
                                                    <tr>
                                                        <th valign="top">Password:</th>
                                                        <td><input name="password" type="text" class="inp-form" /></td>
                                                        <td></td>

                                                    </tr>
                                                    <tr>
                                                        <th valign="top">Firstname:</th>
                                                        <td><input name="firstName" type="text" class="inp-form" /></td>
                                                        <td></td>

                                                    </tr>
                                                    <tr>
                                                        <th valign="top">Surname:</th>
                                                        <td><input name="surName" type="text" class="inp-form" /></td>
                                                        <td></td>

                                                    </tr>
                                                    <tr>
                                                        <th valign="top">Gender:</th>
                                                        <td>
                                                            <select name="gender"  class="styledselect_form_1">
                                                                <option value="Male">Male</option>
                                                                <option value="Female">Female</option>

                                                            </select>
                                                        </td>
                                                        <td></td>
                                                    </tr>


                                                    <tr>
                                                        <th valign="top">Date of Birth:</th>
                                                        <td class="noheight">

                                                            <table border="0" cellpadding="0" cellspacing="0">
                                                                <tr  valign="top">
                                                                    <td>                                                          

                                                                        <select name="dob_day" id="d" class="styledselect-day">
                                                                            <option value="">dd</option>
                                                                            <option value="1">1</option>
                                                                            <option value="2">2</option>
                                                                            <option value="3">3</option>
                                                                            <option value="4">4</option>
                                                                            <option value="5">5</option>
                                                                            <option value="6">6</option>
                                                                            <option value="7">7</option>
                                                                            <option value="8">8</option>
                                                                            <option value="9">9</option>
                                                                            <option value="10">10</option>
                                                                            <option value="11">11</option>
                                                                            <option value="12">12</option>
                                                                            <option value="13">13</option>
                                                                            <option value="14">14</option>
                                                                            <option value="15">15</option>
                                                                            <option value="16">16</option>
                                                                            <option value="17">17</option>
                                                                            <option value="18">18</option>
                                                                            <option value="19">19</option>
                                                                            <option value="20">20</option>
                                                                            <option value="21">21</option>
                                                                            <option value="22">22</option>
                                                                            <option value="23">23</option>
                                                                            <option value="24">24</option>
                                                                            <option value="25">25</option>
                                                                            <option value="26">26</option>
                                                                            <option value="27">27</option>
                                                                            <option value="28">28</option>
                                                                            <option value="29">29</option>
                                                                            <option value="30">30</option>
                                                                            <option value="31">31</option>
                                                                        </select>
                                                                    </td>
                                                                    <td>
                                                                        <select name="dob_month" id="m" class="styledselect-month">
                                                                            <option value="">mmm</option>
                                                                            <option value="1">Jan</option>
                                                                            <option value="2">Feb</option>
                                                                            <option value="3">Mar</option>
                                                                            <option value="4">Apr</option>
                                                                            <option value="5">May</option>
                                                                            <option value="6">Jun</option>
                                                                            <option value="7">Jul</option>
                                                                            <option value="8">Aug</option>
                                                                            <option value="9">Sep</option>
                                                                            <option value="10">Oct</option>
                                                                            <option value="11">Nov</option>
                                                                            <option value="12">Dec</option>
                                                                        </select>
                                                                    </td>
                                                                    <td>
                                                                        <select name="dob_year"  id="y"  class="styledselect-year">
                                                                            <option value="">yyyy</option>
                                                                            <option value="2005">2005</option>
                                                                            <option value="2006">2006</option>
                                                                            <option value="2007">2007</option>
                                                                            <option value="2008">2008</option>
                                                                            <option value="2009">2009</option>
                                                                            <option value="2010">2010</option>
                                                                        </select>


                                                                    </td>
                                                                    <td><a href=""  id="date-pick"><img src="imagesadminpage/createlogin/icon_calendar.jpg" alt="" /></a></td>
                                                                </tr>
                                                            </table>

                                                        </td>
                                                        <td></td>
                                                    </tr>
                                                    <tr>
                                                        <th valign="top">Address:</th>
                                                        <td><textarea name="address" rows="" cols="" class="form-textarea"></textarea></td>
                                                        <td></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Picture:</th>
                                                        <td><input type="file" name="file" class="file_1"  /></td>
                                                        <td>
                                                            <div class="bubble-left"></div>
                                                            <div class="bubble-inner">JPEG, GIF 5MB max per image</div>
                                                            <div class="bubble-right"></div>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <th>&nbsp;</th>
                                                        <td valign="top">
                                                            <input type="submit" name="submit" value="Save" value="" class="form-submit" />
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
                                    
                                    <div style="display: block;">
                                        <table style="margin-left: auto; margin-right: auto;">
                                            <tr>
                                                <th class="table-style">Sr. #</th><th class="table-style">Login Name</th><th class="table-style">First Name</th><th class="table-style">Surname</th><th class="table-style">Gender</th><th class="table-style">DOB</th><th class="table-style">Address</th><th class="table-style">Image</th><th class="table-style">Action</th>
                                            </tr>
                                            <?php
                                                
                                                $result = getAllRegisteredUsers();
                                                
                                                if(mysqli_num_rows($result)>0)                                                {
                                                    
                                                    $counter = 0;
                                                    while ($row=  mysqli_fetch_array($result))
                                                    {
                                                        $counter++;
                                            ?>
                                            <tr>
                                                <td class="table-style"><?php echo $counter; ?></td>
                                                <td class="table-style"><?php echo $row['user_login']; ?></td>
                                                <td class="table-style"><?php echo $row['firstname']; ?></td>
                                                <td class="table-style"><?php echo $row['surname']; ?></td>
                                                <td class="table-style"><?php echo $row['gender']; ?></td>
                                                <td class="table-style"><?php echo $row['dob']; ?></td>
                                                <td class="table-style"><?php echo $row['address']; ?></td>
                                                <td class="table-style"><img src="<?php echo $row['imageurl']; ?>" style="width: 50px; height: 50px;" /></td>
                                                <td class="table-style">
                                                    <a href="edit-user.php?user_login=<?php echo $row['user_login']; ?>" style="color:green;">Edit</a>
                                                    &nbsp;&nbsp;&nbsp;<a href="?user_login=<?php echo $row['user_login']; ?>" style="color:red;">Delete</a>
                                                </td>
                                                
                                            </tr>
                                                <?php
                                                
                                                    }//end of for loop
                                                }//end if statement ?>
                                            
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