<?php
/**
 * Created by PhpStorm.
 * User: Lincoln
 * Date: 11/7/2017
 * Time: 12:15 PM
 */

require_once 'db-config.php';
function sec_session_start()
{
    $session_name = 'sec_session_id';   // Set a custom session name
    /*Sets the session name.
     *This must come before session_set_cookie_params due to an undocumented bug/feature in PHP.
     */
    session_name($session_name);

    $secure = true;
    // This stops JavaScript being able to access the session id.
    $httponly = true;
    // Forces sessions to only use cookies.
    if (ini_set('session.use_only_cookies', 1) === FALSE) {
        header("Location: ../admin/?err=Could not initiate a safe session (ini_set)");
        exit();
    }
    // Gets current cookies params.
    //$cookieParams = session_get_cookie_params();
    /*session_set_cookie_params($cookieParams["lifetime"],
        $cookieParams["path"],
        $cookieParams["domain"],
        $secure,
        $httponly);*/

    session_start();            // Start the PHP session
    session_regenerate_id(true);    // regenerated the session, delete the old one.
}

function login($email, $password, $mysqli)
{
    // Using prepared statements means that SQL injection is not possible.
    if ($stmt = $mysqli->prepare("SELECT id, username, password,role 
        FROM users
       WHERE email = ?
        LIMIT 1")) {
        $stmt->bind_param('s', $email);  // Bind "$email" to parameter.
        $stmt->execute();    // Execute the prepared query.
        $stmt->store_result();

        // get variables from result.
        $user_id = '';
        $username = '';
        $db_password = '';
        $role = '';
        $stmt->bind_result($user_id, $username, $db_password, $role);
        $stmt->fetch();

        if ($stmt->num_rows == 1) {
            // If the user exists we check if the account is locked
            // from too many login attempts

            if (checkBrute($user_id, $mysqli) == true) {
                // Account is locked
                // Send an email to user saying their account is locked
                return false;
            } else {
                // Check if the password in the database matches
                // the password the user submitted. We are using
                // the password_verify function to avoid timing attacks.
                $password = hash('sha512', $password);
                if ($password == $db_password) {
                    // Password is correct!
                    // Get the user-agent string of the user.
                    $user_browser = $_SERVER['HTTP_USER_AGENT'];
                    // XSS protection as we might print this value
                    $user_id = preg_replace("/[^0-9]+/", "", $user_id);
                    $_SESSION['user_id'] = $user_id;
                    // XSS protection as we might print this value
                    $username = preg_replace("/[^a-zA-Z0-9_\-]+/",
                        "",
                        $username);
                    $_SESSION['timestamp'] = time();
                    $_SESSION['username'] = $username;
                    $_SESSION['role'] = $role;
                    $_SESSION['login_string'] = hash('sha512',
                        $db_password . $user_browser);
                    $now = date("d-m-Y");
                    $check_id = $user_id + $now;
                    //$mysqli->query("INSERT INTO checkin(user_id,user, date_time,check_id)
                    // VALUES ('$user_id','$username', '$now','$check_id')");
                    // Login successful.
                    return true;
                } else {
                    // Password is not correct
                    // We record this attempt in the database
                    $now = time();
                    $mysqli->query("INSERT INTO login_attempts(user_id, time)
                                    VALUES ('$user_id', '$now')");
                    return false;
                }
            }
        } else {
            // No user exists.
            return false;
        }
    }
}


function checkBrute($user_id, $mysqli)
{
    // Get timestamp of current time
    $now = time();

    // All login attempts are counted from the past 2 hours.
    $valid_attempts = $now - (2 * 60 * 60);

    if ($stmt = $mysqli->prepare("SELECT time 
                             FROM login_attempts 
                             WHERE user_id = ? 
                            AND time > '$valid_attempts'")) {
        $stmt->bind_param('i', $user_id);

        // Execute the prepared query.
        $stmt->execute();
        $stmt->store_result();

        // If there have been more than 5 failed logins
        if ($stmt->num_rows > 5) {
            $value = true;
        } else {
            $value = false;
        }
    }
    return $value;
}


function login_check($mysqli)
{
    // Check if all session variables are set
    if (isset($_SESSION['user_id'],
        $_SESSION['username'],
        $_SESSION['login_string'])) {

        $user_id = $_SESSION['user_id'];
        $login_string = $_SESSION['login_string'];
        $username = $_SESSION['username'];
        $role = $_SESSION['role'];

        // Get the user-agent string of the user.
        $user_browser = $_SERVER['HTTP_USER_AGENT'];

        if ($stmt = $mysqli->prepare("SELECT password 
                                      FROM users 
                                      WHERE id = ? LIMIT 1")) {
            // Bind "$user_id" to parameter.
            $stmt->bind_param('i', $user_id);
            $stmt->execute();   // Execute the prepared query.
            $stmt->store_result();

            if ($stmt->num_rows == 1) {
                // If the user exists get variables from result.
                $password = '';
                $stmt->bind_result($password);
                $stmt->fetch();
                $login_check = hash('sha512', $password . $user_browser);


                if ($login_check == $login_string) {
                    // Logged In!!!!
                    return true;
                } else {
                    // Not logged in
                    return false;
                }


            } else {
                // Not logged in
                return false;
            }
        } else {
            // Not logged in
            return false;
        }
    } else {
        // Not logged in
        return false;
    }
}

function esc_url($url)
{

    if ('' == $url) {
        return $url;
    }

    $url = preg_replace('|[^a-z0-9-~+_.?#=!&;,/:%@$\|*\'()\\x80-\\xff]|i', '', $url);

    $strip = array('%0d', '%0a', '%0D', '%0A');
    $url = (string)$url;

    $count = 1;
    while ($count) {
        $url = str_replace($strip, '', $url, $count);
    }

    $url = str_replace(';//', '://', $url);

    $url = htmlentities($url);

    $url = str_replace('&amp;', '&#038;', $url);
    $url = str_replace("'", '&#039;', $url);

    if ($url[0] !== '/') {
        // We're only interested in relative links from $_SERVER['PHP_SELF']
        return '';
    } else {
        return $url;
    }
}

function createTables($mysqli)
{
    //Create airway bill table
    $mysqli->query("CREATE TABLE IF NOT EXISTS bills(id INT(11) NOT NULL AUTO_INCREMENT,billno VARCHAR(30) NOT NULL,
                    skr VARCHAR(50),origin VARCHAR(30),destination VARCHAR(30),
                    weight VARCHAR(30),rar VARCHAR(30),duty VARCHAR(30), edd VARCHAR(30),
                    consignor VARCHAR(100),consignee VARCHAR(100),details VARCHAR(100) ,PRIMARY KEY(id) )AUTO_INCREMENT=1");

    //create Shipment table
    $mysqli->query("CREATE TABLE IF NOT EXISTS shipment(id INT(11) NOT NULL AUTO_INCREMENT,bol VARCHAR(30) NOT NULL,
                    skr VARCHAR(30) ,origin VARCHAR(30),destination VARCHAR(30),containerno VARCHAR(30),
                    no_of_containers VARCHAR(30),weight VARCHAR(30),rar VARCHAR(30),duty VARCHAR(30), edd VARCHAR(30),
                    shipper VARCHAR(100),consignor VARCHAR(100),consignee VARCHAR(100),details VARCHAR(100) ,PRIMARY KEY(id) )AUTO_INCREMENT=1");
    //create the users Table
    $mysqli->query("CREATE TABLE IF NOT EXISTS users (id int(11) NOT NULL AUTO_INCREMENT,username varchar(30) NOT NULL,
                    email varchar(30) NOT NULL,password varchar(200) NOT NULL,role varchar(30) DEFAULT NULL,PRIMARY KEY (id)
                    ) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;");

    //create the Login Attempts Table
    $mysqli->query("CREATE TABLE IF NOT EXISTS login_attempts (user_id int(11) NOT NULL,time varchar(30) NOT NULL
                    ) ENGINE=InnoDB DEFAULT CHARSET=latin1;");

    //create prefixes table
    $mysqli->query("CREATE TABLE IF NOT EXISTS prefixes (id int(11) NOT NULL AUTO_INCREMENT,
                    prefix varchar(4) DEFAULT NULL,owner varchar(60) DEFAULT NULL,website varchar(41) DEFAULT NULL,
                    owner_abbreviation varchar(15) DEFAULT NULL,photo varchar(60) DEFAULT NULL,PRIMARY KEY (id)
                    ) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;");

    //create prefixes table
    $mysqli->query("CREATE TABLE IF NOT EXISTS billstatus (id int(11) NOT NULL AUTO_INCREMENT,
                    billno varchar(15) DEFAULT NULL,location varchar(60) DEFAULT NULL,status varchar(200) DEFAULT NULL,
                    status_date varchar(15), PRIMARY KEY (id)
                    ) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;");
}

function activePage($menu, $page)
{
    if ($menu == $page) echo " active";
}

function getBills($mysqli)
{
    $prep_stmt = "SELECT * FROM bills";
    $stmt = $mysqli->prepare($prep_stmt);
    $stmt->execute();
    $stmt->store_result();
    $id = '';
    $billNo = '';
    $skr='';
    $origin = '';
    $destination = '';
    $weight = '';
    $rar = '';
    $duty = '';
    $edd = '';
    $consignor = '';
    $consignee = '';
    $details = '';
    $stmt->bind_result($id, $billNo,$skr,  $origin, $destination, $weight
        , $rar, $duty, $edd, $consignor, $consignee, $details);
    while ($stmt->fetch()) {
        echo '<tr>
                                <td>' . $id . '</td>
                                <td><a href="../admin/billstatus.php?id='.$id.'" class="text-bold-600">' . $billNo . '</a>
                                <p class="text-muted">From '.$origin.' to  '.$destination.'</p>
                                </td>
                                <td><span class="tag tag-default tag-success">In progress</span></td>
                                <td>
                                <fieldset class="form-group position-relative has-icon-left">
			                            <div>
			                                <i class="icon-calendar5"></i>
			                            	<input type="text" class="form-control datepicker-default no-border px-1 pt-0" id="date-picker-19" placeholder="Icon Left, Default Input" value="' . date("d,M Y", strtotime($edd)) . '">
			                            </div>
			                        </fieldset>
                                </td>
                                <td>' . $consignee . '</td>
                                <td>
				                	<span class="dropdown">
				                        <button id="btnSearchDrop20" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" class="btn btn-primary dropdown-toggle dropdown-menu-right"><i class="icon-cog3"></i></button>
				                        <span aria-labelledby="btnSearchDrop20" class="dropdown-menu mt-1 dropdown-menu-right">
				                            <a href="../admin/billstatus.php?id='.$id.'" class="dropdown-item"><i class="icon-eye6"></i> Open Task</a>
				                            <a href="#" class="dropdown-item"><i class="icon-pen3"></i> Edit Task</a>
				                            <a href="#" class="dropdown-item"><i class="icon-check2"></i> Complete Task</a>
				                            <a href="#" class="dropdown-item"><i class="icon-outbox"></i> Assign to</a>
				                            <span class="dropdown-divider"></span>
				                            <a href="#" class="dropdown-item"><i class="icon-trash4"></i> Delete Task</a>
				                        </span>
				                    </span>
				                </td>
                            </tr>';
    }
}

function getContainerPrefixes($mysqli)
{
    $prep_stmt = "SELECT * FROM prefixes";
    $stmt = $mysqli->prepare($prep_stmt);
    $stmt->execute();
    $stmt->store_result();
    $id = '';
    $prefix = '';
    $owner = '';
    $website = '';
    $abbreviation = '';
    $photo = '';

    $stmt->bind_result($id, $prefix, $owner, $website, $abbreviation, $photo);
    while ($stmt->fetch()) {
        echo '<tr>
                                <td>' . $id . '</td>
                                <td>' . $prefix . '</td>
                                <td><a href="' . $website . '" class="card-link indigo darken-2">' . $owner . '</a></td>
                                <td>' . $abbreviation . '</td>
                                <td><a href="' . $photo . '" target="_blank" class="btn btn-outline-deep-orange">View</a></td>
                            </tr>';
    }
}

function getUsers($mysqli)
{
    $prep_stmt = "SELECT id,username,email,role FROM users";
    $stmt = $mysqli->prepare($prep_stmt);
    $stmt->execute();
    $stmt->store_result();
    $id = '';
    $username = '';
    $email = '';
    $role = '';
    $stmt->bind_result($id, $username, $email, $role);
    while ($stmt->fetch()) {
        echo '<tr>
            <td>' . $id . '</td>
            <td><a href="../includes/register.inc.php?id='.$id.'" class="media-heading">' . $username . '</a></td>
            <td>' . $email . '</td>
            <td>' . $role . '</td>
            <td>
				                	<span class="dropdown">
				                        <button id="btnSearchDrop2" type="button" data-toggle="dropdown"  class="btn btn-primary dropdown-toggle dropdown-menu-right"><i class="icon-cog3"></i></button>
				                        <span aria-labelledby="btnSearchDrop2" class="dropdown-menu mt-1 dropdown-menu-right">
				                            <a href="#" class="dropdown-item"><i class="icon-pen3"></i> Edit</a>
				                            <a href="../includes/register.inc.php?id='.$id.'&q=remove" class="dropdown-item"><i class="icon-trash4"></i> Delete</a>
				                        </span>
				                    </span>
				                </td>
        </tr>';
    }
}

function getShipment($mysqli){
    $prep_stmt = "SELECT * FROM shipment";
    $stmt = $mysqli->prepare($prep_stmt);
    $stmt->execute();
    $stmt->store_result();
    $id = '';
    $skr = '';
    $bol = '';
    $origin = '';
    $destination = '';
    $containerNo = '';
    $NoOfContainers = '';
    $weight = '';
    $rar = '';
    $duty = '';
    $edd = '';
    $shipper = '';
    $consignor = '';
    $consignee = '';
    $details = '';
    $stmt->bind_result($id,  $bol,$skr, $origin, $destination, $containerNo, $NoOfContainers, $weight
        , $rar, $duty, $edd, $shipper, $consignor, $consignee, $details);
    while ($stmt->fetch()) {
        echo '<tr>
                                <td>' . $id . '</td>
                                <td>' . $bol . '</td>
                                <td>' . $origin . '</td>
                                <td>' . $destination . '</td>
                                <td>' . $skr . '</td>
                                <td></td>
                            </tr>';
    }
}

function getBillStatus($mysqli,$billNo)
{
    if($billNo==null){
        $prep_stmt = "SELECT * FROM billstatus";
    }else{
        $prep_stmt = "SELECT * FROM billstatus WHERE billno=".$billNo;}

    $stmt = $mysqli->prepare($prep_stmt);
    $stmt->execute();
    $stmt->store_result();
    $id = '';
    $billNo = '';
    $location = '';
    $status = '';
    $date = '';

    $stmt->bind_result($id, $billNo, $location, $status, $date);
    while ($stmt->fetch()) {
        echo '<tr>
                                <td>' . $date . '</td>
                                <td>' . $location . '</td>
                                <td><a href="../includes/bill.inc.php?id=' . $id . '" class="card-link indigo darken-2">' . $status . '</a></td>
                                <td>
				                	<span class="dropdown">
				                        <button id="btnSearchDrop2" type="button" data-toggle="dropdown"  class="btn btn-primary dropdown-toggle dropdown-menu-right"><i class="icon-cog3"></i></button>
				                        <span aria-labelledby="btnSearchDrop2" class="dropdown-menu mt-1 dropdown-menu-right">
				                            <a href="#" class="dropdown-item"><i class="icon-pen3"></i> Edit</a>
				                            <a href="../includes/bill.inc.php?id='.$id.'&q=remove" class="dropdown-item"><i class="icon-trash4"></i> Delete</a>
				                        </span>
				                    </span>
				                </td>
                            </tr>';
    }
}
function sendMail($to,$subject,$message)
{
// To send HTML mail, the Content-type header must be set
    $headers[] = 'MIME-Version: 1.0';
    $headers[] = 'Content-type: text/html; charset=iso-8859-1';

// Mail it
    mail($to, $subject, $message, implode("\r\n", $headers));
}

function rootUrl($url) {
    $urlParts = preg_split('#(?<!/)/(?!/)#', $url, 2);
    return $urlParts[0] != '' ? $urlParts[0] . '/' : '';
}

function countRows($mysqli,$table)
{
    $stmt = $mysqli->prepare("SELECT * FROM ".$table);
    $stmt->execute();   // Execute the prepared query.
    $stmt->store_result();
    $num_rows=$stmt->num_rows();
    if($num_rows>1){return $num_rows;}else{
        return 'None';
    }

}
