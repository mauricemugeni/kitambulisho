<?php

class Form_Process extends Database {

    public function execute() {
        if ($_POST['action'] == "subscriber") {
            return $this->addSubscriber();
        } else if ($_POST['action'] == "reporting") {
            $item_no = $_POST['item_no'];
            $_SESSION["item_no"] = $item_no;
            return $this->addReport();
        } else if ($_POST['action'] == "report") {
            $category = $_POST['category'];
            $_SESSION['item_type'] = App::cleanText($category);
            // $_SESSION["item_type"] = $category;
            App::redirectTo("?reporting");
            //return $this-> startItemSession($category);
        } else if ($_POST['action'] == "adding") {
            $category = $_POST['category'];
            $_SESSION["item_type"] = $category;
            App::redirectTo("?addDoc");
            //return $this-> startItemSession($category);
        } else if ($_POST['action'] == "addDoc") {
            return $this->addDoc();
            App::redirectTo("?addSuccess");
            //return $this-> startItemSession($category);
        } else if ($_POST['action'] == "deleteDoc") {
            return $this->deleteDoc();
        } else if ($_POST['action'] == "contact") {
            return $this->sendMessage();
        } else if ($_POST['action'] == "confirmUsername") {
            return $this->confirmUsername();
        } else if ($_POST['action'] == "loginer") {
            return $this->logUser();
        } else if ($_POST['action'] == "claimer") {
            $id = $_POST['id'];
            $_SESSION['id'] = $id;
            return $this->updateClaim();
            App::redirectTo("?claimSuccess");
        } else if ($_POST['action'] == "editDoc") {
            return $this->updateMyDocumentDetails();
        } else if ($_POST['action'] == "my_documents") {
            switch ($_POST['update']) {
                case 'del_document':
                    $id = $_POST['id'];
                    $this->deleteDoc($id);
                    break;
            }
        }
    }

    public function getDocs() {
        $del_status = 0;
        $user = $_SESSION['user'];
        $sql = "SELECT * FROM mydocs WHERE owner='$user' AND del_status='$del_status' ORDER BY id ASC";
        $stmt = $this->prepareQuery($sql);
        $stmt->execute();
        $info = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if($info){
        echo "<h3 class='major'>In Records</h3>";
        echo "<table>
                <thead>
                    <tr>
                        <th>ITEM TYPE</th>
                        <th>ITEM NO.</th>
                        <th>HOLDER'S NAME</th>
                        <th>DESCRIPTION</th>
                        <th>EDIT </th>
                        <th>DELETE </th>
                    </tr>
                </thead>
                <tbody>";
        foreach ($info as $data) {
            //echo '<input type="hidden" name="id" value=' . $data['id'] . ' />';
            $id = $data['id'];
            echo '<tr>';
            echo '<td>' . $data['item_type'] . '</td>';
            echo '<td>' . $data['item_no'] . '</td>';
            echo '<td>' . $data['item_name'] . '</td>';
            echo '<td>' . $data['description'] . '</td>';
            echo '<td> <a class="link_to" href="?editDoc&id=' . $data['id'] . '"> Edit </a></td>';
            echo '<td>'
            . '<form method="POST">
            <input type="hidden" name="id" value=' . $data['id'] . ' />
            <input type="hidden" name="action" value="my_documents"/>
            <input type = "submit" name = "update" value = "del_document"> 
            </form></td>';
            echo '</tr>';
        }
        echo "</tbody>
            </table>";
        }else{
            echo 'No Record!';
        }
    }

    public function fetchMyDocumentDetails($id) {
        $sql = "SELECT * FROM mydocs WHERE id=:id";
        $stmt = $this->prepareQuery($sql);
        $stmt->bindParam("id", $id);
        $stmt->execute();
        $info = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $info[0];
    }

    private function updateMyDocumentDetails() {
        $id = $_POST['id'];
        $item_type = $_POST['item_type'];
        $item_no = $_POST['item_no'];
        $item_name = strtoupper($_POST['item_name']);
        $owner = strtoupper($_POST['owner']);
        $description = $_POST['description'];
        $d_time = date("Y-m-d H:m:s.u");
        $sql = "UPDATE mydocs SET item_type=:item_type, item_no=:item_no, item_name=:item_name, owner=:owner, description=:description, d_time=:d_time WHERE id=:id";
        $stmt = $this->prepareQuery($sql);
        $stmt->bindValue("id", $id);
        $stmt->bindValue("item_type", $item_type);
        $stmt->bindValue("item_no", $item_no);
        $stmt->bindValue("item_name", $item_name);
        $stmt->bindValue("owner", $owner);
        $stmt->bindValue("description", $description);
        $stmt->bindValue("d_time", $d_time);
        if ($stmt->execute()) {
            return true;
        } else
            return false;
    }

    private function deleteDoc($id) {
        $del_status = 1;
        $sql = "UPDATE mydocs SET del_status=:del_status WHERE id=:id";
        $stmt = $this->prepareQuery($sql);
        $stmt->bindValue("id", $id);
        $stmt->bindValue("del_status", $del_status);
        $stmt->execute();
    }

    public function confirmUsername() {
        $username = strtoupper($_POST['username']);
        $sql = "SELECT * FROM subscriber WHERE username=:username";
        $stmt = $this->prepareQuery($sql);
        $stmt->bindValue("username", $username);
        $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if ($data) {
            echo '<p class="warning">Username exits. Try again!</p>';
        } else {

            $_SESSION['username'] = $_POST['username'];
            return true;
        }
    }

    public function claimSucces($id) {
        $_SESSION['id'];
        $sql_claim = "SELECT * FROM reports WHERE id=:id";
        $stmt_claim = $this->prepareQuery($sql_claim);
        $stmt_claim->bindValue("id", $id);
        $stmt_claim->execute();
        $info = $stmt_claim->fetchAll(PDO::FETCH_ASSOC);
        return $info[0];
        App::redirectTo("?claimSuccess");
    }

    private function updateClaim() {
        $id = $_POST['id'];
        $claim = '1';
        $person = $_POST['person'];
        $c_time = date("Y-m-d H:m:s.u");
        $sql = "UPDATE reports SET claim=:claim, c_time=:c_time, claimer=:person WHERE id=:id";
        $stmt = $this->prepareQuery($sql);
        $stmt->bindValue("id", $id);
        $stmt->bindValue("claim", $claim);
        $stmt->bindValue("c_time", $c_time);
        $stmt->bindValue("person", $person);
        if ($stmt->execute()) {
            App::redirectTo("?claimSuccess");
            return $this->claimSucces($id);
        } else
            return false;
    }

     public function myReports() {
        if (isset($_SESSION['user'])) {
            $reporter = strtoupper($_SESSION['iname']);
        } else {
            $reporter = 'Anonymous';
        }
        //$item_no = $_POST['search'];
        $selection = array(
            'id',
            'item_type',
            'item_no',
            'item_name',
            'reporter',
            'drop_point',
            'claim');
        $sql = "SELECT " . str_replace(" , ", " ", implode(", ", $selection)) . " "
                . "FROM reports WHERE reporter = '$reporter' ORDER BY id ASC";
        $stmt = $this->prepareQuery($sql);
        $stmt->execute();
        $info = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if ($info) {
            echo "<table>";
            echo "<thead>";
            echo "<th>ITEM TYPE</th>";
            echo "<th>ITEM NO.</th>";
            echo "<th>HOLDER'S NAME</th>";
            echo "<th>PICKUP POINT</th>";
            echo "<th>CLAIM</th>";
            
            echo "<th>EDIT</th>";
            echo "<th>DELETE</th>";
            
            echo "</thead>";
            echo "<tbody>";
            foreach ($info as $data) {
                echo '<tr>';
                echo "<td>" . $data['item_no'] . "</td>";
                echo '<td>' . $data['item_type'] . '</td>';
                echo '<td>' . $data['item_name'] . '</td>';
                echo "<td> <a target='_blank' class='link_to' title='Directions to "
                . $data['drop_point'] . "' href='https://www.google.co.ke/maps/place/"
                . $data['drop_point'] . "'>" . $data['drop_point'] . '</td>';
                echo "<td>";
                if ($data['claim'] == 1) {
                    echo 'CLAIMED';
                } else {
                    echo "UNCLAIMED";
                }
                echo "</td>";
                
                echo '<td> <a class="link_to" href="?editReport&id=' . $data['id'] . '"> Edit </a></td>';
            echo '<td>'
            . '<form method="POST">
            <input type="hidden" name="id" value=' . $data['id'] . ' />
            <input type="hidden" name="action" value="my_reports"/>
            <input type = "submit" name = "update" value = "del_report"> 
            </form></td>';
            echo '</tr>';
                
                echo '</tr>';
            }
            echo "</tbody></table>";
        } else
            echo '<p class="warning">Sorry. No Record! <a href="?report">Report Now!</a></p>';
    }
    
    
    
    public function getReports() {
        if (isset($_SESSION['user'])) {
            $session = strtoupper($_SESSION['user']);
        } else {
            $session = 'Anonymous';
        }
        $item_no = $_POST['search'];
        $selection = array(
            'id',
            'item_type',
            'item_no',
            'item_name',
            'drop_point',
            'claim');
        $sql = "SELECT " . str_replace(" , ", " ", implode(", ", $selection)) . " "
                . "FROM reports WHERE item_no LIKE '%$item_no%' ORDER BY id ASC";
        $stmt = $this->prepareQuery($sql);
        $stmt->execute();
        $info = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if ($info) {
            echo "<table>";
            echo "<thead>";
            echo "<th>ITEM TYPE</th>";
            echo "<th>ITEM NO.</th>";
            echo "<th>HOLDER'S NAME</th>";
            echo "<th>PICKUP POINT</th>";
            echo "<th>CLAIM</th>";
            echo "</thead>";
            echo "<tbody>";
            foreach ($info as $data) {
                echo '<tr>';
                echo '<td> <a class="link_to" href="?editDoc&id=' . $data['item_type'] . '">' . $data['item_type'] . '</a></td>';
                echo "<td>" . $data['item_no'] . "</td>";
                echo '<td>' . $data['item_name'] . '</td>';
                echo "<td> <a target='_blank' class='link_to' title='Directions to "
                . $data['drop_point'] . "' href='https://www.google.co.ke/maps/place/"
                . $data['drop_point'] . "'>" . $data['drop_point'] . '</td>';
                echo "<td>";
                if ($data['claim'] == 1) {
                    echo 'CLAIMED';
                } else {
                    echo "<form method='POST'>
                        <input type='hidden' name='action' value='claimer'/>
                        <input type='hidden' name='id' value='" . $data['id'] . "'/>
                        <input type='hidden' name='person' value='" . $session . "'/>
                        <ul class='actions'>
                            <li><input type='submit' value='CLAIM' /></li>
                        </ul>
                      </form>";
                }
                echo "</td>";
                echo '</tr>';
            }
            echo "</tbody></table>";
        } else
            echo '<p class="warning">Sorry. No Record! <a href="?search">Search Again</a> or '
            . 'Click to <a href="?signing">SignUp!</a> to be notified when found</p>';
    }

    public function fetchDetails($username) {
        $sql = "SELECT * FROM subscriber WHERE username=:username";
        $stmt = $this->prepareQuery($sql);
        $stmt->bindParam("username", $username);
        $stmt->execute();
        $info = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $info[0];
    }

    private function addDoc() {
        $item_type = $_POST['item_type'];
        $item_no = strtoupper($_POST['item_no']);
        $item_name = strtoupper($_POST['item_name']);
        $owner = strtoupper($_POST['owner']);
        $description = $_POST['description'];
        $d_time = date("Y-m-d H:m:s.u");
        
        if ($_SESSION['item_type'] === "STUDENT ID") {
        $institution = strtoupper($_POST['institution_name']);
        } else {
        $institution = 0;    
        }
        
        $sql = "INSERT INTO mydocs(item_type, institution, item_no, item_name, owner, description, d_time) "
                . "VALUES(:item_type, :institution, :item_no, :item_name, :owner, :description, :d_time)";
        $stmt = $this->prepareQuery($sql);
        $stmt->bindValue("item_type", $item_type);
        $stmt->bindValue("institution", $institution);
        $stmt->bindValue("item_no", $item_no);
        $stmt->bindValue("item_name", $item_name);
        $stmt->bindValue("owner", $owner);
        $stmt->bindValue("description", $description);
        $stmt->bindValue("d_time", $d_time);
        $stmt->execute();
        return true;
    }

    public function logUser() {
        $username = strtoupper($_POST['username']);
        $pass = md5($_POST['password']);
        $sql = "SELECT * FROM subscriber WHERE username=:username AND pass=:password";
        $stmt = $this->prepareQuery($sql);
        $stmt->bindValue("username", $username);
        $stmt->bindValue("password", $pass);
        $stmt->execute();
        $info = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if ($info) {
            $cookie_name = "username";
            $cookie_value = $_POST['username'];
            setcookie('username', $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day
            $user = $_POST['username'];
            $_SESSION['user'] = $_POST['username'];
            foreach ($info as $data) {
            $_SESSION['iname'] = $data['name'];
            }
            return true;
        } else {
            echo '<p class="warning">Unable to login. Try again!</p>';
        }
    }

    private function addSubscriber() {
        $username = strtoupper($_POST['username']);
        $name = strtoupper($_POST['name']);
        $email = $_POST['email'];
        $tel = "+254" . substr($_POST['tel'], -9);
        $pass = md5($_POST['password']);
        $d_time = date("Y-m-d H:m:s.u");
        $sql = "INSERT INTO subscriber(username, name, email, tel, pass, d_time) "
                . "VALUES (:username, :name, :email, :tel, :pass, :d_time)";
        $stmt = $this->prepareQuery($sql);
        $stmt->bindValue("username", $username);
        $stmt->bindValue("name", $name);
        $stmt->bindValue("email", $email);
        $stmt->bindValue("tel", $tel);
        $stmt->bindValue("pass", $pass);
        $stmt->bindValue("d_time", $d_time);
        $stmt->execute();
        return true;
    }

    private function addReport() {
        $item_type = $_POST['item_type'];
        $item_no = strtoupper($_POST['item_no']);
        $name = strtoupper($_POST['name']);
        $reporter = strtoupper($_POST['reporter']);
        $drop_point = strtoupper($_POST['drop_point']);
        $tel = "+254" . substr($_POST['tel'], -9);
        $email = $_POST['email'];
        $d_time = date("Y-m-d H:m:s.u");
        
        if ($_SESSION['item_type'] === "STUDENT ID") {
        $institution = strtoupper($_POST['institution_name']);
        } else {
        $institution = 0;    
        }
        
        $sql = "INSERT INTO reports(item_type, institution, item_no, item_name, reporter, drop_point, tel, email, d_time) "
                . "VALUES(:item_type, :institution, :item_no, :name, :reporter, :drop_point, :tel, :email, :d_time)";
        $stmt = $this->prepareQuery($sql);
        $stmt->bindValue("item_type", $item_type);
        $stmt->bindValue("institution", $institution);
        $stmt->bindValue("item_no", $item_no);
        $stmt->bindValue("name", $name);
        $stmt->bindValue("reporter", $reporter);
        $stmt->bindValue("drop_point", $drop_point);
        $stmt->bindValue("tel", $tel);
        $stmt->bindValue("email", $email);
        $stmt->bindValue("d_time", $d_time);
        $stmt->execute();

        $report_notification = $this->checkOwner($item_type, $item_no);

        if (is_bool($report_notification) && $report_notification == true) {
            $ref_id = $this->getID($item_type, $item_no);
            $sql = "INSERT INTO report_notification(ref_id, d_time) "
                    . "VALUES(:ref_id, :d_time)";
            $stmt = $this->prepareQuery($sql);
            $stmt->bindValue("ref_id", $ref_id);
            $stmt->bindValue("d_time", $d_time);
            $stmt->execute();

            $this->sendEmail();
        }

        return true;
    }

    private function getID($item_type, $item_no) {
        $sql = "SELECT max(id) as ref_id FROM reports WHERE item_type=:item_type AND item_no=:item_no";
        $stmt = $this->prepareQuery($sql);
        $stmt->bindValue("item_type", $item_type);
        $stmt->bindValue("item_no", $item_no);
        $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $ref_id = $data[0]['ref_id'];
        return $ref_id;
    }

    private function sendEmail() {
        $email = "mauricemugeni@gmail.com";
        $subject = "Kitambulisho yetu";
        $receiver = "momugz@gmail.com";
        $message = "Your document has been found";
        mail($receiver, "Subject: $subject", $message, "From: $email");
    }

    private function checkOwner($item_type, $item_no) {
        $sql = "SELECT * FROM mydocs WHERE item_type=:item_type AND item_no=:item_no";
        $stmt = $this->prepareQuery($sql);
        $stmt->bindValue("item_type", $item_type);
        $stmt->bindValue("item_no", $item_no);
        $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if (count($data) == 0) {
            return false;
        } else {
            return true;
        }
    }

    public function getDocTypes() {
        $stmt = $this->prepareQuery("SELECT category FROM doc_type ORDER BY id ASC");
        $stmt->execute();
        $currentGroup = null;
        $html = "";
        while ($row = $stmt->fetch()) {
            if (is_null($currentGroup)) {
                $currentGroup = $row['category'];
                $html .= "<option value=\"{$row['category']}\" selected>{$row['category']}</option>";
            } else {
                $html .= "<option value=\"{$row['category']}\">{$row['category']}</option>";
            }
        }
        if ($html == "")
            $html = "<option value=\"\">No Document types Available</option>";
        echo $html;
        return $currentGroup;
    }

    public function startItemSession($category) {
        
    }

    private function sendMessage() {
        $name = strtoupper($_POST['name']);
        $email = $_POST['email'];
        $message = $_POST['message'];
        $d_time = date("Y-m-d H:m:s.u");
        $sql = "INSERT INTO message(name, email, message) VALUES(:name, :email, :message)";
        $stmt = $this->prepareQuery($sql);
        $stmt->bindValue("name", $name);
        $stmt->bindValue("email", $email);
        $stmt->bindValue("message", $message);
        $stmt->bindValue("d_time", $d_time);
        $stmt->execute();
        return true;
    }

}
