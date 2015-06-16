<?php
require_once './include/MainConfig.php';
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
                    <?php require_once './include/sideBar.php'; ?>
                    <div class="col-lg-10 ">
                        <div class="page-header">
                            <h3>New Employee <small> Employee Details </small></h3>
                        </div>
                        <div class="row">
                         <div role="tabpanel">

                          <!-- Nav tabs -->
                          <ul class="nav nav-tabs" role="tablist" id="tabby">
                            <li role="presentation" class="active"><a href="#personalInfo" aria-controls="Personal Infomation" role="tab" data-toggle="tab">Personal Information</a></li>
                            <li role="presentation"><a href="#guardian" aria-controls="Guardian" role="tab" data-toggle="tab">Guardian</a></li>
                            <li role="presentation"><a href="#children" aria-controls="Children" role="tab" data-toggle="tab">Children</a></li>
                            <li role="presentation"><a href="#education" aria-controls="Education" role="tab" data-toggle="tab">Education</a></li>
                          </ul>

                          <!-- Tab panes -->
                          <div class="tab-content">
                            <div role="tabpanel" class="tab-pane fade in active" id="personalInfo"></br>
                                <!-- Personal Info content start-->
                                <div class="col-md-5">
                                    <div class="panel highlight">
                                        <div class="form-horizontal">
                                            <div class="form-group">
                                                <label for="empId" class="col-lg-4 control-label">Employee ID:</label>
                                                <div class="col-lg-6">
                                                    <input type="text" class="form-control" id="empId" name="empId" placeholder="Employee ID">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="fullName" class="col-lg-4 control-label">Full Name:</label>
                                                <div class="col-lg-6">
                                                    <input type="text" class="form-control" id="fullName" name="fullName" placeholder="Enter Full Name">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="addrLine1" class="col-lg-4 control-label">Address Line 1:</label>
                                                <div class="col-lg-6">
                                                    <input type="text" class="form-control" id="addrLine1" name="addrLine1" placeholder="Enter Address">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="addrLine2" class="col-lg-4 control-label">Address Line 2:</label>
                                                <div class="col-lg-6">
                                                    <input type="text" class="form-control" id="addrLine2" name="addrLine2" placeholder="Enter Address">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="addrLine3" class="col-lg-4 control-label">Address Line 3:</label>
                                                <div class="col-lg-6">
                                                    <input type="text" class="form-control" id="addrLine3" name="addrLine3" placeholder="Enter Address">
                                                </div>
                                            </div>

                                            <!--                                            <div class="form-group"><label class="col-lg-4">Contact Details</label></div>-->
                                            <div class="form-group">
                                                <label for="contactRes" class="col-lg-4 control-label">Residence No:</label>
                                                <div class="col-lg-6">
                                                    <input type="text" class="form-control" id="contactRes" name="contactRes" placeholder="Residence">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="contactMob" class="col-lg-4 control-label">Mobile No:</label>
                                                <div class="col-lg-6">
                                                    <input type="text" class="form-control" id="contactMob" name="contactMob" placeholder="Mobile">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="contactOff" class="col-lg-4 control-label">Office No:</label>
                                                <div class="col-lg-6">
                                                    <input type="text" class="form-control" id="contactOff" name="contactOff" placeholder="Office">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="email" class="col-lg-4 control-label">Email:</label>
                                                <div class="col-lg-6">
                                                    <input type="text" class="form-control" id="email" name="email" placeholder="Enter Address">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="gender" class="col-lg-4 control-label">Gender:</label>
                                                <div class="col-lg-5">
                                                    <select  class="form-control genderComboBox">
                                                        <option value="MALE">Male</option>
                                                        <option value="FEMALE">Female</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="dob" class="col-lg-4 control-label">Date Of Birth:</label>
                                                <div class="col-lg-6">
                                                    <input type="text" class="form-control datepicker" id="dob" name="dob" placeholder="Enter DOB">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="nicNo" class="col-lg-4 control-label">NIC No:</label>
                                                <div class="col-lg-6">
                                                    <input type="text" class="form-control" id="nicNo" name="nicNo" placeholder="NIC No">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="provinceId" class="col-lg-4 control-label">Province:</label>
                                                <div class="col-lg-5">
                                                    <select  class="form-control provinceComboBox"></select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="districtId" class="col-lg-4 control-label">District:</label>
                                                <div class="col-lg-5">
                                                    <select  class="form-control districtComboBox"></select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="agaDivId" class="col-lg-4 control-label">AGA Division:</label>
                                                <div class="col-lg-5">
                                                    <select  class="form-control agaDivComboBox"></select>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="gsDivId" class="col-lg-4 control-label">GS Division:</label>
                                                <div class="col-lg-5">
                                                    <select  class="form-control gsDivisionComboBox"></select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="electId" class="col-lg-4 control-label">Electorate:</label>
                                                <div class="col-lg-5">
                                                    <select  class="form-control electorateComboBox"></select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="nationalityId" class="col-lg-4 control-label">Nationality:</label>
                                                <div class="col-lg-5">
                                                    <select  class="form-control nationalityComboBox"></select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="religion" class="col-lg-4 control-label">Religion:</label>
                                                <div class="col-lg-6">
                                                    <input type="text" class="form-control" id="religion" name="religion" placeholder="Religion">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="civilStatId" class="col-lg-4 control-label">Civil Status:</label>
                                                <div class="col-lg-5">
                                                    <select  class="form-control civilStatComboBox"></select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="drivLicNo" class="col-lg-4 control-label">Driving License No:</label>
                                                <div class="col-lg-6">
                                                    <input type="text" class="form-control" id="drivLicNo" name="drivLicNo" placeholder="Licence No">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="chidCnt" class="col-lg-4 control-label">No of Children:</label>
                                                <div class="col-lg-6">
                                                    <input type="text" class="form-control" id="chidCnt" name="chidCnt" placeholder="No Of Children">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-lg-offset-2 col-lg-10">
                                                        <span id="userSaveBtn">
                                                            <button class="btn btn-success" id="empSave"><i class="fa fa-save fa-lg"></i>&nbsp;Save</button>
                                                            <button type="button" class="btn btn-default" id="next" onclick="nextTab('guardian')"> Next&nbsp;<i class="fa fa-arrow-right"></i></button>

                                                        </span>
                                                        <span id="userActionBtn" class="hidden">
                                                            <button class="btn btn-warning" id="empUpdate"><i class="fa fa-edit fa-lg"></i>&nbsp;Update</button>
                                                            <button class="btn btn-danger" id="empDelete"><i class="fa fa-trash-o fa-lg"></i>&nbsp;Delete</button>
                                                            <button class="btn btn-primary" id="empClear"><i class="fa fa-refresh fa-lg fa-spin"></i>&nbsp;Clear</button>
                                                        </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-7">
                                    <div class="panel panel-primary">
                                        <div class="panel-heading">
                                            <h3 class="panel-title"><i class="icon-bar-chart"></i>User Information</h3>
                                        </div>
                                        <div class="panel-body">
                                            <div class="scrollable" style="height: 400px; overflow-y: auto">
                                                <table class="table table-bordered table-striped table-hover" id="user_side_table">
                                                    <thead>
                                                    <tr>
                                                        <th>##</th>
                                                        <th>User Id</th>
                                                        <th>First Name</th>
                                                        <th>Last Name</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <!-- Personal Info sample content end-->
                            </div>
                            <div role="tabpanel" class="tab-pane fade" id="guardian"></br>
                                <!-- Guardian content start-->
                                <div class="col-md-5 highlight">
                                    <div class="form-horizontal">
                                        <div class="form-group">
                                            <label for="empId" class="col-lg-4 control-label">Employee ID:</label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="empId" name="empId" placeholder="Employee ID">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="fullName" class="col-lg-4 control-label">Guardian Type:</label>
                                            <div class="col-lg-5">
                                                <select  class="form-control guardianComboBox">
                                                    <option value="FATHER">Father</option>
                                                    <option value="MOTHER">Mother</option>
                                                    <option value="SPOUSE">Spouse</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="addrLine1" class="col-lg-4 control-label">Name</label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="dob" class="col-lg-4 control-label">Date Of Birth:</label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control datepicker" id="dob" name="dob" placeholder="Enter DOB">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="nationalityId" class="col-lg-4 control-label">Nationality:</label>
                                            <div class="col-lg-5">
                                                <select  class="form-control nationalityComboBox"></select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="religion" class="col-lg-4 control-label">Religion:</label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="religion" name="religion" placeholder="Religion">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="employment" class="col-lg-4 control-label">Employment:</label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="employment" name="employment" placeholder="Employment">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="workPlace" class="col-lg-4 control-label">Place of Work:</label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="workPlace" name="workPlace" placeholder="Work Place">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="contactRes" class="col-lg-4 control-label">Residence No:</label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="contactRes" name="contactRes" placeholder="Residence">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="contactMob" class="col-lg-4 control-label">Mobile No:</label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="contactMob" name="contactMob" placeholder="Mobile">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="contactOff" class="col-lg-4 control-label">Office No:</label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="contactOff" name="contactOff" placeholder="Office">
                                            </div>
                                        </div>



                                        <div class="form-group">
                                            <div class="col-lg-offset-2 col-lg-10">
                                                    <span id="userSaveBtn">
                                                        <button class="btn btn-success" id="empSave"><i class="fa fa-save fa-lg"></i>&nbsp;Save</button>
                                                        <button type="button" class="btn btn-default" id="next" onclick="nextTab('children')"> Next&nbsp;<i class="fa fa-arrow-right"></i></button>
                                                    </span>
                                                    <span id="userActionBtn" class="hidden">
                                                        <button class="btn btn-warning" id="empUpdate"><i class="fa fa-edit fa-lg"></i>&nbsp;Update</button>
                                                        <button class="btn btn-danger" id="empDelete"><i class="fa fa-trash-o fa-lg"></i>&nbsp;Delete</button>
                                                        <button class="btn btn-primary" id="empClear"><i class="fa fa-refresh fa-lg fa-spin"></i>&nbsp;Clear</button>
                                                    </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-7">
                                    <div class="panel panel-primary">
                                        <div class="panel-heading">
                                            <h3 class="panel-title"><i class="icon-bar-chart"></i>User Information</h3>
                                        </div>
                                        <div class="panel-body">
                                            <div class="scrollable" style="height: 400px; overflow-y: auto">
                                                <table class="table table-bordered table-striped table-hover" id="user_side_table">
                                                    <thead>
                                                    <tr>
                                                        <th>##</th>
                                                        <th>User Id</th>
                                                        <th>First Name</th>
                                                        <th>Last Name</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Guardian content end-->
                            </div>
                            <div role="tabpanel" class="tab-pane fade" id="children"></br>
                                <!-- Children content start-->
                                <div class="col-md-5 highlight">
                                    <div class="form-horizontal">
                                        <div class="form-group">
                                            <label for="empId" class="col-lg-4 control-label">Employee ID:</label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="empId" name="empId" placeholder="Employee ID">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="childCnt" class="col-lg-4 control-label">No of Children:</label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="childCnt" name="childCnt" placeholder="No of Children ">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="name" class="col-lg-4 control-label">Name:</label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="dob" class="col-lg-4 control-label">Date Of Birth:</label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control datepicker" id="dob" name="dob" placeholder="Enter DOB">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="schoolName" class="col-lg-4 control-label">School Name:</label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="schoolName" name="schoolName" placeholder="Enter School Name">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="highEduDet" class="col-lg-4 control-label">Higher Educational Details:</label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="highEduDet" name="highEduDet" placeholder="Higher Educational Data">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="gender" class="col-lg-4 control-label">Gender:</label>
                                            <div class="col-lg-5">
                                                <select  class="form-control genderComboBox">
                                                    <option value="MALE">Male</option>
                                                    <option value="FEMALE">Female</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="civilStatId" class="col-lg-4 control-label">Civil Status:</label>
                                            <div class="col-lg-5">
                                                <select  class="form-control civilStatComboBox"></select>
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <div class="col-lg-offset-2 col-lg-10">
                                                    <span id="userSaveBtn">
                                                        <button class="btn btn-success" id="empSave"><i class="fa fa-save fa-lg"></i>&nbsp;Save</button>
                                                        <button type="button" class="btn btn-default" id="next" onclick="nextTab('education')"> Next&nbsp;<i class="fa fa-arrow-right"></i></button>
                                                    </span>
                                                    <span id="userActionBtn" class="hidden">
                                                        <button class="btn btn-warning" id="empUpdate"><i class="fa fa-edit fa-lg"></i>&nbsp;Update</button>
                                                        <button class="btn btn-danger" id="empDelete"><i class="fa fa-trash-o fa-lg"></i>&nbsp;Delete</button>
                                                        <button class="btn btn-primary" id="empClear"><i class="fa fa-refresh fa-lg fa-spin"></i>&nbsp;Clear</button>
                                                    </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-7">
                                    <div class="panel panel-primary">
                                        <div class="panel-heading">
                                            <h3 class="panel-title"><i class="icon-bar-chart"></i>User Information</h3>
                                        </div>
                                        <div class="panel-body">
                                            <div class="scrollable" style="height: 400px; overflow-y: auto">
                                                <table class="table table-bordered table-striped table-hover" id="user_side_table">
                                                    <thead>
                                                    <tr>
                                                        <th>##</th>
                                                        <th>User Id</th>
                                                        <th>First Name</th>
                                                        <th>Last Name</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <!-- Children content end-->
                            </div>
                            <div role="tabpanel" class="tab-pane fade" id="education"></br>
                                <!-- Education content start-->

                            <div class="col-md-5 highlight">
                                <div class="form-horizontal">
                                    <div class="form-group">
                                        <label for="empId" class="col-lg-4 control-label">Employee ID:</label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" id="empId" name="empId" placeholder="Employee ID">
                                        </div>
                                    </div>
                                    <!--                                            <div class="form-group">-->
                                    <!--                                                <label for="childCnt" class="col-lg-4 control-label">No of Children:</label>-->
                                    <!--                                                <div class="col-lg-6">-->
                                    <!--                                                    <input type="text" class="form-control" id="childCnt" name="childCnt" placeholder="No of Children ">-->
                                    <!--                                                </div>-->
                                    <!--                                            </div>-->
                                    <!--                                            <div class="form-group">-->
                                    <!--                                                <label for="name" class="col-lg-4 control-label">Name:</label>-->
                                    <!--                                                <div class="col-lg-6">-->
                                    <!--                                                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name">-->
                                    <!--                                                </div>-->
                                    <!--                                            </div>-->
                                    <div class="form-group">
                                        <label for="schoolName" class="col-lg-4 control-label">School Attended:</label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" id="schoolName" name="schoolName" placeholder="Enter School Name">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="dob" class="col-lg-4 control-label">School left year:</label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control datepicker" id="dob" name="dob" placeholder="Enter DOB">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="yearOL" class="col-lg-4 control-label">Ordinary Level Year:</label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control datepicker" id="yearOL" name="yearOL" placeholder="Select Year">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="examNoOL" class="col-lg-4 control-label">Exam Number:</label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" id="examNoOL" name="examNoOL" placeholder="Exam Number">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="mediumOL" class="col-lg-4 control-label">Exam Medium:</label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" id="mediumOL" name="mediumOL" placeholder="Medium">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="subjectOL" class="col-lg-4 control-label">Subject Name:</label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" id="subjectOL" name="subjectOL" placeholder="Medium">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="resultOL" class="col-lg-4 control-label">Results:</label>
                                        <div class="col-lg-4">
                                            <input type="text" class="form-control" id="resultOL" name="resultOL" placeholder="Result">
                                        </div>
                                        <div class="col-lg-2">
                                                    <span id="userSaveBtn">
                                                        <button class="btn btn-success" id="empSave">Add</button>
                                                    </span>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="yearAL" class="col-lg-4 control-label">Advanced Level Year:</label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control datepicker" id="yearAL" name="yearAL" placeholder="Select Year">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="examNoAL" class="col-lg-4 control-label">Exam Number:</label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" id="examNoAL" name="examNoAL" placeholder="Exam Number">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="mediumAL" class="col-lg-4 control-label">Exam Medium:</label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" id="mediumAL" name="mediumAL" placeholder="Medium">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="subjectAL" class="col-lg-4 control-label">Subject Name:</label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" id="subjectAL" name="subjectAL" placeholder="Medium">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="resultAL" class="col-lg-4 control-label">Results:</label>
                                        <div class="col-lg-4">
                                            <input type="text" class="form-control" id="resultAL" name="resultAL" placeholder="Result">
                                        </div>
                                        <div class="col-lg-2">
                                                    <span id="userSaveBtn">
                                                        <button class="btn btn-success" id="empSave">Add</button>
                                                    </span>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="highEduDet" class="col-lg-8 control-label">Higher Educational Details</label>
                                    </div>
                                    <div class="form-group">
                                        <label for="degreeName" class="col-lg-4 control-label">Degree/Diploma Name:</label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" id="degreeName" name="degreeName" placeholder="Higher Educational Data">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="degreeYear" class="col-lg-4 control-label">Year Obtained:</label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control datepicker" id="degreeYear" name="degreeYear" placeholder="Higher Educational Data">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="degreeInstitute" class="col-lg-4 control-label">Institute:</label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" id="degreeInstitute" name="degreeInstitute" placeholder="Higher Educational Data">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="highEduDet" class="col-lg-8 control-label">Professional Qualifications</label>
                                    </div>
                                    <div class="form-group">
                                        <label for="profName" class="col-lg-4 control-label">Course Details:</label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" id="profName" name="profName" placeholder="Professional Qualification">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="profYear" class="col-lg-4 control-label">Year Obtained:</label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control datepicker" id="profYear" name="profYear" placeholder="Higher Educational Data">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="profInstitute" class="col-lg-4 control-label">Institute:</label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" id="profInstitute" name="profInstitute" placeholder="Higher Educational Data">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="highEduDet" class="col-lg-8 control-label">Other Qualifications</label>
                                    </div>
                                    <div class="form-group">
                                        <label for="otherDetail" class="col-lg-4 control-label">Details:</label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" id="otherDetail" name="otherDetail" placeholder="Other Qualification">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-lg-offset-2 col-lg-10">
                                                    <span id="userSaveBtn">
                                                        <button class="btn btn-success" id="empSave"><i class="fa fa-save fa-lg"></i>&nbsp;Save</button>
                                                    </span>
                                                    <span id="userActionBtn" class="hidden">
                                                        <button class="btn btn-warning" id="empUpdate"><i class="fa fa-edit fa-lg"></i>&nbsp;Update</button>
                                                        <button class="btn btn-danger" id="empDelete"><i class="fa fa-trash-o fa-lg"></i>&nbsp;Delete</button>
                                                        <button class="btn btn-primary" id="empClear"><i class="fa fa-refresh fa-lg fa-spin"></i>&nbsp;Clear</button>
                                                    </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-7">
                                <div class="panel panel-primary">
                                    <div class="panel-heading">
                                        <h3 class="panel-title"><i class="icon-bar-chart"></i>User Information</h3>
                                    </div>
                                    <div class="panel-body">
                                        <div class="scrollable" style="height: 400px; overflow-y: auto">
                                            <table class="table table-bordered table-striped table-hover" id="user_side_table">
                                                <thead>
                                                <tr>
                                                    <th>##</th>
                                                    <th>User Id</th>
                                                    <th>First Name</th>
                                                    <th>Last Name</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <!-- Education content start-->
                            </div>

                          </div>

                        </div>   
                        </div> 
                    </div>
                </div>
            </div>
        </div>
        <?php require_once './include/footerBar.php'; ?>
        <?php require_once './include/systemFooter.php'; ?>
    </body>
    <script type="text/javascript" src="js/employee.js"></script>
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
            
            $('#next').click(function(tabID){                
                // nextTab(tabID);
                //$('#tabby a[href="#education"]').tab('show')
            });

        });
        
        function nextTab(tabID){ //alert('get'+tabID);
            $('#tabby a[href="#'+tabID+'"]').tab('show');
        }
    </script>
</html>

