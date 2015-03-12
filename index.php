<?php
$months = array(
    1 => 'January',
    2 => 'February',
    3 => 'March',
    4 => 'April',
    5 => 'May',
    6 => 'June',
    7 => 'July',
    8 => 'August',
    9 => 'September',
    10 => 'October',
    11 => 'November',
    12 => 'December'
);
?>
<!DOCTYPE HTML>
<html lang="en-US">
    <head>
        <title>Job Application form</title>
        <meta charset="UTF-8">

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/css/style.css">

        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css">

        <!-- Latest compiled and minified JavaScript -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
        <script src="https://maps.google.com/maps/api/js?v=3.13&sensor=false&libraries=places" type="text/javascript"></script>
        <script src="assets/js/jquery.validate.min.js"></script>
        <script src="assets/js/custom.js"></script>

    </head>
    <body>

        <div class="container">
            <div class="myForm">
                <div class="col-md-12 form-heading">Job Application Form</div>
                <form id="jobApplication" class="form-horizontal" name="jobApplication" action="" method="POST" onsubmit="return false">
                    <div class="form-group">
                        <label class="col-md-4 control-label">First Name<span>*</span></label>
                        <div class="col-md-8">
                            <input  type="text" name="firstname" class="form-control" value="" placeholder="First Name" required/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Last Name<span>*</span></label>
                        <div class="col-md-8">
                            <input  type="text" name="lasttname" class="form-control"  value="" placeholder="Last Name" required/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Place of birth<span>*</span></label>
                        <div class="col-md-8">
                            <input  type="text" name="birthplace" class="form-control"  value="" placeholder="Place of birth" required/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Date of birth<span>*</span></label>
                        <div class="col-md-8">
                            <div class="birthday">
                                <select name="birthday" class="form-control" required>
                                    <?php for ($i = 1; $i <= 31; $i++) { ?>
                                        <option value="<?php echo $i; ?>" ><?php echo $i; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="birthday">
                                <select name="birthmonth" class="form-control" required>
                                    <?php foreach ($months as $key => $value) { ?>
                                        <option value="<?php echo $key; ?>" ><?php echo $value; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="birthday">
                                <select name="birthyear" class="form-control" required>
                                    <?php for ($i = date('Y') - 1; $i >= 1950; $i--) { ?>
                                        <option value="<?php echo $i; ?>" ><?php echo $i; ?></option>
                                    <?php } ?>
                                </select>
                            </div>

                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Current Address<span>*</span></label>
                        <div class="col-md-8">
                            <input  type="text" name="currentaddress" class="form-control"  value="" placeholder="Current Address" required/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Email Address<span>*</span></label>
                        <div class="col-md-8">
                            <input  type="email" name="email" class="form-control email"  value="" placeholder="Email Address" required/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Confirm Email<span>*</span></label>
                        <div class="col-md-8">
                            <input  type="email" name="confirmemail" class="form-control"  value="" placeholder="Confirm Email Address" required/>
                        </div>
                    </div>
                    <div id="employment">
                        <h4 class="heading">Employment Info</h4>
                        <div class="employment">
                            <div class="form-group">
                                <label class="col-md-4 control-label">Conpany Name<span>*</span></label>
                                <div class="col-md-8">
                                    <input  type="text" name="companyname[]" class="form-control"  value="" placeholder="Conpany Name" required/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Conpany Address<span>*</span></label>
                                <div class="col-md-8">
                                    <input type="text" id="companyaddress_1" name="companyaddress[]" class="form-control"  value="" placeholder="Conpany Address" required/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Phone Number<span>*</span></label>
                                <div class="col-md-8">
                                    <input  type="number" name="phonenumber[]" class="form-control"  value="" placeholder="Phone Number" required/>
                                </div>
                            </div>
                        </div>
                        <div class="add-btn"><i class="glyphicon glyphicon-plus " ></i></div>
                    </div>
                    <div id="skill">
                        <h4 class="heading">Skill Info</h4>
                        <div class="skill">
                            <div class="form-group">
                                <label class="col-md-4 control-label">Skill Name<span>*</span></label>
                                <div class="col-md-8">
                                    <input  type="text" name="skillname[]" class="form-control"  value="" placeholder="Skill Name" required/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Year Of Experience<span>*</span></label>
                                <div class="col-md-8">
                                    <select id="skillexp_1" name="skillexp[]" class="form-control" required>
                                        <?php for ($i = 1; $i <= 20; $i++) { ?>
                                            <option value="<?php echo $i; ?>" ><?php echo $i; ?> Year</option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>

                        </div>
                        <div class="add-btn"><i class="glyphicon glyphicon-plus " ></i></div>
                    </div>
                    <div class="form-group">
                        <input  type="submit" name="submit" value="Apply" class="btn btn-default submit-btn"/>

                    </div>
                </form>
            </div>
        </div>
    </body>
</html>